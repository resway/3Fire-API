<?php
/**
 * Created by PhpStorm.
 * User: resway
 * Date: 2017/11/28
 * Time: 9:51
 */

namespace app\api\behavior;

class CORS
{
    /**
     * appInit 解决前端js跨域问题
     * @param $params
     */
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: POST,GET');
        if(request()->isOptions()){
            exit();
        }
    }
}