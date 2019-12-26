<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/12/2019
 * Time: 16:26
 */

namespace backend\components;
use yii\base\Component;
use yii\base\Event;

class MyComponent extends  Component
{
    public $name=self::class;

    public $enable=true;

    private $_pram1;

    private $_pram2;

    const EVENT_START='event_start';

    const EVENT_END='event_end';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public function init()
    {
        parent::init();
        $this->on(self::EVENT_START,[$this,'handleStart']);
        $this->on(self::EVENT_END,['backend\components\MyComponent','handleEnd']);
    }

    public function getPram2(){
        return $this->_pram2;
    }

    public function setPram2($pram2){
        $this->_pram2=$pram2;
    }

    public function getPram1(){
        return $this->_pram1;
    }

    public function setPram1($pram1){
        $this->_pram1=$pram1;
    }

    public static function handleStart(){
        self::setPram2(3);
    }

    public static function handleEnd(){
        self::setPram2(4);
    }

    public function trigger($name, Event $event = null)
    {
        parent::trigger($name, $event);
    }
}