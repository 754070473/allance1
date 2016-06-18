<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Keyword;

/**
 *  PostController 热词
 */
class KeywordController extends Controller
{
    use ControlController;
    public $layout=false;
    public $enableCsrfValidation=false;
    //渲染添加热词列表
    public function actionIndex()
    {
        $model = new Keyword();   //实例化model

        $request = Yii::$app->request;  //实例化请求处理
        $connection = \Yii::$app->db;   //实例化数据库操作
        if($request->isPost)
        {
            //接受数据
            $k_name=$request->post('k_name');
            $k_num=$request->post('k_num');
            //添加时间
            $k_addtime=date('Y-m-d H:i:s',time());

            //数据添加
            $model->k_name=$k_name;
            $model->k_num=$k_num;
            $model->k_addtime=$k_addtime;
            $re=$model->save();

            //判断
            if($re)
            {
                $id = $connection->getLastInsertID();
                $content = '添加热词'.$id.'-'.$k_name;
                $this->adminLog($content);
                return $this->redirect(array('keyword/show'));
            }
            else
            {
                exit('添加失败');
            }
        }
        else
        {
            //渲染页面
            return $this->render('index');  
        }   
    }

    //显示热词列表
    public function actionShow()
    {
        $model = new Keyword();   //实例化model
        //查询数据
        $models = Keyword::find()
                  ->all();
        //渲染页面
        return $this->render('show',['models'=>$models]);
    }  

    //删除
    public function actionDel()
    {
        $model = new Keyword();   //实例化model

        $request = Yii::$app->request;  //实例化请求处理
        $connection = \Yii::$app->db;   //实例化数据库操作
        //接受id
        $id=$request->get('id');

        $model = Keyword::findOne($id);
        $k_name = $model->k_name;
        $re=$model->delete();
        
        //判断
        if($re)
        {
            $content = '删除热词'.$id.'-'.$k_name;
            $this->adminLog($content);
            return $this->redirect(['keyword/show']);
        }
        else
        {
            exit('删除失败');
        }
    }

    //修改
    public function actionUpdate()
    {
        $model = new Keyword();   //实例化model

        $request = Yii::$app->request;  //实例化请求处理

        //接受id
        $id=$request->get('id');
        $arr=Keyword::findOne($id);
        
        //把值传到修改页面
        return $this->render('update',['arr'=>$arr]);
    }

    //修改new
    public function actionUpnew()
    {
        $model = new Keyword();   //实例化model

        $request = Yii::$app->request;  //实例化请求处理
        $connection = \Yii::$app->db;   //实例化数据库操作

        //接受收据
        $id=$request->post('id');
        $k_name=$request->post('k_name');
        $k_num=$request->post('k_num');
        //添加时间
        $k_addtime=date('Y-m-d H:i:s',time());
        
        $models = Keyword::findOne($id);
        $prev_k_name=$models->k_name;     //修改前名称
        $models->k_name=$k_name;
        $models->k_num=$k_num;
        $models->k_addtime=$k_addtime;
        $re=$models->save();
        
        //判断
        if($re)
        {
            $content = '修改热词'.$id.'-'.$prev_k_name.'=>'.$k_name;
            $this->adminLog($content);
            return $this->redirect(['keyword/show']);
        }
        else
        {
            exit('修改失败');
        }
    }

    //即点即改
    public function actionUpone()
    {
        $model = new Keyword();   //实例化model

        $request = Yii::$app->request;  //实例化请求处理
        $connection = \Yii::$app->db;   //实例化数据库操作
        //接受收据
        $id=$request->post('id');
        $k_num=$request->post('num');

        $models = Keyword::findOne($id);
        $prev_k_num=$models->k_num;    //修改前次数
        $models->k_num=$k_num;
        $re=$models->save();

        //判断
        if($re)
        {
            $content = '修改次数'.$id.'-'.$prev_k_num.'=>'.$k_num;
            $this->adminLog($content);
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
}
