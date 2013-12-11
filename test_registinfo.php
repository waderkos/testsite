<?php
//Реєстрація нового користувача
define( '_TSTINC', 1 );
session_start();
if (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['ids']==session_id()))
{
	include ('block/start.php');
	//$regist = new db('stest');
	$username=del_script($_POST['login']);
	$userpas1=del_script($_POST['pass1']);
	$userpas2=del_script($_POST['pass2']);
	$captcha=del_script($_POST['captcha']);

	$sql_tst_login = "SELECT login FROM  user WHERE login=:login";
	$query_tst_login=$pdo->prepare($sql_tst_login);
	$query_tst_login->bindParam(':login', $username, PDO::PARAM_STR, 20);
	
	$query_tst_login->execute();
	$res = $query_tst_login -> fetch();
	
//Перевірка даних користувача
	if($userpas1==''|| $userpas2=='' || $username=='')
		{
			$_SESSION['error']='Не всі поля заповнено';
			$_SESSION['page']=2;
			header("Location: index.php");
			//$regist->db_close();
			exit;
		}
	elseif ($userpas1!=$userpas2)
		{
			$_SESSION['error']='Паролі не співпадають';
			$_SESSION['page']=2;
			header("Location: index.php");
			//$regist->db_close();
			exit;	
		}
	elseif (isset($res['login']))
		{
			$_SESSION['error']='Користувача з таким логіном уже зареєстровано';
			$_SESSION['page']=2;
			header("Location: index.php");
			//$regist->db_close();
			exit;	
		}
	elseif ($captcha!=$_SESSION['codd'])
		{
			$_SESSION['error']='Захисний код введено не вірно';
			$_SESSION['page']=2;
			header("Location: index.php");
			//$regist->db_close();
			exit;	
		}

	else
		{
			$pass=md5($userpas1);
		    $sql="INSERT INTO `user` (`login`, `pass`, `role`) VALUES ('$username', '$pass', 'User')";
			
					$sql_reg="INSERT INTO `user` (`login`, `pass`, `role`) VALUES (:login, :pass, 'User')";				
					$query_reg=$pdo->prepare($sql_reg);
					$query_reg->bindParam(':login', $username, PDO::PARAM_STR);
					$query_reg->bindParam(':pass', $pass, PDO::PARAM_STR);
					$query_reg->execute();
						
			$_SESSION['login']=$username;
			$_SESSION['role']='User';
			$_SESSION['page']=1;
			
			header("Location: index.php");
			//$regist->db_close();
			exit;
		}
	
}
?>