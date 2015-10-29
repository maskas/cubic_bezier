<?php

require('bezier_functions.php');
$image = imagecreatetruecolor(1000, 200);
$color = imagecolorallocate($image, 0, 0, 0);
$bgColor = imagecolorallocatealpha($image, 255, 255, 255, 127);
imagefill($image, 0, 0, $bgColor);


imagesavealpha($image, true);
$bgColor = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $bgColor);

Bezier_drawfilled($image, [0, 0], [100, 0], [800, 200], [1000, 200], $color);

header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
