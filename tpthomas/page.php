<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TpThomas
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main white">

			<?php
			while ( have_posts()  ) {
			the_post();
			$theTitle = get_the_title();
			$content = get_the_content();
			$post_thumb = get_the_post_thumbnail( null, array(200,200));
			}
			
			?>
			
			<div class="blocDePage" id="blocDePage2">				
				<div class="imgChat">  
					<span><?= $post_thumb; ?></span> 
				</div>
				<div class="contentChat">
					<p>
						<h1><?php echo $theTitle; ?></h1>
						<?php echo $content; ?>
					</p>
				</div>
				<div class="dsb" id="dsb2">
					<?php dynamic_sidebar();?>
				</div>
		   </div>
		   <?php include 'dispositionWidget.php'; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<script>
				var local = localStorage.getItem('cote');
				console.log(local);
				if(local == 0){
					document.getElementById("dsb2").style.display="none";
				}
				else if(local == 1){
					document.getElementById("blocDePage2").style.flexDirection="initial";
				}
				else if(local == 2){
					document.getElementById("blocDePage2").style.flexDirection="row-reverse";
				}
				else{
					document.getElementById("blocDePage2").style.flexDirection="initial";
				}
			
			</script>
<?php

get_footer();
