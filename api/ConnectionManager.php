<?php
//------------------------------------------------------------------------
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
//------------------------------------------------------------------------
function getDB() {
	$pdo = getConnection();
    return $pdo;
}
?>