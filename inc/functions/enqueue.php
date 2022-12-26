<?php
/*
 *	ENQUEUE SCRIPTS AND STYLES
 *
 *****************************************************/

add_action('wp_enqueue_scripts', 'theme_front_end_styles');
function theme_front_end_styles()
{
    wp_enqueue_style('header', WTHEME_CSS_URI . 'header.css', array(), false, 'all');
    wp_enqueue_style('footer', WTHEME_CSS_URI . 'footer.css', array(), false, 'all');
//	wp_enqueue_style('flickity', WTHEME_CSS_URI . 'flickity.min.css', array(), false, 'all');
    wp_enqueue_style('slick', WTHEME_CSS_URI . 'slick-style.css', array(), false, 'all');

    if (is_single()):
        wp_enqueue_style('single', WTHEME_CSS_URI . 'single.css', array(), false, 'all');
    endif;
    wp_enqueue_style('main.min', WTHEME_CSS_URI . 'main.min.css', array(), false, 'all');

    wp_enqueue_style('style', get_stylesheet_uri());
//    wp_enqueue_style( 'custom-styles', get_template_directory_uri() . '/css/custom-styles.css' );
}

add_action('wp_enqueue_scripts', 'theme_front_end_script');
function theme_front_end_script()
{
    wp_enqueue_script('app.min', WTHEME_JS_URI . 'app.min.js', array('jquery'), '', true);
    wp_enqueue_script('slickjs', WTHEME_JS_URI . 'slick.min.js', array('jquery'), '', true);
    wp_enqueue_script('main', WTHEME_JS_URI . 'main.js', array('jquery'), '', true);

}


function acf_content() {
	while (have_rows('content')) {
		the_row();
		if (get_row_layout() == 'team' ) {
			wp_enqueue_style('slick', WTHEME_CSS_URI . 'slick-style.css', array(), false, 'all');
			wp_enqueue_script('slickjs', WTHEME_JS_URI . 'slick.min.js', array('jquery'), '', true);
		}
	}
}
add_action('wp_footer', 'acf_content');