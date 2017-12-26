<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/12/26
 * Time: 15:27
 */

namespace app\api\model;


class User extends BaseModel
{
    protected $hidden = ['delete_time','password'];

    /**
     * base  全局查询范围，只查询status=1的数据
     * @param \think\db\Query $query
     */
    protected function base($query) {
        $query->where('status',1);
    }

    /**
     * getUserByID 根据id获取用户信息
     * @param $id
     * @return array
     */
    public static function getUserByID($id)
    {
        $user = self::with(['group'])->find($id);
        return $user;
    }

    /**
     * check 检测用户名密码
     * @param string $username
     * @param string $password
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public static function check($username='',$password='') {
        $password = getPassword($password);
        $user = self::where('username','=',$username)
                    ->where('password','=',$password)
                    ->with(['group'])
                    ->find();
        return $user;
    }

    /**
     * group 关联UserGroup
     * @return \think\model\relation\HasOne
     */
    public function group()
    {
        return self::hasOne( 'UserGroup', 'id', 'group_id' );
    }
}