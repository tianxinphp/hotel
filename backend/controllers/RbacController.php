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
        $userCreate=$auth->createPermission('/user-backend/create');
        $userCreate->description='用户创建页';
        $auth->add($userCreate);
        $userUpdate=$auth->createPermission('/user-backend/update');
        $userUpdate->description='用户修改页';
        $auth->add($userUpdate);
        $userDelete=$auth->createPermission('/user-backend/delete');
        $userDelete->description='用户删除页';
        $auth->add($userDelete);
        //角色
        $userRole=$auth->createRole('用户管理');
        $auth->add($userRole);
        $auth->addChild($userRole,$userIndex);
        $auth->addChild($userRole,$userCreate);
        $auth->addChild($userRole,$userUpdate);
        $auth->addChild($userRole,$userDelete);
        //权限分配
        $auth->assign($userRole,1);
        return $this->redirect('/site/index');
    }
}