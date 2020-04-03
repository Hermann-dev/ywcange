<div class="no-results">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<h1><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pixi' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h1>
		<?php elseif ( is_search() ) : ?>
		<h3 class="lrg center"><?php echo esc_html__( 'Nothing Found', 'pixi' ); ?></h3>
		<p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords', 'pixi' ); ?></p>
		<?php get_search_form(); 
		 else : ?>
		<h3 class="lrg center"><?php echo esc_html__( 'Nothing Found', 'pixi' ); ?></h3>
		<p><?php echo esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pixi' ); ?></p>
		<?php get_search_form(); 
	endif; ?>
</div>
