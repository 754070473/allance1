<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Navigation;
use yii\data\Pagination;

/**
*  Navigation  导航  
*/
class NavigationController extends \yii\web\Controller
{
	public $layout=false;
	public $enableCsrfValidation=false;
    public function actionIndex()
    {
    	$model = new Navigation();   //实例化model

        $request = Yii::$app->request;  //实例化请求处理
        if($request->isPost)
        {
            //接受数据
            $n_name=$request->post('n_name');
            $n_url=$request->post('n_url');
            $n_type=$request->post('n_type');
            //添加时间
            $n_addtime=date('Y-m-d H:i:s',time());

            //数据添加
            $model->n_name=$n_name;
            $model->n_url=$n_url;
            $model->n_type=$n_type;
            $model->n_addtime=$n_addtime;
            $re=$model->save();

            //判断
            if($re)
            {
                return $this->redirect(array('navigation/show'));
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
  
    //显示列表
    public function actionShow()
    {
        $model = new Navigation();   //实例化model
        //查询数据
        $models = Navigation::find()
                  ->all();
        //渲染页面
        return $this->render('show',['models'=>$models]);
    }  
}
