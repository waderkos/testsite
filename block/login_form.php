<?php defined('_TSTINC') or header("Location: index.php"); ?>
          <ul id="regForm">
            <li>
            <form id="form1" name="form1" method="post" action="test_login.php">
            <input type="text" name="login" id="login" />
            </li><li>
            <input type="password" name="pass" id="pass" />
            </li><li>
            <input type="submit" name="go" id="go" value="<?php echo translt($smsg[5]); ?>" />
            <input type="hidden" name="ids" value="<?php echo session_id(); ?>" />
            </form>
            </li><li>
            <form id="form2" name="form1" method="post" action="page.php">
            <input type="submit" name="go" id="go" value="<?php echo translt($smsg[6]); ?>" />
            <input type="hidden" name="page" value="2" />
            </form>
            </li><li style="padding-left:30px;">
            <a href="page.php?page=1"><img src="images/homepage.png" title="Домашня сторінка"></a>
            </li>
           </ul>