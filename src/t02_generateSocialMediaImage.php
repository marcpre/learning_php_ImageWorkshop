<?php

require_once 'vendor/autoload.php';

use PHPImageWorkshop\ImageWorkshop;

$layer = ImageWorkshop::initFromPath(__DIR__.'\images\bank.jpg');

$layer->applyFilter(IMG_FILTER_CONTRAST, 40, null, null, null, true); // constrast
$layer->applyFilter(IMG_FILTER_BRIGHTNESS, 10, null, null, null, true); // brightness

// apply text
$text = "This is a test text";
$date = date("Y-m-d");

$font = __DIR__.'\fonts\Montserrat-Bold.ttf'; // Internal font number (http://php.net/manual/en/function.imagestring.php)
$size = 100;
$color = "ffffff";
$align = "center";
$width = $layer->getWidth(); // in pixel
$height = $layer->getHeight(); //
$positionX = intval($width / 2);
$positionY = intval($height / 2);

// $layer->writeText($text, $font, $size, $color, $positionX, $positionY, $align);
$textLayer = ImageWorkshop::initTextLayer($text, $font, $size, $color, 0, 0);
$layer->addLayer(1, $textLayer, 0, 0, 'MM');


// Saving / showing...
$layer->save(__DIR__.'/output/', 'bank.jpg', true, null, 95);
