<section class="delivery">
    <div class="container">
        <?php if( get_sub_field('title') ): ?>
            <div data-aos="fade-up">
                <h1><?php the_sub_field('title'); ?></h1>
            </div>
        <?php endif; ?>

        <?php if( have_rows('guarantee_text') ): ?>
                <?php while( have_rows('guarantee_text') ): the_row();  $image = get_sub_field('logo'); ?>
                    <div class="info-block">
                        <div data-aos="fade-right" class="icon">
                            <img src="<?php echo $image; ?>" alt="">
                        </div>
                        <div data-aos="fade-left" class="content">
                            <h3><?php the_sub_field('title'); ?></h3>
                            <?php the_sub_field('text'); ?>
                            <p><span><?php the_sub_field('list_title'); ?></span></p>
                            <?php if( have_rows('list') ): ?>
                                <ul>
                                    <?php while( have_rows('list') ): the_row(); ?>
                                        <li>
                                            <?php the_sub_field('item'); ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>