<?php  
$servername="localhost";
$username="jackson";
$password="222010127";
$databasename="online_tutor_marketplace";
$connection=new mysqli($servername,$username,$password,$databasename);
if ($connection->connect_error) {
	die("connection failed.".$connection->connect_error);
}
?>