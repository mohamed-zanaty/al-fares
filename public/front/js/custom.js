$(document).ready(function () {

    //add video
    $('.video-inc').on('click', function (e) {

        var videoBuild = new YoutubeOverlayModule({
            sourceUrl: $(this).parent().parent().attr("data-videourl"),
            triggerElement: "#" + $(this).parent().parent().attr("id"),
            progressCallback: function () {
                console.log("Callback Invoked.");
            }
        });

        var vid = new YoutubeOverlayModule(videoBuild);
        vid.activateDeployment();
    });


});//end of document ready
