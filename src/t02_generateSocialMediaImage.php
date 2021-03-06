<?php

require_once 'vendor/autoload.php';

use PHPImageWorkshop\ImageWorkshop;

/**
 * Add text to image *
 * @param $text
 * @param $font
 * @param $size
 * @param $color
 * @param int $positionX
 * @param int $positionY
 * @param string $position
 * @param \PHPImageWorkshop\Core\ImageWorkshopLayer $layer
 */
function addTextToImage($text, $font, $size, $color, $positionX = 0, $positionY = 0, $position = 'MM', $textRotation = 0, $backgroundColor = 0, \PHPImageWorkshop\Core\ImageWorkshopLayer $layer)
{
    $textLayer = ImageWorkshop::initTextLayer($text, $font, $size, $color, $textRotation, $backgroundColor);
    // MM is Middle middle: https://phpimageworkshop.com/doc/22/corners-positions-schema-of-an-image.html
    $layer->addLayer(1, $textLayer, $positionX, $positionY, $position);
}

$layer = ImageWorkshop::initFromPath(__DIR__.'\images\bank.jpg');

$layer->applyFilter(IMG_FILTER_CONTRAST, 40, null, null, null, true); // constrast
$layer->applyFilter(IMG_FILTER_BRIGHTNESS, 10, null, null, null, true); // brightness

// apply title
$text = "Caixin Manufacturing PMI";
$font = __DIR__.'\fonts\Prata-Regular.ttf'; // Internal font number (http://php.net/manual/en/function.imagestring.php)

// fontSize
$fontLayer = ImageWorkshop::initTextLayer($text, $font, 100, "", 0, 0);
// calculate font size based on 80% of image width
$fontSize = intval($layer->getWidth() * 0.80 * 100 / $fontLayer->getWidth());
addTextToImage($text, $font, $fontSize, "ffffff", 0, 0, 'MM', 0, 0, $layer);

// apply date
$date = date("F j, Y");
$font1 = __DIR__.'\fonts\Prata-Regular.ttf'; // Internal font number (http://php.net/manual/en/function.imagestring.php)
addTextToImage($date, $font1, $fontSize/2, "ffffff", 0, 100, 'MM', 0, 0, $layer);

// apply text: actual, forecast, previous
$textData = "Forecast: 51,7 | Previous: 52,8 | Actual: 100";
$font2 = __DIR__.'\fonts\Montserrat-Bold.ttf';
addTextToImage($textData, $font2, 35, "ffffff", 0, 180, 'MM', 0, "000000", $layer);


// Saving / showing...
$layer->save(__DIR__.'/output/', 'bank.jpg', true, null, 95);
