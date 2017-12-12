<?php 
/*
    Le fichier de template de mes categories 
*/

get_header();
?> 

    <div class='cat-articles transparent'> 

        <h1 class='cat-title' id="white"> <?php single_cat_title(); ?> </h1>
        <div id="flexArticles">
        <?php 
            if( have_posts() ){
                
                while( have_posts() ){
                    ?>
                    <div class="inFlex">
                    <?php
                    the_post();
                    
                    the_title("<h2 class='cat-article-title'>", "</h2>");

                    get_template_part("template-parts/articles");

                    $permalink = get_the_permalink();
                    echo "<a href=" .$permalink. ">lire l'article</a>";
                    ?>
                    </div>
                    <?php
                }   

            }
        ?>
    </div>
        </div>
<?php 
get_sidebar();
get_footer();