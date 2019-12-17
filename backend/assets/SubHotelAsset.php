<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/12/2019
 * Time: 14:06
 */

namespace backend\assets;
use yii\web\AssetBundle;

class SubHotelAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/subHotel.css',
    ];
    public $depends = [
        'backend\assets\TagAsset'
    ];
}