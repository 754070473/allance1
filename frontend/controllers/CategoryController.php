<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Place;
use frontend\models\Major;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;




/**
 *  CategoryController 分类管理
 */
class CategoryController extends Controller
{
    //应用trait
    use ControlController;
    public $layout=false;   //去除样式
    public $enableCsrfValidation=false;  //增删改查 传数据用的

	//public $layout='public';
    /**
     * actionShow 显示列表
     * 
     */
    public function actionShow()
    {
        $customer = new Place();
        //当前页
        // $request = Yii::$app->request;
        // $p = $request->get('p') ? $request->get('p') : 1;
        // // $p=1;
        // //每页显示的条数
        // $num=5;
        // //偏移量
        // $limit = ($p-1)*$num;
        // //上一页
        // $up = $p-1;
        // //下一页
        // $down = $p+1;
        $arr = $customer->show();
        //递归
        $digui = $customer->digui($arr);
        // print_r($digui);
        return $this->render('place_show.html',['arr'=>$digui]);
    }
    //public $layout='public';
    /**
     * actiondel 删除
     * 
     */
    public function actionDel()
    {
        $model = new Place();
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->post('id');
        // $res = $connection->createCommand("SELECT * FROM al_place WHERE p_pid=$id");
        $res = Place::find()
            ->where(['p_pid' => $id])
            ->all();
        if($res)
        {
            echo '该地区下有(市/区)不能删除';
        }
        else
        {
            $customer = Place::findOne($id);
            $re = $customer->delete();
            if($re)
            {
                echo 1;
            }
            else
            {
                echo '删除失败';
            }
        }
    }
    /**
     * [actionAdd 添加表单]
     * @return [type] [description]
     */
    public function actionAdd()
    {
        //实例化model层
        $customer = new Place();
        $arr = $customer->show();
        $digui = $customer->digui($arr);
        foreach($digui as $k=>$v)
        {
            if($v['level']>1)
            {
                unset($digui[$k]);
            }
        }
    	return $this->render('place_add.html',['arr'=>$digui]);
    }
    /**
     * [actionInsert 添加入库]
     * @return [type] [description]
     */
    public function actionInsert()
    {
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $i_name = $request->post('i_name');
        $p_pid = $request->post('p_pid');
        $time = date('y-m-d h:i:s',time());
        // echo $p_pid;
        $command = $connection->createCommand("INSERT INTO al_place(i_name,p_pid,i_addtime) values('$i_name','$p_pid','$time')");
        $res = $command->execute();
        if($res)
        {
             return $this->redirect(['category/show']);
        }
         
    }
    /**
     * 专业分类
     * 
     */
    //列表
    public function actionMajorshow()
    {
        $major = new Major();
        $arr = $major->majorshow();
        //递归
        $data = $major->digui($arr);
        // print_r($data);
         return $this->render('major_show.html',['arr'=>$data]);
    }

    //专业表单
    public function actionMajoradd()
    {
        $major = new Major();
        $arr = $major->majorshow();
        //递归
        $data = $major->digui($arr);
        foreach($data as $k=>$v)
        {
            if($v['level']>0)
            {
                unset($data[$k]);
            }
        }
        return $this->render('major_add.html',['arr'=>$data]);
    }
    //接收表单数据入库
    public function actionMajorinsert()
    {
        $major = new Major();
        $request = Yii::$app->request;
        $m_name = $request->post('m_name');
        $m_pid = $request->post('m_pid');
        $major->m_name = $m_name;
        $major->m_pid = $m_pid;
        $major->m_addtime = date('Y-m-d h:i:s',time());
        $res = $major->save(); 
        if($res)
        {
            return $this->redirect(['category/majorshow']);
        }
        else
        {
            return $this->redirect(['category/majoradd']);
        }

    }

    /**
     * 专业分类
     * 
     */
    //列表
    public function actionPostshow()
    {
        $arr = ControlController::classify('al_post','p_pid');
        print_r($arr);die;
         return $this->render('post_show.html');
    }
    //表单
    public function actionPostadd()
    {
        return $this->render('post_add.html');
    }
    //接收表单数据入库
    public function actionPostinsert()
    {
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $i_name = $request->post('i_name'); 
        $p_pid = $request->post('p_pid');
        $p_time = date('Y-m-d H:i:s',time());
        $command = $connection->createCommand("INSERT INTO al_post(i_name,p_pid,p_time) values('$i_name','$p_pid','$p_time')");
        $res = $command->execute();
        if($res)
        {
            echo 1;
        } 
        else
        {
            echo 0;
        }
    }

}
