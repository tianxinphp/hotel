<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/11/2019
 * Time: 12:01
 */

namespace common\behaviors;
use yii\base\Behavior;

class UserBehaviors extends Behavior
{
    public function beforeAction($action){
        var_dump(111);
        return true;
    }
}