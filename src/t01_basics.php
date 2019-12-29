<?php

require_once 'vendor/autoload.php';

use PHPImageWorkshop\ImageWorkshop;

$dogLayer = ImageWorkshop::initFromPath(__DIR__.'\images\larva-dog.jpg');

$dogLayer->applyFilter(IMG_FILTER_CONTRAST, -65, null, null, null, true); // constrast
$dogLayer->applyFilter(IMG_FILTER_BRIGHTNESS, 80, null, null, null, true); // brightness

// Saving / showing...
$dogLayer->save(__DIR__.'/output/', 'doggy.jpg', true, null, 95);
