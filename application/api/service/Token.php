<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/12/26
 * Time: 15:27
 */

namespace app\api\service;

use app\lib\enum\GroupEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;
use think\Session;

class Token
{
    /**
     * generateToken 随机生成token
     * @return string
     */
    public static function generateToken() {
        $randChar = getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('app.token_salt');
        return md5($randChar. $timestamp. $tokenSalt);
    }

    /**
     * getCurrentTokenVar 从缓存中获取token对应用户的指定key值
     * @param $key
     * @return mixed
     * @throws Exception
     * @throws TokenException
     */
    public static function getCurrentTokenVar($key) {
        $token = Request::instance()->header('token');
        $vars = Cache::get($token);
        if (!$vars) {
            throw new TokenException();
        } else {
            if (!is_array($vars)) {
                $vars = json_decode($vars, true);
            }
            if (array_key_exists($key, $vars)) {
                return $vars[$key];
            } else {
                throw new TokenException(['errorCode' => 60013]);
            }
        }
    }

    /**
     * getCurrentIdentity 从缓存中获取用户指定身份标识
     * @param $keys
     * @return array
     * @throws TokenException
     */
    public static function getCurrentIdentity($keys = ['uid','username']) {
        $token = Request::instance()->header('token');
        $identities = Cache::get($token);
        if (!$identities) {
            throw new TokenException();
        } else {
            $identities = json_decode($identities, true);
            $result = [];
            foreach ($keys as $key) {
                if(array_key_exists($key, $identities)) {
                    $result[$key] = $identities[$key];
                }
            }
            return $result;
        }
    }

    /**
     * verifyToken 检测token是否存在
     * @param $token
     * @return bool
     */
    public static function verifyToken($token) {
        $exist = Cache::get($token);
        if($exist) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * removeTokenSession 删除cache中的token
     */
    public static function removeTokenSession() {
        $token = Request::instance()->header('token');
        Cache::rm($token);
    }

    /**
     * needAllGroupScope 需要登录用户权限
     * @return bool
     * @throws ForbiddenException
     * @throws TokenException
     */
    public static function needAllGroupScope() {
        $group = self::getCurrentTokenVar('group_id');
        if ($group){
            if ($group > GroupEnum::All) {
                return true;
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }
    }

    /**
     * needAdminGroupScope 需要超级管理员权限
     * @return bool
     * @throws ForbiddenException
     * @throws TokenException
     */
    public static function needAdminGroupScope() {
        $group = self::getCurrentTokenVar('group_id');
        if ($group){
            if ($group == GroupEnum::Admin) {
                return true;
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }
    }

    /**
     * needUserGroupScope 需要普通用户权限
     * @return bool
     * @throws ForbiddenException
     * @throws TokenException
     */
    public static function needUserGroupScope() {
        $group = self::getCurrentTokenVar('group_id');
        if ($group){
            if ($group == GroupEnum::User) {
                return true;
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }
    }
}