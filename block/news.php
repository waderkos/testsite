
<?php defined('_TSTINC') or header("Location: index.php"); 
//
//Обмеження на кількість слів

function limit_words($string, $word_limit) {
	if (strlen($string)>$word_limit)
	{
	$string=substr($string,0,$word_limit*2);
	$words=explode(" ",$string);
	$delelem=count ($words)-1;
	$words[$delelem]='';
	$str=implode(" ",array_splice($words,0,$word_limit)).'...';
	}
	else
	$str=$string;
	return $str;
}

$num = 10;
if (!isset($_GET['page'])) $_GET['page']=1;
$page = $_GET['page'];


$query=$pdo->query("SELECT id FROM news;");
$posts=$query->rowCount();

// Находим общее число страниц
$total = (int)(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная c какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start

$array_news = array($start, $num);

if (is_numeric($start) and is_numeric($num))
$sql_news = "SELECT id, title, text, autor, data FROM news ORDER BY id DESC LIMIT $start, $num";

$query_news=$pdo->prepare($sql_news);
$query_news->execute();

//print_r($array_news);
// В цикле переносим результаты запроса в массив $postrow
while ($postrow = $query_news -> fetch())
{
echo '<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px;">
	  <tr>
		<td bgcolor="#eef"><h4> <a href="page.php?post='.$postrow['id'].'"> '.translt($postrow['title']).' </a></h4></td>
	  </tr>
	  <tr>
		<td style="text-align:justify;">'.limit_words(translt($postrow['text']),150).' <a href="page.php?post='.$postrow['id'].'"><b>'.translt($smsg[8]).'</b></a>';





if ($_SESSION['role']=='Admin')
echo'<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><form id="form2" name="form2" method="post" action="page.php">
  <input type="hidden" name="edit" value="'.$postrow['id'].'"/>
  <input type="submit" name="reg" id="reg" value="'.translt($smsg[15]).'" />
	</form></td>
    <td><form id="form3" name="form3" method="post" action="page.php">
  <input type="hidden" name="del" value="'.$postrow['id'].'"/>
  <input type="submit" name="go" id="del" value="'.translt($smsg[16]).'" />
	</form></td>
  </tr>
</table>';

echo'<table width="880" border="0" cellspacing="0" cellpadding="0" class="ltext">
  <tr>
    <td>
  		'.$postrow['data'].'
	</td>
    <td align="right">
    	'.$postrow['autor'].'
    </td>
  </tr>
</table>';

echo'</td>
	  </tr>
	</table><br><br>';	
	//}
}
?>
<table align="center">
	<tr>
		<td style="text-align:center;">
			<?php
// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=index.php?page=1><<</a>
                               <a href= ./page?page='. ($page - 1) .'><</a> '; else $pervpage ='';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' <a href=index.php?page='. ($page + 1) .'>></a>
                                   <a href=index.php?page=' .$total. '>>></a>'; else $nextpage ='';
if ($page ==1) $page ='';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 2 > 0) $page2left = ' <a href=index.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | '; else $page2left ='';
if($page - 1 > 0) $page1left = '<a href=index.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';	 else $page1left ='';
if($page + 2 <= $total) $page2right = '  <a href=index.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; else $page2right ='';
if($page + 1 <= $total) $page1right = '  <a href=index.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; else $page1right ='';

// Вывод меню
echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage;

?>
</td>
</tr>
</table>
