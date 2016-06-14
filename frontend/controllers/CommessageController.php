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
 *CompanyController 企业信息
 */
class CommessageController extends Controller
{
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex description]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $arr = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_com_message')
            ->all();
            
        return $this->render('show.html',array('arr'=>$arr));
    }
    /**
     * [actionAdd 企业信息添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
        $request = Yii::$app->request;
        if ($request->post('name')) {
            echo "2";
        } else {
            echo "1";
        }
        
        
    }
}
