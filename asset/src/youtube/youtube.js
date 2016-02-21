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
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '100%',
        playerVars: { 'showinfo': 0, 'modestbranding': 1, 'rel': 0},
        videoId: '',
        events:
        {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

//Funcion para cargar video
function cargarVideo(id)
{
    player.loadVideoById({
        'videoId': id
    });
}

function stopVideo() {
    player.stopVideo();
}


function onPlayerStateChange(event) {

    switch (event.data)
    {
        case YT.PlayerState.PLAYING:
        {
            $('.pause').css('color', '');
            $('.play').css('color', 'green');
            break;
        }
        case YT.PlayerState.PAUSED:
        {
            $('.pause').css('color', 'red');
            $('.play').css('color', '');
            break;
        }
        case YT.PlayerState.ENDED:
        {
            $('.pause').css('color', '');
            $('.play').css('color', '');
            $('.playlist').css('background', '');
            $('.pause').hide();
            $('.play').hide();
            break;
        }
    }
}


// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    /* sacado se StackOverFlow para mantener el tamaño del video */
    jQuery(function() {
        function setAspectRatio() {
            jQuery('iframe').each(function() {
                jQuery(this).css('height', jQuery(this).width() * 9/16);
                jQuery('#lista').css('height', jQuery(this).width() * 9/16);
            });
        }
        setAspectRatio();
        jQuery(window).resize(setAspectRatio);
    });
    //codigo de reproduccion automatica
    event.target.pauseVideo();
}

$('.playlist').click(function(){
    $('.playlist').css('background', '');
    $('.playlist').find('.play').hide();
    $('.playlist').find('.pause').hide();
    $(this).css('background', '#0A3811');
    $(this).find('.play').css('color', 'green');
    $(this).find('.play').show();
    $(this).find('.pause').show();
    var id = $(this).attr('video');
    cargarVideo(id);
});

$('.play').on('click',function(){
    player.playVideo();
    event.stopPropagation();
});

$('.pause').on('click',function(){
    player.pauseVideo();
    event.stopPropagation();
});

$( document ).ready(function() {
    $('.pause').hide();
    $('.play').hide();
});

(function($){
    $(window).load(function(){
        $("#contenidoLista").mCustomScrollbar({
            theme:"rounded"
        });
    });
})(jQuery);