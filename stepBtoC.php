<?php
//ini_set('memory_limit', '16M');

if(isset($_POST["overlaySelect"]) && isset($_POST["youtubeId"])){

    $overlaySelect = trim($_POST["overlaySelect"]);
    $youtubeId = trim($_POST["youtubeId"]);
}
else{
    header("Location:stepC.php?err=fail");
}


use PHPImageWorkshop\ImageWorkshop as ImageWorkshop;
require_once(__DIR__.'/load-Sybio-ImageWorkshop.php');

/* init */
$firstPath = '/images/overlays/'.$overlaySelect.'-h720.png';
$secondPath = '/youtubePictures/'.$youtubeId.'.jpg';
$lastPath = '/youtubePictures/'.$youtubeId.'_overlayed.jpg';

$pinguLayer = ImageWorkshop::initFromPath(__DIR__.$firstPath);
$pinguLayer->resizeInPixel(1280, 720, true);
$wwfLogoLayer = ImageWorkshop::initFromPath(__DIR__.$secondPath);
$wwfLogoLayer->addLayerOnTop($pinguLayer, 0, 0, 'LB');
unset($pinguLayer);
$wwfLogoLayer->resizeInPixel(1280, 720, true);
 
$wwfLogoLayer->save(__DIR__, $lastPath, false, null, 100);

header("Location:stepC.php?youtubeId=".$youtubeId);

?>