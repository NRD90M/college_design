#!/usr/bin/env python
# coding=utf-8
import sys
reload(sys)
sys.setdefaultencoding('utf8')
import MySQLdb as mdb
   
config = {
        'host': 'localhost',
        'port': 3306,
        'user': 'root',
        'passwd': 'f.199771',
        'db': 'college_design',
        'charset': 'utf8'

     }
#conn = mdb.connect(**config)
conn = mdb.connect(host='175.24.55.5', port=3306, user='root', passwd='f.199771', db='college_design', charset='utf8')
cursor = conn.cursor()

try:
    TABLE_NAME  = 'usr_message'
    # 插入单条数据
    def get_user_id(user):
        conn = mdb.connect(host='175.24.55.5', port=3306, user='root', passwd='f.199771', db='college_design', charset='utf8')
        cursor = conn.cursor()
        count = cursor.execute("SELECT * FROM user where user_name='%s'" %user)
        data = cursor.fetchone()
        return data[0]
    def get_res(infos,message,user):
    #    print message
        #sql = 'insert into usr_message(message) values(%s);'
        # 不建议直接拼接sql，占位符方面可能会出问题，execute提供了直接传值
        #value = ['西安','未央区','610112']
        conn = mdb.connect(host='175.24.55.5', port=3306, user='root', passwd='f.199771', db='college_design', charset='utf8')
        cursor = conn.cursor()
        count = cursor.execute('SELECT * FROM usr_message')
        id = count + 1
        #print count
        #message = "陕西科技大学"
        user_id = get_user_id(user)
        cursor.execute("insert into usr_message(m_id,message,bot_message,user_id) values('%d','%s','%s','%d')" %(id,infos, message,user_id))
        conn.commit()
        return id
    #def get_message(message):
    #    print message
        #sql = 'insert into usr_message(message) values(%s);'
        # 不建议直接拼接sql，占位符方面可能会出问题，execute提供了直接传值
        #value = ['西安','未央区','610112']
        #conn = mdb.connect(host='39.106.190.222', port=3306, user='root', passwd='f.199771', db='college_design', charset='utf8')
        #cursor = conn.cursor()
        #count = cursor.execute('SELECT * FROM %s' %TABLE_NAME)
        #id = count + 1
        #print count
        #message = "陕西科技大学"
        #cursor.execute("insert into usr_message(id,message) values('%d','%s')" %(id, message))
        #conn.commit()
    #count = cursor.execute('SELECT * FROM %s' %TABLE_NAME)
    #data = cursor.fetchall()
    # 查询数据条目
    #def test(city_name,area_name):
    #    for r in data:
    #        id = r[0]
    #        city = r[1]
    #        if(city==city_name):
    #            area = r[2]
    #            if(area==area_name):
    #                code = r[3]
    #                return code
    # 如果没有设置自动提交事务，则这里需要手动提交一次
    #    conn.commit()
except:
    import traceback
    traceback.print_exc()
    # 发生错误时会滚
    conn.rollback()
finally:
    # 关闭游标连接
    cursor.close()
    # 关闭数据库连接
    conn.close()

