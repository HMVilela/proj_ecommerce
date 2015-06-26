<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->post('/', function() {
	echo "Welcome to User API";
});

$app->post('/validateLoginData', function () use ( $app ) {
	$db = getDB();
	$user = json_decode($app->request->getBody(), true);
    $stt = "SELECT * FROM tblUser WHERE ";
    $stt = $stt." email = '".$user['email']."' ";
    $stt = $stt." AND passw = '".$user['password']."' ; ";
    $result = mysql_query($stt, $db);
    if ($result) {
        if($row = mysql_fetch_array($result)) {
            echo 'SUCCESS';
        } else{
            echo 'FAIL';
        }
    }else{
        echo 'FAIL';
    }
});

function getConnection() {
	$dbhost = '127.0.0.1';
	$dbuser = 'root';
	$dbpass = 'mysql';
	$dbname = 'db_inatel_games';
    $db = mysql_connect($dbhost,$dbuser,$dbpass); 
    if(!$db){
        die("Database connection failed: " . mysql_error());
    }
    $db_select = mysql_select_db($dbname, $db);
    if (!$db_select) {
        die("Database selection failed: " . mysql_error());
    }
	return $db;
}

function getDB() {
	$pdo = getConnection();
    return $pdo;
}

$app->run();
?>