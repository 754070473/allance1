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
 *  IndentController 订单管理
 */
class IndentController extends Controller
{
	//public $layout='public';
    public $layout=false;
    public $enableCsrfValidation = false;
    /**
     * [actionIndex 显示职位列表]
     * @return [type] [description]
     */
    //联查订单
    public function actionShow()
    {
//        $arr=Yii::$app->db->createCommand("select * from al_indent inner join al_recruit on al_indent.rec_id=al_recruit.rec_id INNER join al_post on al_recruit.post_id=al_post.post_id INNER join al_com_message on  al_post.mes_id=al_com_message.mes_id ")->queryall();
//        print_r($arr);die;
        $rows = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_indent')
            ->innerJoin('al_recruit', 'al_indent.rec_id=al_recruit.rec_id ')
            ->innerJoin('al_post', 'al_recruit.post_id=al_post.post_id')
            ->innerJoin('al_com_message', 'al_post.mes_id=al_com_message.mes_id')
            ->all();


        print_r($rows);die;
        return $this->render('show.html');
    }
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
    	return $this->render('add.html');
    }
}