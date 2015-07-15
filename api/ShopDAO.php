<?php
require 'vendor/autoload.php';
require 'ConnectionManager.php';
$app = new \Slim\Slim();

//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
$app->get('/getShopByUserId', function () use ( $app ) {
	$db = getDB();
	$user = json_decode($app->request->getBody(), true);
    $shop = array();
    $stt = "SELECT tblShop.id, tblShop.transactionValue,  ";
    $stt = $stt." tblCart.gameIdFk, tblGame.name, tblGame.console, ";
    $stt = $stt." tblGame.photoLink, tblCart.transactionValue as gameValue ";
    $stt = $stt." FROM tblShop ";
    $stt = $stt." INNER JOIN tblShopCart ON tblShopCart.id = tblCart.shopIdFk ";
    $stt = $stt." INNER JOIN tblCart ON tblCart.id = tblShopCart.cartIdFk ";
    $stt = $stt." INNER JOIN tblGame ON tblGame.id = tblCart.gameIdFk ";
    $stt = $stt." WHERE tblShop.userIdFk = ".$user['id']." ; ";
    $result = mysql_query($stt, $db);
    if($result) {
        while($row = mysql_fetch_array($result)) {
            $shop[] = array(
                'id' => $row['id'],
                'transactionValue' => $row['transactionValue'],
                'gameIdFk' => $row['gameIdFk'],
                'name' => $row['name'],
                'console' => $row['console'],
                'photoLink' => $row['photoLink'],
                'gameValue' => $row['gameValue']
            );
        } 
    }else{
        echo 'FAIL';
    }
    $app->response()->header('Content_type', 'application/json');
    echo json_encode($shop);
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------



$app->run();
?>