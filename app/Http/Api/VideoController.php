<?php

namespace App\Http\Api;

use App\Facades\OssClient;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    //视频上传成功预览
    public function preview()
    {
        $validator = Validator::make(request()->post(), [
            'path' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->returnJson(1, $validator->errors()->first());
        }
        //验证当前用户是否可以上传视频
        $object = request()->post('path');
        $sign_url = OssClient::getSignUrl($object);
        return $this->returnJson(200, '成功', $sign_url);
    }

    //观看视频
    public function play($id)
    {

    }

    public function delete()
    {

    }

}