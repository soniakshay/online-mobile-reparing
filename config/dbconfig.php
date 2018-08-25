<?php 
$username="root";
$password="";
$hostname="localhost";
$dbconfig=mysql_connect($hostname,$username,$password)or die (" Datbase connection failed");
$selectdb=mysql_select_db("project",$dbconfig);
?>