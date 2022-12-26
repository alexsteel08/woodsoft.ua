<section class="philosophy">
    <div class="logo">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/dist/circle-logo.svg" alt="">
    </div>
    <div class="container">
        <?php if( get_sub_field('title') ): ?>
            <div data-aos="fade-up">
                <h2><?php the_sub_field('title'); ?></h2>
           </div>
        <?php endif; ?>
        <?php if( get_sub_field('text') ): ?>
            <div data-aos="fade-up">
                <p><?php the_sub_field('text'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>