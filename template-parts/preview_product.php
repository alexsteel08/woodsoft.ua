<?php if (have_rows('pp_slider','option')): ?>
    <section class="preview">
        <div class="swiper-container preview-swiper">
            <div class="swiper-wrapper">
                <?php while (have_rows('pp_slider','option')): the_row();
                    $background_image = get_sub_field('background_image');
                    $product_left_img = get_sub_field('product_left_image');
                    $product_right_img = get_sub_field('product_right_image');
                    ?>


                    <!-- Slides -->

                    <div class="swiper-slide">
                        <div class="preview-block">
                            <div class="bg-block">
                                <img src="<?php echo $background_image; ?>" alt="">
                            </div>
                            <div class="container">
                                <h3><?php the_sub_field('label'); ?></h3>
                                <div class="flex">
                                    <div data-aos="fade-up" data-aos-once="true" class="item">
                                        <div class="circle"></div>
                                        <a href="<?php the_sub_field('product_left_link'); ?>" class="product-block">
                                            <div class="image">
                                                <img src="<?php echo $product_left_img; ?>" alt="">
                                            </div>
                                            <div class="info">
                                                <div class="title"><?php the_sub_field('product_left_title'); ?></div>
                                                <div class="price"><?php the_sub_field('product_left_price'); ?></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div data-aos="fade-up" data-aos-once="true" class="item">
                                        <div class="circle"></div>
                                        <a href="<?php the_sub_field('product_right_link'); ?>" class="product-block">
                                            <div class="image">
                                                <img src="<?php echo $product_right_img; ?>" alt="">
                                            </div>
                                            <div class="info">
                                                <div class="title"><?php the_sub_field('product_right_title'); ?></div>
                                                <div class="price"><?php the_sub_field('product_right_price'); ?></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination preview-pagination"></div>
        </div>
    </section>
<?php endif; ?>
