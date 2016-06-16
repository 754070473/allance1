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

header("content-type:text/html;charset=utf-8");
/**
 *  IntegralController 积分管理
 */
class IntegralController extends Controller
{
    public $enableCsrfValidation = false;
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex 显示积分项列表]
     * @return [type] [description]
     */
    use ControlController;
    public function actionShow()
    {
        $request = Yii::$app->request;
        $p = $request->post('p')?$request->post('p'):1;
        $search = $request->post('search')?$request->post('search'):"";
        if($search==""){
            $where = 1;
        }else{
            $where = "i_name like '%$search%'";
        }
        $order = 'inte_id desc';
        $data = ControlController::ajaxPage('al_integral',5,$p,$where,$order);
//        print_r($data);die;
        return $this->render('show.html',array('arr'=>$data));
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
    public function actionDelet(){
        $request = Yii::$app->request;
        $id = $request->post('inte_id');
        $re = Integral::findOne($id)->delete();
        if($re){
            $request = Yii::$app->request;
            $p = $request->post('p')?$request->post('p'):1;
            $where = 1;
            $order = 'inte_id desc';
            $data = ControlController::ajaxPage('al_integral',5,$p,$where,$order);
            return $this->render('show.html',array('arr'=>$data));
        }else{
            echo 0;
        }
    }
    /**
     * 积分项提交入库
     */
    public function actionInfo(){
        //接收要添加的值
        $request = Yii::$app->request;
        $i_name = $request->post('i_name');
        $i_controller = $request->post('i_controller');
        $i_function = $request->post('i_function');
        $i_addtime = date('Y-m-d H:i:s',time());
        $i_num = $request->post('i_num');

        $integral = new Integral;
        $integral->i_name = $i_name;
        $integral->i_controller = $i_controller;
        $integral->i_function = $i_function;
        $integral->i_addtime = $i_addtime;
        $integral->i_num = $i_num;
        $re = $integral->insert();
        if($re){
            //添加成功  跳转列表页面
            return $this->redirect("index.php?r=integral/show");
        }else{
            echo "<script>alert('添加失败，请稍后再试！');window.history.go(-1)</script>";
        }
    }

    //即点即改
    public function actionUpd(){
        $request = Yii::$app->request;
        $id = $request->post('id');
        $name = $request->post('name');
        $value = $request->post('value');
        $integral = Integral::findOne($id);
        if($name == 'name'){
            $integral->i_name = $value;
        }elseif($name == 'con'){
            $integral->i_controller = $value;
        }elseif($name == 'fun'){
            $integral->i_function = $value;
        }elseif($name == 'num'){
            $integral->i_num = $value;
        }
        $re = $integral->update();
        if($re){
            echo date('Y-m-d H:i:s',time());
        }else{
            echo 0;
        }
    }

    public function actionTest(){
        $arr = ControlController::classify('al_privilege','p_pid');
        print_r($arr);
    }
}