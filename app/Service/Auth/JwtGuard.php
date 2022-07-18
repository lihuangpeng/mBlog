<?php

namespace App\Service\Auth;

use App\Service\JwtService;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class JwtGuard implements Guard
{
    use GuardHelpers;
    protected $request;

    public function __construct(UserProvider $userProvider, Request $request)
    {
        $this->provider = $userProvider;
        $this->request = $request;
    }

    public function user()
    {
        $user = null;
        $authorization = $this->request->header('Authorization');
        if (!empty($authorization)) {
            $authorization = substr($authorization, strlen('Bearer') + 1);
            $jwtObject = JwtService::getInstance()->setSecretKey(env('APP_KEY'))->decode($authorization);
            if ($jwtObject->getStatus() === 0) {
                $uid = $jwtObject->getAud();
                if ($this->provider instanceof EloquentUserProvider) {
                    $model = $this->provider->createModel();
                    $user = $model->setTable('user_info_' . getHash($uid))->newQuery()->where('uid',$uid)->first();
                }
            }
        }
        return $user;
    }

    public function validate(array $credentials = [])
    {
        return true;
    }
}