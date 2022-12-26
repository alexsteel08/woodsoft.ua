<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<div class="container_product">
	<?php
	/**
	 * woocommerce_before_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
	do_action( 'woocommerce_before_main_content' );
	?>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php wc_get_template_part( 'content', 'single-product' ); ?>

	<?php endwhile; // end of the loop. ?>

	<?php
	/**
	 * woocommerce_after_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );
	?>


</div>

<?php get_template_part( 'template-parts/preview_product' ); ?>


	<section class="product-interested">
		<div class="container">
			<div class="slider-inner">
				<div class="product-interested-title">
					<h2><?php _e('You may be interested','woodsoft');?></h2>
				</div>

				<div data-aos-once="true" class="swiper-container interested-swiper">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<!-- Slides -->
                        <?php
                        $featured_posts = get_field('product-interested');
                        if( $featured_posts ): ?>

                            <?php foreach( $featured_posts as $post ):

                                setup_postdata($post); ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink(); ?>" class="product-block">
                                        <div class="image">
                                            <?php global $product; ?>
                                            <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />
                                        </div>
                                        <div class="info">
                                            <div class="title"><?php the_title(); ?></div>
                                            <div class="price"><?php echo $product->get_price(); ?> ₴</div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>

                            <?php
                            wp_reset_postdata(); ?>
                        <?php endif; ?>
					</div>
				</div>
				<div class="slider-control">
					<div class="swiper-scrollbar interested-scrollbar"></div>
					<div class="swiper-button-prev interested-prev">
						<img class="svg-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon/slider-prev.svg" alt="">
					</div>
					<div class="swiper-button-next interested-next">
						<img class="svg-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon/slider-next.svg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>





		<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
