$(document).ready(function(){

    // Step A
    $( "#previewBtn" ).bind("click", function() {
      $("#initialThumbnailPreview").attr("src", "http://img.youtube.com/vi/"+$("#youtubeId").val()+"/maxresdefault.jpg");
      $("#goToStepBBtn").show();
      $("#goToStepBLoadBtn").hide();
    });

    // Step A
    $( "#loadBtn" ).bind("click", function() {
        $("#goToStepBBtn").hide();
        var uploadData = $("#formLoadStepA").find("input[type='file']");
        var newData = new FormData();

        $.each($('#formLoadStepA').find("input[type='file']"), function(i, tag) {
            $.each($(tag)[0].files, function(i, file) {
                newData.append('file-'+i, file);
            });
        });
        
        var data = $.ajax({
            type: 'POST',
            url: 'stepAtoB.php',
            data: newData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if ( data.substr(0,4) == "err=" ) {
                    alert(data.substr(4));
                } else {
                    console.log("data = ", data);
                    console.log("data.substr(3) = ", data.substr(3));
                    $("#initialThumbnailPreview").attr("src", "./youtubePictures/" + (data.substr(3)) + ".jpg");
                    $("#goToStepBLoadBtn").attr("href", "./stepB.php?youtubeId="+(data.substr(3)));
                    $("#goToStepBLoadBtn").show();
                }
            },
            fail: function(data){
                alert("Erreur dans l'envoie du fichier.");
                $("#goToStepBLoadBtn").hide();
            }
        });    
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