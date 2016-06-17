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
 *CompanyController 企业账号
 */
class CompanyController extends Controller
{
    public $enableCsrfValidation=false;
	//public $layout='public';
    public $layout=false;
    /**
     * [actionAdd 设置顾问]
     * @return [type] [description]
     */
    public function actionAdd()
    {
        

        return $this->render('showadd.html');
    }
    /**
     * [actionIndex description]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $arr = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_company')
            ->innerJoin('al_com_message', 'al_company.mes_id = al_com_message.mes_id')
            ->all();
        
        $res = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_company')
            ->innerJoin('al_counselor', 'al_company.cou_id = al_counselor.cou_id')
            ->all();

        return $this->render('show.html',['arr'=>$arr,'res'=>$res]);
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
                $com_id=$request->post('com_id');
                $last_id=$request->post('last_id');
                $connection = \Yii::$app->db;
                $num=$connection->createCommand()->delete('al_company', "com_id in ($com_id)")->execute();
                  if($num)
                  {
                    // 此时删除成功,许查询出部分数据进行填补
                    $arr = (new \yii\db\Query())
                    ->select(['*'])
                    ->from('al_company')
                    ->where("com_id>$last_id")
                    ->limit($num)
                    ->all();
                    echo $json=json_encode($arr);die;
                  }else{
                    echo '0';
                  }
        }else{
            //单删
            $com_id=$request->get('com_id');
            $connection = \Yii::$app->db;
            $delete=$connection->createCommand()->delete('al_company', "com_id in ($com_id)")->execute();
            if($delete){
                return $this->redirect('?r=company/show');
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
                $com_id=$request->post('com_id');

                $data['c_pwd']=$request->post('c_pwd');
                //开始入库
                $connection = \Yii::$app->db;
                $re = $connection->createCommand()->update('al_company', $data, "com_id=$com_id")->execute();

                //判断是否添加成功
                if($re)
                {
                    return $this->redirect('index.php?r=company/show');
                }else{
                    return $this->render('update.html');
                }

        }else{
            $com_id=$request->get('com_id');
            $arr = (new \yii\db\Query())
                ->select(['*'])
                ->from('al_company')
                ->where("com_id=$com_id")
                ->one();

            return $this->render('update.html',['com_id' => $com_id,'arr'=>$arr]);
        }

    }
    /**
     * [actionPwdone 密码唯一]
     * @return [type] [description]
     */
    public function actionPwdone()
    {
        $request= Yii::$app->request;
        $c_pwd=$request->post('c_pwd');
        $com_id=$request->post('com_id');
        $arr = (new \yii\db\Query())
                ->select(['*'])
                ->from('al_company')
                ->where("com_id=$com_id and c_pwd=$c_pwd")
                ->all();
                //print_r($arr);
        if($arr){
            echo "1";die;
        }else{
            echo "0";die;
        }

    }


}
