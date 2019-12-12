<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/12/2019
 * Time: 14:38
 */
namespace backend\controllers;
use Yii;
use yii\web\Controller;

class EventTestController extends Controller
{
    const EVENT_TEST ='event_test';


    public function init()
    {
        parent::init();
        $this->on(self::EVENT_TEST,[$this,'onEventTest']);
    }

    public function onEventTest(){
        echo 'this is event';
        exit();
    }

    public function actionIndex()
    {
        $this->trigger(self::EVENT_TEST);
    }

}