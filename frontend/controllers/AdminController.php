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
    public $layout = false;
    public $enableCsrfValidation = false;

    /**
     * [actionIndex 显示职位列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $rows = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_admin')
            ->all();


        return $this->render('zhang.html', ["arr" => $rows]);
    }

    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
        if (Yii::$app->request->isPost) {

            $request = Yii::$app->request;
            $name = $request->post('a_name');
            $pwd = $request->post('a_pwd');
            $pwd = md5($pwd);
            $re = rand(100000, 999999);
            $time = date("Y-m-d,h:i:s");
            $connection = \Yii::$app->db;
            $qq = $connection->createCommand()->insert('al_admin', [
                'a_account' => $re,
                'a_name' => $name,
                'a_pwd' => $pwd,
                'a_addtime' => $time,
            ])->execute();

            if ($qq) {
                return $this->render('show.html', ["arr" => $re]);
            } else {
                return $this->render('useradd.html');
            }


            //echo $name,$pwd,$re,$time;


        } else {
            return $this->render('useradd.html');
        }

    }
   //删除数据
    public function actionDel()
    {
        $request = Yii::$app->request;

        $id = $request->get('id');
        $connection = \Yii::$app->db;


       $re= $connection->createCommand()->delete('al_admin', "adm_id=$id")->execute();

           if($re){
               return $this->redirect(array("admin/show"));
           }else{
               echo "<script>alert('删除失败')</script>";
           }


    }
    //修改数据
    public function actionUpdate()
    {
        $request = Yii::$app->request;

        $id = $request->get('id');
        $rows = (new \yii\db\Query())
            ->from('al_admin')
            ->where(['adm_id' => $id])
            ->one();
    //print_r($rows);die;
        return $this->render('xiu.html',["app"=>$rows]);

    }
    public function actionXiu()
    {
        $request = Yii::$app->request;

        $id = $request->post('id');
        $name = $request->post('name');
        $pwd = $request->post('pwd');
        echo $id,$name,$pwd;die;
        $rows = (new \yii\db\Query())
            ->from('al_admin')
            ->where(['adm_id' => $id])
            ->one();
        //print_r($rows);die;
        return $this->render('xiu.html',["app"=>$rows]);

    }
}
