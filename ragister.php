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
		if(f.cname.value=="" || f.email.value=="" || f.pno.value=="" || f.addr.value=="")
		{
			alert("All Customer Field Are Required!");
			return false;
		}
		else
		{
			return true;
		}
		if(f.stocknm1.value!="" && f.qty1.value=="")
		{
		  alert("Please Enter Qty!");
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

<div id="main">
	<div id="header" >
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
	<br>
	
<?php
if(@$_GET['res']=="update")
{
	$rid=$_GET['rid'];
	$qry8=mysql_query("select * from ragister where rid='$rid'");
	$l=mysql_fetch_array($qry8);
	
?>
			<div id="techni" style="margin:120px 0px 0px 80px;width:1200px;" >
			<div id="techniheader">Reparing Ragister Detail</div>
			<br>
			<div id="form"style="height:500px;overflow:scroll;"  >
					<form method="post" action="ragister.php">
						<br><div id="company" style="float:left;margin-left:40px;margin-top:70px;">
						<fieldset>
							<legend>Customer Detail</legend>
								<center>
								<input type="text"  value="<?php echo $l['cname'];?>" id="cname" name="cname" placeholder="Enter Customer Name:" style="height:40px;width:200px;font-size:15px;" autofocus ><br>
								<br>
								<input type="Email" value="<?php echo $l['email'];?>" id="email" name="email" placeholder="Enter Customer Email:" style="height:40px;width:200px;font-size:15px;" ><br>
								<br>
								<input type="text"  value="<?php echo $l['phoneno'];?>" id="pno" name="pno" placeholder="Enter Phone No:" style="height:40px;width:200px;font-size:15px;" ><br>
								<br>
								<textarea   id="add" name="add"  placeholder="Address" style="height:40px;width:200px;font-size:15px;" > <?php echo $l['addr'];?></textarea>
						</fieldset>
		
					 </div>
				
						
						
						
						
						<div id="customer" style="float:left;margin-left:50px;">
						<fieldset>
							<legend>Model Detail</legend>
							<center>
							<input type="text"  value="<?php echo $l['model'];?>" id="model" name="model" placeholder="Enter Model No:" style="height:40px;width:200px;font-size:15px;" >
							<input type="text"  value="<?php echo $l['imei'];?>" id="imei" name="imei" placeholder="Enter IMEI No:" style="height:40px;width:200px;font-size:15px;" >
							<br><br>
							<textarea  id="detail" name="detail" placeholder="Enter Detail:"  style="height:79px;width:400px;font-size:15px;" ><?php echo $l['detail'];?></textarea>
							<br>
							<h2>Tachnision Name</h2>
							<select id="tachname" name="tachname"  style="height:40px;width:150px;font-size:15px;">
							<option id="tachname" name="tachname" value="">SELECT</option>
							<?php
							
							$qry1=mysql_query("SELECT * FROM technision");
							while($t=mysql_fetch_array($qry1))
								{
	
							
							?>
									<option id="tachname" name="tachname" value="<?php echo $t['techid'];?>" <?php if($t['techid']==$l['tachid']){echo "selected";}?> ><?php echo $t['tachname'];?></option>
							<?php
								}
				
							?>	
							
							</select>
	
							
							
							
							<h1>Parts</h1>
							<select id="stocknm1" name="stocknm1"  style="height:40px;width:150px;font-size:15px;">
							<option id="stocknm1" name="stocknm1" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM stock");
							while($t=mysql_fetch_array($qry1))
								{
								$rid=$_GET['rid'];
								$qry8=mysql_query("select * from ragister where rid='$rid'");
	
								$qry4=mysql_query("select * from product");
								if($t['qty']>1)
								{
							
							?>
									<option id="stocknm1" name="stocknm1" value="<?php echo $t['stockid'];?>" <?php 	while($l=mysql_fetch_array($qry8)){if($t['stockid']==$l['stocknm1']) {echo "selected";}}?>><?php while($j=mysql_fetch_array($qry4)){if($j['proid']==$t['proid']){echo $j['proname'];}}?><?php echo "  ";?><?php echo $t['stocknm'];?></option>
							<?php
								}
							}
							?>	
							
							</select>
							<?php	
							$qry8=mysql_query("select * from ragister where rid='$rid'");
							$l=mysql_fetch_array($qry8);
							?>
	
							<input type="text" value="<?php echo $l['qty1'];?>" id="qty1" name="qty1" placeholder="Qty" style="height:40px;width:40px;font-size:15px;" >
							
								
								
							
							
							<select id="stocknm2" name="stocknm2"  style="height:40px;width:150px;font-size:15px;margin-left:5px;">
									<option id="stocknm2" name="stocknm2" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM stock");
							while($t=mysql_fetch_array($qry1))
							{
								$rid=$_GET['rid'];
								$qry8=mysql_query("select * from ragister where rid='$rid'");
	
								$qry4=mysql_query("select * from product");
								if($t['qty']>1)
								{
							
							?>
									<option id="stocknm2" name="stocknm2" value="<?php echo $t['stockid'];?>"  <?php 	while($l=mysql_fetch_array($qry8)){if($t['stockid']==$l['stocknm2']) {echo "selected";}}?>><?php while($j=mysql_fetch_array($qry4)){if($j['proid']==$t['proid']){echo $j['proname'];}}?><?php echo "  ";?><?php echo $t['stocknm'];?></option>
							<?php
								}
							}
							?>	
							
							</select>
							<?php	
							$qry8=mysql_query("select * from ragister where rid='$rid'");
							$l=mysql_fetch_array($qry8);
							?>
							<input type="text" value="<?php echo $l['qty2'];?>" id="qty2" name="qty2" placeholder="Qty" style="height:40px;width:40px;font-size:15px;" >
								
								
							
							
							<select id="stocknm3" name="stocknm3"  style="height:40px;width:150px;font-size:15px;margin-left:5px;">
								<option id="stocknm3" name="stocknm3" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM stock");
							while($t=mysql_fetch_array($qry1))
							{
								$rid=$_GET['rid'];
								$qry8=mysql_query("select * from ragister where rid='$rid'");
	
								$qry4=mysql_query("select * from product");
								if($t['qty']>1)
								{
							
							?>
									<option id="stocknm3" name="stocknm3" value="<?php echo $t['stockid'];?>"  <?php 	while($l=mysql_fetch_array($qry8)){if($t['stockid']==$l['stocknm3']) {echo "selected";}}?>><?php while($j=mysql_fetch_array($qry4)){if($j['proid']==$t['proid']){echo $j['proname'];}}?><?php echo "  ";?><?php echo $t['stocknm'];?></option>
							<?php
								}
							}
							?>	
							
							</select>
							
							<?php	
							$qry8=mysql_query("select * from ragister where rid='$rid'");
							$l=mysql_fetch_array($qry8);
							?>
							<input type="text"  value="<?php echo $l['qty3'];?>" id="qty3" name="qty3" placeholder="Qty" style="height:40px;width:40px;font-size:15px;" >
								
							 
							
							
							
							<select id="stocknm4" name="stocknm4"  style="height:40px;width:150px;font-size:15px;margin-left:5px;">
								<option id="stocknm4" name="stocknm4" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM stock");
							while($t=mysql_fetch_array($qry1))
							{
									$rid=$_GET['rid'];
								$qry8=mysql_query("select * from ragister where rid='$rid'");
	
								$qry4=mysql_query("select * from product");
								if($t['qty']>1)
								{
							
							?>
									<option id="stocknm4" name="stocknm4" value="<?php echo $t['stockid'];?>" <?php 	while($l=mysql_fetch_array($qry8)){if($t['stockid']==$l['stocknm4']) {echo "selected";}}?>><?php while($j=mysql_fetch_array($qry4)){if($j['proid']==$t['proid']){echo $j['proname'];}}?><?php echo "  ";?><?php echo $t['stocknm'];?></option>
							<?php
								}
							}
							?>	
							
							</select>
							
							<?php	
							$qry8=mysql_query("select * from ragister where rid='$rid'");
							$l=mysql_fetch_array($qry8);
							?>
							<input type="text"  value="<?php echo $l['qty4'];?>" id="qty4" name="qty4" placeholder="Qty" style="height:40px;width:40px;font-size:15px;" >
								










						<br><br>
							<input type="text"   value="<?php echo $l['price']?>"id="price" name="price" place holder="Enter Price:" style="height:40px;width:200px;font-size:15px;" ><br>
							<br>
							
							<input type="text"  value="<?php echo $l['edate']?>" id="edate" name="edate" placeholder="Enter Estiate Date:" style="height:40px;width:200px;font-size:15px;" >
						<br><br>
							<select id="status" name="status" style="font-size:20px;width:200;padding:5px;">
									<option value="0" id="status" name="status">Task Runing</option>
									
									<option value="1" id="status" name="status">Task Complete</option>
									
							
							</select>
							<br>
							<input type="hidden" value="<?php echo $_GET['rid'];?>" name="rid">
							</fieldset><br>
							<input type="submit"  onclick="check(this.form)" name="submit" style="background:black;padding:30px;color:white;border:none;margin-left:350px;" value="Update" >
						
						<br><br><br>
						</div>
						
											
				</form>
						
					
						
				
		</div>





		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<?php
}
else
{
?>		
		
		
		
		
		
		<div id="techni" style="margin:120px 0px 0px 80px;width:1200px;" >
		<div id="techniheader">Reparing Ragister Detail</div>
			<br>
			<div id="form"style="height:500px;overflow:scroll;"  >
					<form method="post" action="ragister.php">
						<br><div id="company" style="float:left;margin-left:40px;margin-top:70px;">
						<fieldset>
							<legend>Customer Detail</legend>
								<center>
								<input type="text"  id="cname" name="cname" placeholder="Enter Customer Name:" style="height:40px;width:200px;font-size:15px;" autofocus ><br>
								<br>
								<input type="Email"  id="email" name="email" placeholder="Enter Customer Email:" style="height:40px;width:200px;font-size:15px;" ><br>
								<br>
								<input type="text"  id="pno" name="pno" placeholder="Enter Phone No:" style="height:40px;width:200px;font-size:15px;" ><br>
								<br>
								<textarea  id="add" name="add"  placeholder="Address" style="height:40px;width:200px;font-size:15px;" ></textarea>
						</fieldset>
		
					 </div>
				
						
						
						
						
						<div id="customer" style="float:left;margin-left:50px;">
						<fieldset>
							<legend>Model Detail</legend>
							<center>
							<input type="text"  id="model" name="model" placeholder="Enter Model No:" style="height:40px;width:200px;font-size:15px;" >
							<input type="text"  id="imei" name="imei" placeholder="Enter IMEI No:" style="height:40px;width:200px;font-size:15px;" >
							<br><br>
							<textarea  id="detail" name="detail" placeholder="Enter Detail:"  style="height:79px;width:400px;font-size:15px;" ></textarea>
							<br>
							<h2>Tachnision Name</h2>
							<select id="tachname" name="tachname"  style="height:40px;width:150px;font-size:15px;">
							<option id="tachname" name="tachname" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM technision");
							while($t=mysql_fetch_array($qry1))
								{
	
							
							?>
									<option id="tachname" name="tachname" value="<?php echo $t['techid'];?>" ><?php echo $t['tachname'];?></option>
							<?php
								}
				
							?>	
							
							</select>
	
							
							
							<h1>Parts</h1>
							<select id="stocknm1" name="stocknm1"  style="height:40px;width:150px;font-size:15px;">
							<option id="stocknm1" name="stocknm1" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM stock");
							while($t=mysql_fetch_array($qry1))
							{
								$qry4=mysql_query("select * from product");
								if($t['qty']>1)
								{
							
							?>
									<option id="stocknm1" name="stocknm1" value="<?php echo $t['stockid'];?>"><?php while($j=mysql_fetch_array($qry4)){if($j['proid']==$t['proid']){echo $j['proname'];}}?><?php echo "  ";?><?php echo $t['stocknm'];?></option>
							<?php
								}
							}
							?>	
							
							</select>
							<input type="text"  id="qty1" name="qty1" placeholder="Qty" style="height:40px;width:40px;font-size:15px;" >
							
								
								
							
							
							<select id="stocknm2" name="stocknm2"  style="height:40px;width:150px;font-size:15px;margin-left:5px;">
									<option id="stocknm2" name="stocknm2" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM stock");
							while($t=mysql_fetch_array($qry1))
							{
								$qry4=mysql_query("select * from product");
								if($t['qty']>1)
								{
							
							?>
									<option id="stocknm2" name="stocknm2" value="<?php echo $t['stockid'];?>"><?php while($j=mysql_fetch_array($qry4)){if($j['proid']==$t['proid']){echo $j['proname'];}}?><?php echo "  ";?><?php echo $t['stocknm'];?></option>
							<?php
								}
							}
							?>	
							
							</select>
							<input type="text"  id="qty2" name="qty2" placeholder="Qty" style="height:40px;width:40px;font-size:15px;" >
								
								
							
							
							<select id="stocknm3" name="stocknm3"  style="height:40px;width:150px;font-size:15px;margin-left:5px;">
								<option id="stocknm3" name="stocknm3" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM stock");
							while($t=mysql_fetch_array($qry1))
							{
								$qry4=mysql_query("select * from product");
								if($t['qty']>1)
								{
							
							?>
									<option id="stocknm3" name="stocknm3" value="<?php echo $t['stockid'];?>"><?php while($j=mysql_fetch_array($qry4)){if($j['proid']==$t['proid']){echo $j['proname'];}}?><?php echo "  ";?><?php echo $t['stocknm'];?></option>
							<?php
								}
							}
							?>	
							
							</select>
							<input type="text"  id="qty3" name="qty3" placeholder="Qty" style="height:40px;width:40px;font-size:15px;" >
								
							
							
							
							
							<select id="stocknm4" name="stocknm4"  style="height:40px;width:150px;font-size:15px;margin-left:5px;">
								<option id="stocknm4" name="stocknm4" value="">SELECT</option>
							<?php
							$qry1=mysql_query("SELECT * FROM stock");
							while($t=mysql_fetch_array($qry1))
							{
								$qry4=mysql_query("select * from product");
								if($t['qty']>1)
								{
							
							?>
									<option id="stocknm4" name="stocknm4" value="<?php echo $t['stockid'];?>"><?php while($j=mysql_fetch_array($qry4)){if($j['proid']==$t['proid']){echo $j['proname'];}}?><?php echo "  ";?><?php echo $t['stocknm'];?></option>
							<?php
								}
							}
							?>	
							
							</select>
							<input type="text"  id="qty4" name="qty4" placeholder="Qty" style="height:40px;width:40px;font-size:15px;" >
								










						<br><br>
							<input type="text"  id="price" name="price" placeholder="Enter Price:" style="height:40px;width:200px;font-size:15px;" ><br>
							<br>
							
							<input type="text"  id="edate" name="edate" placeholder="Enter Estiate Date:" style="height:40px;width:200px;font-size:15px;" >
						<br><br>
							<select id="status" name="status" style="font-size:20px;width:200;padding:5px;">
										<option value="0" id="status" name="status">Task Runing</option>
										<option value="1" id="status" name="status">Task Complete</option>

							</select>
							<br>
							</fieldset><br>
							<input type="submit"  onclick="check(this.form)" name="submit" style="background:black;padding:30px;color:white;border:none;margin-left:350px;" value="Enter" >
						
						<br><br><br>
						</div>
						
											
				
					
					<?php
					include('config/dbconfig.php');
					if(@$_POST['submit'] && $_POST['submit']=="Enter")
					{
		
						$cname=$_POST['cname'];
						$email=$_POST['email'];
						$pno=$_POST['pno'];
						$add=$_POST['add'];
						$model=$_POST['model'];
						$imei=$_POST['imei'];
						$detail=$_POST['detail'];
						
						$stocknm1=$_POST['stocknm1'];
											
						$qty1=$_POST['qty1'];
						
						$stocknm2=$_POST['stocknm2'];
						
						$qty2=$_POST['qty2'];
						$stocknm3=$_POST['stocknm3'];
						
						$qty3=$_POST['qty3'];
						$stocknm4=$_POST['stocknm4'];
						$qty4=$_POST['qty4'];
						$price=$_POST['price'];
						$date=date("d-m-Y");
						$edate=$_POST['edate'];
						$status=$_POST['status'];
						$tachname=$_POST['tachname'];
						
						
						$qry5=mysql_query("INSERT INTO ragister (`cname`, `email`, `phoneno`, `addr`, `model`, `imei`, `detail`, `stocknm1`, `qty1`, `stocknm2`, `qty2`, `stocknm3`, `qty3`, `stocknm4`, `qty4`, `price`, `date`, `edate`, `status`,`tachid`) VALUES ('$cname','$email','$pno','$add','$model','$imei','$detail','$stocknm1','$qty1','$stocknm2','$qty2','$stocknm3','$qty3','$stocknm4','$qty4','$price','$date','$edate','$status','$tachname')");
						
						
						if($stocknm1!="SELECT" )
						{
							$qry6=mysql_query("select * from stock where stockid='$stocknm1'");
							$t=mysql_fetch_array($qry6);
							$newqty1=$t['qty']-$qty1;
							$qry7=mysql_query("update stock set qty='$newqty1' where stockid='$stocknm1' ");
							
													
						}
						if($stocknm2!="SELECT" )
						{
							$qry6=mysql_query("select * from stock where stockid='$stocknm2'");
							$t=mysql_fetch_array($qry6);
							$newqty2=$t['qty']-$qty2;
							$qry7=mysql_query("update stock set qty='$newqty2' where stockid='$stocknm2' ");
							
													
						}
						if($stocknm3!="SELECT" )
						{
							$qry6=mysql_query("select * from stock where stockid='$stocknm3'");
							$t=mysql_fetch_array($qry6);
							$newqty3=$t['qty']-$qty3;
							$qry7=mysql_query("update stock set qty='$newqty3' where stockid='$stocknm3' ");
							
													
						}
						
						if($stocknm4!="SELECT" )
						{
							$qry6=mysql_query("select * from stock where stockid='$stocknm4'");
							$t=mysql_fetch_array($qry6);
							$newqty4=$t['qty']-$qty4;
							$qry7=mysql_query("update stock set qty='$newqty4' where stockid='$stocknm4' ");
							
							
													
						}
						
						
							echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ragister.php">';
	

				

				}
						?>
						
						</form>
						
					<center>
						<table cellspacing="0px" cellpadding="10px">
						<th>Customer Name</th>
						<th>Model</th>
						<th>Detail</th>
						<th>Price</th>
						<th>Date</th>
						<th>Estimate Date</th>
						<th>Status</th>
						<th>Task Complete</th>
						<th>Edit</th>
						<th>View Full Detail</th>
						<?php
								$qry2=mysql_query("select * from ragister");
								$co=mysql_num_rows($qry2);
								if($co>=1)
								{	
									while($t=mysql_fetch_array($qry2))
									{
							?>				
										<?php
										if($t['status']=="0")
										{
										?>
											<?php
											if(strtotime(date('d-m-Y'))>strtotime($t['edate']))
											{
											?>
											<tr style="background:red;">
											<td><?php echo $t['cname'];?></td>
											<td><?php echo $t['model'];?></td>
											<td><?php echo $t['detail'];?></td>
											<td><?php echo $t['price'];?></td>
											<td><?php echo $t['date'];?></td>
											<td><?php echo $t['edate'];?></td>
											<td><?php if($t['status']=="0"){ echo "Task Running"; } else  { echo "Task Complete";}?></td>
										
											<td><a href="ragister.php?rid=<?php echo $t['rid']; ?>& status=<?php echo "com";?>" onclick="return confrom(this.form)">Update</a></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']?>& res=update"><img src="image/edit.png" width="50px" height="50px"></a></td>
											<td><a href="table.php?rid=<?php echo $t['rid'];?> ">View Full Detial</a></td>
											</tr>
											<?php
											}
									
											if(strtotime(date('d-m-Y'))==strtotime($t['edate']))
											{
											?>
										
											<tr style="background:green;">
											<td><?php echo $t['cname'];?></td>
											<td><?php echo $t['model'];?></td>
											<td><?php echo $t['detail'];?></td>
											<td><?php echo $t['price'];?></td>
											<td><?php echo $t['date'];?></td>
											<td><?php echo $t['edate'];?></td>
											<td><?php if($t['status']=="0"){ echo "Task Runing" ;} else  { echo "Task Complete";}?></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']; ?>& status=<?php echo "com";?>"onclick="return confrom(this.form)">Update</a></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']?>& res=update"><img src="image/edit.png" width="50px" height="50px"></a></td>
											<td><a href="table.php?rid=<?php echo $t['rid'];?> ">View Full Detial</a></td>
											</tr>
											<?php
											}
											if(strtotime(date('d-m-Y'))<strtotime($t['edate']))
											{
											?>
												<tr >
											<td><?php echo $t['cname'];?></td>
											<td><?php echo $t['model'];?></td>
											<td><?php echo $t['detail'];?></td>
											<td><?php echo $t['price'];?></td>
											<td><?php echo $t['date'];?></td>
											<td><?php echo $t['edate'];?></td>
											<td><?php if($t['status']=="0"){ echo "Task Running"; } else  { echo "Task Complete";}?></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']; ?>& status=<?php echo "com";?>"onclick="return confrom(this.form)">Update</a></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']?>& res=update"><img src="image/edit.png" width="50px" height="50px"></a></td>
											<td><a href="table.php?rid=<?php echo $t['rid'];?> ">View Full Detial</a></td>
											</tr>
											<?php
											}
											?>
								
										<?php
										}
										?>
								<?php
									}
								?>
									<?php
									}
								?>
					</table>
					
						
				
		</div>
