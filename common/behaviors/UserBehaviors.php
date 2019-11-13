<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/11/2019
 * Time: 12:01
 */

namespace common\behaviors;
use Yii;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;
class UserBehaviors extends ActionFilter
{
    public function beforeAction($action){
        $currentRequestRoute = $action->getUniqueId();
        if(!Yii::$app->user->can($currentRequestRoute)){
            throw new ForbiddenHttpException($currentRequestRoute);
        }
    }
}