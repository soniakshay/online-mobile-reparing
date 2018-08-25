<?php
session_start();
include('config/dbconfig.php');
	
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
 
if($uname=="" || $pwd=="")
{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?res=nullval">'; 
		exit; 	

 }
 else
 {
	$qry=mysql_query("select * from login where uname='$uname' and pwd='$pwd'");
	$t=mysql_fetch_array($qry);
	if($t!=null)
	{
		
			$_SESSION['uname']=$t['uname'];
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.php">'; 
			exit;
	}
	else
	{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?res=chk">'; 
		exit; 	
	}
	
 }
 
 
?>