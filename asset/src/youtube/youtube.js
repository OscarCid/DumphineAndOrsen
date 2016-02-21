/**
 * Created by Orsen on 09-02-2016.
 */
// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
var videoID = "M7lc1UVf-VE";
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '100%',
        playerVars: { 'showinfo': 0, 'modestbranding': 1, 'rel': 0},
        videoId: videoID,
        events: {
            'onReady': onPlayerReady}
    });
}

//Funcion para cargar video
function cargarVideo(id)
{
    player.loadVideoById({

        'videoId': id

    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    /* sacado se StackOverFlow para mantener el tamaño del video */
    jQuery(function() {
        function setAspectRatio() {
            jQuery('iframe').each(function() {
                jQuery(this).css('height', jQuery(this).width() * 9/16);
            });
        }

        setAspectRatio();
        jQuery(window).resize(setAspectRatio);
    });
    //codigo de reproduccion automatica
    event.target.playVideo();
}
