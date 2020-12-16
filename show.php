<?php
// (A) OPEN IMAGE
$img = imagecreatefromjpeg('bg.jpg');

// (B) WRITE TEXT
$black = imagecolorallocate($img, 0, 0, 0);
// The text to draw
require('./I18N/Arabic.php'); 
$Arabic = new I18N_Arabic('Glyphs'); 
$font = "HelveticaNeueLTW20-Bold.ttf";
$name=$_POST['name'];
$state=$_POST['state'];
$txt = $Arabic->utf8Glyphs($name . "\n" . $state."          ");


imagettftext($img, 24, 0, 600, 1000, $black, $font, $txt);

// (C) OUTPUT IMAGE
header('Content-type: image/jpeg');
// imagejpeg($img);
imagejpeg($img);
imagedestroy($img);

// OR SAVE TO A FILE
// THE LAST PARAMETER IS THE QUALITY FROM 0 to 100
// imagejpeg($img, "test.jpg", 100);