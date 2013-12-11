<?php defined('_TSTINC') or header("Location: index.php"); 
	if (isset($_SESSION['edit']))
	{	
		//$edit= new db('stest');
		$sql_add = "SELECT id, title, text, autor FROM  news WHERE id=:id";
      $query_add=$pdo->prepare($sql_add);
      $query_add->bindParam(':id', $_SESSION['edit'], PDO::PARAM_INT);
      $query_add->execute();
		  $res = $query_add->fetch();

		$title = translt($res['title']);
		$text = translt($res['text']);
	}
	else { $title =''; $text='';}
?>
<form name="form1" method="post" action="test_new_add.php" id="newsForm">
  <table width="500" border="0" cellspacing="5" cellpadding="5" align="center">
      <tr>
      <td align="center" height="110">
      </td>
    </tr>
    <tr>
      <td align="center"><label for="textfield"><?php echo translt($smsg[2]); ?></label><br>
      <input name="title" type="text" id="textfield" value="<?php echo $title; ?>" ></td>
    </tr>
    <tr>
      <td align="center"><label for="text"><?php echo translt($smsg[3]); ?></label><br>
      <textarea name="text" id="text" cols="40" rows="10" ><?php echo $text; ?></textarea>
      <input type="hidden" name="ids" value="<?php echo session_id(); ?>" />
      </td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="go" id="go" value="<?php echo translt($smsg[4]); ?>"></td>
    </tr>
  </table>
</form>
