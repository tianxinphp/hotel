<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/11/2019
 * Time: 12:01
 */

namespace common\behaviors;
use Yii;
use yii\base\Behavior;
use yii\web\ForbiddenHttpException;

class UserBehaviors extends Behavior
{
    public function  isCan(){
        $baseUrl=Yii::$app->request->baseUrl;
        if(!Yii::$app->user->can($baseUrl)){
            throw new ForbiddenHttpException($baseUrl);
        }
    }
}