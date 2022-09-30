<?php

namespace App\OSS;

use OSS\OssClient;

class AliyunOssClient implements OssInterface
{
    protected $config;
    protected $client;

    public function __construct($config)
    {
        $this->config = $config;
        $this->client = new OssClient($this->config['accessKeyId'], $this->config['accessKeySecret'], $this->config['endpoint']);
    }

    public function getObjectMeta($object)
    {
        $objectMeta = $this->client->getSimplifiedObjectMeta($this->config['bucket'], $object);
        return $objectMeta;
    }

    public function getObject($object, $local_file = '')
    {
        $options = [OssClient::OSS_HEADERS => [OssClient::OSS_ACCEPT_ENCODING => 'gzip']];
        if ($local_file) {
            $options[OssClient::OSS_FILE_DOWNLOAD] = $local_file;
        }
        $content = $this->client->getObject($this->config['bucket'], $object, $options);
        if ($local_file) {
            return true;
        } else {
            return $content;
        }
    }

    public function getSignUrl($object,$timeout = 1800)
    {
        $sign_url = $this->client->signUrl($this->config['bucket'], $object,$timeout);
        return $sign_url;
    }

}