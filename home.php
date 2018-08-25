<?php
session_start();

include('config/dbconfig.php');
if($_SESSION['uname']=="")
{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
		exit;
}
?>
<html>
<head>
<link rel="icon" href="image/logo.gif">
<link rel="stylesheet" href="css/allpage.css">
<title>Rj comunication</title>
<script src="jquery-2.1.1.min.js">
</script>
<script>

$(document).ready(function(){
  $("#mainf").click(function(){
    $(".submainf").slideToggle("slow");
	$(".submains").slideUp("slow");
  });
});
$(document).ready(function(){
  $("#mains").click(function(){
    $(".submains").slideToggle("slow");
  $(".submainf").slideUp("slow");
  });
});
</script>
<style>
.submainf,.submains
{
display:none;
}
.btn{
background:black;
color:white;;
padding:10px;
border:none;
width:180px;
height:70px;
}



</style>

</head>
<body>
<div id="main">
	<div id="header">
		<form method="post" action="logout.php">
		
			<input type="submit" id="signout" name="signout" value="signout" style="margin-left:1250px;padding:5px;background:black;border:2px solid;border-color:white;color:white;">
		</form>
		<div id="menu" style="margin:20px 0px 0px 500px;">

			<a href="home.php"><li id="home" class="menu" >Home</li></a>
			<a href="technision.php"><li id="tech" class="menu">Technision</li></a>
			<a href="company.php"><li id="com" class="menu">Company</li></a>
			<a href="product.php"><li id="product" class="menu">Product</li></a>
			<a href="addstock.php"><li id="addstock" class="menu">AddStock</li></a>
			<a href="ragister.php"><li id="repragister" class="menu">Reparing Ragistar</li></a>
	

		</div>
			</div>
	<div id="imag" style="float:left;">	<img src="image/logo2.gif" height="350px" width="350px" style="margin:100px 0px 0px 0px">
	</div>
	
		<div id="Ragiste" style="float:left;width:700px;height:200px;box-shadow:0px 0px 30px 10px;margin-top:200px;margin-left:100px;">
		
		<h1 id="heade" style="background:black;color:white;text-align:center;width:700px;height:40px;padding:0px;margin:0px;">Ragistar</h1>
		<div id="buttnsgrp" style="margin-top:20px;margin-left:10px;">
			<div id="first" style="float:left;">
				<ul>
					<li class="mainf" id="mainf" type="none"><button class="btn">Pandding</button></li>
					<a href="pview.php"><li class="submainf" id="complete" type="none"><button class="btn">View All</button></li></a>
					<li class="submainf" id="totalcol"type="none"><button class="btn">Date Wise</button></li>
				</ul>
			</div>
			<div id="second" style="float:left;"> 
				<ul>
					<li class="mains" id="mains" type="none"><button class="btn">Completed</button></li>
					<li class="submains" id="complete" type="none"><button class="btn">View All</button></li>
					<li class="submains" id="totalcol"type="none"><button class="btn">Date Wise</button></li>
				</ul>
			</div>
			<div id="third" style="float:left;"> 
				<ul>
					<li class="li1" id="padding" type="none"><button class="btn">Total Collection</button></li>
				</ul>
			</div>
		</div>
			
			
	</div>
	
</div>
</body>
</html>