<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TpThomas
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tpthomas' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding  flexy">
		<?php
			
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title bigger"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
			<h1 class="site-title bigger"><p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p></h1>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; //WPCS: xss ok. ?></p>
			<?php
			endif; ?>
			<?php if(is_home()) : ?>
			<?php
				$postslist = get_posts( array(
					'posts_per_page' => 10
				) );
				 
				if ( $postslist ) {
					$tag=0;
					$img="img";
					$lien="lien";
					$titre="titre";
					foreach ( $postslist as $post ){ 
						
						setup_postdata( $post );
						${$img.$tag} = get_the_post_thumbnail( null, 'medium');
						${$lien.$tag} = get_permalink();
						${$titre.$tag} = get_the_title();
						$tag++;
					}
						?>
					<!-- affiche les quatres derniers articles -->
						<div class="adroite">
							 
									<h4>Les quatres derniers articles</h4>
										<ul id=”image_slider”>
											
											<li id="img0" class="imgg"><a href="<?php echo $lien0; ?>"><?php echo $img0; ?><?php echo $titre0; ?></a></li>
											<li id="img1" class="imgg"><a href="<?php echo $lien1; ?>"><?php echo $img1; ?><?php echo $titre1; ?></a></li>
											<li id="img2" class="imgg"><a href="<?php echo $lien2; ?>"><?php echo $img2; ?><?php echo $titre2; ?></a></li>
											<li id="img3" class="imgg"><a href="<?php echo $lien3; ?>"><?php echo $img3; ?><?php echo $titre3; ?></a></li>
										</ul> 
									
								
						</div>
								<script>

								var slideIndex = 0;
								carousel();

								function carousel() {
									var i;
									var x = document.getElementsByClassName("imgg");
									for (i = 0; i < x.length; i++) {
									x[i].style.display = "none"; 
									}
									slideIndex++;
									if (slideIndex > x.length) {slideIndex = 1} 
									x[slideIndex-1].style.display = "block"; 
									setTimeout(carousel, 2000); 
								}
								</script>
					<?php
					 
					wp_reset_postdata();
				}
			?>
			
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'tpthomas' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<?php
		if( is_home()){
		 echo do_shortcode( "[lepopup]" );
		 } 
		 ?>
