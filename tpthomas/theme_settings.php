<?php
add_action("admin_menu", "generate_theme_menu");

function generate_theme_menu(){
    add_menu_page(
        "TPThomas",
        "TPThomas",
        "administrator",
        "tp-theme-thomas", 
        "left_right_widget", 
        "dashicons-welcome-widgets-menus",
        60
    );
}
function left_right_widget(){
    
        if( isset( $_POST["selectCote"] ) ){
            $cote = $_POST["selectCote"];
            echo "<script>localStorage.setItem('cote'," . $cote . ");</script>";
         
        }
    
        ?> 
    
        <h1> Administration de TPThomas </h1>
    
        <h2> Page d'accueil </h2> 
    
        <form method="post">
    
            <label>
    
                <span> Affichage du widget: </span>
                
                <select name="selectCote">
                        <option value="0"> 
    
                            Sans widget. 
    
                        </option>
                            
                        <option value="1"> 
    
                            A droite. 
    
                        </option>
                        <option value="2"> 
    
                            A Gauche. 
    
                        </option>
    
                    
    
                </select>
    
            </label><br>

            <input type="submit" value="Valider">
    
        </form>
    
        <?php 
    }
    
    