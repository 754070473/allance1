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
use frontend\models\Commessage;


use frontend\models\UploadForm;
use yii\web\UploadedFile;


/**
 *CompanyController 企业信息
 */
class CommessageController extends Controller
{
     use ControlController;
    public $enableCsrfValidation=false;
	//public $layout='public';
    public $layout=false;
     /**
     * [actionAdd 企业信息添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
        $model = new Commessage();
        $request= Yii::$app->request;

        if (Yii::$app->request->isPost) {
            $m_logo = UploadedFile::getInstances($model, 'm_logo');
                // 文件上传成功
                if($m_logo && $model->validate())
                {
                     foreach ($m_logo as $file) 
                     {
                        $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
                        //图片路径
                        $m_logo = $file->baseName . '.' . $file->extension;
                    }
                }
                $m_welfare=$request->post('m_welfare');
                $m_welfare=implode(',',$m_welfare);
                //获取元素值
                $data['m_name']=$request->post('m_name');
                $data['m_logo']=$m_logo;
                $data['m_course']=$request->post('m_course');
                $data['m_welfare']=$m_welfare;
                $data['m_place']=$request->post('m_place');
                $data['point_x']=$request->post('point_x');
                $data['point_y']=$request->post('point_y');
                $data['pro_intro']=$request->post('pro_intro');
                $data['m_culture']=$request->post('m_culture');
                $data['m_qq']=$request->post('m_qq');
                $data['m_url']=$request->post('m_url');
                //开始入库
                $connection = \Yii::$app->db;
                $re = $connection->createCommand()->insert("al_com_message",$data)->execute();
                //判断是否添加成功
                if($re)
                {
                    return $this->redirect('?r=commessage/show');
                }else{
                    return $this->render('add.html');
                }
            
        }
        else
        {

            return $this->render('add.html',['model' => $model]);
        }
    }
    /**
     * [actionIndex 显示未审核企业信息]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $arr = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_com_message')
            ->where(['m_state' => 0])
            ->all();
        return $this->render('show.html',array('arr'=>$arr));
    }

    /**
     * [actionIndex 显示已审核企业信息]
     * @return [type] [description]
     */
    public function actionSel()
    {
        $arr = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_com_message')
            ->where(['m_state' => 1])
            ->all();
        return $this->render('show.html',array('arr'=>$arr));
    }
    /**
     * [actionUpdate 审核通过]
     * @return [type] [description]
     */
    public function actionUpdate()
    {
        $request= Yii::$app->request;
        $mes_id=$request->get('mes_id');
        $connection = \Yii::$app->db;
        $re = $connection->createCommand()->update('al_com_message', ['m_state' => 1], "mes_id = $mes_id")->execute();
        if($re)
        {
            return $this->redirect('?r=commessage/show');
        }
    }
    /**
     * [actionOneupdate 几点技改]
     * @return [type] [description]
     */
    public function actionOneupdate()
    {
        $request= Yii::$app->request;
        $mes_id=$request->post('mes_id');
        $ziduan=$request->post('ziduan');
        $value=$request->post('value');

        $connection = \Yii::$app->db;
        $res = $connection->createCommand()->update('al_com_message', ["$ziduan"=>$value], "mes_id=$mes_id")->execute();
        if($res){
            echo '1';
        }else{
            echo '2';
        }
    }
    /**
     * [actionDelete 审核不通过]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function actionDelete()
    {
        $request= Yii::$app->request;
        $mes_id=$request->get('mes_id');
        $connection = \Yii::$app->db;
        $re = $connection->createCommand()->update('al_com_message', ['m_state' => 2], "mes_id = $mes_id")->execute();
        if($re)
        {
            return $this->redirect('?r=commessage/show');
        }
    }


}
