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
    public $enableCsrfValidation=false;
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex description]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $arr = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_com_message')
            ->all();
            
        return $this->render('show.html',array('arr'=>$arr));
    }
    /**
     * [actionAdd 企业信息添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
        $model = new Commessage();

        if (Yii::$app->request->isPost) {
            //$photo_url = UploadedFile::getInstances($model,'photo_url');
            $m_logo = UploadedFile::getInstances($model, 'm_logo');
            //print_r($m_logo);
            //var_dump($model->upload());die;
            // if ($model->upload()) {

                // 文件上传成功
                //return;
                if($m_logo && $model->validate())
                {
                     foreach ($m_logo as $file) {
                        $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
                        //图片路径
                        $m_logo = $file->baseName . '.' . $file->extension;
                        print_r($m_logo);
                           
                    }
                           
                    
                    
                }
            // }
        }

        return $this->render('add.html',['model' => $model]);


       /* $model = new UploadForm();

        $request = Yii::$app->request;
        if ($request->isPost) {

            $model->imageFile = UploadedFile::getInstance($model, 'm_logo');
            if ($model->upload()) {
                //echo "上传成功";
                // 文件上传成功
                return;
            }
            
            //return $this->render('upload', ['model' => $model]);


           print_r($request->post());
           echo "<pre>";
           print_r($model);
           echo "<pre>";

        } else {
           return $this->render('add.html',['model' => $model]);
        }*/
        
        
    }

    public function actionForm()
    {
        $model=new Photo();
        $request= Yii::$app->request;
        if($request->isPost)
        {
                    
            

            
          
                                
                //接受图片的信息
                $photo_title=$request->post('photo_title');
                $is_display=$request->post('is_display');
                $is_lunbo=$request->post('is_lunbo');
                //图片上传
                $photo_url = UploadedFile::getInstances($model,'photo_url');
//                          var_dump($photo_url);die;
                if($photo_url && $model->validate())
                {
                    foreach ($photo_url as $file) {
                        $file->saveAs('img/' . $file->baseName . '.' . $file->extension);
                        //图片路径
                        $photo_urls = $file->baseName . '.' . $file->extension;
                         
                        $photo_url = "http://www.selfyii2.com/img/".$photo_urls;
                        
                        //图片表入库
                        $photoSql = $connection->createCommand()->insert('photo',
                                ['house_id'=>$house_id,
                                'photo_url'=>$photo_url,
                                'photo_title'=>$photo_title,
                                'is_display'=>$is_display,
                                'is_lunbo'=>$is_lunbo])->execute();         
                    }
                    
                }

                    
                if($photoSql)
                {
                    //展示列表
                    $this->redirect('index.php?r=house/show');
                }
                else 
                {
                    exit('添加失败');
                }
                
          
            
        }
        else
        {
            //获取房屋类型
            $arr=(new \yii\db\Query())
                 ->from('class')
                 ->all();
            return $this->render('house_add',['model'=>$model,'arr'=>$arr]);
        }
    }
}
