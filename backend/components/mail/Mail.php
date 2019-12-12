<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/12/2019
 * Time: 16:05
 */

namespace backend\components\mail;

use Yii;
class Mail
{
    public function sendMail($event){
        $mail=Yii::$app->mailer->compose();
        $mail->setTo($event->email);
        $mail->setSubject($event->subject);
        $mail->setTextBody($event->text);
        $mail->setHtmlBody($event->html);
        $mail->send();
    }
}