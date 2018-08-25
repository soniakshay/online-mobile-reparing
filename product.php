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
		
		if(f.comname.value=="select" || f.pname.value=="")
		{
			alert("Requred Product Name and Company Name");
			return false;
		}
		else
		{
			return true;
		}
	}
	function check2(f)
	{
		if(f.upname.value=="")
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
				$proid=$_GET['proid'];
				$qry4=mysql_query("delete from product where proid='$proid'");
				
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=product.php">';
				 
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
		<div id="techniheader">Product</div>
			<?php 
			if (@$_GET['res']=="update")
			{
			?>
					<form method="post" action="product.php">
					<br>
					<center><label for="comname">Company Name:</label>
					<select  name="comname" id="comname" style="width:200px;height:50px;font-size:20px;">
						<option  name="comname" id="comname" value="select">Select</option>
						<?php
							$comid=$_GET['comid'];
							$proid=$_GET['proid'];
							$qry1=mysql_query("select * from comname");
							$qry2=mysql_query("select * from product where proid='$proid'");
							$t1=mysql_fetch_array($qry2);
							while($t=mysql_fetch_array($qry1))
							{
													
							?>
								<option  name="comname" id="comname" value="<?php echo $t['comid'];?>" <?php if($t1['comid']==$t['comid']){ echo "selected";}?>><?php echo $t['comname'];?></option>
							<?php
							}
							?>					
					</select>
					<br><br>	


				
					<label for="pname">Product Name:</label>
					<input type="text"  id="pname" name="pname"  value="<?php echo $t1['proname'];?>"placeholder="Enter Product Name:" style="height:40px;width:200px;font-size:15px;" ><br>
					<input type="hidden"  id="proid" name="proid"  value="<?php echo $t1['proid'];?>"placeholder="Enter Product Name:" style="height:40px;width:200px;font-size:15px;" ><br>

					<input type="submit" name="submit" style="background:black;padding:10px;color:white;border:none;" value="Update"  onclick="return check(this.form)" >
					
					</form>
						<br><br>
						<?php
						}
						else
						{
						?>
					<center>
				
				<form method="post" action="product.php">
					<br>
					<label for="comname">Company Name:</label>
					<select  name="comname" id="comname" style="width:200px;height:50px;font-size:20px;">
						<option  name="comname" id="comname" value="select">Select</option>
							<?php
								$q=mysql_query("select * from comname");
								while($t=mysql_fetch_array($q))
								{
							?>
						<option  name="comname" id="comname" value="<?php echo $t['comid'] ?>"><?php echo $t['comname'] ?></option>
								<?php
								}
								?>
						
					</select>
					<br><br>	
					<label for="pname">Product Name:</label>
					<input type="text"  id="pname" name="pname" placeholder="Enter Product Name:" style="height:40px;width:200px;font-size:15px;" ><br><br><br><br>
					<input type="submit" name="submit" style="background:black;padding:10px;color:white;border:none;" value="Enter Product Name"  onclick="return check(this.form)" >
					<br><br>
					<?php
						if(@$_POST['submit'] && $_POST['submit']=="Enter Product Name") 
						{
							$comid=$_POST['comname'];
							$proname=$_POST['pname'];
							$qry=mysql_query("insert into product(`comid`,`proname`)values('$comid','$proname')");
									echo '<META HTTP-EQUIV="Refresh" Content="0; URL=product.php">';
		
																
						}

					?>
			
						
						
					<table cellspacing="0px">
						<th>Technision Name</th>
						<th>Edit</th>
						<th>Delete</th>
						<?php
								$qry2=mysql_query("select * from product");
								$co=mysql_num_rows($qry2);
								if($co>=1)
								{	
									while($t=mysql_fetch_array($qry2))
									{
							?>
										<tr>
											<td><?php echo $t['proname'];?></td>
											<td><a href="product.php?proid=<?php echo $t['proid']?>& res=update"><img src="image/edit.png" width="50px" height="50px"></a></td>
											<td><a href="product.php?proid=<?php echo $t['proid']?> & status=delete"><img src="image/delete.png" width="30px" height="30px" onclick="return confrom(this.form)"></a></td>
	
										</tr>
								<?php
									}
								?>
									<?php
									}
								?>
					</table>
					<br><br>
					<?php
						if(@$_POST['submit'] && $_POST['submit']=="Update") 
						{
							$comid=$_POST['comname'];
							$proname=$_POST['pname'];
							
							$proid=$_POST['proid'];
							$qry5=mysql_query("update product set proname='$proname',comid='$comid' where proid='$proid'");
									echo '<META HTTP-EQUIV="Refresh" Content="0; URL=product.php">';
		
							
																
						}

					?>		
				</form>
				<?php
				}
				?>
	</div>
	
</div>
					

</body>



</html>