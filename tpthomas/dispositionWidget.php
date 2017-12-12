<div class="blocDisposition">
    <h4>Choix position widget</h4>
    <div id="enFlex">
        <div id="dispoGauche" class="dispo">
            <h4>A gauche</h4>
        </div>
        <div id="dispoCentre" class="dispo">
            <h4>Pas de widget</h4>
        </div>
        <div id="dispoDroite" class="dispo">
            <h4>A droite</h4>
        </div>
    </div>
</div>
<script>
    var gauche = document.getElementById("dispoGauche");
    var droite = document.getElementById("dispoDroite");
    var centre = document.getElementById("dispoCentre");
    
    gauche.onclick = function(){
        document.getElementById("blocDePage2").style.flexDirection="row-reverse";
        document.getElementById("dsb2").style.display="block";
        localStorage.setItem('cote',2);
        };
    droite.onclick = function(){
        document.getElementById("blocDePage2").style.flexDirection="initial";
        document.getElementById("dsb2").style.display="block";
        localStorage.setItem('cote',1);
        };
    centre.onclick = function(){
        document.getElementById("dsb2").style.display="none";
        localStorage.setItem('cote',0);
        };
</script>