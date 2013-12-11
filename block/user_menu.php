<?php defined('_TSTINC') or header("Location: index.php"); ?>
<table width="500px;" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;">
  <tr>
    <td width="150px;" height="25" valign="top"><?php echo translt($smsg[13]).' <b> '.$_SESSION['login'].'</b>'; ?></td>
    <td rowspan="2"  width="100px;" align="right" valign="bottom">
    <a href="page.php?page=1"><img src="images/homepage.png" title="Домашня сторінка"></a>
    </td>
    <td rowspan="2"  height="25" align="right" valign="bottom">
    <?php
	if ($_SESSION['role']=='Admin')
    echo '<a href="page.php?page=3"><img src="images/news_add.png" title="Добавити новину"></a>' ;
	?>
    </td>
  </tr>
  <tr>
    <td><a href="page.php?page=4" ><?php echo translt($smsg[14]); ?> </a></td>
  </tr>
</table>
