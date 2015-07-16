<?php
require 'vendor/autoload.php';
require 'ConnectionManager.php';
$app = new \Slim\Slim();


//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
$app->post('/addToCart', function () use ( $app ) {
	$db = getDB();
	$user = json_decode($app->request->getBody(), true);
    $stt = "INSERT INTO tblCart(userIdFk, gameIdFk, ) ";
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
$app->get('/getCartByUserId', function () use ( $app ) {
	$db = getDB();
	$user = json_decode($app->request->getBody(), true);
    $cart = array();
    $stt = "SELECT tblCart.id, tblCart.transactionStatus, tblCart.transactionValue,  ";
    $stt = $stt." tblCart.gameIdFk, tblGame.name, tblGame.console, ";
    $stt = $stt." tblGame.photoLink ";
    $stt = $stt." FROM tblCart ";
    $stt = $stt." INNER JOIN tblGame ON tblGame.id = tblCart.gameIdFk ";
    $stt = $stt." WHERE tblCart.userIdFk = ".$user['id']." ; ";
    $result = mysql_query($stt, $db);
    if($result) {
        while($row = mysql_fetch_array($result)) {
            $cart[] = array(
                'id' => $row['id'],
                'transactionStatus' => $row['transactionStatus'],
                'transactionValue' => $row['transactionValue'],
                'gameIdFk' => $row['gameIdFk'],
                'name' => $row['name'],
                'console' => $row['console'],
                'photoLink' => $row['photoLink']
            );
        } 
    }else{
        echo 'FAIL';
    }
    $app->response()->header('Content_type', 'application/json');
    echo json_encode($cart);
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------



$app->run();
?>