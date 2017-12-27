<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/12/26
 * Time: 16:06
 */

namespace app\api\service;


use app\api\model\User as UserModel;
use app\lib\exception\LoginException;
use think\Session;

class AppToken extends Token
{
    /**
     * getToken 获取token
     * @param $username
     * @param $password
     * @return string
     * @throws LoginException
     */
    public function getToken($username,$password) {
        $user = UserModel::check($username,$password);
        if(!$user) {
            throw new LoginException([
               'msg' => '登录失败，用户名或密码错误'
            ]);
        } else {
            if ($user->status != 1 ) {
                throw new LoginException([
                   'msg' => '帐户被锁定，请联系管理员'
                ]);
            } else {
                $values = $this->_getUserInfoToArray($user);
                $token = $this->_saveToSession($values);
                $user->update_ip = \request()->ip();
                $user->save();
                return $token;
            }
        }
    }

    /**
     * getUserinfo 获取用户信息
     * @return array
     */
    public function getUserinfo() {
        $uid = self::getCurrentTokenVar('uid');
        $user = UserModel::getUserByID($uid);
        $ret = $this->_getUserInfoToArray($user);
        return $ret;
    }

    /**
     * _saveToSession 用户信息存入session
     * @param $values
     * @return string
     */
    private function _saveToSession($values) {
        $token = self::generateToken();
        Session::set($token,$values);
        return $token;
    }

    /**
     * _getUserInfoToArray 整理user数据
     * @param $user
     * @return array
     */
    private function _getUserInfoToArray($user) {
        return [
            'uid' => $user->id,
            'username' => $user->username,
            'avatar' => $user->avatar,
            'group_id' => $user->group_id,
            'group_name' => $user->group->name,
            'group_desc' => $user->group->desc
        ];
    }

}