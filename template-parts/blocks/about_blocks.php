<?php if( have_rows('about_blocks') ): ?>
    <section class="about-blocks">
        <div class="container">
            <?php while( have_rows('about_blocks') ): the_row();  $image = get_sub_field('image'); $num = get_row_index(); ?>
                <div class="about-block">
                    <div data-aos="fade-right" class="image object-fit">
                        <img src="<?php echo $image; ?>" alt="">
                    </div>
                    <div data-aos="fade-left" class="content">
                        <h3><?php the_sub_field('title'); ?></h3>
                        <?php the_sub_field('text'); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>
