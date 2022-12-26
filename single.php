<?php


get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


    <section class="single-blog">
        <div class="container">
            <div class="single-inner">
                <div data-aos="fade-up" class="image object-fit">
<!--                    <img src="--><?php //echo esc_url(get_template_directory_uri()); ?><!--/assets/images/icon/dist/blog-image.jpg" alt="">-->
                </div>

                <div data-aos="fade-up">
                    <h1><?php the_title();?></h1>
                </div>

                <div data-aos="fade-up" class="content">
                    <?php the_content(); ?>
                </div>




                <div data-aos="fade-left" class="share-social">
                    <div class="title"><?php _e('Share:','woodsoft');?></div>
                    <ul>
                        <li class="share-social facebook"><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/s-fb.svg" alt=""></li>
                        <li class="share-social twitter"><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/s-twitter.svg" alt=""></li>
                        <li class="share-social linkedin"><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/in.svg" alt=""></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>




    <section class="blog other-blog">
        <div class="container">


            <div class="slider-inner">

                <div data-aos="fade-up">
                    <h2><?php _e('You may be interested','woodsoft');?></h2>
                </div>



                <div data-aos="fade-up" class="swiper-container blog-swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <?php
                        $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) );
                        if( $related ) foreach( $related as $post ) {
                            setup_postdata($post); ?>
                            <div class="swiper-slide">
                                <?php get_template_part('template-parts/postitem');?>
                            </div>
                        <?php }
                        wp_reset_postdata(); ?>
                        <!-- Slides -->


                    </div>
                </div>

                <div class="slider-control">
                    <div class="swiper-scrollbar blog-scrollbar"></div>
                    <div class="swiper-button-prev blog-prev">
                        <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/slider-prev.svg" alt="">
                    </div>
                    <div class="swiper-button-next blog-next">
                        <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/slider-next.svg" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php //get_template_part( 'template-parts/subscribe' );?>

<?php

get_footer();