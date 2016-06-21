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
 * GeneralizeController 企业推广
 */
class GeneralizeController extends Controller
{
    use ControlController;
    public $layout=false;
    public $enableCsrfValidation=false;
  
    //展示推广列表
    public function actionShow()
    {
        $connection = \Yii::$app->db;   //实例化数据库操作
        //查询数据（推广职位，所属公司，会员id，开始时间，到期时间）
        $rows = (new \yii\db\Query())
                ->from('al_generalize')                 //查询推广表  （推广信息）
                ->leftjoin('al_generalize_type','al_generalize.g_type_id=al_generalize_type.g_type_id')  //联查推广类型表  （推广类型）
                ->leftjoin('al_recruit','al_generalize.rec_id=al_recruit.rec_id')          //联查招聘信息表        （所属职位）
                ->leftjoin('al_com_message','al_recruit.mes_id=al_com_message.mes_id')     //联查企业信息表        （所属公司）
                ->all();
        //渲染页面
        return $this->render('show',['rows'=>$rows]);
    }

    //删除推广信息
    public function actionDel()
    {
        $request = Yii::$app->request;  //实例化请求处理
        $connection = \Yii::$app->db;   //实例化数据库操作

        //接受删除id
        $id=$request->get('id');

        //查询职位信息
        $rows = (new \yii\db\Query())
                ->from('al_generalize')                
                ->innerjoin('al_recruit','al_generalize.rec_id=al_recruit.rec_id') 
                ->where(['al_generalize.gen_id'=>"$id"])
                ->one();
        $r_name=$rows['r_name'];
        
        //删除数据
        $re=$connection->createCommand()->delete('al_generalize', "gen_id = $id")->execute();

        //判断
        if($re)
        {
             $content = '删除推广职位'.$id.'-'.$r_name;
             $this->adminLog($content);
             return $this->redirect(['generalize/show']);
        }
        else
        {
             exit('删除失败');
        }
    }

    //添加推广类型
    public function actionAddtype()
    {
        $request = Yii::$app->request;  //实例化请求处理
        $connection = \Yii::$app->db;   //实例化数据库操作
        if($request->isPost)
        {
            //接受数据
            $g_type_name=$request->post('g_type_name');
            $g_type_price=$request->post('g_type_price');
            //添加推广类型
            $re=$connection->createCommand()->insert('al_generalize_type', [
                              'g_type_name' => "$g_type_name",
                              'g_type_price' => "$g_type_price",
                             ])->execute();
            //判断
            if($re)
            {
                $id = $connection->getLastInsertID();
                $content = '添加推广类型'.$id.'-'.$g_type_name;
                $this->adminLog($content);
                return $this->redirect(['generalize/addtype']);
            }
            else
            { 
                exit('添加失败');
            }

        }
        else
        {
            //渲染推广类型添加页面
            return $this->render('addtype');
        }
        
    }
}
