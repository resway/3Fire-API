<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/12/26
 * Time: 16:03
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '您没有权限执行此项操作。';
    public $errorCode = 60021;
}