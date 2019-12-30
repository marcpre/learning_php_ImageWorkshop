<?php

require_once 'vendor/autoload.php';

use PHPImageWorkshop\ImageWorkshop;

$layer = ImageWorkshop::initFromPath(__DIR__.'\images\bank.jpg');

$layer->applyFilter(IMG_FILTER_CONTRAST, 40, null, null, null, true); // constrast
$layer->applyFilter(IMG_FILTER_BRIGHTNESS, 10, null, null, null, true); // brightness

// apply text
$text = "This is a test text";
$date = date("Y-m-d");

$font = 5; // Internal font number (http://php.net/manual/en/function.imagestring.php)
$color = "ffffff";
$positionX = 0;
$positionY = 0;
$align = "horizontal";

$layer->writeText($text, $font, $color, $positionX, $positionY, $align);

// Saving / showing...
$layer->save(__DIR__.'/output/', 'bank.jpg', true, null, 95);
