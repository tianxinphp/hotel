<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/10/2019
 * Time: 14:55
 */

namespace backend\models;


use yii\base\Model;

class SignUpForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $status;
    public $create_at;
    public $update_at;


    /***
     * 表单规则
     * @return array
     */
    public function rules()
    {
        return [
            ['username','filter','filter'=>'trim'],
            ['username','required','message'=>'用户名不能为空'].
            ['username','unique','targetClass'=>'backend\models\UserBackend','message'=>'用户名重复'],
            ['username','string','max'=>20,'tooLong'=>'最大20位'],
            ['email','filter','filter'=>'trim'],
            ['email','required','message'=>'用户名不能为空'],
            ['email','unique','targetClass'=>'backend\models\UserBackend','message'=>'邮箱重复'],
            ['email','email'],
            ['password','required','message'=>'密码不能为空'],
            ['status','default','value'=>0],
            [['create_at','update_at'],'default','value'=>date('Y-m-d H:i:s')]
        ];
    }


    /**
     * 注册
     * @return bool|null
     */
    public function signUp(){
        if(!$this->validate()){
            return null;
        }
        //数据库入库
        $userModel=new UserBackend();
        $userModel->username=$this->username;
        $userModel->email=$this->email;
        $userModel->created_at=$this->create_at;
        $userModel->updated_at=$this->update_at;
        $userModel->status=$this->status;
        $userModel->setPassword($this->password);
        $userModel->generateAuthKey();
        return $userModel->save(false);
    }
}