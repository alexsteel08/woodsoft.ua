<section class="social-sec">
    <div class="container">
        <div class="slider-inner">
            <?php if (get_field('title','option') && get_field('instalink','option') && get_field('instaname','option')): ?>
                <div>
                    <h2><?php the_field('title','option'); ?> <br> <a href="<?php the_field('instalink','option'); ?>"><?php the_field('instaname','option'); ?></a>
                    </h2>
                </div>
            <?php endif; ?>
            <?php if (have_rows('social','option')): ?>
                <div class="swiper-container social-swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php while (have_rows('social','option')): the_row();
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

