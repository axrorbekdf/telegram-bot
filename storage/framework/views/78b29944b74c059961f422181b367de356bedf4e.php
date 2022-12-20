
<?php
// Create a 300x150 image
$im = imagecreatetruecolor(350, 350);
$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);

// Set the background to be white
imagefilledrectangle($im, 0, 0, 350, 350, $white);

// Path to our font file
$font = '/font/verdana.ttf';



// Create the next bounding box for the second text
$bbox = imagettfbbox(20, 0, $font, 'TALABA.NET');

// Set the cordinates so its next to the first text
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Write it
imagettftext($im, 20, 0, $x, $y-100, $black, $font, 'TALABA.NET');



// Create the next bounding box for the second text
$bbox = imagettfbbox(15, 0, $font, 'Login: 465465465');

// Set the cordinates so its next to the first text
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Write it
imagettftext($im, 15, 0, $x, $y, $black, $font, 'Login: 465465465');




// Create the next bounding box for the second text
$bbox = imagettfbbox(15, 0, $font, 'Parol: 4654654');

// Set the cordinates so its next to the first text
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Write it
imagettftext($im, 15, 0, $x, $y+50, $black, $font, 'Parol: 4654654');



// Create the next bounding box for the second text
$bbox = imagettfbbox(15, 0, $font, 'Tarif: 4654654');

// Set the cordinates so its next to the first text
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Write it
imagettftext($im, 15, 0, $x, $y+150, $black, $font, 'Tarif: 4654654');



imagedashedline($im, 10, 10, 340, 10, $black);
imagedashedline($im, 10, 10, 10, 340, $black);
imagedashedline($im, 340, 10, 340, 340, $black);
imagedashedline($im, 10, 340, 340, 340, $black);

// Output to browser
header('Content-Type: image/png');

imagepng($im, 'vuacher/test.png');
imagedestroy($im);
?>

<?php /**PATH /var/www/biznesavtomat/data/www/biznesavtomat.uz/project/resources/views/vuacher/image-create.blade.php ENDPATH**/ ?>