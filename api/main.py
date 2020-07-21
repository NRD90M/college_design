#!/usr/bin/env python
# coding=utf-8

from flask import Flask, request, jsonify, make_response
import connect_mysql
import res_mess
import json
import AutoSR
app = Flask(__name__)
@app.route('/<infos>')
def hello_word(infos):
    #print(infos)
    req_usr = infos.split("&",1)
    infos = req_usr[0]
    user = req_usr[1]
    #connect_mysql.get_message(infos)
    r = res_mess.get_message(infos)
    j = json.loads(r)
    id = connect_mysql.get_res(infos,j.get('Reply'),user)
    AutoSR.TextSS(id,user,j.get('Reply'))
    mp3_name = user + '_' + str(id) + '.mp3'
    data = {'message':j.get('Reply'),'mp3_name':mp3_name}
    js = json.dumps(data)                                                                                                                                     
    res = make_response(js)
    res.headers['Access-Control-Allow-Origin'] = '*'
    res.headers['Access-Control-Allow-Method'] = '*'
    res.headers['Access-Control-Allow-Headers'] = '*'
    return res

if __name__=='__main__':
    app.run(host='0.0.0.0',port=11000,debug=True,threaded=True)
    

