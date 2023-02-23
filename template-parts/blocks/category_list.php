<section class="home-category">
    <div class="container">
        <?php if( get_sub_field('title') ): ?>
           <h2>
              <?php the_sub_field('title'); ?>
           </h2>
        <?php endif; ?>

        <?php if( have_rows('category_list') ): ?>
            <div class="category-inner">
                <?php while( have_rows('category_list') ): the_row();  $image = get_sub_field('image'); $num = get_row_index();?>
                <div class="category-block">
                    <div class="content" <?php if($num % 2 == 0){ ?> "data-aos="fade-right" <?php }else{ ?> "data-aos="fade-left" <?php } ?> >
                        <h3><?php the_sub_field('title'); ?></h3>
                        <a href="<?php the_sub_field('link'); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon/more-arrow.svg" alt=""> <?php _e('More details','woodsoft'); ?></a>
                    </div>
                    <div data-aos="fade-left" class="image object-fit">
                        <img src="<?php echo $image; ?>" alt="">
                    </div>
                </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
