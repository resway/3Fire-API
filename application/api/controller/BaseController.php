<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/11/28
 * Time: 9:53
 */

namespace app\api\controller;


use app\api\service\Token;
use think\Controller;

class BaseController extends Controller
{
    /**
     * checkAllGroupScope 检测登录用户权限
     */
    protected function checkAllGroupScope() {
        Token::needAllGroupScope();
    }

    /**
     * checkAdminGroupScope 检测超级管理员权限
     */
    protected function checkAdminGroupScope() {
        Token::needAdminGroupScope();
    }

    /**
     * checkUserGroupScope 检测普通用户权限
     */
    protected function checkUserGroupScope() {
        Token::needUserGroupScope();
    }
}