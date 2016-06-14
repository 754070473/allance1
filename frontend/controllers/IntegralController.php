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
use frontend\models\Integral;


/**
 *  IntegralController 积分管理
 */
class IntegralController extends Controller
{
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex 显示积分项列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $integral = Integral::find()->orderBy('i_addtime desc')->all();
        return $this->render('show.html',array('arr'=>$integral));
    }
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
    	return $this->render('add.html');
    }
    /**
     * 删除
     */
    public function actionInteDel(){
        $request = Yii::$app->request;
        $id = $request->post('inte_id');
        $re = Integral::findOne("inte_id = $id");
        if($re){
            echo 1;
        }else{
            echo 0;
        }
    }
}
