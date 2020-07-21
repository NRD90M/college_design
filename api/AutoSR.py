#!/usr/bin/env python
# coding=utf-8
import requests
import sys
reload(sys)
sys.setdefaultencoding('utf8')
from aip import AipSpeech                                                                                                                                                                      
APP_ID = '16684660'
API_KEY = '15d8oiLPDGeoc3nGioqakVal'
SECRET_KEY = 'fdakOLQ9EKoLh2vRCZlZWLo3pHGvyIX5'
client = AipSpeech(APP_ID,API_KEY,SECRET_KEY)
# 读取文件
def get_file_content(filePath):
    with open(filePath, 'rb') as fp:
        return fp.read()
# 语音识别
def Asr():
    res_asr = client.asr(get_file_content('voice.pcm'), 'pcm', 16000, {'dev_pid': 1536,})
    if res_asr['err_no'] != 0 :
        a = res_asr['err_msg'][0]
        return a
    else : 
        b = res_asr['result'][0]
        return b

# 语音合成
def TextSS(id,user,text):
    res = client.synthesis(text,'zh',1,{'vol':5,})
    name = '../mp3_data/' + user +'_' + str(id) +'.mp3'
    if not isinstance(res, dict):
        with open(name, 'wb') as f:
            f.write(res)

