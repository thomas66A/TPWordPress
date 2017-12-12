
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
    </div>
