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
	<link rel="stylesheet" href="css/technision.css">
	<title>Rj comunication</title>

	
	<script>
	function confrom(f)
	{
	var ans=confirm("ARE YOU SURE TO DELETE!");
	if(ans)
	{
		return true;
	}
	else
	{
		return false;
	}
	}

	function check(f)
	{
		if(f.tname.value=="")
		{
			alert("Please  Enter Technision Name");
			return false;
		}
		else
		{
			return true;
		}
	}
	function check2(f)
	{
		if(f.utname.value=="")
		{
			alert("Please  Enter Technision Name");
			return false;
		}
		else
		{
			return true;
		}
	}
	
	</script>
</head>
<body>
<?php
		if(@$_GET['status'] && $_GET['status']=="delete")
			{
				$tid=$_GET['teid'];
				$qry4=mysql_query("delete from technision where techid='$tid'");
				
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=technision.php">';
				 
	}	
?>
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
		<img src="image/logo2.gif" height="350px" width="350px" >
	</div>
	<br>
	<div id="techni" style="margin:150px 0px 0px 500px;" >
		<div id="techniheader">Technision Detail
		</div>
			
			<?php 
			if (@$_GET['res']=="update")
			{
			?>
					<form method="post" action="technision.php" >
						<center><br><br><br>
						<input type="hidden"  value="<?php echo $_GET['techid'] ;?>" id="utid" name="utid" placeholder="Enter Technision Name:" style="height:40px;width:200px;font-size:15px;" autofocus>
						<br><label for="tname">Technision Name:</label> 
						<input type="text"  value="<?php echo $_GET['techname'] ;?>" id="utname" name="utname" placeholder="Enter Technision Name:" style="height:40px;width:200px;font-size:15px;" autofocus><br><br><br><br>
						<input type="submit" name="update" style="background:black;padding:10px;color:white;border:none;" value="update"  onclick="return check2(this.form)">
						<br><br>
				
						
					</form>
			<?php
			}
				else
			{ 
			?>
					<form method="post" action="technision.php" >
						<center><br><br><br>
						<label for="tname">Technision Name:</label> 
						<input type="text"  id="tname" name="tname" placeholder="Enter Technision Name:" style="height:40px;width:200px;font-size:15px;" autofocus><br><br><br><br>
						<input type="submit" name="submit" style="background:black;padding:10px;color:white;border:none;" value="Enter Technision Name"  onclick="return check(this.form)">
						<br><br>
						<?php
				
							if(@$_GET['res']=="enter")
							{
								echo "Sucessfuly Enter!";
							}
							if(@$_GET['res']=="nullval")
							{
								echo "Please Enter technision  name";
							}
						?>
			  
						<table cellspacing="0px">
							<th>Technision Name</th>
							<th>Edit</th>
							<th>Delete</th>
							<?php
								$qry2=mysql_query("select * from technision");
								$co=mysql_num_rows($qry2);
								if($co>=1)
								{	
									while($t=mysql_fetch_array($qry2))
									{
							?>
										<tr>
											<td><?php echo $t['tachname'];?></td>
											<td><a href="technision.php?techid=<?php echo $t['techid']?>& techname=<?php echo $t['tachname'];?> & res=update"><img src="image/edit.png" width="50px" height="50px"></a></td>
											<td><a href="technision.php?teid=<?php echo $t['techid']?> & status=delete"><img src="image/delete.png" width="30px" height="30px" onclick="return confrom(this.form)"></a></td>
	
										</tr>
								<?php
									}
								?>
								</table>
								<br><br>
								</form>

								<?php
								
								}
								?>
				
			<?php
			}
			?>
	</div>
	
</div>
<?php
	include('config/dbconfig.php');
	if(@$_POST['submit'] && $_POST['submit']=="Enter Technision Name")
	{
		
		$te=$_POST['tname'];
		if($te=="")
		{
		
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=technision.php?res=nullval">'; 	
		}
		else
		{
				$qry1 = mysql_query("insert into technision(`tachname`) values('$te')");
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=technision.php?res=enter">'; 	
		}
		
	}
	if(@$_POST['update'] && $_POST['update']=="update")
	{
		
		$tid=$_POST['utid'];
		$tname=$_POST['utname'];
			$qry3=mysql_query("update  technision set tachname='$tname' where techid='$tid'");
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=technision.php">'; 	
	
		
	}
?>

</body>


</html>