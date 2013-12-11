<?php
defined('_TSTINC') or header("Location: index.php"); //Захист від прямого доступу.

if (!isset($_SESSION['leng']))
$_SESSION['leng']=1;
//Функція повертає значення для мови яка в даний момент.
		function translt($arr)
		{	
			if (isset($_SESSION['leng']))
			{
					$ind=$_SESSION['leng']-1;
		    		$j=explode("|@|", $arr);
				if ((is_array($j))and(isset($j[$ind])))
					$i=$j[$ind];
				else
					$i=$j[0];
				return $i;
			}
		}
//Функція готує дані для запису в базу.		
function multleng($text, $table, $colum, $id=0)
{		if ($id==0)
		$sql="SELECT $colum FROM $table";
		else
		$sql="SELECT $colum FROM $table WHERE id='$id'";
		$query=mysql_query($sql);
		$arr= mysql_fetch_assoc($query);
		$j=explode("|@|", $arr[$colum]);
		$j[$_SESSION["leng"]-1]=$text;
		$str='';
	foreach( $j as $val)
	{
		$str.=$val.'|@|';
	}
	$str = substr($str, 0, -3);
	return $str;
}

$smsg[1]='Тестове завдання WD|@|Тестовое задание WD|@|Test work WD';
$smsg[2]='Заголовок|@|Оглавление|@|Title';
$smsg[3]='Текст|@|Текст|@|Text';
$smsg[4]='Добавити|@|Добавить|@|Add news';
$smsg[5]='Увійти|@|Войти|@|Enter';
$smsg[6]='Реєстрація|@|Регистрация|@|Registration';
$smsg[7]='Повернутись|@|Возврат|@|Back';
$smsg[8]='Читати далі|@|Дальше|@|Read More';
$smsg[9]='Логін|@|Логин|@|Login';
$smsg[10]='Пароль|@|Пароль|@|Password';
$smsg[11]='Повторіть пароль|@|Повторите пароль|@|Confirm Password';
$smsg[12]='Захисний код|@|Защитный код|@|Code';
$smsg[13]='Ви зайшли як|@|Вы вошли как|@|Logged in as';
$smsg[14]='Вихід|@|Выход|@|Exit';
$smsg[15]='Редагувати|@|Редактировать|@|Edit';
$smsg[16]='Видалити|@|Удалить|@|Delete';
$smsg[17]='Email|@|Email|@|Email';




			

			
			
			$dsn = 'mysql:dbname=stest;host=localhost;';
			
			$dsn .= 'dbport=3306;';
			
			$dsn .= 'charset=utf8;';

			$login='root';
			$passwd='';

			try {
			    $pdo = new PDO($dsn, $login, $passwd);
			    $pdo -> setAttribute(PDO :: ATTR_DEFAULT_FETCH_MODE, PDO :: FETCH_ASSOC); 
			} catch (PDOException $e) {
			    echo $e -> getMessage();
			}
	
		function del_script($str) 
	{
		$str = strip_tags ($str); // Удаление HTML и PHP ;
		$str = preg_replace ('#<script[^>]*>.*?</script>#is', '', $str); // Удаление JS ;
		$str = htmlspecialchars ($str); // Замена всех спецсимволов на еквиваленты.
		return $str;
	} 

	//function db_close()
	 //{
		// mysql_close();
	 //}
/*
//Видалення скриптів	
	function del_script($str) 
	{
		$str = strip_tags ($str); // Удаление HTML и PHP ;
		$str = preg_replace ('#<script[^>]*>.*?</script>#is', '', $str); // Удаление JS ;
		$str = htmlspecialchars ($str); // Замена всех спецсимволов на еквиваленты.
		return $str;
	} 

//Виконнання запиту.
	function db_query($sql,$array=array())
 	{

		$stmt  = $dbh -> prepare("$sql;");
		$stmt -> execute($array); 
		ruturn $stmt;
	}	
	
//Перевырка на наявність елемента в базі.	 
	function db_search1($table,$colum,$row)
 	{
 		$array = array($colum,$table,$colum,$row);
		$row=$this->del_script($row);	
		$sql="SELECT ? FROM ? WHERE ?='?'";
		$res=$this->db_query($sql, $array);
			if ($res->fetchAll(PDO :: FETCH_ASSOC))
				return true;
				return false;
	}
	
/*Перевырка на наявність в базі.	 
	function db_search2($sql,$array)
 	{
		$res=$this->db_query($sql);
			if (mysql_num_rows($res))
				return true;
				return false;
	} 
//Повертає масив	
	function db_select($sql, $array)
	 {
		$stmt  = global $dbh -> prepare("$sql;");
		$stmt -> execute($array); 
		$res=$stmt->fetchAll(PDO :: FETCH_ASSOC);
		ruturn $res;
		
	 }
	
//Видалення елемента;
	function db_del($table, $colum, $row)
	 {
	 	$array = array($table,$colum,$row);
		$sql="DELETE FROM $table WHERE $colum='$row'";
		$this->db_query($sql,$array);
		return true;	
	 }
 
	function db_close()
	 {
		 mysql_close();
	 }
	 

*/
?>