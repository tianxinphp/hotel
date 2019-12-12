<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/12/2019
 * Time: 15:45
 */

namespace backend\components\event;


use yii\base\Event;

class MailEvent extends Event
{
    public $email;

    public $subject;

    public $text;

    public $html;

}