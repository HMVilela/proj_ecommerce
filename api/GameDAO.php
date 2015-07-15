<?php
require 'vendor/autoload.php';
require 'ConnectionManager.php';
$app = new \Slim\Slim();

//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
$app->get('/getGameList', function () use ( $app ) {
	$db = getDB();
    $games = array();
    $stt = "SELECT * FROM tblGame WHERE availability = 'AVAILABLE' ; ";
    $result = mysql_query($stt, $db);
    if($result) {
        while($row = mysql_fetch_array($result)) {
            $games[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'console' => $row['console'],
                'photoLink' => $row['photoLink'],
                'description' => $row['description'],
                'currentValue' => $row['currentValue'],
                'availability' => $row['availability'],
                'category' => $row['category']
            );
        } 
    }else{
        echo 'FAIL';
    }
    $app->response()->header('Content_type', 'application/json');
    echo json_encode($games);
});
//------------------------------------------------------------------------
$app->get('/getGameById', function () use ( $app ) {
	$db = getDB();
	$game = json_decode($app->request->getBody(), true);
    $games = array();
    $stt = "SELECT * FROM tblGame WHERE id = ".$game['id']." ";
    $result = mysql_query($stt, $db);
    if($result) {
        while($row = mysql_fetch_array($result)) {
            $games[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'console' => $row['console'],
                'photoLink' => $row['photoLink'],
                'description' => $row['description'],
                'currentValue' => $row['currentValue'],
                'availability' => $row['availability'],
                'category' => $row['category']
            );
        } 
    }else{
        echo 'FAIL';
    }
    $app->response()->header('Content_type', 'application/json');
    echo json_encode($games);
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------


$app->run();
?>