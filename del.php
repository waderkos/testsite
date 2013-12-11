<?php
define( '_TSTINC', 1 );
session_start();
if (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['ids']==session_id()))
{
	include ('block/start.php');
	//$del = new db('stest');
	$sql_del = "DELETE FROM news WHERE id=:id";

		$query_del=$pdo->prepare($sql_del);
		$query_del->bindParam(':id', $_SESSION['del'], PDO::PARAM_INT);
		$query_del->execute();

	$_SESSION['del']=NULL;
	$_SESSION['page']=1;
header("Location: index.php");		
}
else
header("Location: index.php");