<?php
}
?>		
	</div>
	<br>
</body>
<?php

if(@$_GET['status']&&$_GET['status']=="com")
{
	$rid=$_GET['rid'];
	$qry=mysql_query("update ragister set status='1' where rid='$rid'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ragister.php">';
	

}




?>

				
					
					<?php
					include('config/dbconfig.php');
					if(@$_POST['submit'] && $_POST['submit']=="Update")
					{
		
						$cname=$_POST['cname'];
						$email=$_POST['email'];
						$pno=$_POST['pno'];
						$add=$_POST['add'];
						$model=$_POST['model'];
						$imei=$_POST['imei'];
						$detail=$_POST['detail'];
						
						$stocknm1=$_POST['stocknm1'];
											
						$qty1=$_POST['qty1'];
						
						$stocknm2=$_POST['stocknm2'];
						
						$qty2=$_POST['qty2'];
						$stocknm3=$_POST['stocknm3'];
						
						$qty3=$_POST['qty3'];
						$stocknm4=$_POST['stocknm4'];
						$qty4=$_POST['qty4'];
						$price=$_POST['price'];
						$tachname=$_POST['tachname'];
						$edate=$_POST['edate'];
						$status=$_POST['status'];
						$rid=$_POST['rid'];
						
						$qry9=mysql_query("select * from ragister where rid='$rid'" );
						$t=mysql_fetch_array($qry9);
						$stnm1=$t['stocknm1'];
						$stnm2=$t['stocknm2'];
						$stnm3=$t['stocknm3'];
						$stnm4=$t['stocknm4'];
						$oqty1=$t['qty1'];
						$oqty2=$t['qty2'];
						$oqty3=$t['qty3'];
						$oqty4=$t['qty4'];
						if($stnm1==$stocknm1)
						{
							if($oqty1>$qty1)
							{
								$dif=$oqty1-$qty1;
								$qry15=mysql_query("select * from stock where stockid='$stnm1'");
								$j=mysql_fetch_array($qry15);
								$ans=$j['qty']+$dif;
								$qry16=mysql_query("update stock set qty='$ans' where stockid='$stnm1'");
							}
							if($oqty1<$qty1)
							{
								$dif=$qty-$oqty1;
								$qry15=mysql_query("select * from stock where stockid='$stnm1'");
								$j=mysql_fetch_array($qry15);
								$ans=$j['qty']-$dif;
								$qry16=mysql_query("update stock set qty='$ans' where stockid='$stnm1'");
							}
						}
						else
						{
							$qry22=mysql_query("select * from stock where stockid='$stocknm1'");
							$q=mysql_fetch_array($qry22);
							$dif=$q['qty']-$qty1;
							$qry20=mysql_query("update stock set qty='$dif' where stockid='$stocknm1'");
							$qry22=mysql_query("select * from stock where stockid='$stnm1'");
							$q=mysql_fetch_array($qry22);
							$dif=$q['qty']+$oqty1;
							$qry20=mysql_query("update stock set qty='$dif' where stockid='$stnm1'");
							
							
						}
						if($stnm2==$stocknm2)
						{
							if($oqty2>$qty2)
							{
								$dif=$oqty2-$qty2;
								$qry15=mysql_query("select * from stock where stockid='$stnm2'");
								$j=mysql_fetch_array($qry15);
								$ans=$j['qty']+$dif;
								$qry16=mysql_query("update stock set qty='$ans' where stockid='$stnm2'");
							}
							if($oqty2<$qty2)
							{
								$dif=$qty-$oqty2;
								$qry15=mysql_query("select * from stock where stockid='$stnm2'");
								$j=mysql_fetch_array($qry15);
								$ans=$j['qty']-$dif;
								$qry16=mysql_query("update stock set qty='$ans' where stockid='$stnm2'");
							}
						}
						else
						{
							$qry22=mysql_query("select * from stock where stockid='$stocknm2'");
							$q=mysql_fetch_array($qry22);
							$dif=$q['qty']-$qty2;
							$qry20=mysql_query("update stock set qty='$dif' where stockid='$stocknm2'");
							$qry22=mysql_query("select * from stock where stockid='$stnm2'");
							$q=mysql_fetch_array($qry22);
							$dif=$q['qty']+$oqty2;
							$qry20=mysql_query("update stock set qty='$dif' where stockid='$stnm2'");
							
							
							
						}
						if($stnm3==$stocknm3)
						{
							if($oqty3>$qty3)
							{
								$dif=$oqty3-$qty3;
								$qry15=mysql_query("select * from stock where stockid='$stnm3'");
								$j=mysql_fetch_array($qry15);
								$ans=$j['qty']+$dif;
								$qry16=mysql_query("update stock set qty='$ans' where stockid='$stnm3'");
							}
							if($oqty2<$qty2)
							{
								$dif=$qty-$oqty3;
								$qry15=mysql_query("select * from stock where stockid='$stnm3'");
								$j=mysql_fetch_array($qry15);
								$ans=$j['qty']-$dif;
								$qry16=mysql_query("update stock set qty='$ans' where stockid='$stnm3'");
							}
						}
						else
						{
							$qry22=mysql_query("select * from stock where stockid='$stocknm3'");
							$q=mysql_fetch_array($qry22);
							$dif=$q['qty']-$qty3;
							$qry20=mysql_query("update stock set qty='$dif' where stockid='$stocknm3'");
							$qry22=mysql_query("select * from stock where stockid='$stnm3'");
							$q=mysql_fetch_array($qry22);
							$dif=$q['qty']+$oqty3;
							$qry20=mysql_query("update stock set qty='$dif' where stockid='$stnm3'");
							
							
							
						}
						if($stnm4==$stocknm4)
						{
							if($oqty4>$qty4)
							{
								$dif=$oqty4-$qty4;
								$qry15=mysql_query("select * from stock where stockid='$stnm4'");
								$j=mysql_fetch_array($qry15);
								$ans=$j['qty']+$dif;
								$qry16=mysql_query("update stock set qty='$ans' where stockid='$stnm4'");
							}
							if($oqty4<$qty4)
							{
								$dif=$qty-$oqty4;
								$qry15=mysql_query("select * from stock where stockid='$stnm4'");
								$j=mysql_fetch_array($qry15);
								$ans=$j['qty']-$dif;
								$qry16=mysql_query("update stock set qty='$ans' where stockid='$stnm4'");
							}
						}
						else
						{
							$qry22=mysql_query("select * from stock where stockid='$stocknm4'");
							$q=mysql_fetch_array($qry22);
							$dif=$q['qty']-$qty4;
							$qry20=mysql_query("update stock set qty='$dif' where stockid='$stocknm4'");
							$qry22=mysql_query("select * from stock where stockid='$stnm4'");
							$q=mysql_fetch_array($qry22);
							$dif=$q['qty']+$oqty4;
							$qry20=mysql_query("update stock set qty='$dif' where stockid='$stnm4'");
							
							
							
						}




	

						
						$qry10=mysql_query("update ragister set cname='$cname',email='$email',phoneno='$pno',addr='$add',model='$model',imei='$imei',detail='$detail',stocknm1='$stocknm1',qty1='$qty1',stocknm2='$stocknm2',qty2='$qty2',stocknm3='$stocknm3',qty3='$qty3',stocknm4='$stocknm1',qty4='$qty4',price='$price',edate='$edate',status='$status',tachid='$tachname' where rid='$rid'");

						
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=ragister.php">';
	
						
				}
				
			?>			
				

</html>