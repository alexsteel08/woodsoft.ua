<section class="social-sec">
    <div class="container">
        <div class="slider-inner">
            <?php if (get_sub_field('title') && get_sub_field('instalink') && get_sub_field('instaname')): ?>
                <div data-aos="fade-up">
                    <h2><?php the_sub_field('title'); ?> <br> <a href="<?php the_sub_field('instalink'); ?>"><?php the_sub_field('instaname'); ?></a>
                    </h2>
                </div>
            <?php endif; ?>
            <?php if (have_rows('social')): ?>
                <div data-aos="fade-up" class="swiper-container social-swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php while (have_rows('social')): the_row();
                            $image = get_sub_field('image'); ?>
                            <div class="swiper-slide">
                                <div class="image object-fit">
                                    <img src="<?php echo $image; ?>" alt="">
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <!-- If we need navigation buttons -->
                </div>
                <div class="slider-control">
                    <div class="swiper-scrollbar social-scrollbar"></div>
                    <div class="swiper-button-prev social-prev">
                        <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/slider-prev.svg" alt="">
                    </div>
                    <div class="swiper-button-next social-next">
                        <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/slider-next.svg" alt="">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


