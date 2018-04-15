<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status($status){
    if ($status == 1){
        $str = "<span class='label label-success radius'>正常</span>";
    }elseif ($status == 0){
        $str = "<span class='label label-warning radius'>待审</span>";
    }else{
        $str = "<span class='label label-danger radius'>删除</span>";
    }
    return $str;
}
/**
 * @param string $errorCode 返回json
 * @param string $message
 * @param array $data
 * @return array
 */
function show($errorCode='',$message='',$data=[]){
    return [
        'errorCode'=>$errorCode,
        'mes'=>$message,
        'data'=>$data
    ];

}

/**
 * @param $dir     删除目录
 * @return bool
 */
 function del_dir($dir) {
    if (!is_dir($dir)) {
        return false;
    }
    $handle = opendir($dir);
    while (($file = readdir($handle)) !== false) {
        if ($file != "." && $file != "..") {
            is_dir("$dir/$file") ? $this->del_dir("$dir/$file") : @unlink("$dir/$file");
        }
    }
    if (readdir($handle) == false) {
        closedir($handle);
        @rmdir($dir);
    }
}