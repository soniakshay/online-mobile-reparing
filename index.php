<?php
session_start();
error_reporting(0);
include('config/dbconfig.php');
if($_SESSION['uname']!="")
{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.php">'; 
		exit;
		

}
?>

<html>
<head>
<link rel="icon" href="image/logo.gif">
<link rel="stylesheet" href="css/login.css">
<script src="jquery-2.1.1.min.js">
</script>
<script>

$(document).ready(function(){
  $("#image").hover(function(){
    $("#image").css({"transform":"rotate(360deg)","transition":"2s"});
  });
});
$(document).ready(function(){
  $("#image").mouseleave(function(){
    $("#image").css({"transform":"rotate(0deg)","transition":"2	s"});
  });
});
</script>
<script>
function check(f)
{	
	if(f.uname.value=="" || f.pwd.value=="")
	{
		alert("Plese enter username & password");
		return false;
		
	 }
	 else
	 {
	 return true;
	 }
}
		
</script>
<style>

</style>
</head>
<body>
<div id="main" >
		<div id="header" >
		</div>
		<div id="logo">
			<img src="image/logo.gif" height="500px" width="500px" id="image">
		</div>
		<div id="lform" >
			<div id="header" >Login</div>
				<div id="from" >
				<form method="post" action="verify.php">
					<label for="uname">UserName:</label> 
						<input type="text"  id="uname" name="uname"placeholder="Enter UserName" style="height:40px;width:200px;font-size:20px;" autofocus><br><br>
					<label for="pwd">Password:</label>
						<input type="password" id ="pwd" name="pwd" placeholder="Enter Password" style="height:40px;width:200px;font-size:20px;margin-left:6px;">
						<br><br>
					<center><input type="submit" style="background:black;padding:10px;color:white;" value="Login"  onclick="return check(this.form)">
					<?php
					
						if (@$_GET['res']=="nullval")
						{
							echo '<h6 style="color:red;">UserName and Password are Requrid</h6>';
						}
						if (@$_GET['res']=="chk")
						{
							echo '<h6 style="color:red;">UserName and Password are not match</h6>';
						}
					?>
				</form>
			</div>
		</div>
				
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>