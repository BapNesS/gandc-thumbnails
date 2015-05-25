<?php
//ini_set('memory_limit', '16M');

if(isset($_POST["fontSize"])
        && isset($_POST["youtubeId"])
        && isset($_POST["textPosition"])
        && isset($_POST["textContent"])
        && isset($_POST["color"])
        && isset($_POST["marginX"])
        && isset($_POST["marginY"]) ){

    $fontSize = trim($_POST["fontSize"]);
    $youtubeId = trim($_POST["youtubeId"]);
    $textPosition = trim($_POST["textPosition"]);
    $textContent = trim($_POST["textContent"]);
    $color = trim($_POST["color"]);
    $marginX = trim($_POST["marginX"]);
    $marginY = trim($_POST["marginY"]);
    
}
else{
    return "ko";
}

use PHPImageWorkshop\ImageWorkshop as ImageWorkshop;
require_once(__DIR__.'/load-Sybio-ImageWorkshop.php');

/* init */
$secondPath = '/youtubePictures/'.$youtubeId.'_overlayed.jpg';
$lastPath = '/youtubePictures/'.$youtubeId.'_final.jpg';

$wwfLogoLayer = ImageWorkshop::initFromPath(__DIR__.$secondPath);

// This is the text layer
$textLayer = ImageWorkshop::initTextLayer($textContent, __DIR__.'/Sybio-ImageWorkshop/res/fonts/Museo700-Regular.otf', $fontSize, $color, 0);
 
// We add the text layer 12px from the Left and 12px from the Bottom ("LB") of the norway layer:
$wwfLogoLayer->addLayerOnTop($textLayer, $marginX, $marginY, $textPosition);
 /* Fin test de texte */

$wwfLogoLayer->save(__DIR__, $lastPath, false, null, 100);
return "ok";
?>