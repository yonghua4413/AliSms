<?php 
/**
 * 阿里新版短信
 * @author 254274509@qq.com
 */
use YYHhelper\SignatureHelper;

class SendSms{
    
    private $helper;
    private $params;
    private $app;
    
    public function __construct($app, $params=[]){
        
        $this->app['accessKeyId'] = $app['accessKeyId'];
        $this->app['accessKeySecret'] = $app['accessKeySecret'];
        
        $this->params['PhoneNumbers'] = $params['PhoneNumbers'];
        $this->params["SignName"] = $params["SignName"];
        $this->params["TemplateCode"] = $params["TemplateCode"];
        
        if(isset($params["TemplateParam"]) && !empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $this->params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }
        
        $this->helper = new SignatureHelper();
    }
    
    public function send(){
        // 此处可能会抛出异常，注意catch
        $content = $this->helper->request(
            $this->app['accessKeyId'],
            $this->app['accessKeySecret'],
            "dysmsapi.aliyuncs.com",
            array_merge($this->params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
        );
        
        return $content;
    }
}