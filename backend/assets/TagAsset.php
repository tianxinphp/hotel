<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/12/2019
 * Time: 14:20
 */

namespace backend\assets;
use yii\web\AssetBundle;

class TagAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        '//cdn.bootcss.com/jquery/3.1.1/jquery.js'
    ];
}