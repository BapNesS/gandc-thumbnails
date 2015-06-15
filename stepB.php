<!DOCTYPE html>
<html lang="fr-FR" prefix="og: http://ogp.me/ns#">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <title>GandC - THumbnails</title>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="./bower_components/materialize/dist/js/materialize.min.js"></script>

    <!-- On fait une partie du job ici -->
    <script type="text/javascript" src="./js/scripts.js"></script>

    <!-- Sympa cette font -->
    <link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css' />
    
    <!-- On a le style -->
    <!-- Import materialize.css -->
    <link type="text/css" rel="stylesheet" href="./bower_components/materialize/dist/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="./css/main.css"></link>

    <!-- Merci Google Analytics pour les stats -->
    <!-- Mais pas commité -->
</head>
<body>

<nav>
  <div class="nav-wrapper blue-grey darken-3">
    <a href="/" class="brand-logo center">GandC Thumbnails</a>
  </div>
</nav>

<?php
// Problème
if ( isset($_GET["err"]) || !isset($_GET["youtubeId"] ) ) {
?>
<div class="container">
  <div class="section">
    <h3 class="secondFont">Ooops…</h3>
      <p>Une erreur s'est produite.</p>
      <p>Veuillez contacter l'administrateur.</p>
  </div>
</div>
    
<?php
// Ici c'est cool
} else if ( isset($_GET["youtubeId"] ) ) {
?>
<div class="container">
  <div class="section">
    <h3 class="secondFont">Étape n°2/3</h3>
      <p>Ajout d'un overlay.</p>
  </div>
  <div class="section">
   <div class="row">
      <form id="formStepB" action="stepBtoC.php" method="post" class="col s12">
        <div class="row">
          <div class="col s6">
            <p class="grey-text">ID (YouTube ou fichier) : <?php echo $_GET["youtubeId"]; ?>.</p>
          </div>
          <div class="col s6">
            <select class="browser-default" id="overlaySelect" name="overlaySelect">
              <option value="" disabled selected>Choisir un overlay</option>
              <option value="CatA">CatAa</option>
              <option value="CatB">CatBb</option>
              <option value="CatC">CatCc</option>
              <option value="CatD">CatDd</option>
              <option value="CatE">CatEe</option>
              <option value="CatF">CatFf</option>
              <option value="CatG">CatGg</option>
              <option value="CatH">CatHh</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col s6">
            <input id="youtubeId" name="youtubeId" type="hidden" value="<?php echo $_GET["youtubeId"]; ?>" class="validate">
            <img class="materialboxed fullWidth" src="./youtubePictures/<?php echo $_GET["youtubeId"]; ?>.jpg" />
          </div>
          <div class="col s6">
            <img class="materialboxed fullWidth" id="overlayPreview" />
          </div>
        </div>
      </form>
    </div>
       <div class="row" id="largePreview">
          <div class="col s12">
            <h3 class="secondFont">Prévisulasation</h3>
              <p>Cela reste approximatif mais voici le résultat probable :</p>
            <img class="materialboxed" id="overlayPreviewLarge" style="background-image: url('./youtubePictures/<?php echo $_GET["youtubeId"]; ?>.jpg');"/>
              <br/>
             <a class="waves-effect waves-light btn-large blue right" id="goToStepCBtn">Valider</a>
          </div>
       </div>
  </div>
</div>

<?php } ?>

<footer class="page-footer blue-grey darken-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m6">
        <h5 class="white-text">À propos</h5>
        <p class="grey-text text-lighten-4">Outil pour fabriquer des minitures à partir de YouTube.</p>
      </div>
      <div class="col m4 offset-m2 s12">
        <h5 class="white-text">Outils</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="https://github.com/BapNesS/gandc-thumbnails" target="_blank">GitHub</a></li>
          <li><a class="grey-text text-lighten-3" href="http://materializecss.com/" target="_blank">MaterializeCSS</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    Par <a href="http://www.baptistecarlier.com" target="_blank" class="white-text">Baptiste Carlier</a>
    <a class="grey-text text-lighten-4 right" href="http://www.twitter.com/bapness">@bapness</a>
    </div>
  </div>
</footer>

</body>
</html>
