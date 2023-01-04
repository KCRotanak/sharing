<html>
<style>
body, html{
  margin:0;
  width:100%;
  height:100%;
  background-color:#000;
  overflow: hidden;
}

#bm_animation{
    width: 100%;
    height: 100%;
    overflow: hidden;
}

#click_l{
    position: absolute;
    top: 0;
    left:0;
    width: 50%;
    height:100%;
    cursor: pointer;
    background-color: rgba(255,255,255,0);
    
}


#click_r{
    position: absolute;
    top: 0;
    right:0;
    width: 50%;
    height:100%;
    cursor: pointer;
    background-color: rgba(255,255,255,0);
    
}
</style>

<body>
    <div id="bm_animation">
        <div id="click_r"></div>
        <div id="click_l"></div>
    </div>

    <script>
    var container = document.getElementById('bm_animation');
    var animData = {
        container: container,
        renderer: 'svg',
        loop: true,
        prerender: false,
        autoplay: true,
        autoloadSegments: false,
        path: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/51676/fight.json'   
    };

    var anim;
    var isHitting = false;


    anim = bodymovin.loadAnimation(animData);
    anim.addEventListener('DOMLoaded',startAnimation);
    click_r.onclick = hitRight;
    click_l.onclick = hitLeft;

    function hitComplete(){
        isHitting = false;
        anim.removeEventListener('loopComplete',hitComplete);
    }

    function hitRight(){
        if(isHitting){
            return;
        }
        isHitting = true;
        anim.playSegments([[75,95],[65,75]],true);
        anim.addEventListener('loopComplete',hitComplete);
    }


    function hitLeft(){
        if(isHitting){
            return;
        }
        isHitting = true;
        anim.playSegments([[95,115],[65,75]],true);
        anim.addEventListener('loopComplete',hitComplete);
    }



    function startAnimation(){
        anim.playSegments([[0,65],[65,75]],true);
    }
    







    </script>
</body>

</html>
