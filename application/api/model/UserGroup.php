<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/12/26
 * Time: 15:27
 */

namespace app\api\model;


class UserGroup extends BaseModel
{
    protected $hidden = ['id','create_time','update_time','delete_time'];
}