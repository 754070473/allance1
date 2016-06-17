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
 *  CounselorController 顾问
 */
class CounselorController extends Controller
{
	//public $layout='public';
    public $layout=false;
    public $enableCsrfValidation=false;
    /**
     * [actionIndex 显示顾问列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        //设置顾问显示顾问列表
        $request=Yii::$app->request;
        $gu_id=$request->get('gu_id');
        $cou_id=$request->get('cou_id');
        //顾问查询
        $arr = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_counselor')
            ->all();

        echo $this->render('show.html',['cou_id'=>$cou_id,'gu_id'=>$gu_id,'arr'=>$arr]);
    }
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
       
        $request= Yii::$app->request;

        if (Yii::$app->request->isPost) {
            
                //获取元素值
                $data['c_name']=$request->post('c_name');
                $data['c_qq']=$request->post('c_qq');
                $data['c_addtime']=date('Y-m-d H:i:s',time());
                //开始入库
                $connection = \Yii::$app->db;
                $re = $connection->createCommand()->insert("al_counselor",$data)->execute();
                //判断是否添加成功
                if($re)
                {
                    return $this->redirect('?r=counselor/show');
                }else{
                    return $this->render('add.html');
                }
            
        }
        else
        {
            return $this->render('add.html');
        }
    }
    /**
     * [actionDelete 删除]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function actionDelete()
    {
       
        $request= Yii::$app->request;
        if(Yii::$app->request->isPost){
                //批量删除
                $cou_id=$request->post('cou_id');
                $last_id=$request->post('last_id');
                $connection = \Yii::$app->db;
                $num=$connection->createCommand()->delete('al_counselor', "cou_id in ($cou_id)")->execute();
                  if($num)
                  {
                    // 此时删除成功,许查询出部分数据进行填补
                    $arr = (new \yii\db\Query())
                    ->select(['*'])
                    ->from('al_counselor')
                    ->where("cou_id>$last_id")
                    ->limit($num)
                    ->all();
                    echo $json=json_encode($arr);die;
                  }else{
                    echo '0';
                  }
        }else{
            //单删
            $cou_id=$request->get('cou_id');
            $connection = \Yii::$app->db;
            $delete=$connection->createCommand()->delete('al_counselor', "cou_id in ($cou_id)")->execute();
            if($delete){
                return $this->redirect('?r=counselor/show');
            }
        }

    }
      /**
     * [actionUpdate 修改]
     * @return [type] [description]
     */
    public function actionUpdate()
    {
        $request= Yii::$app->request;
        if(Yii::$app->request->isPost){
                //获取元素值
                $cou_id=$request->post('cou_id');
                $data['c_name']=$request->post('c_name');
                $data['c_qq']=$request->post('c_qq');
                $data['c_addtime']=date('Y-m-d H:i:s',time());
                //开始入库
                $connection = \Yii::$app->db;
                $re = $connection->createCommand()->update('al_counselor', $data, "cou_id=$cou_id")->execute();
                //判断是否添加成功
                if($re)
                {
                    return $this->redirect('index.php?r=counselor/show');
                }else{
                    return $this->render('update.html');
                }
        }else{
            $cou_id=$request->get('cou_id');
            $arr = (new \yii\db\Query())
                ->select(['*'])
                ->from('al_counselor')
                ->where("cou_id=$cou_id")
                ->one();
            return $this->render('update.html',['arr'=>$arr]);
        }

    }
}
