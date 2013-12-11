<?php
//defined('_INCLUDE') or header("Location: ../index.php");
// CAPTCA
session_start();
$_SESSION['codd'] = substr(md5(uniqid("")),0,4);
if (isset($_GET['a']))
{
		$im = @imagecreate (100, 25) or die ("Бібліотека GD не підключена");
		$bg = imagecolorallocate ($im, 232, 238, 247);
		$char = $_SESSION['codd'];//substr(md5(uniqid("")),0,4);//

		
// Створення фону	
// Створення  випадкових ліній	
		for ($i=0; $i<=20; $i++) 
		{
			$color = imagecolorallocate ($im, rand(140,255), rand(140,255), rand(140,255)); 
			imageline($im, rand(2,100), rand(2,20), rand(2,100), rand(2,20), $color); 
		}
// Створення  випадкових точок
		for ($i=0; $i<=200; $i++) {
			$color = imagecolorallocate ($im, rand(0,255), rand(0,255), rand(0,255)); 
			imagesetpixel($im, rand(2,100), rand(2,20), $color); 
		}
// Створення  тексту		
		for ($i = 0; $i < strlen($char); $i++) {
			$color = imagecolorallocate ($im, rand(0,200), rand(0,128), rand(0,200));
			$x = 5 + $i * 25;
			$y = rand(1, 6);
			imagechar ($im, 5, $x, $y, $char[$i], $color);
		}


		header("Cache-Control: no-store, no-cache, must-revalidate");
		
		if (function_exists("imagepng")) {
		   header("Content-type: image/png");
		   imagepng($im);
		} elseif (function_exists("imagegif")) {
		   header("Content-type: image/gif");
		   imagegif($im);
		} elseif (function_exists("imagejpeg")) {
		   header("Content-type: image/jpeg");
		   imagejpeg($im);
		} else {
		   die("No image support in this PHP server!");
		}
		imagedestroy ($im);
		
		//echo '<img align="absmiddle" src="captcha.php?a=image" style="padding-bottom:4px;">';
}

?>