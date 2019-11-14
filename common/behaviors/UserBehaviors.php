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
use yii\base\Behavior;
use yii\web\ForbiddenHttpException;

class UserBehaviors extends ActionFilter
{
    public function beforeAction($action)
    {
        $routeId='/'.$action->getUniqueId();
        $userId=Yii::$app->getUser()->id;
        $routes=[];
        $authManager=Yii::$app->getAuthManager();
        print_r($authManager->getPermissionsByUser($userId));


//        foreach ($authManager->getPermissionsByUser($userId) as $userName=> $value){
//
//        }
    }
}