<?
$num = $_GET['num'];
// Create a 100*30 image
$im = imagecreate(15, 15);
// White background and red text
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 47, 47, 79);

// Write the string at the top left
imagestring($im, 3, 0, 0, $num, $textcolor);

header('Content-type: image/png');
imagepng($im); 
imagedestroy($im); 
?>