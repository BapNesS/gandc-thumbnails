$(document).ready(function(){

    // Step A
    $( "#previewBtn" ).bind("click", function() {
      $("#initialThumbnailPreview").attr("src", "http://img.youtube.com/vi/"+$("#youtubeId").val()+"/maxresdefault.jpg");
      $("#goToStepBBtn").show();
    });
    
    // Step A vers B
    $( "#goToStepBBtn" ).bind("click", function() {
      $("#formStepA").submit();
    });

    // Step B    
    $( "#overlaySelect" ).bind("change", function() {
      $("#overlayPreview").attr("src", "./images/overlays/"+$( "#overlaySelect" ).val()+"-h720.png");
      $("#goToStepCBtn").show();
      $("#overlayPreviewLarge").attr("src", "./images/overlays/"+$( "#overlaySelect" ).val()+"-h720.png");
      $("#largePreview").show();
    });
    
    // Step B vers C
    $( "#goToStepCBtn" ).bind("click", function() {
      $("#formStepB").submit();
    });
    
    // Render
    $( "#goToRenderBtn" ).bind("click", function() {

        var textContent = $("#textContent").val();
        var youtubeId = $("#youtubeId").val();
        var textPosition = $("#textPosition").val();
        var color = $("#color").val();
        var fontSize = $("#fontSize").val();
        var marginX = $("#marginX").val();
        var marginY = $("#marginY").val();

        $.ajax({
            type: "POST",
            url: "render.php",
            data: { youtubeId: youtubeId, textContent: textContent, textPosition: textPosition, color: color, fontSize: fontSize, marginX: marginX, marginY: marginY }
            })
          .done(function() {
            $("#renderLarge").attr("src", "./youtubePictures/"+youtubeId+"_final.jpg?"+(new Date().getTime()));
            $("#renderSection").show();
          })
          .fail(function() {
            alert( "Une erreur s'est produite." );
            $("#renderSection").hide();
          });
    });

});