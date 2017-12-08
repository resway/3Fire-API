<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/11/28
 * Time: 9:55
 */

namespace app\api\model;


use think\Model;
use traits\model\SoftDelete;

class BaseModel extends Model
{
    // 软删除，设置后在查询时要特别注意whereOr
    // 使用whereOr会将设置了软删除的记录也查询出来
    use SoftDelete;
}