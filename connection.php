<?php
$servername=".\MSSQLSERVER2017";
$username="dbadmin";
$password="Milkona@123";
$dbname="milkona_db";

$serverName = $servername;
$connectionInfo = array( "Database"=>"milkona_db", "UID"=>"dbadmin", "PWD"=>"Milkona@123");
$con = sqlsrv_connect( $serverName, $connectionInfo);

//$con=mysql_connect($servername,$username,$password,$dbname);

//if($con){
// echo "connected";
//}else{
//	echo "not connected";
//}










?>