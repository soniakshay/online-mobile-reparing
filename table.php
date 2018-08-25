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
<link rel="stylesheet" href="css/login.css">
<style>
td{
padding:5px;
}
</style>
<script src="jquery-2.1.1.min.js">
</script>
<body>
<center>	<H1 style="color:gray;">Detail</H1>
	<table border="1px" cellspacing="0px">
	<?php
	$rid=$_GET['rid'];
	$qry1=mysql_query("select * from ragister where rid='$rid'");
	while($t=mysql_fetch_array($qry1))
	{
		$stockid1=$t['stocknm1'];
		$stockid2=$t['stocknm2'];
		$stockid3=$t['stocknm3'];
		$stockid4=$t['stocknm4'];
	
		$sqry1=mysql_query("select * from stock where stockid='$stockid1'");
		$s1=mysql_fetch_array($sqry1);
		$sqry2=mysql_query("select * from stock where stockid='$stockid2'");
		$s2=mysql_fetch_array($sqry2);
		$sqry3=mysql_query("select * from stock where stockid='$stockid3'");
		$s3=mysql_fetch_array($sqry3);
		$sqry4=mysql_query("select * from stock where stockid='$stockid4'");
		$s4=mysql_fetch_array($sqry4);
		$proid1=$s1['proid'];
		$pqry1=mysql_query("select * from product where proid='$proid1'");
		$p1=mysql_fetch_array($pqry1);
		
		$proid2=$s2['proid'];
		$pqry2=mysql_query("select * from product where proid='$proid2'");
		$p2=mysql_fetch_array($pqry2);
				
		
		$proid3=$s3['proid'];
		$pqry3=mysql_query("select * from product where proid='$proid3'");
		$p3=mysql_fetch_array($pqry3);
				
		$proid4=$s4['proid'];
		$pqry4=mysql_query("select * from product where proid='$proid4'");
		$p4=mysql_fetch_array($pqry4);
				
	
		
		
		
	?>
	<tr>
		<td>Customer Name</td><td><?php echo $t['cname'];?></td>
	</tr>
	<tr>
		<td>Customer Email</td><td><?php echo $t['email'];?></td>
	</tr>
	<tr>
		<td>Customer Phone No:</td><td><?php echo $t['phoneno'];?></td>
	</tr>
	<tr>
		<td>Customer Adress</td><td><?php echo $t['addr'];?></td>
	</tr>
	<tr>
		<td>Model No</td><td><?php echo $t['model'];?></td>
	</tr>
	<tr>
		<td>IMEI</td><td><?php echo $t['imei'];?></td>
	</tr>
	<tr>
		<td>Detail</td><td><?php echo $t['detail'];?></td>
	</tr>
	<tr>
		<td>Stockname1</td><td><?php echo $p1['proname'];echo $s1['stocknm'];?></td>
	</tr>
	<tr>
		<td>Qty1</td><td><?php echo $t['qty1'];?></td>
	</tr>
	<tr>
		<td>Stockname2</td><td><?php echo $p2['proname'];echo $s2['stocknm'];?></td>
	</tr>
	<tr>
		<td>Qty2</td><td><?php echo $t['qty2'];?></td>
	</tr>
	<tr>
		<td>Stockname3</td><td><?php echo $p3['proname'];echo $s3['stocknm'];?></td>
	</tr>
	<tr>
		<td>Qty3</td><td><?php echo $t['qty3'];?></td>
	</tr>
	<tr>
		<td>Stockname4</td><td><?php echo $p4['proname'];echo $s4['stocknm'];?></td>
	</tr>
	<tr>
		<td>Qty4</td><td><?php echo $t['qty4'];?></td>
	</tr>
	<tr>
		<td>Price</td><td><?php echo $t['price'];?></td>
	</tr>
	<tr>
		<td>Date</td><td><?php echo $t['date'];?></td>
	</tr>
	<tr>
		<td>Estimate Date</td><td><?php echo $t['edate'];?></td>
	</tr>
	<tr>
		<td>Tachnision Name</td><td><?php $q5=mysql_query("select * from technision where techid='$t[tachid]'");while($l=mysql_fetch_array($q5)){if($t['tachid']==$l['techid']){echo $l['tachname'];}}?></td>
	<tr>
		<td>Task</td><td><?php if ($t['status']=="1"){echo "Task Complete";}else{ echo "Task not Complete";}?></td>
	</tr>
	
	
	<?php
	}
	?>
	
	</table>
</body>
</html>
