<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/12/26
 * Time: 15:48
 */

namespace app\lib\exception;


class LoginException extends BaseException
{
    public $code = 401;
    public $msg = '登录失败';
    public $errorCode = 60001;
}