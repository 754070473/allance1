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
use frontend\models\Post;
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
        $arr = $customer->show();
        //递归
        $digui = $customer->digui($arr);
        // print_r($digui);
        return $this->render('place_show.html',['arr'=>$digui]);
    }

    //即点即改
    public function actionDiangai()
    {
        $request = Yii::$app->request;
        $connection = Yii::$app->db;
        if($request->post('diangai')==0)
        {
            $pla_id = $request->post('pla_id');
            $i_name = $request->post('i_name');
            $command = $connection->createCommand("UPDATE al_place SET i_name='$i_name' WHERE pla_id=$pla_id");
            $res = $command->execute();
        }
        elseif($request->post('diangai')==1)
        {
            $major_id = $request->post('major_id');
            $m_name = $request->post('m_name');
            $command = $connection->createCommand("UPDATE al_major SET m_name='$m_name' WHERE major_id=$major_id");
            $res = $command->execute();
        }
         elseif($request->post('diangai')==2)
        {
            $post_id = $request->post('post_id');
            $i_name = $request->post('i_name');
            $command = $connection->createCommand("UPDATE al_post SET i_name='$i_name' WHERE post_id=$post_id");
            $res = $command->execute();
        }
        
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    //public $layout='public';
    /**
     * actiondel 删除
     * 
     */
    public function actionDel()
    {
        $request = Yii::$app->request;
        $id = $request->post('id');
        if($request->post('del')=='0')
        {
            $model = new Place();
            $connection = Yii::$app->db;
            // $res = $connection->createCommand("SELECT * FROM al_place WHERE p_pid=$id");
            $res = Place::find()
                ->where(['p_pid' => $id])
                ->all();
        }
        if($request->post('del')=='1')
        {
            $model = new Major();
            $connection = Yii::$app->db;
            // $res = $connection->createCommand("SELECT * FROM al_place WHERE p_pid=$id");
            $res = Major::find()
                ->where(['m_pid' => $id])
                ->all();
        }
        if($request->post('del')=='2')
        {
            $model = new Post();
            $connection = Yii::$app->db;
            // $res = $connection->createCommand("SELECT * FROM al_place WHERE p_pid=$id");
            $res = Post::find()
                ->where(['p_pid' => $id])
                ->all();
        }
        
        if($res)
        {
            echo '该地区下有分类不能删除';
        }
        else
        {
            if($request->post('del')=='0')
            {
                $customer = Place::findOne($id);
                $re = $customer->delete();
            }
            elseif($request->post('del')=='1')
            {
                 $customer = Major::findOne($id);
                 $re = $customer->delete();
            }
            elseif($request->post('del')=='2')
            {
                 $customer = Post::findOne($id);
                 $re = $customer->delete();
            }
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
        $arr = $this->classify('al_post','p_pid');
         return $this->render('post_show.html',['arr'=>$arr]);
    }
    //表单
    public function actionPostadd()
    {
        $arr = ControlController::classify('al_post','p_pid');
        return $this->render('post_add.html',['arr'=>$arr]);
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
             return $this->redirect(['category/postshow']);
        } 
        else
        {
             return $this->redirect(['category/postadd']);
        }
    }

}
