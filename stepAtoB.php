<?php
if( isset($_POST["youtubeId"]) ){

    $youtubeId = trim($_POST["youtubeId"]);
    if ( 1 == preg_match_all("/^([a-zA-Z0-9_-]*)$/", $youtubeId) && $youtubeId != "" ) {
        $ch = curl_init('http://img.youtube.com/vi/'.$youtubeId.'/maxresdefault.jpg');
        $fp = fopen('youtubePictures/'.$youtubeId.'.jpg', 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
    
    header("Location:stepB.php?youtubeId=".$youtubeId);
    
}
else{
    header("Location:stepB.php?err=fail");
}

?>