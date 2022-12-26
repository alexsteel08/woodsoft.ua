<?php
/*
Template Name: 404
 */

get_header(); ?>
    <section class="page_404" <?php if( get_field('404_bi','option') ): ?> style="background-image: url(<?php the_field('404_bi','option'); ?>)"<?php endif; ?>>
        <div class="page_404_block">
            <div class="page_404_content">
                <span><?php _e('404 page not found','woodsoft');?></span>
                <a href="<?php echo get_home_url(); ?>"><?php _e('Back to home','woodsoft');?></a>
            </div>
        </div>
    </section>



<?php get_footer(); ?>