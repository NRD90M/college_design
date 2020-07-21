# encoding: utf-8

from tencentcloud.common import credential
from tencentcloud.common.profile.client_profile import ClientProfile
from tencentcloud.common.profile.http_profile import HttpProfile
from tencentcloud.common.exception.tencent_cloud_sdk_exception import TencentCloudSDKException 
from tencentcloud.nlp.v20190408 import nlp_client, models 
try: 
    cred = credential.Credential("AKIDqSKxKSSuIQK2Wc71MRFonZ7OQEsG3Gdn", "6D4e0DF0OWQ3RYP2OXQ3Pr30iwvd4wXw") 
    httpProfile = HttpProfile()
    httpProfile.endpoint = "nlp.tencentcloudapi.com"

    clientProfile = ClientProfile()
    clientProfile.httpProfile = httpProfile
    client = nlp_client.NlpClient(cred, "ap-guangzhou", clientProfile) 

    req = models.ChatBotRequest()
    def get_message(message):

    	#message = raw_input()
        params = '{"Query":"' + message + '"}'
        #print(params)
        req.from_json_string(params)
        resp = client.ChatBot(req) 
        r = resp.to_json_string()
        #print(type(r))
	return r

except TencentCloudSDKException as err: 
    print(err) 
