<?php

$str=md5(microtime(true));

$str= substr($str,0,4);
session_start();

$_SESSION['captcha']=$str;

$img= imagecreate(100,50);

imagecolorallocate($img,255,255,255);

$text=imagecolorallocate($img,0,0,0);


imagestring($img,25,5,5,$str,$text);


header('Content-image/jpeg');
imagejpeg($img);











?>
