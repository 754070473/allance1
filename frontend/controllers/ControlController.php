<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
/**
 * Class ControlController 全局控制
 * @package frontend\controllers
 */
trait ControlController {
     use ControlController;
    public function init(){
        session_start();
        //取出session
        if(empty($_SESSION['adm_id'])){
            $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $url = substr($url,0,strpos($url,'=')+1);
            $url = $url."login/login";
            //重定向浏览器
            header("Location: $url");
            //确保重定向后，后续代码不会被执行
            exit;
        }
    }
    //添加日志
    public function adminLog($content){
        mysql_connect('127.0.0.1','root','root')or die('连接失败');
        mysql_select_db('allance')or die('选择失败');
        $adm_id = $_SESSION['adm_id'];
        $time = date('Y-m-d H:i:s',time());
        $sql = "insert into al_admin_log(adm_id,content,log_addtime) values('$adm_id','$content','$time')";
        mysql_query($sql);
    }

    /**
     * ajax分页
     * @param $table        查询表名
     * @param $num          每页显示数量
     * @param $p            当前页码
     * @param $where        查询条件
     * @param $order        排序字段
     * @return mixed        返回    三维数组
     */
    public function ajaxPage($table,$num,$p,$where=1,$order=1){
        mysql_connect('127.0.0.1','root','root')or die('连接失败');
        mysql_select_db('allance')or die('选择失败');
        mysql_query("SET NAMES `UTF8`");
        //查询语句
        $re = mysql_query("select * from $table where $where");
        //计算查询数据条数
        $count = mysql_num_rows($re);
        if($count == 0){
            $data['arr'] = "";
            //搜索样式
            $sel='<div class="cfD" style="float: right;margin-top: 42px;">
                    <input class="addUser" type="text" id="search" value="" placeholder="请输入要搜索的内容" />
                    <input class="button" type="button" onclick="ck_page(1)"  value="搜索"/>
                </div>';
            $str = '';
            $str.="<div class='pagin'><div class='message'>共<i class='blue'>$count</i>条记录<ul class='paginList'></div>";
            $data['page'] = $str;
            $data['sel'] = $sel;
            return $data;
        }else{
            //计算总页数
            $page=ceil($count/$num);
            //计算偏移量
            $n=($p-1)*$num;
            //查询所要数据
            $re = mysql_query("select * from $table where $where order by $order limit $n,$num");
            while($arr = mysql_fetch_assoc($re)){
                $new_arr[] = $arr;
            }
            $data['arr']=$new_arr;
            //上一页
            $last=($p-1)<1?1:$p-1;
            //下一页
            $next=($p+1)>$page?$page:$p+1;
            //搜索样式
            $sel='<div class="cfD" style="float: right;margin-top: 42px;">
                    <input class="addUser" type="text" id="search" value="" placeholder="请输入要搜索的内容" />
                    <input class="button" type="button" onclick="ck_page(1)"  value="搜索"/>
                </div>';
            //分页样式
            $str='<link rel="stylesheet" type="text/css" href="css/page/page.css"/>
            <script src="js/page/page.js"></script>
            ';
            $str.="<div class='pagin'><div class='message'>共<i class='blue'>$count</i>条记录，当前显示第<i class='blue'>$p</i>页</div><ul class='paginList'><li class='paginItem'><a href='javascript:;' onclick='ck_page(1)'><span class='pagepre'><<</span></a></li>";
            for($i=1;$i<=$page;$i++){
                if($i==$p){
                    $str.="<li class='paginItem current'><a href='javascript:;' onclick='ck_page($i)'>$i</a></li>";
                }else{
                    if($i<$p-4){
                        $str.="<li class='paginItem more'><a href='javascript:;'>...</a></li>";
                        $i=$p-5;
                    }elseif($i>$p+4){
                        $str.="<li class='paginItem more'><a href='javascript:;'>...</a></li>";
                        $i=$i+3;
                    }else{
                        $str.="<li class='paginItem'><a href='javascript:;' onclick='ck_page($i)'>$i</a></li>";
                    }
                }
            }
            $str.="<li class='paginItem'><a href='javascript:;' onclick='ck_page($page)'><span class='pagenxt'>>></span></a></li></ul></div>";
            $data['page']=$str;
            $data['sel']=$sel;
            $data['pageNum']=$page;
            $data['count']=$count;
            $data['p']=$p;
            return $data;
        }

    }

    /**
     * 无限极分类数组处理
     * @param $table  表名
     * @param $pid_name pid字段名
     * @param int $pid
     * @return array
     */
    public function classify($table,$pid_name,$pid=0){
        mysql_connect('127.0.0.1','root','root')or die('连接失败');
        mysql_select_db('allance')or die('选择失败');
        mysql_query("SET NAMES `UTF8`");
        //查询表中根分类
        $sql = "select * from $table where $pid_name=$pid";
        $re = mysql_query($sql);
        $num=mysql_num_rows($re);
        $rescolumns = mysql_query("SHOW FULL COLUMNS FROM ".$table) ;
        while($row = mysql_fetch_array($rescolumns)){
            $data[] = $row['Field'];
        }
        $k = $data[0];
        if($num>0){
            while($new_arr = mysql_fetch_assoc($re)){
                $arr[] = $new_arr;
            }
        }else{
            $arr = array();
        }
        //查询子分类
//        return $arr;die;
        foreach($arr as $key=>$val){
            $arr[$key]['son']=$this->classify($table,$pid_name,$pid=$val[$k]);
        }
        return $arr;
    }
    /*public function integral(){
        $url = $_SERVER['REQUEST_URI'];
        $url = substr($url,strpos($url,'=')+1);
        $controller = substr($url,0,strpos($url,'/'));
        $function = substr($url,strpos($url,'/')+1);
        mysql_connect('127.0.0.1','root','root')or die('连接失败');
        mysql_select_db('allance')or die('选择失败');
        $sql = "select i_num from al_integral where i_controller='$controller' and i_function='$function'";
        $re = mysql_query($sql);
        if($arr = mysql_fetch_assoc($re)){

        }
    }*/
}