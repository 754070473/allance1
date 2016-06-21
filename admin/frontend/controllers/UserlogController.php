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
 *  PostController 会员日志
 */
class UserlogController extends Controller
{
     use ControlController;
	//public $layout='public';
    public $layout=false;
     public $enableCsrfValidation = false;
    /**
     * [actionIndex 显示职位列表]
     * @return [type] [description]
     */
    //个人日志
    public function actionShow()
    {
       $request = Yii::$app->request;
        $p = $request->post('p')?$request->post('p'):1;
        $search = $request->post('search')?$request->post('search'):"";
        if($search==""){
            $where = 1;
        }else{
            $where = "u_time like '%$search%'";
        }
        $order = 'ulog_id asc';
        $data = $this->ajaxPage(
            'al_user_log
            inner join al_personal on al_user_log.per_id=al_personal.per_id'
            ,5,$p,$where,$order);
//        print_r($data);die;
        return $this->render('show.html',array('arr'=>$data));
    }
    //企业日志
      public function actionShow2()
    {
       $request = Yii::$app->request;
        $p = $request->post('p')?$request->post('p'):1;
        $search = $request->post('search')?$request->post('search'):"";
        if($search==""){
            $where = 1;
        }else{
            $where = "u_time like '%$search%'";
        }
        $order = 'ulog_id asc';
        $data = $this->ajaxPage(
            'al_company
            inner join al_user_log on al_company.com_id=al_user_log.com_id
            inner join al_com_message on al_company.mes_id=al_com_message.mes_id'
            ,5,$p,$where,$order);
//        print_r($data);die;
        return $this->render('show_list.html',array('arr'=>$data));
    }
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
    	return $this->render('add.html');
    }
    //个人日志删除
    public function actionDelete(){
        //echo "11111";die; 
        $connection = \Yii::$app->db;
         $request = Yii::$app->request;
        $id = $request->post('ulog_id');
      //print_r($id);
  $re=$connection->createCommand()->delete('al_user_log', "ulog_id = $id")->execute();
        if($re){
            $content = '删除个人日志'.$id;
                $this->adminLog($content);
            $request = Yii::$app->request;
            $p = $request->post('p')?$request->post('p'):1;
            $where = 1;
            $order = 'ulog_id asc';
            $data = ControlController::ajaxPage('al_user_log
            inner join al_personal on al_user_log.per_id=al_personal.per_id',5,$p,$where,$order);
            return $this->render('show.html',array('arr'=>$data));
            //return $this->redirect('index.php?r=userlog/show');
        }else{
            echo 0;
        }
    }
    //企业日志删除
    public function actionDelete2(){
        //echo "11111";die; 
        $connection = \Yii::$app->db;
         $request = Yii::$app->request;
        $id = $request->post('ulog_id');
      //print_r($id);
  $re=$connection->createCommand()->delete('al_user_log', "ulog_id = $id")->execute();
        if($re){
                $content = '删除企业日志'.$id;
                $this->adminLog($content);

            $request = Yii::$app->request;
            $p = $request->post('p')?$request->post('p'):1;
            $where = 1;
            $order = 'ulog_id asc';
            $data = ControlController::ajaxPage('al_company
            inner join al_user_log on al_company.com_id=al_user_log.com_id
            inner join al_com_message on al_company.mes_id=al_com_message.mes_id',5,$p,$where,$order);
            return $this->render('show_list.html',array('arr'=>$data));
            //return $this->redirect('index.php?r=userlog/show');
        }else{
            echo 0;
        }
    }
}
