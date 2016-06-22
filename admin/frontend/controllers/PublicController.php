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
 * Site controller
 */
class PublicController extends Controller
{
	 use ControlController;
	//public $layout='public';
    public $layout=false;
    public $enableCsrfValidation=false;
	/**
     * [actionLeft 主界面]
     * @return [type] [description]
     */
    public function actionMain()
    {
		$connection = \Yii::$app->db;

	//收入
		//获取本月一号的日期
		$firstday = date("Y-m-01",strtotime(date('Y-m-d',time())));
		$firsttime = $firstday." 00:00:00";
		//获取本月收入
		$command = $connection->createCommand('SELECT i_money FROM al_indent where i_status=1 and i_time > '."'$firsttime'");
		$i_money = $command->queryColumn();
		$i_money = array_sum($i_money);
		//获取总收入
		$command = $connection->createCommand('SELECT i_money FROM al_indent where i_status=1');
		$sum_money = $command->queryColumn();
		$sum_money = array_sum($sum_money);
		//计算百分比
		$money = round($i_money/$sum_money,2)*100;
		$income = array('num'=>$i_money,'sum'=>$sum_money,'percent'=>$money);
	//订单
		//获取今年一月一号的日期
		$firstday = date("Y-01-01",strtotime(date('Y-m-d',time())));
		$firsttime = $firstday." 00:00:00";
		//查询今年已付款的订单数
		$command = $connection->createCommand('SELECT COUNT(*) FROM al_indent where i_status=1 and i_time > '."'$firsttime'");
		$this_count = $command->queryScalar();
		//查询已付款的订单总数
		$command = $connection->createCommand('SELECT COUNT(*) FROM al_indent where i_status=1');
		$sum_count = $command->queryScalar();
		//计算订单数量百分比
		$count_percent = round($this_count/$sum_count,2)*100;
		//查询新订单数
		$command = $connection->createCommand('SELECT COUNT(*) FROM al_indent where i_status=1 and i_check=0');
		$new_count = $command->queryScalar();
		$indent = array('num'=>$this_count,'new_ind'=>$new_count,'percent'=>$count_percent);

	//访客
		//获取今天访客总数
		$date = date('Y-m-d',time());
		$command = $connection->createCommand('SELECT COUNT(*) FROM al_ip where ip_time='."'$date'");
		$today_vistor = $command->queryScalar(); 
		
		//获取总访客数
		$command = $connection->createCommand('SELECT COUNT(*) FROM al_ip');
		$sum_vistor = $command->queryScalar(); 
		if($sum_vistor == 0)
		{
			$vistor_percent = 0;
		}else{
			//今天访客占总访客数量的百分比
			$vistor_percent = round($this_count/$sum_count,2)*100;
		}
		$vistor = array('today_vistor'=>$today_vistor,'sum_vistor'=>$sum_vistor,'vistor_percent'=>$vistor_percent);
	//当前进行订单
		$time = date('Y-m-d H:i:s',time());
		$rows = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_indent')
            ->innerJoin('al_recruit', 'al_indent.rec_id=al_recruit.rec_id ')
            ->innerJoin('al_post', 'al_recruit.post_id=al_post.post_id')
            ->innerJoin('al_com_message', 'al_post.mes_id=al_com_message.mes_id')
			->where('i_status = 1 and i_endtime > '."'$time'")
			->orderBy('ind_id desc')
            ->all();
        return $this->render('main.html',array('rows'=>$rows,'income'=>$income,'indent'=>$indent,'vistor'=>$vistor));
    }
    /**
     * [actionIndex 头部]
     * @return [type] [description]
     */
    public function actionTop()
    {
        return $this->render('top.html');
    }
   
    /**
     * [actionLeft 左侧菜单栏]
     * @return [type] [description]
     */
    public function actionLeft()
    {
       return $this->render('left.html');
    }
}
