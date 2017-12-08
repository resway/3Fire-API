<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/11/28
 * Time: 10:10
 */

namespace app\api\validate;


class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];
}