<!DOCTYPE HTML>
<html>
    <head>
        <script src="jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            function loadApiYoutube(){
                var tag = document.createElement('script');
                tag.src = "//www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            }
            loadApiYoutube();
        </script>
    </head>
    <body>
        <div rel="youtube" id="yt1" data-youtube-id="72WhEqeS6AQ" data-weight="560" data-height="315">
        <div rel="youtube" id="yt2" data-youtube-id="1Us-88Q7Cc8" data-weight="560" data-height="315">
        <div rel="youtube" id="yt3" data-youtube-id="1Us-88Q7Cc8" data-weight="560" data-height="315">
    </body>
    <script type="text/javascript">
        var playerInfoList = [];
        var curplayer = [];

        window.onYouTubeIframeAPIReady = function() {
            if(typeof playerInfoList === 'undefined' && playerInfoList.length == 0){
                return;
            }
            for(var i = 0; i < playerInfoList.length;i++) {
                curplayer[playerInfoList[i].id] = createPlayer(playerInfoList[i]);
            }
        }
        function createPlayer(playerInfo) {
            return new YT.Player(playerInfo.id, {
                height: playerInfo.height,
                width: playerInfo.width,
                videoId: playerInfo.videoId,
                playerVars: {
                    modestbranding: 1,
                    wmode: "opaque"
                }
            });
        }

        $(document).ready(function(){
            $('div[rel=youtube]').each(function(){
                var youtube_id = $(this).attr('data-youtube-id');
                var height = $(this).attr('data-width');
                var width = $(this).attr('data-height');

                var data = {id:this.id,width:width,height:height,videoId:youtube_id};
                playerInfoList.push(data);
            });
            console.log(playerInfoList);
        })
    </script>
</html>