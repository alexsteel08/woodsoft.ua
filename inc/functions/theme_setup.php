<?php
if ( ! isset( $content_width ) ) $content_width = 900;
add_theme_support( "custom-header" );
add_theme_support( "custom-background" );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "title-tag" );
add_theme_support( 'post-thumbnails');
add_editor_style();
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
    acf_render_field_setting( $field, array(
        'label'			=> 'Default Image',
        'instructions'	=> 'Appears when creating a new post',
        'type'			=> 'image',
        'name'			=> 'default_value',
    ));
}
add_filter( 'acf/fields/relationship/query','relationship_options_filter', 10, 3);
function relationship_options_filter($options, $field, $the_post) {
    $options['post_status'] = array('publish');
    return $options;
}
add_filter( 'big_image_size_threshold', '__return_false' );


//register menus
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary', 'custom' ),
        )
    );
}

add_action('init', 'register_my_menus');
function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="menu__link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


// widget area
function a_theme_widgets_init()
{

    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="rounded">',
        'after_title' => '</div>',
    ));

}

add_action('widgets_init', 'a_theme_widgets_init');


//rus to lat
function rutranslit($title) {
    $chars = array(
//rus
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
        "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
        "З"=>"Z","И"=>"I","Й"=>"Y","К"=>"K","Л"=>"L",
        "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
        "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"KH",
        "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"",
        "Ы"=>"Y","Ь"=>"","Э"=>"YE","Ю"=>"YU","Я"=>"YA",
        "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
        "е"=>"e","ё"=>"yo","ж"=>"zh",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"kh",
        "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
        "ы"=>"y","ь"=>"","э"=>"ye","ю"=>"yu","я"=>"ya",
//spec
        "—"=>"-","«"=>"","»"=>"","…"=>"","№"=>"N",
        "—"=>"-","«"=>"","»"=>"","…"=>"",
        "!"=>"","@"=>"","#"=>"","$"=>"","%"=>"","^"=>"","&"=>"",
//ukr
        "Ї"=>"Yi","ї"=>"i","Ґ"=>"G","ґ"=>"g",
        "Є"=>"Ye","є"=>"ie","І"=>"I","і"=>"i",

    );

    if (seems_utf8($title)) $title = urldecode($title);
    $title = preg_replace('/\.+/','.',$title);
    $r = strtr($title, $chars);
    return $r;
}
add_filter('sanitize_file_name','rutranslit');
add_filter('sanitize_title','rutranslit');

//rus to lat end

// Disable Gutenberg.
if ('disable_gutenberg') {
    add_filter('use_block_editor_for_post_type', '__return_false', 100);

    // Move the Privacy Policy help notice back under the title field.
    add_action('admin_init', function () {
        remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
        add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
    });
}
// Disable Gutenberg end

// Remove aithor name
function remove_comment_author_class( $classes ) {
    foreach( $classes as $key => $class ) {
        if(strstr($class, "comment-author-")) {
            unset( $classes[$key] );
        }
    }
    return $classes;
}
add_filter( 'comment_class' , 'remove_comment_author_class' );

// Remove aithor name end


//add_image_size( 'blog_mini', 375, 230, true );



function generate_options_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start(); // Capture all output into buffer
    require($ss_dir . '/inc/custom-styles.php'); // Grab the custom-style.php file
    $css = ob_get_clean(); // Store output in a variable, then flush the buffer
    file_put_contents($ss_dir . '/css/custom-styles.css', $css, LOCK_EX); // Save it as a css file
}
add_action( 'acf/save_post', 'generate_options_css', 20 ); //Parse the output and write the CSS file on post save (thanks Esmail Ebrahimi)


// Excerpt length
add_filter( 'excerpt_length', function(){
    return 20;
} );

// Excerpt length end

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Blog page',
        'menu_title'	=> 'Blog page',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Shop',
        'menu_title'	=> 'Shop',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Product page',
        'menu_title'	=> 'Product page',
        'parent_slug'	=> 'theme-general-settings',
    ));

}


remove_filter( 'the_excerpt', 'wpautop' );



// pagination
function pagination_bar( $custom_query ) {
    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
// pagination end

add_filter('excerpt_more', 'new_excerpt_more');

add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );

function change_wp_nav_menu( $classes, $args, $depth ) {
    foreach ( $classes as $key => $class ) {
        if ( $class == 'sub-menu' ) {
            $classes[ $key ] = 'menu__sub-list';
        }
    }

    return $classes;
}

// noindex 404 page

add_filter('wpseo_robots', 'yoast_no_home_noindex', 999);
function yoast_no_home_noindex($string= "") {
    if (is_404()) {
        $string= "noindex, nofollow";
    }
    return $string;
}

// noindex 404 page

//ajax blog page

function true_load_posts(){

    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    query_posts( $args );
    if( have_posts() ) :
        while( have_posts() ): the_post();

            ?>
            <?php get_template_part('template-parts/postitem');?>
        <?php

        endwhile;

    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');


