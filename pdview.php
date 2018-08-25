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
</head>
<body>
<center>
			<h1>Date Wise Report</h1>
				<div id="from"  style="background:white;width:400px;padding:20px;margin-top:10px;box-shadow:0px 0px 30px 10px;">
				<form method="post" action="pdview.php">
					<label for="date1">From Date</label> 
						<input type="text"  id="fdate" name="fdate" placeholder="Enter From date" style="height:40px;width:200px;font-size:20px;" autofocus><br><br>
					<label for="pwd">Password:</label>
						<input type="text" id ="tdate" name="tdate" placeholder="Enter To date" style="height:40px;width:200px;font-size:20px;margin-left:6px;">
						<br><br>
					<center><input type="submit" style="background:black;padding:10px;color:white;" value="Submit" name="submit"  onclick="return check(this.form)">
					</form>
				</div>
		<?php
		if(@$_POST['submit'] && $_POST['submit']=="Submit" )
		{
			$fdate=$_POST['fdate'];
			$tdate=$_POST['tdate'];
		?>
			
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
						
								include('config/dbconfig.php');
								$qry2=mysql_query("select * from ragister where date>='$fdate' and edate<='$tdate'");
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
											<td><?php if($t['status']=="1"){ echo "Task Running"; } else  { echo "Task Complete";}?></td>
										
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
											<td><?php if($t['status']=="1"){ echo "Task Running" ;} else  { echo "Task Complete";}?></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']; ?>& status=<?php echo "com";?>"onclick="return confrom(this.form)">Update</a></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']?>& res=update"><img src="image/edit.png" width="50px" height="50px"></a></td>
											<td><a href="table.php?rid=<?php echo $t['rid'];?> ">View Full Detial</a></td>
											</tr>
											<?php
											}
											if(strtotime(date('d-m-Y'))<strtotime($t['edate']))
											{
											?>
												<tr style="background:white;">
											<td><?php echo $t['cname'];?></td>
											<td><?php echo $t['model'];?></td>
											<td><?php echo $t['detail'];?></td>
											<td><?php echo $t['price'];?></td>
											<td><?php echo $t['date'];?></td>
											<td><?php echo $t['edate'];?></td>
											<td><?php if($t['status']=="1"){ echo "Task Running"; } else  { echo "Task Complete";}?></td>
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
									else
									{
									$qry2=mysql_query("select * from ragister");
								
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
											<td><?php if($t['status']=="1"){ echo "Task Running"; } else  { echo "Task Complete";}?></td>
										
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
											<td><?php if($t['status']=="1"){ echo "Task Running" ;} else  { echo "Task Complete";}?></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']; ?>& status=<?php echo "com";?>"onclick="return confrom(this.form)">Update</a></td>
											<td><a href="ragister.php?rid=<?php echo $t['rid']?>& res=update"><img src="image/edit.png" width="50px" height="50px"></a></td>
											<td><a href="table.php?rid=<?php echo $t['rid'];?> ">View Full Detial</a></td>
											</tr>
											<?php
											}
											if(strtotime(date('d-m-Y'))<strtotime($t['edate']))
											{
											?>
												<tr style="background:white;">
											<td><?php echo $t['cname'];?></td>
											<td><?php echo $t['model'];?></td>
											<td><?php echo $t['detail'];?></td>
											<td><?php echo $t['price'];?></td>
											<td><?php echo $t['date'];?></td>
											<td><?php echo $t['edate'];?></td>
											<td><?php if($t['status']=="1"){ echo "Task Running"; } else  { echo "Task Complete";}?></td>
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
		<?php
		}
		?>
	</table>
				
</body>
</html>