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
else if( isset($_FILES) ){

    /************************************************************
     * Definition des constantes / tableaux et variables
     *************************************************************/
    
    // Constantes
    define('TARGET', './youtubePictures/');    // Repertoire cible
    define('MAX_SIZE', 100000);    // Taille max en octets du fichier
    define('WIDTH_MAX', 1280);    // Largeur max de l'image en pixels
    define('HEIGHT_MAX', 720);    // Hauteur max de l'image en pixels

    // Tableaux de donnees
    $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
    $infosImg = array();

    // Variables
    $extension = '';
    $message = '';
    $nomImage = '';

    /************************************************************
     * Creation du repertoire cible si inexistant
     *************************************************************/
    if( !is_dir(TARGET) ) {
      if( !mkdir(TARGET, 0755) ) {
        exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
      }
    }

    /************************************************************
     * Script d'upload
     *************************************************************/
      // On verifie si le champ est rempli
      if( !empty($_FILES['file-0']['name']) )
      {
        // Recuperation de l'extension du fichier
        $extension  = pathinfo($_FILES['file-0']['name'], PATHINFO_EXTENSION);

        // On verifie l'extension du fichier
        if(in_array(strtolower($extension),$tabExt))
        {
          // On recupere les dimensions du fichier
          $infosImg = getimagesize($_FILES['file-0']['tmp_name']);

          // On verifie le type de l'image
          if($infosImg[2] >= 1 && $infosImg[2] <= 14)
          {
            // On verifie les dimensions et taille de l'image
            if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['file-0']['tmp_name']) <= MAX_SIZE))
            {
              // Parcours du tableau d'erreurs
              if(isset($_FILES['file-0']['error']) 
                && UPLOAD_ERR_OK === $_FILES['file-0']['error'])
              {
                // On renomme le fichier
                $justeLeNom = md5(uniqid());
                $nomImage = $justeLeNom .'.jpg';

                // Si c'est OK, on teste l'upload
                if(move_uploaded_file($_FILES['file-0']['tmp_name'], TARGET.$nomImage))
                {
                  $message = 'ok='.$justeLeNom;
                }
                else
                {
                  // Sinon on affiche une erreur systeme
                  $message = 'err=Problème lors de l\'upload !';
                }
              }
              else
              {
                $message = 'err=Une erreur interne a empêché l\'uplaod de l\'image';
              }
            }
            else
            {
              // Sinon erreur sur les dimensions et taille de l'image
              $message = 'err=Erreur dans les dimensions de l\'image !';
            }
          }
          else
          {
            // Sinon erreur sur le type de l'image
            $message = 'err=Le fichier à uploader n\'est pas une image !';
          }
        }
        else
        {
          // Sinon on affiche une erreur pour l'extension
          $message = 'err=L\'extension du fichier est incorrecte !';
        }
    }
    
    echo $message;

}
else{
    return "failed!";
    header("Location:stepB.php?err=fail");
}

?>