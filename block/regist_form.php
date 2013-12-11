<?php defined('_TSTINC') or header("Location: index.php"); ?>
<form name="form1" method="post" action="test_registinfo.php">
  <table width="500px" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px;">
    <tr>
      <td width="50" height="50">&nbsp;</td>
      <td width="150">&nbsp;</td>
      <td>&nbsp;</td>
      <td width="50" height="50">&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td valign="middle"><?php echo translt($smsg[9]); ?></td>
      <td valign="middle"><label for="login"></label>
      <input type="text" name="login" id="login"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td valign="middle"><?php echo translt($smsg[17]); ?></td>
      <td valign="middle"><label for="email"></label>
      <input type="text" name="email" id="email"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td valign="middle"><?php echo translt($smsg[10]); ?></td>
      <td valign="middle"><label for="pass1"></label>
      <input type="password" name="pass1" id="pass1"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td valign="middle"><?php echo translt($smsg[11]); ?></td>
      <td valign="middle"><label for="pass2"></label>
      <input type="password" name="pass2" id="pass2"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td valign="middle"><?php echo translt($smsg[12]); ?></td>
      <td valign="middle">     
      <label for="capcha"></label>
      <input type="text" name="captcha" id="captcha">
      <input type="hidden" name="ids" value="<?php echo session_id(); ?>" />
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td>&nbsp;</td>
      <td><img align="absmiddle" src="captcha.php?a=image" style="border:1px solid #96A6C5;"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="50" height="50">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="left"><input type="submit" name="reg" id="reg" value="<?php echo translt($smsg[6]); ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="100">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
