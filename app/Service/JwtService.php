<?php

namespace App\Service;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Token;

class JwtService extends BaseService
{
    protected $secret_key;
    /**
     * @var Builder
     */
    protected $jwt_builder;
    /**
     * @var Token
     */
    protected $decode_token;
    protected $status = 0;

    private static $static;

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if (!self::$static) {
            self::$static = new self();
        }
        return self::$static;
    }

    /**
     * @param $secret_key
     * @return $this
     */
    public function setSecretKey($secret_key)
    {
        $this->secret_key = $secret_key;
        return $this;
    }

    /**
     * @return $this
     */
    public function publish()
    {
        if (!$this->jwt_builder) {
            $this->jwt_builder = (new Builder())->setHeader('alg', 'HS256');
            $now = time();
            //发行人默认
            $this->jwt_builder->setIssuer('lihuangpeng');
            //发行时间
            $this->jwt_builder->setIssuedAt($now);
            //发行过期时间
            $this->jwt_builder->setExpiration($now + 3600);
        }
        return $this;
    }

    /**
     * 设置发行人
     * @param $aud
     * @return $this
     */
    public function setAud($aud)
    {
        $this->publish();
        $this->jwt_builder->setAudience($aud);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAud()
    {
        if(!$this->decode_token){
            throw new \RuntimeException('请先解密');
        }
        return $this->decode_token->getClaim('aud');
    }

    /**
     * @param $expire
     * @return $this
     */
    public function setExpire($expire)
    {
        $this->publish();
        $this->jwt_builder->setExpiration($expire);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpire()
    {
        if(!$this->decode_token){
            throw new \RuntimeException('请先解密');
        }
        return $this->decode_token->getClaim('exp');
    }

    public function __toString()
    {
        $this->publish();
        return $this->jwt_builder->sign(new Sha256(), $this->secret_key)->getToken()->__toString();
    }

    /**
     * 解密
     * @param String $content
     * @return $this;
     */
    public function decode(String $content)
    {
        if (!$this->decode_token) {
            try{
                $this->decode_token = (new Parser())->parse($content);
                if ($this->secret_key) {
                    $ret = $this->decode_token->verify(new Sha256(), $this->secret_key);
                    if (!$ret) {
                        //access_token不正确
                        $this->status = -1;
                        return $this;
                    }
                }
                $ret = $this->decode_token->isExpired();
                if ($ret) {
                    $this->status = -2;
                    return $this;
                }
            }catch (\Throwable $throwable){
                $this->status = -1;
                return $this;
            }
        }
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

}