<?php
define( '_TSTINC', 1 );
session_start();
if(isset($_GET['leng']) and is_numeric($_GET['leng']) and ($_GET['leng']<=$_SESSION['l_number']) )
	{
		$_SESSION['leng']=$_GET['leng'];
	}
header("Location: index.php");
exit;	

?>