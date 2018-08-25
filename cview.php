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
		<h1>View All Complete Records</h1>
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
								$qry2=mysql_query("select * from ragister");
								$co=mysql_num_rows($qry2);
								if($co>=1)
								{	
									while($t=mysql_fetch_array($qry2))
									{
							?>				
										<?php
										if($t['status']=="1")
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
					</table>
					
</body>
</html>