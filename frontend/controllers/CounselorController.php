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

use CommonController;
/**
 *  CounselorController 顾问
 */
class CounselorController extends Controller
{
	//public $layout='public';
    public $layout=false;
    public $enableCsrfValidation=false;
    /**
     * [actionIndex 显示顾问列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $arr = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_counselor')
            ->innerJoin('al_company', 'al_counselor.com_id = al_company.com_id')
            ->all();

        return $this->render('show.html',array('arr'=>$arr));
    }
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
       
        $request= Yii::$app->request;

        if (Yii::$app->request->isPost) {
            
                //获取元素值
                $data['c_name']=$request->post('c_name');
                $data['c_qq']=$request->post('c_qq');
                //开始入库
                $connection = \Yii::$app->db;
                $re = $connection->createCommand()->insert("al_counselor",$data)->execute();
                //判断是否添加成功
                if($re)
                {
                    return $this->redirect('?r=counselor/show');
                }else{
                    return $this->render('add.html');
                }
            
        }
        else
        {

            return $this->render('add.html');
        }
    }
}
