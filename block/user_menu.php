<?php defined('_TSTINC') or header("Location: index.php"); ?>
<?php echo translt($smsg[13]).' <b> '.$_SESSION['login'].'</b>'; ?>
<br>AVATARA
<br>
      <?php
      	if ($_SESSION['role']=='Admin')
          echo '<a href="page.php?page=3">Добавити новину</a>' ;
    	?>
<br><a href="page.php?page=4" >Setings</a>
<br><a href="page.php?page=4" ><?php echo translt($smsg[14]); ?> </a>

