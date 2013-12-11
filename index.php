<?php
session_start();
define( '_TSTINC', 1 );
	  if (!isset($_SESSION['page'])) $_SESSION['page'] = 1;
	  if (!isset($_SESSION['role'])) $_SESSION['role'] = 'guest';
	  include ('block/start.php'); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; content="no-cache" ccharset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css">
<title><?php echo translt($smsg[1]); ?></title>
</head>
<body>

<div id="content" >
  <table id="ctable" width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td height="57" align="right">
     <table width="900px" border="0" cellspacing="0" cellpadding="0" id="topmenu">
        <tr>
          <td width="700px" >
		<?php
		if (!isset($_SESSION['login']))
			include('block/login_form.php');
		else
			include('block/user_menu.php');
		?>
          </td>
          <td> 
          <?php     
			include('block/leng_menu.php');
		  ?>
          </td>
        </tr>
      </table>

      </td>
    </tr>
      <tr>
      <td height="55" align="center" style="color:#900; font-size:14px" >
	  <?php 
	  if (isset($_SESSION['error'])) 
	   echo '<div id="error">'.$_SESSION['error'].'</div>';
	  $_SESSION['error']=NULL; 
	  ?></td>
    </tr>
    <tr>
      <td  valign="top">
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
      </td>
    </tr>
  </table>
</div> 
</body>
</html>