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
if($name==''||$state==''){
    die('كل الحقول مطلوبة');
}
$txt = $Arabic->utf8Glyphs($name . "\n" . $state."          ");

imagettftext($img, 24, 0, 600, 1000, $black, $font, $txt);
$nameFile = time().'.jpg';
// (C) OUTPUT IMAGE

// header('Content-type: image/jpeg');


// imagejpeg($img);
imagejpeg($img, $nameFile);
imagedestroy($img);
// header('Content-Disposition: attachment; filename='.$nameFile); 
echo '
<html style="height: 100%">
    <head>
        <meta name="viewport" content="width=device-width, minimum-scale=0.1" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body style="font-size:22px;margin: 0px; background: #0e0e0e; height: 100%">
        <img style="-webkit-user-select: none; margin: auto;width: 100%" src="'. $nameFile .'" />
        <a download="'. $nameFile .'" href="'. $nameFile .'">نزل النسخة</a>
    </body>
</html>
';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'connection.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$link->set_charset("utf8");
// Attempt insert query execution
$sql = "INSERT INTO persons (name, state) VALUES ('$name', '$state')";
if(mysqli_query($link, $sql)){
    echo "";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

