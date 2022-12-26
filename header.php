<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
<body <?php body_class(); ?> data-aos-easing="ease" data-aos-duration="800" data-aos-delay="0">

<?php wp_body_open(); ?>
<header class="header">
    <div class="container">
        <div class="flex">
            <div class="flex-logo">
                <?php if (get_field('logo','option')): ?>
                    <div class="logo">
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php the_field('logo','option'); ?>" alt="">
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (get_field('logo_text','option')): ?>
                    <div class="logo-text">
                        <p><?php the_field('logo_text','option'); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex-menu">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'menu' => '',
                    'container' => 'nav',
                    'container_class' => 'nav-menu',
                    'container_id' => '',
                    'menu_class' => 'menu__list',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'add_li_class' => 'menu__link',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'walker' => '',
                ]);

                ?>


                <div class="phone-link" data-da="nav-menu,130,992">
                    <?php
                    $rows = get_field( 'phones_list', 'option' 	);
                    $testimonial_header = $rows[0]['phone'];
                    $first = $testimonial_header; ?>
                    <a href="tel:<?php if ($first) { echo preg_replace('/[^0-9]/', '', $first); } ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/phone-icon.svg" alt="">
                        <span><?php echo $first;?></span>
                        <img class="arrow" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-down.svg" alt="">
                    </a>


                    <?php if( have_rows('phones_list', 'option') ): ?>
                        <ul>
                            <?php while( have_rows('phones_list', 'option') ): the_row();  $header_phone = get_sub_field('phone'); ?>
                            <li>
                                <a href="<?php if ($header_phone) { echo preg_replace('/[^0-9]/', '', $header_phone); } ?>">
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/phone-icon.svg" alt="">
                                    <span><?php the_sub_field('phone'); ?>
                                    </span>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="header-control">
                    <ul>
                        <li><a href="<?php if ( is_user_logged_in() ) { ?> <?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?> <?php } else { ?><?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?><?php } ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/user.svg" alt=""></a></li>
                        <li><a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/shopping-cart.svg"alt=""></a></li>
                    </ul>
                    <?php echo do_shortcode('[wpml_language_selector_widget]');?>
                    <div class="lang">
                        <?php echo do_shortcode('[wpml_language_selector_widget]');?>
<!--                        <span>UA</span>-->
<!--                        <img src="--><?php //echo esc_url(get_template_directory_uri()); ?><!--/assets/images/icon/arrow-down.svg"alt="">-->
<!--                        <ul>-->
<!--                            <li><a href="">En</a></li>-->
<!--                            <li><a href="">Fr</a></li>-->
<!--                        </ul>-->
                    </div>
                    <div class="btn-menu">
                        <div class="burger"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php if ( ! is_front_page() ) { ?>
    <div class="container">
        <?php
        if ( function_exists( 'yoast_breadcrumb' ) ) {
            yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
        }
        ?>
    </div>



<?php } ?>
