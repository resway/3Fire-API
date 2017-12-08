<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/11/28
 * Time: 10:05
 */

namespace app\lib\exception;

/**
 * Class ParameterException 通用参数类异常错误
 * @package app\lib\exception
 */
class ParameterException extends BaseException
{
    public $code = 400;
    public $errorCode = 10000;
    public $msg = "参数错误";
}