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
    <h3 class="secondFont">Étape n°3/3</h3>
      <p>Ajout d'un texte au dessus si nécessaire.</p>
  </div>
  <div class="section">
   <div class="row">
      <form id="formStepC" action="stepCtoD.php" method="post" class="col s12">
        <div class="row">
          <div class="col s6">
            <p class="grey-text">Youtube ID : <?php echo $_GET["youtubeId"]; ?>.</p>
            <input id="youtubeId" name="youtubeId" type="hidden" value="<?php echo $_GET["youtubeId"]; ?>" class="validate">
            <img class="materialboxed fullWidth" src="./youtubePictures/<?php echo $_GET["youtubeId"]; ?>_overlayed.jpg" />
          </div>
          <div class="col s6">
              
            <div class="input-field">
              <input id="textContent" type="text" class="validate">
              <label for="textContent">Texte supplémentaire</label>
            </div>
            <div class="input-field">
              <input id="color" type="text" class="validate">
              <label for="color">Couleur (format RRVVBB en hexa sans dièse)</label>
            </div>
            <p>Taille de la police :</p>
            <p class="range-field">
              <input type="range" id="fontSize" value="40" min="0" max="50" />
            </p>
              <p>Position :</p>
            <select class="browser-default" id="textPosition" name="textPosition">
              <option value="LT">En haut à gauche</option>
              <option value="MT">En haut au centre</option>
              <option value="RT">En haut à droite</option>
              <option value="LM">Au milieu à gauche</option>
              <option value="MM">Au milieu au centre</option>
              <option value="RM">Au milieu à droite</option>
              <option value="LB">En bas à gauche</option>
              <option value="MB">En bas au centre</option>
              <option value="RB">En bas à droite</option>
            </select>
            <p>Marge horizontale :</p>
            <p class="range-field">
              <input type="range" id="marginX" value="0" min="0" max="1080" />
            </p>
            <p>Marge vertical :</p>
            <p class="range-field">
              <input type="range" id="marginY" value="0" min="0" max="720" />
            </p>
              <br/>
             <a class="waves-effect waves-light btn-large blue right" id="goToRenderBtn">Effectuer le rendu</a>
          </div>
        </div>
      </form>
    </div>
       <div class="row" id="renderSection">
          <div class="col s12">
            <h3 class="secondFont">Rendu final :</h3>
              <p><em>Alors heureux ?</em></p>
            <img class="materialboxed fullWidth" id="renderLarge"/>
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
