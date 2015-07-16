<?php
require 'vendor/autoload.php';
require 'ConnectionManager.php';
$app = new \Slim\Slim();
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['login_status'] = 'LOGIN_FAIL';
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
$app->post('/validateLoginData', function () use ( $app ) {
	$db = getDB();
	$user = json_decode($app->request->getBody(), true);
    $stt = "SELECT * FROM tblUser WHERE ";
    $stt = $stt." email = '".$user['email']."' ";
    $stt = $stt." AND passw = '".$user['password']."' ; ";
    $result = mysql_query($stt, $db);
    if ($result) {
        if($row = mysql_fetch_array($result)) {
            $auxId = strval($row['id']);
            $_SESSION['login_id'] = (string) $auxId;
            $_SESSION['login_status'] = 'LOGIN_SUCCESS';
            echo $auxId.' | '.$_SESSION['login_status'];
        } else{
            $_SESSION['login_id'] = '-1';
            $_SESSION['login_status'] = 'LOGIN_FAIL';
            echo 'FAIL';
        }
    }else{
        $_SESSION['login_id'] = '-1';
        $_SESSION['login_status'] = 'LOGIN_FAIL';
        echo 'FAIL';
    }
});
//------------------------------------------------------------------------
$app->post('/endSession', function () use ( $app ) {
    session_destroy();
    if(isset($_SESSION['login_id'])){
        unset($_SESSION['login_id']);
    }
    echo 'SESSION_DESTROYED';
});
//------------------------------------------------------------------------
$app->get('/getSessionStatus', function () use ( $app ) {
    echo $_SESSION['login_status'];
});
//------------------------------------------------------------------------
$app->get('/getSessionId', function () use ( $app ) {
    echo $_SESSION['login_id'];
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
$app->get('/getUserList', function () use ( $app ) {
	$db = getDB();
    $users = array();
    $stt = "SELECT * FROM tblUser ; ";
    $result = mysql_query($stt, $db);
    if($result) {
        while($row = mysql_fetch_array($result)) {
            $users[] = array(
                'id' => $row['id'],
                'email' => $row['email'],
                'contactName' => $row['contactName'],
                'zipCode' => $row['zipCode'],
                'state' => $row['state'],
                'city' => $row['city'],
                'address' => $row['address'],
                'phoneNumber' => $row['phoneNumber']
            );
        } 
    }else{
        echo 'FAIL';
    }
    $app->response()->header('Content_type', 'application/json');
    echo json_encode($users);
});
//------------------------------------------------------------------------
$app->get('/getUserById', function () use ( $app ) {
	$db = getDB();
	$user = json_decode($app->request->getBody(), true);
    $users = array();
    $stt = "SELECT * FROM tblUser WHERE id = ".$user['id']." ";
    $result = mysql_query($stt, $db);
    if($result) {
        while($row = mysql_fetch_array($result)) {
            $users[] = array(
                'id' => $row['id'],
                'email' => $row['email'],
                'contactName' => $row['contactName'],
                'zipCode' => $row['zipCode'],
                'state' => $row['state'],
                'city' => $row['city'],
                'address' => $row['address'],
                'phoneNumber' => $row['phoneNumber']
            );
        } 
    }else{
        echo 'FAIL';
    }
    $app->response()->header('Content_type', 'application/json');
    echo json_encode($users);
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------



$app->run();
?>