# AliSms

阿里新版短信

```
$ composer require yonghua4413/ali-sms
```

```php
//引入
use YYHSms\SendSms;
$app = [
    'accessKeyId' => '',
    'accessKeySecret' => ''
];
$parems = [
    'PhoneNumbers' => '手机号,多个手机号请用“,”隔开',
    'SignName' => '短信签名',
    'TemplateCode' => '模板编号',
    'TemplateParam' => [
    	//模板变量名 => 模板变量值
        'token' => $token
    ]
];
$sms = new SendSms($app, $parems);
$info = (array) $sms -> send();
```

## 如遇超时，请设置如下
```php
set_time_limit(0);
```