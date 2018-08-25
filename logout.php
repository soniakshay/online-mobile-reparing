<?php
 session_start();
 session_unset($_SESSION['uname']);
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
  exit;
?>