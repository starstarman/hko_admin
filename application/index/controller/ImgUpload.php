<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/4/7
 * Time: 12:08
 */

namespace app\index\controller;

use think\Controller;
use OSS\OssClient;
use OSS\Core\OssException;
class imgUpload extends Controller
{
    /**
     * @param $filePath 上传到应用服务器的文件路径
     * @param $object   上传到oss的文件名
     */
    public function oss_ini($filePath,$object)
    {
        //初始化OSS
        $accessKeyId = "LTAIT4YbLlA9DMtQ";
        $accessKeySecret = "ISxUR9oDh9IT3ZCZuTG3C5Wn248Rnq";
        $endpoint = "https://oss-cn-beijing.aliyuncs.com";
        $bucket= "heikeonline";
        $articlePicLocation = "articleImage/";
        $oss_url = "https://heikeonline.oss-cn-beijing.aliyuncs.com/";
        try {
            $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
        } catch (OssException $e) {
            print $e->getMessage();
        }

        //进行OSS上传
            try{
                $ossClient->uploadFile($bucket, $articlePicLocation.$object, $filePath);
            } catch(OssException $e) {
                printf(__FUNCTION__ . ": FAILED\n");
                printf($e->getMessage() . "\n");
            }

        //返回
        return $imgOSS_Url = $oss_url.$articlePicLocation.$object;
    }

    /**
     * 上传到应用服务器 然后上传到OSS 并删除应用服务器的文件
     */
    public function upload(){
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                //本地图片路径
                $filePath =$info->getPathname();
                //本地图片的名字和图片类型
                $object = $info->getFilename();
                //oss上传
               $imgOSS_Url  = $this->oss_ini($filePath,$object);
                //获取上传应用服务器的目录
                $dir=$info->getPath();
                //释放资源
                unset($info);
                //删除目录
               del_dir($dir);
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }

            $uploadApi = ['errno'=>0,'data'=>[$imgOSS_Url]];

            return json_encode($uploadApi);

        }
    }



}