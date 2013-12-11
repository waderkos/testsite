<?php
define( '_TSTINC', 1 );
session_start();
if (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['ids']==session_id()))
{
	include ('block/start.php');
	//$login = new db('stest');
	$username=del_script($_POST['login']);
	$userpass=del_script($_POST['pass']);
	$userpass=md5($userpass);

//Перевірка відповідності логіну, паролю.
	//if (is_numeric($start) and is_numeric($num))
	$sql_tst_login = "SELECT * FROM  user WHERE login=:login AND pass='$userpass'";
	$query_tst_login=$pdo->prepare($sql_tst_login);
	$query_tst_login->bindParam(':login', $username, PDO::PARAM_STR, 12);
	
	$query_tst_login->execute();
	$res = $query_tst_login -> fetch();
		if (isset($res['login']))
			{
				$_SESSION['login']=$username;
				$_SESSION['role']=$res['role'];
				$_SESSION['page']=1;
				header("Location: index.php");
				//db_close();
				exit;
			}
		else
				$_SESSION['page']=1;
				$_SESSION['error']='Невірний логін, пароль';
				header("Location: index.php");
				//db_close();
				exit;
}
else
header("Location: index.php");
