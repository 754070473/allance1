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
use yii\data\Pagination;


/**
 *CompanyController 招聘信息
 */
class RecruitController extends Controller
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
        $query = (new \yii\db\Query())
            ->select(["(al_post.i_name) as p_name ,(al_place.i_name) as pl_name ,(al_recruit.rec_id) as recr_id  , `r_pay`, `r_describe`, `r_suffer`, `r_edu`, `r_language`, `r_major`, `r_iflogbook`, `r_age`, `r_sex`, `r_name`, `r_time`, `r_addtime`, `r_gen`, `r_status`,`m_name`,`g_price`,`g_type_name`
        "]) 
            ->from('al_recruit')
            ->leftJoin('al_com_message', 'al_com_message.mes_id = al_recruit.mes_id')
            ->leftJoin('al_generalize', 'al_generalize.gen_id = al_recruit.gen_id')
            ->leftJoin('al_generalize_type', 'al_generalize_type.g_type_id = al_recruit.g_type_id')
            ->leftJoin('al_place', 'al_place.pla_id = al_recruit.pla_id')
            ->leftJoin('al_post', 'al_place.pla_id = al_recruit.pla_id');
            
                //print_r($query);die;

            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>'5']);

            $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
                //print_r($models);die;
            return $this->render('show.html', [
                 'arr' => $models,
                 'pages' => $pages,
            ]);

          
        //return $this->render('show.html',['arr'=>$arr]);
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
                $rec_id=$request->post('rec_id');
                $last_id=$request->post('last_id');
                $connection = \Yii::$app->db;
                $num=$connection->createCommand()->delete('al_recruit', "rec_id in ($rec_id)")->execute();
                  if($num)
                  {
                    // 此时删除成功,许查询出部分数据进行填补
                    $arr = (new \yii\db\Query())
                    ->select(["(al_post.i_name) as p_name ,(al_place.i_name) as pl_name ,(al_recruit.rec_id) as recr_id  , `r_pay`, `r_describe`, `r_suffer`, `r_edu`, `r_language`, `r_major`, `r_iflogbook`, `r_age`, `r_sex`, `r_name`, `r_time`, `r_addtime`, `r_gen`, `r_status`,`m_name`,`g_price`,`g_type_name`
                    "]) 
                    ->from('al_recruit')
                    ->leftJoin('al_com_message', 'al_com_message.mes_id = al_recruit.mes_id')
                    ->leftJoin('al_generalize', 'al_generalize.gen_id = al_recruit.gen_id')
                    ->leftJoin('al_generalize_type', 'al_generalize_type.g_type_id = al_recruit.g_type_id')
                    ->leftJoin('al_place', 'al_place.pla_id = al_recruit.pla_id')
                    ->leftJoin('al_post', 'al_place.pla_id = al_recruit.pla_id')
                    ->where("al_recruit.rec_id>$last_id")
                    ->limit($num)
                    ->all();
                    echo $json=json_encode($arr);die;
                  }else{
                    echo '0';
                  }
        }else{
            //单删
            $rec_id=$request->get('rec_id');
            $connection = \Yii::$app->db;
            $delete=$connection->createCommand()->delete('al_recruit', "rec_id in ($rec_id)")->execute();
            if($delete){
                return $this->redirect('?r=recruit/show');
            }
        }
    }
    /**
     * [actionOneupdate 几点技改]
     * @return [type] [description]
     */
    public function actionOneupdate()
    {
        $request= Yii::$app->request;
        $rec_id=$request->post('rec_id');
        $ziduan=$request->post('ziduan');
        $value=$request->post('value');

        $connection = \Yii::$app->db;
        $res = $connection->createCommand()->update('al_recruit', ["$ziduan"=>$value], "rec_id=$rec_id")->execute();
        if($res){
            echo '1';
        }else{
            echo '2';
        }
    }


}
