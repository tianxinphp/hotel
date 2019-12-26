<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/12/2019
 * Time: 16:26
 */

namespace backend\components;
use yii\base\Component;

class MyComponent extends  Component
{
    public $name=self::class;

    public $enable=true;

    public $pram1;

    private $_pram2;

    /**
     * MyComponent constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public function init()
    {
        parent::init();
        //..................
    }

    public function getPram2(){
        return $this->_pram2;
    }

    public function setPram2($pram2){
        $this->_pram2=$pram2;
    }
}