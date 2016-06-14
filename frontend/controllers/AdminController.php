<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



/**
 *  PostController 管理员
 */
class AdminController extends Controller
{
	//public $layout='public';
    public $layout=false;
    public $enableCsrfValidation = false;
    /**
     * [actionIndex 显示职位列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        return $this->render('show.html');
    }
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $pwd = $request->post('a_name');
            $name = $request->post('a_pwd');
                    $re=rand(000001,999999);

          echo $re;



        }else{
               return $this->render('useradd.html');
           }

    }
}
