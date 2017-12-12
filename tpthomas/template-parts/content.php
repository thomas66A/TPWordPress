<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TpThomas
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php tpthomas_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
		<?php $query = new WP_Query( array( 'post_type' => 'news', 'paged' => $paged ));
        if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <?php endwhile;?>
      <?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			
			$content = the_content();
			$image = $post_thumb = get_the_post_thumbnail( null, array(300,300));
			echo "<p class='lesArticles2'>".$image.$content."</p>";
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tpthomas' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php tpthomas_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
