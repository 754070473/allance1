<?php
 namespace frontend\models;
 use Yii;
 use yii\base\Model;
 use yii\web\UploadedFile;
 use yii\captcha\Captcha;
 use yii\db\ActiveRecord;
 

class LoginForm extends ActiveRecord{
   
     public $verifyCode;
     public $user;
     public $pass;
     public $imageFile;
  
     public function login()
     {
         return [
           ['verifyCode', 'captcha','message'=>'验证码错误'],
             
         ];
     }
     
   
}
?>
 