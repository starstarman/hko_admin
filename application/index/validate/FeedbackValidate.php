<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/7/28
 * Time: 19:40
 */
namespace app\index\validate;
use think\Validate;
class FeedbackValidate extends Validate{
    protected $rule = [
        ['status','number|in:-1,0,1','状态必须是数字|状态范围不合法'],
    ];

//    场景设置
    protected $scene = [
        'status' =>['id','status'],
    ];
}