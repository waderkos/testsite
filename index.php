<?php
session_start();
define( '_TSTINC', 1 );
	  if (!isset($_SESSION['page'])) $_SESSION['page'] = 1;
	  if (!isset($_SESSION['role'])) $_SESSION['role'] = 'guest';
	  include ('block/start.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Тестовий сайт</title>
<meta http-equiv="Content-Type" content="text/html; content="no-cache" ccharset=utf-8" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
</head>
<body>

<div id="wrap">
  <div id="header_top">


    <h1 id="logo"><a href="index.php" title="Conceptnova">Mysite<span class="grey">.com</span></a></h1>


		  <?php     
			include('block/leng_menu.php');
		  ?>

    <div id="slogan">

      

    </div>

  </div>

  <div id="header_bottom">
    <h2>Site title</h2>
    <p>bla-bla-bla site</p>
  </div>
  <div id="maincontent">
    <div id="left">

    	<p><?php 
	  if (isset($_SESSION['error'])) 
	   echo '<div id="error">'.$_SESSION['error'].'</div>';
	  $_SESSION['error']=NULL; 
	  ?></p>

      <?php
	  $page=$_SESSION['page'];
		switch ($page) 
		{
			case 1:
	  			include ('block/news.php');
    		break;
			case 2:
	  			include ('block/regist_form.php');
    		break;
			case 3:
	  			include ('block/add_new_form.php');
    		break;
			case 4:
	  			session_destroy();
				header("Location: index.php");
    		break;
			case 5:
	  			include ('block/new.php');
    		break;
			case 6:
	  			include ('block/del.php');
    		break;
		}

	  ?>

    </div>
    <div id="right">
     
      <div id="info">

      	<?php
			if (!isset($_SESSION['login']))
				include('block/login_form.php');
			else
				include('block/user_menu.php');
		?>

	  </div>
     
      
    </div>
  </div>
  <div id="footer">
footer
  </div></body></html>