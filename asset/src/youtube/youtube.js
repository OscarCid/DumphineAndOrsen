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
        videoId: 'Ah_aYOGnQ_I',
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
            $('.pause').hide();
            $('.play').hide();
            break;
        }
    }
    /*
    if (event.data == YT.PlayerState.PLAYING)
    {
        $('.pause').css('color', '');
        $('.play').css('color', 'green');
    }
    else
    {
        if (event.data == YT.PlayerState.PAUSED)
        {
            $('.pause').css('color', 'red');
            $('.play').css('color', '');
        }
        else
        {

        }
    }
    */
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

$('.playlist').on('click',function(){
    $('.playlist').css('background', '');
    $(this).css('background', '#0A3811');
    var id = $(this).attr('video');
    $('.play').css('color', 'green');
    $('.pause').show();
    $('.play').show();
    cargarVideo(id);
});
