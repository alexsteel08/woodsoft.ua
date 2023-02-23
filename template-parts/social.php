<?php
global $post;
$terms = get_the_terms( 'product_cat',$post->ID);

echo '<div class="container">';
    echo '<div class="cat_description">';
        echo category_description( get_category_by_slug($terms)->term_id);
    echo '</div>';
    if (!empty(category_description( get_category_by_slug($terms)->term_id))) {
        echo '<span class="show-more">';
    echo '<?xml version="1.0" encoding="iso-8859-1"?>
<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
<g id="Layer_1_1_">
	<polygon points="48.707,13.853 47.293,12.44 25,34.732 2.707,12.44 1.293,13.853 25,37.56 	"/>
</g>
</svg>
';
   echo '</span>';
    }

echo '</div>';

?>
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

