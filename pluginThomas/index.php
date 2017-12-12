<?php
/**
 * @package pluginThomas
 * @version 1.0
 */
/*
Plugin Name: creerPopUp
Plugin URI: http://wordpress.org/plugins/pluginThomas/
Description: Un plugin pour creer des popup.
Author: Thomas O'Hare
Version: 1.0
Author URI: http://oexeo.fr/
*/

function matricePopUp(){
    
    $styles = "
	<style type='text/css'>
	#popup {
		width:450px;
        position:fixed;
        left:50%;
        margin-left:-175px;
		top:100px;		
		padding:20px;
        border-radius:25px;
        background-color:red;
        color:white;
        box-shadow:10px 10px 8px black;
        text-align:center;
        display:none;
        flex-direction:column;
        justify-content:space-around

	}
	</style>
    ";
    $textPopup = fopen((TEMPLATEPATH . '/textPopup.txt'), 'r+');
    $lepopup = fgets($textPopup);
    $contenu = explode("&", $lepopup);
    $titre = $contenu[0];
    $texte = $contenu[1];
    $bgColor = $contenu[2];
    $textColor = $contenu[3];
    $thetime = $contenu[4] * 1000;
    fclose($textPopup);
    $scripts = "<script>
    var titre = '$titre';
    if(titre){
        document.getElementById('popup').style.display=\"flex\";
        document.getElementById('popup').style.backgroundColor='$bgColor';
        document.getElementById('popup').style.color='$textColor';
        setTimeout(function(){ 
            document.getElementById('popup').style.display=\"none\";
         }, '$thetime');
         
    }
    </script>";


    return $styles . '<div id="popup"><h1>' .$titre. '</h1><p>' .$texte. '</p></div>' . $scripts; 
    }

add_shortcode('lepopup', 'matricePopUp');

add_action("admin_menu", "generate_popup");


function generate_popup(){
    add_menu_page(
        "GeneratePopUp",
        "GeneratePopUp",
        "administrator",
        "tp-theme-thomas2", 
        "make_popup", 
        "dashicons-welcome-view-site",
        60
    );
}
function make_popup(){
    if(isset($_POST['title']) && isset($_POST['texte'])){
        $textPopup = fopen((TEMPLATEPATH . '/textPopup.txt'), 'w+');
        $textAmettre= $_POST['title'] ."&". $_POST['texte']."&". $_POST['bgColor']."&". $_POST['textColor']."&". $_POST['theTime'];
        fputs($textPopup, $textAmettre);
        fclose($textPopup);
    }
    ?>
    <style type='text/css'>
        
    </style>
    <h1>Generate the text of the Popup</h1>
    <h4>This popup will be seen for X secondes, on the Home page</h4>
    <form method="post">
        <label>Title of the popup:&nbsp;<input type="text" name="title" required></label><br>
        <h4>Text of the popup:<h4>
            <textarea name="texte" required></textarea><br>
        <label>Background color:&nbsp;
            <input type="color" name="bgColor" value="#ff0000" >
        </label><br>
        <label>Text color:&nbsp;
            <input type="color" name="textColor" value="#ffffff" >
        </label><br>
        <label>Select time (1 to 10 seconds):&nbsp;
            <input type="range" name="theTime" min="1" max="10" value="2">
        </label><br>
        <input type="submit" value="VALIDATE">
    </form>
    <?php
}
/*put this "echo do_shortcode( "[lepopup]" );"  or this "[lepopup]" , where you want it to be seen*/