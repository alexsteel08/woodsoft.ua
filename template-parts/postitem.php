<div  class="col">
    <div class="blog-block">
        <div class="image object-fit">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </div>
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
        <p><?php the_excerpt();?></p>
        <a class="link" href="<?php the_permalink(); ?>"> <?php _e('More details','woodsoft'); ?> <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon/link-arrow.svg" alt=""></a>
    </div>
</div>