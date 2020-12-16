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

// (C) OUTPUT IMAGE
header('Content-type: image/jpeg');
// imagejpeg($img);
imagejpeg($img);
imagedestroy($img);

// OR SAVE TO A FILE
// THE LAST PARAMETER IS THE QUALITY FROM 0 to 100
// imagejpeg($img, "test.jpg", 100);

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
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
