<?php
define( '_TSTINC', 1 );
session_start();
if (!isset($_SESSION['edit']))
{
	if (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['ids']==session_id()) and ($_SESSION['role']='Admin'))
	{
		include ('block/start.php');
		//$addnew = new db('stest');
		$title=del_script($_POST['title']);
		$text=del_script($_POST['text']);
		$user=$_SESSION['login'];
		$data=date('d-m-Y');
		
	//	multleng($text, $table, $colum, $id=0)
		
		$sql_tst_new="INSERT INTO `news` (`title`, `text`, `autor`, `data`) VALUES (:title, :text, :autor, :data)";
		$array=array($title,$text,$user,$data);
		$query_tst_new=$pdo->prepare($sql_tst_new);
		$query_tst_new->bindParam(':title', $title, PDO::PARAM_STR);
		$query_tst_new->bindParam(':text', $text, PDO::PARAM_STR);
		$query_tst_new->bindParam(':autor', $user, PDO::PARAM_STR);
		$query_tst_new->bindParam(':data', $data, PDO::PARAM_STR);
		$query_tst_new->execute();

		$idp=$pdo->lastInsertId();
		header("Location: page.php?post=$idp");
		$addnew->db_close();
		exit;	
	}
}
else
if (($_SERVER['REQUEST_METHOD'] == 'POST') and ($_POST['ids']==session_id()) and ($_SESSION['role']='Admin'))
	{
		include ('block/start.php');
		//$addnew = new db('stest');
		
	$id=$_SESSION['edit'];
	$title=del_script($_POST['title']);
	$text=del_script($_POST['text']);
	$data=date('d-m-Y');
		
	$title=multleng($_POST["title"],'news','title',$id);
	$text=multleng($_POST["text"],'news','text',$id);
	
	$sql_tst_new="UPDATE `news` SET `title` = :title, `text` = :text, `data` = :data WHERE id=:id";
		$array=array($title,$text,$user,$data);
		$query_tst_new=$pdo->prepare($sql_tst_new);
		$query_tst_new->bindParam(':title', $title, PDO::PARAM_STR);
		$query_tst_new->bindParam(':text', $text, PDO::PARAM_STR);
		$query_tst_new->bindParam(':id', $id, PDO::PARAM_STR);
		$query_tst_new->bindParam(':data', $data, PDO::PARAM_STR);
		$query_tst_new->execute();
	$_SESSION["edit"]=NULL;	
	$_SESSION['page']=1;	
	}
header("Location: index.php");
?>