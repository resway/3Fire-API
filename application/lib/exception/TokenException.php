<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/12/26
 * Time: 15:47
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'token已过期或无效token';
    public $errorCode = 60011;
}