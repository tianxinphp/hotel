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

    private $_pram1;

    private $_pram2;

    /**
     * MyComponent constructor.
     * @param string $pram1
     * @param string $pram2
     * @param array $config
     */
    public function __construct($pram1,$pram2,array $config = [])
    {
        //..................
        $this->_pram1=$pram1;
        $this->_pram2=$pram2;
        parent::__construct($config);
    }

    public function init()
    {
        parent::init();
        //..................
    }

    public function getPram1(){
        return $this->_pram1;
    }

    public function setPram1($pram1){
        $this->_pram1=$pram1;
    }
}