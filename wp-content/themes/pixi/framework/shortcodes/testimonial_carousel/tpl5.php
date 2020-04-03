<article <?php post_class(); ?>>
    <div class="item">
         <div class="content">
		   <p><?php echo get_post_meta(get_the_ID(),'testimonial_content',true); ?></p>
		</div> 
        <?php if (has_post_thumbnail()) the_post_thumbnail('thumbnail'); ?>
        <div class="testimonial-details">
            <h5><?php the_title(); ?></h5>
            <h6><?php echo '<span>'.get_post_meta(get_the_ID(),'role',true).'</span>'; ?></h6>
        </div>
    </div>
</article>