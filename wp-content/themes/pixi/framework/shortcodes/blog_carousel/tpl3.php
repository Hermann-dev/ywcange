<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="grid-post-simple">
    <div class="thumbnail-post"><?php the_post_thumbnail('pixi-lg-height');?></div>
    <div class="info-post">
		<p class="term"><?php echo the_terms( get_the_ID(), 'category' ); ?></p>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="content"><?php echo pixi_custom_excerpt($excerpt_lenght); ?></p>
        <ul class="meta-post">
            <li><?php echo get_the_author(); ?></li><li class="space">-</li><li><?php echo get_the_date(); ?></li>
        </ul>
    </div>
  </div>
</article>