<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/12/2019
 * Time: 15:58
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\components\event\MailEvent;
class SendMailController extends Controller
{
    const SEND_MAIL='send_mail';
    public function init()
    {
        parent::init();
//        $this->on(self::SEND_MAIL,['backend\components\mail\Mail','sendMail']);
    }

    public  function actionSend()
    {
        $event=new MailEvent;
        $event->email = 'tstack.tian@huamin.com.hk';
        $event->subject = '事件邮件测试';
        $event->text = 'text';
        $event->html = 'html';
        echo 2;
        exit();
        $this->trigger(self::SEND_MAIL,$event);
    }
}