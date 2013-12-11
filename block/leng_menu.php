<?php defined('_TSTINC') or header("Location: index.php"); 
$l_number = 0;
//include ('block/start.php');
//	$lengs = new db('stest');
		$sql = "SELECT id, sleng, leng FROM  leng";	
		$query=$pdo->prepare($sql);
		$query->execute();
		
		echo '<div id="nav" align="right"> <ul >'; 		 
while($resl_arr = $query -> fetch())	
  {
	if ($resl_arr['id']==$_SESSION['leng'])         		
	  echo '<li><a style="background-color:#dde;" href="leng.php?leng='.$resl_arr['id'].'">'.$resl_arr['sleng'].'</a></li>';
	else
	  echo '<li><a href="leng.php?leng='.$resl_arr['id'].'">'.$resl_arr['sleng'].'</a></li>';
	$l_number++;
  }
	  echo     '</ul></div>';  
	  $_SESSION['l_number']=$l_number;
?>