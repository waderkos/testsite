
<?php defined('_TSTINC') or header("Location: index.php");

$id=$_SESSION['post'];
$sql_new = "SELECT * FROM news WHERE id=:id";

$query_new=$pdo->prepare($sql_new);
$query_new->execute(array(":id" => "$id"));
$res_arr = $query_new -> fetch();


	
echo '<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px;">
	  <tr>
		<td bgcolor="#eef" style="font-size:12px;"><h4>'.translt($res_arr['title']).'</h4></td>
	  </tr>
	  <tr>
		<td style="text-align:justify;">'.translt($res_arr['text']).'<p><br><a href="page.php?page=1">'.translt($smsg[7]).'</a></p>';

if ($_SESSION['role']=='Admin')
echo'
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><br><form id="form2" name="form2" method="post" action="page.php">
  <input type="hidden" name="edit" value="'.$res_arr['id'].'"/>
  <input type="submit" name="reg" id="reg" value="'.translt($smsg[15]).'" />
	</form></td>
    <td><br><form id="form3" name="form3" method="post" action="page.php">
  <input type="hidden" name="del" value="'.$res_arr['id'].'"/>
  <input type="submit" name="go" id="del" value="'.translt($smsg[16]).'" />
	</form></td>
  </tr>
</table>';
			
echo'</td>
	  </tr>
	  </table>';
?>