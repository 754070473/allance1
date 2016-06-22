<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
/**
 * Class ControlController 全局控制
 * @package frontend\controllers
 */
trait LogincontrolController {
    
    //添加日志
    public function adminLog($content){
        mysql_connect('127.0.0.1','root','147542')or die('连接失败');
        mysql_select_db('allance')or die('选择失败');
        mysql_query("SET NAMES `UTF8`");
        $adm_id = $_SESSION['adm_id'];
        $time = date('Y-m-d H:i:s',time());
		$this->adminLogintime($time,$adm_id);
        $sql = "insert into al_admin_log(adm_id,content,log_addtime) values('$adm_id','$content','$time')";
        mysql_query($sql);
    }
	
	//更新管理员登录时间
	public function adminLogintime($time,$adm_id){
		mysql_connect('127.0.0.1','root','147542')or die('连接失败');
        mysql_select_db('allance')or die('选择失败');
        mysql_query("SET NAMES `UTF8`");
		$sql = "update al_admin set a_lasttime='$time' where adm_id=$adm_id";
		mysql_query($sql);
	}
}