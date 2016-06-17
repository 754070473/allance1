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
   use ControlController;
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
            ->from('al_company')
            ->innerJoin('al_com_message', 'al_company.mes_id = al_com_message.mes_id')
            ->all();

        return $this->render('show.html',array('arr'=>$arr));
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
                $mes_id=$request->post('mes_id');
                $last_id=$request->post('last_id');
                $connection = \Yii::$app->db;
                $num=$connection->createCommand()->delete('al_com_message', "mes_id in ($mes_id)")->execute();
                  if($num)
                  {
                    // 此时删除成功,许查询出部分数据进行填补
                    $arr = (new \yii\db\Query())
                    ->select(['*'])
                    ->from('al_com_message')
                    ->where("mes_id>$last_id")
                    ->limit($num)
                    ->all();
                    echo $json=json_encode($arr);die;
                  }else{
                    echo '0';
                  }
        }else{
            //单删
            $mes_id=$request->get('mes_id');
            $connection = \Yii::$app->db;
            $delete=$connection->createCommand()->delete('al_com_message', "mes_id in ($mes_id)")->execute();
            if($delete){
                return $this->redirect('?r=commessage/show');
            }
        }

    }
}
