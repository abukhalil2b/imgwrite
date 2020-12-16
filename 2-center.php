<?php
// (A) OPEN IMAGE
$img = imagecreatefromjpeg('bg.jpg');
require('./I18N/Arabic.php'); 
$Arabic = new I18N_Arabic('Glyphs'); 
$font = "HelveticaNeueLTW20-Bold.ttf";
$name=$_POST['name'];
$state=$_POST['state'];
$txt = $Arabic->utf8Glyphs($name . "\n" . $state."                      ");

// (B) WRITE TEXT
$black = imagecolorallocate($img, 0, 0, 0);

// THE IMAGE SIZE
$width = imagesx($img);
$height = imagesy($img);

// THE TEXT SIZE
$text_size = imagettfbbox(24, 0, $font, $txt);
$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

// CENTERING THE TEXT BLOCK
$centerX = CEIL(($width - $text_width) / 2);
$centerX = $centerX < 0 ? 0 : $centerX;
$centerY = CEIL(($height - $text_height) / 2);
$centerY = $centerY < 0 ? 0 : $centerY;
imagettftext($img, 24, 0, $centerX, 1000, $black, $font, $txt);

// (C) OUTPUT IMAGE
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($jpg_image);