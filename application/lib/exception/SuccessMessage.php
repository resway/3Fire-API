<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/11/28
 * Time: 10:07
 */

namespace app\lib\exception;

/**
 * Class SuccessMessage 创建成功
 * @package app\lib\exception
 */
class SuccessMessage extends BaseException
{
    public $code = 201;
    public $msg = 'success';
    public $errorCode = 0;
}