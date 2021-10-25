<?php 
    session_start();
    $random_number=rand(1000,9999);
    $_SESSION['random_number']=md5($random_number);
    $im=imagecreatetruecolor(100,38);
    $white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
    imagefilledrectangle($im, 0, 0, 200, 35, $black);
    
