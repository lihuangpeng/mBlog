<?php

return [
    'default' => env('OSS_DEFAULT_BUCKET','mblog-vip'),

    'mblog-vip' => [
        'driver' => 'aliyun',
        'domain' => 'https://mblog-vip.oss-cn-guangzhou.aliyuncs.com',
        'endpoint' => 'https://oss-cn-guangzhou.aliyuncs.com',
        'bucket' => 'mblog-vip',
        'accessKeyId' => 'LTAI5tSfg5QpvJFV55FryjMs',
        'accessKeySecret'=>'r7byCTa8ehVwhS4Iv7iWhNpi4ffDjB',
    ],
];