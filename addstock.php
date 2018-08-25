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
	
	</script>
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
		<img src="image/logo2.gif" height="350px" width="350px" >
	</div>
	<br>
	<div id="techni" style="margin:150px 0px 0px 500px;overflow:scroll;height:500px;" >
			<div id="techniheader">AddStock</div>
					<?php
					if(@$_GET['res']=="update")
					{
					?>
					
					<form method="post" action="addstock.php">
					<center>
					<br>
					<label for="proname">Poduct:</label>
					<select id ="proname" name="proname" style="width:200px;height:50px;font-size:20px;margin-left:40px;">
						<option name="proname" value="select" >Select</option>
							
							<?php
							include("config/dbconfig.php");
							$stockid=$_GET['stockid'];
							$qry1=mysql_query("select * from product");
							$co=mysql_num_rows($qry1);
							$qry2=mysql_query("select * from stock where stockid='$stockid'");
							$t1=mysql_fetch_array($qry2);
							if($co>=1)
							{
								while($t=mysql_fetch_array($qry1))
								{
							?>
							<option name="proname" value="<?php echo $t['proid']; ?>"<?php if($t1['proid']==$t['proid']){ echo "selected";}?>><?php echo $t['proname']; ?></option>
								<?php
								}
								?>
							<?php
							}
							?>
							
							</select><br><br>
							<label for="stockname">Stock Name:</label>
					<select id ="stockname" name="stockname" style="width:200px;height:50px;font-size:20px;margin-left:7px;">
						<option name="stockname" value="select" >Select</option>
						<option name="stockname" value="lcd" <?php if($t1['stocknm']=="lcd"){echo "selected";}?> >Lcd</option>
						<option name="stockname" value="mic" <?php if($t1['stocknm']=="mic"){echo "selected";}?>>Mic</option>
						<option name="stockname" value="speaker"<?php if($t1['stocknm']=="speaker"){echo "selected";}?> >Speaker</option>
						<option name="stockname" value="motherbord" <?php if($t1['stocknm']=="motherbord"){echo "selected";}?> >Motherbord</option>
						<option name="stockname" value="touchpad" <?php if($t1['stocknm']=="touchpad"){echo "selected";}?> >Touchpad</option>
						<option name="stockname" value="ic" <?php if($t1['stocknm']=="ic"){echo "selected";}?> >Ic</option>
						<option name="stockname" value="connector" <?php if($t1['stocknm']=="connector"){echo "selected";}?> >Connector</option>
						
						
					</select><br><br>
							<label for="Qty">Qty:</label>
							<input type="text" min="1"  value="<?php echo $t1['qty'];?> " id="Qty" name="qty" placeholder="Enter Stock Qty:" style="height:40px;width:200px;margin-left:50px;font-size:15px;" ><br>
							<br>
							<label for="Date">Date:</label>
							<input type="text"  value="<?php echo $t1['date']; ?>" id="Date" name="date" style="height:40px;width:200px;margin-left:50px;font-size:15px;" ><br>
							<br><br>
							<input type="hidden"  value="<?php echo $t1['stockid']; ?>" id="stockid" name="stockid" style="height:40px;width:200px;margin-left:50px;font-size:15px;" ><br>
					
							<input type="submit" name="submit" style="background:black;padding:10px;color:white;border:none;" value="update">
							
							<br><br>
							
					</form>
						
					<?php
					}
					else
					{
					?>
					
					<form method="post" action="addstock.php">
					<center>
					<br>					
					<label for="proname">Poduct:</label>
					<select id ="proname" name="proname" style="width:200px;height:50px;font-size:20px;margin-left:40px;">
						<option name="proname" value="select" >Select</option>
							
							<?php
							include("config/dbconfig.php");
							$qry1=mysql_query("select * from product");
							$co=mysql_num_rows($qry1);
							if($co>=1)
							{
								while($t=mysql_fetch_array($qry1))
								{
							?>
							<option name="proname" value="<?php echo $t['proid']; ?>"><?php echo $t['proname']; ?></option>
								<?php
								}
								?>
							<?php
							}
							?>
							
							</select><br><br>
				<label for="stockname">Stock Name:</label>
					<select id ="stockname" name="stockname" style="width:200px;height:50px;font-size:20px;margin-left:7px;">
						<option name="stockname" value="select" >Select</option>
						<option name="stockname" value="lcd" >Lcd</option>
						<option name="stockname" value="mic" >Mic</option>
						<option name="stockname" value="speaker" >Speaker</option>
						<option name="stockname" value="motherbord" >Motherbord</option>
						<option name="stockname" value="touchpad" >Touchpad</option>
						<option name="stockname" value="ic" >Ic</option>
						<option name="stockname" value="connector" >Connector</option>
						
						
					</select><br><br>
		
				
		
							<label for="Qty">Qty:</label>
							<input type="number" min="1"  id="Qty" name="qty" placeholder="Enter Stock Qty:" style="height:40px;width:200px;margin-left:50px;font-size:15px;" ><br>
							<br>
							<label for="Date">Date:</label>
							<input type="Date"  value="<?php echo date("Y-m-d") ;?>"id="Date" name="date" style="height:40px;width:200px;margin-left:50px;font-size:15px;" ><br>
							<br><br>
							<input type="submit" name="submit" style="background:black;padding:10px;color:white;border:none;" value="AddStock">
							<br><br>
							<table cellspacing="0px">
								<tr>
									<th>Product name</th>
									<th>Stock name</th>
									<th>Qty</th>
									<th>Date</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
								<?php
								$qry3=mysql_query("select * from stock");
								
								while($t=mysql_fetch_array($qry3))
								{
								$qry4=mysql_query("select * from product");
								
								?>

								<tr>
									<td><?php
									while($t1=mysql_fetch_array($qry4))
									{
										if($t1['proid']==$t['proid'])
										{
											echo $t1['proname'];
										}
									}
									?></td>
									<td><?php echo $t['stocknm']; ?></td>
									<td><?php echo $t['qty']; ?></td>
									<td><?php echo $t['date']; ?></td>
									<td><a href="addstock.php?stockid=<?php echo $t['stockid']?>&res=update"><img src="image/edit.png" width="50px" height="50px"></a></td>
									<td><a href="addstock.php?stockid=<?php echo $t['stockid']?> & status=delete"><img src="image/delete.png" width="30px" height="30px" onclick="return confrom(this.form)"></a></td>
	
								</tr>
								<?php
								}
								?>	
													
								</table>
								<br><br><br>
							
							
					</form>
					<?php
					}
					?>
	</div>


</div>
					

</body>

<?php
if(@$_POST['submit'] && $_POST['submit']=="AddStock")
{
	$stockname=$_POST['stockname'];
	$proid=$_POST['proname'];
	$qty=$_POST['qty'];
	$date=$_POST['date'];
	$qry2=mysql_query("insert into stock(`proid`,`stocknm`,`qty`,`date`) values('$proid','$stockname','$qty','$date')");
	
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=addstock.php">'; 
	
}
if(@$_GET['status'] && $_GET['status']=="delete")
{
	$stockid=$_GET['stockid'];
	$qry4=mysql_query("delete from stock where stockid='$stockid'");
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=addstock.php">'; 

}	
if(@$_POST['submit'] && $_POST['submit']=="update")
{
		
	$proid=$_POST['proname'];
	$stockname=$_POST['stockname'];
	$qty=$_POST['qty'];
	$date=$_POST['date'];
	$stockid=$_POST['stockid'];
	$qry6=mysql_query("UPDATE stock SET proid='$proid',stocknm='$stockname',qty='$qty',date='$date' WHERE stockid ='$stockid'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=addstock.php">';
}
?>

</html>