<?php 
define('ABSPATH',  dirname(__DIR__, 1));
require ABSPATH . "/includes.php";

$action = $_POST['act'];
/*****************************/
/*      ADMIN SIGNIN         */
/*****************************/

if ($action == 'signInAdmin') {
    ob_clean();

    $resultData = Admin::checkCredentials($_POST['username'], $_POST['password']);
    SessionWrite('useremail', $resultData[1]->username);
    SessionWrite('username', $resultData[1]->name);    
    SessionWrite('admin_id', $resultData[1]->id);
    SessionWrite('admin_role', $resultData[1]->role);
    echo $resultData[0];

    exit();
}
?>