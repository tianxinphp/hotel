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
        print_r($authManager);
        foreach ($authManager->getPermissionsByUser($userId) as $userName=> $value){
            if($userName[0]==='/'){
                $routes[]=$userName;
            }
        }
        // 判断当前用户是否有权限访问正在请求的路由
        if (in_array($routeId, $routes)) {
            return true;
        }
        $this->denyAccess(Yii::$app->getUser());
    }

    protected function denyAccess($user){
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            throw new ForbiddenHttpException('不允许访问.');
        }
    }
}