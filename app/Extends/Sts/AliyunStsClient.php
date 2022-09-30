<?php

namespace Sts;

use Illuminate\Support\Facades\Http;
use Traits\TraitAliyun;

class AliyunStsClient
{
    use TraitAliyun;

    protected $config = [
        'domain' => 'https://sts.aliyuncs.com',
        'accessKeyId' => 'LTAI5tCcv5KMoCMgbYs5kNsZ',
        'accessKeySecret' => '3xhrCMAZWTUpPsH25nJRbMlcnGqp2P',
        'RoleArn' => 'acs:ram::1053651683277078:role/ramossrole',
        'RoleSessionName' => 'alice',
        'Version' => '2015-04-01'
    ];

    public function getAssumeRole($params = [])
    {
        $query = $this->getRequestQuery('AssumeRole',$params);
        $response = Http::asForm()->get($this->config['domain'].'?'.$query);
        return $response->json();
    }

    public function getAssumeRoleQuery($params)
    {
        return [
            'DurationSeconds' => isset($params['DurationSeconds']) ? $params['DurationSeconds'] : 3600,
            'RoleArn' => $this->config['RoleArn'],
            'RoleSessionName' => $this->config['RoleSessionName'],
            'Version' => $this->config['Version']
        ];
    }
}