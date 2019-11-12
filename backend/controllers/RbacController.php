<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/11/2019
 * Time: 15:27
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;


class RbacController extends Controller
{
    public function actionInit()
    {
        //权限组件
        $auth=Yii::$app->authManager;
        //添加权限
        $userIndex=$auth->createPermission('/user-backend/index');
        $userIndex->description='用户列表页';
        $auth->add($userIndex);
        //角色
        $userRole=$auth->createRole('用户管理');
        $auth->add($userRole);
        $auth->addChild($userRole,$userIndex);
        //权限分配
        $auth->assign($userRole,1);
    }
}