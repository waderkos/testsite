<?php
session_start();
if(isset($_GET['page']) and is_numeric($_GET['page']) )
	{
		$_SESSION['page']=$_GET['page'];
		$_SESSION['del']=NULL;

	}

if (($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['page']) and is_numeric($_POST['page']) )
	{
		$_SESSION['page']=$_POST['page'];
		$_SESSION['del']=NULL;
			
	}

if(isset($_GET['post']) and is_numeric($_GET['post']) )
	{
		$_SESSION['page']=5;
		$_SESSION['post']=$_GET['post'];
	}
if (($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['del']) and is_numeric($_POST['del']) )
	{
		$_SESSION['del']=$_POST['del'];
		$_SESSION['page']=6;
				
	}
if (($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['edit']) and is_numeric($_POST['edit']) )
	{
		$_SESSION['edit']=$_POST['edit'];
		$_SESSION['page']=3;
	
	}
	


header("Location: index.php");
exit;	
?>