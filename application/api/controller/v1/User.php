<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/12/26
 * Time: 15:16
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\AppToken;
use app\api\validate\LoginValidate;
use app\lib\exception\SuccessMessage;

class User extends BaseController
{
    /**
     * login 登录api
     * @param string $username
     * @param string $password
     * @return array
     */
    public function login($username = '', $password = '')
    {
        (new LoginValidate())->goCheck();
        $app = new AppToken();
        $token = $app->getToken($username,$password);
        return [
            'token' => $token
        ];
    }

    /**
     * info 拉取用户信息
     * @return array
     */
    public function info() {
        $app = new AppToken();
        return $app->getUserinfo();
    }

    /**
     * logout 注销登录
     * @throws SuccessMessage
     */
    public function logout() {
        AppToken::removeTokenSession();
        throw new SuccessMessage([
           'msg' => '用户注销登录成功'
        ]);
    }
}