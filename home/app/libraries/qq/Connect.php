<?php
namespace App\libraries\qq;
use App\libraries\qq\cla\QC;
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */
class Connect {
    public static function display() {
//        session_start();
        require_once(dirname(__FILE__) . "/comm/config.php");
        $qc = new QC();
        $qc->qq_login();
    }
    public function callback($code,$state){
        require_once(dirname(__FILE__) . "/comm/config.php");
        $qc = new QC();
        $qc->qq_callback($state,$code);
        return $qc->get_openid();
    }
}