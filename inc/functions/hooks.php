<?php

/**
 * @snippet       Variable Product Price Range: "From: min_price"
 */

add_filter( 'woocommerce_variable_price_html', 'bbloomer_variation_price_format_min', 9999, 2 );

function bbloomer_variation_price_format_min( $price, $product ) {
    $prices = $product->get_variation_prices( true );
    $min_price = current( $prices['price'] );
    $max_price = end( $prices['price'] );
    $min_reg_price = current( $prices['regular_price'] );
    $max_reg_price = end( $prices['regular_price'] );
    if ( $min_price !== $max_price || ( $product->is_on_sale() && $min_reg_price === $max_reg_price ) ) {
        $price = '' . wc_price( $min_price ) . $product->get_price_suffix();
    }
    return $price;
}

/**
 * @desc Remove woocommerce_sidebar
 */

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
 * @desc Remove in all product type
 */
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );


/**
 * @snippet       Hide SKU @ Single Product Page - WooCommerce
 */

add_filter( 'wc_product_sku_enabled', 'bbloomer_remove_product_page_sku' );

function bbloomer_remove_product_page_sku( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }
    return $enabled;
}

/**
 * Remove WooCommerce breadcrumbs
 */
//add_action( 'init', 'my_remove_breadcrumbs' );
//
//function my_remove_breadcrumbs() {
//    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
//}

/**
 * @snippet       Hide SKU, Cats, Tags @ Single Product Page - WooCommerce
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );



/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_before_add_to_cart_quantity', 'woocommerce_template_single_price', 30 );


add_filter('woocommerce_product_tabs', function ($tabs) {
    global $product;

    if ($product && $product->get_review_count() === 0) {
        unset($tabs['reviews']);
    }

    return $tabs;
}, 98);


add_filter( 'woocommerce_product_tabs', 'techglimpse_rename_tab', 98);
function techglimpse_rename_tab($tabs) {
    $tabs['additional_information']['title'] = __( 'Characteristics', 'woocommerce' );
    return $tabs;
}


add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tabs' );
function woo_custom_product_tabs( $tabs ) {

    // 1) Removing tabs

//    unset( $tabs['description'] );              // Remove the description tab
     unset( $tabs['reviews'] );               // Remove the reviews tab
//    unset( $tabs['additional_information'] );   // Remove the additional information tab


    // 2 Adding new tabs and set the right order

    //Attribute Description tab
    if( get_field('tab_size') ): ?> <?php
    $tabs['attrib_desc_tab'] = array(
        'title'     => __( 'Size', 'woocommerce' ),
        'priority'  => 100,
        'callback'  => 'woo_size_tab_content'
    ); ?>
    <?php endif;

    if( get_field('tab_additional_options') ): ?> <?php
    // Adds the qty pricing  tab
    $tabs['qty_pricing_tab'] = array(
        'title'     => __( 'Additional options', 'woocommerce' ),
        'priority'  => 110,
        'callback'  => 'woo_addinfo_tab_content'
    ); ?>
    <?php endif;


    return $tabs;

}

// New Tab contents

function woo_size_tab_content() {
    // The attribute description tab content
//    echo '<h2>Description</h2>';
//    echo '<p>Custom description tab.</p>';
    echo the_field('tab_size');
}
function woo_addinfo_tab_content() {
    // The qty pricing tab content
//    echo '<h2>Quantity Pricing</h2>';
//    echo '<p>Here\'s your quantity pricing tab.</p>';
    echo the_field('tab_additional_options');
}

//add_action( 'woocommerce_single_variation', 'product_custom_content', 10);
//
//function product_custom_content() {
//
//    echo  get_template_part( 'template-parts/textile_select' );
//
//}

add_filter ('woocommerce_ajax_variation_threshold','woocommerce_ajax_variation_threshold_more',10,2);
function woocommerce_ajax_variation_threshold_more($count,$product) {
    return 500;
}
if ( ! defined( 'WC_MAX_LINKED_VARIATIONS' ) ) {

    define( 'WC_MAX_LINKED_VARIATIONS', 500);

}


remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


//Hiding or Deleting the "Ship to a Different Address
add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');



add_filter( 'woocommerce_checkout_fields' , 'remove_company_name' );

function remove_company_name( $fields ) {

    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['account']['account_username']);
    unset($fields['account']['account_password']);
    unset($fields['account']['account_password-2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    return $fields;

}


add_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
function woocommerce_taxonomy_archive_description() {

    echo get_template_part( 'template-parts/filter' );
//    echo do_shortcode('[woof]');
}

add_action( 'woocommerce_archive_description', 'woocommerce_tax_logos', 5 );
function woocommerce_tax_logos() {
    if( !is_shop() ) :

        $woocommerce_category_id = get_queried_object_id();
        $args = array(
            'parent' => $woocommerce_category_id,
            'hide_empty' => false,
        );
        $terms = get_terms( 'product_cat', $args );
        if ( $terms ) {
            echo '<div class="category">
        <div data-aos="fade-up" class="category-list">';
            foreach ( $terms as $term ) {
                echo '<div class="col">';


                echo '<a class="category-link" href="' .  esc_url( get_term_link( $term ) ) . '" >';
                echo '<div class="icon">';
                woocommerce_subcategory_thumbnail( $term );
                echo '</div>';
                echo '<span>';
                echo $term->name;
                echo '</span>';
                echo '</a>';
                echo '</div>';
            }
            echo '</div>
    </div>';
        }

    endif;


//
//    echo get_template_part( 'template-parts/category_list' );
}




function woocommerce_product_category( $args = array() ) {

}
add_action( 'woocommerce_before_shop_loop', 'woocommerce_product_category', 100 );

/**
 * currencies symbol
 */
add_filter( 'woocommerce_currencies', 'add_my_currency' );
function add_my_currency( $currencies ) {
    $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );
    return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'UAH': $currency_symbol = ' грн'; break;
    }
    return $currency_symbol;
}

add_action( 'after_setup_theme', 'yourtheme_setup' );

function yourtheme_setup() {
//    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'woocommerce_single_variation', 'add_content_after_addtocart_button_func' );
/*
 * Content below "Add to cart" Button.
 */
function add_content_after_addtocart_button_func() {

    if (get_field('tex_show_hide')) {


    } else {
        // Echo content.
        echo '<div class="top-card">';
        echo '<div class="content">';
        echo '<div class="fabrics-title">';
        echo '<h3>';
        echo the_field('title_variation_btn', 'option');
        echo '</h3>';
        echo '</div>';
        echo '<div class="fabrics">';
        echo '<div class="col">';
        echo '<p>';
        echo the_field('text_variation_btn', 'option');
        echo '</p>';
        echo '</div>';
        echo '<div class="col">';
        echo '<div class="show-fabrics second_content">';
        echo '<span>';
        echo '<span class="strong">';
        echo the_field('btn_variation_btn', 'option');
        echo '</span>';
        echo the_field('qty_variation_btn', 'option');
        echo '</span>';
        echo '<img class="arrow " src="/wp-content/themes/woodsoft/assets/images/icon/btn-arrow.svg" alt="">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

}






add_action( 'woocommerce_before_add_to_cart_button','my_custom_function');

// Update WooCommerce Flexslider options

add_filter( 'woocommerce_single_product_carousel_options', 'ud_update_woo_flexslider_options' );

function ud_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;
    $options['controlNav'] =  true;

    return $options;
}

add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart_button_func_one' );
/*
 * Content below "Add to cart" Button.
 */
function add_content_after_addtocart_button_func_one() {
    if( get_field('form_shortcode') ): ?>
        <?php
        if(ICL_LANGUAGE_CODE=='en'): ?>
            <?php echo '<div class="top-card">
                <div class="flex-bottom">
                    <a class="model model3d">
                        <span>3D model  </span>
                        <img class="svg-image" src="/wp-content/themes/woodsoft/assets/images/icon/download.svg" alt="">
                    </a>
                </div>
            </div>
            ';?>
        <?php elseif(ICL_LANGUAGE_CODE=='ru'): ?>
            <?php echo '<div class="top-card">
                <div class="flex-bottom">
                    <a class="model model3d">
                        <span>3D модель</span>
                        <img class="svg-image" src="/wp-content/themes/woodsoft/assets/images/icon/download.svg" alt="">
                    </a>
                </div>
            </div>
            ';?>
        <?php elseif(ICL_LANGUAGE_CODE=='uk'): ?>
            <?php echo '<div class="top-card">
                <div class="flex-bottom">
                    <a class="model model3d">
                        <span>3D модель</span>
                        <img class="svg-image" src="/wp-content/themes/woodsoft/assets/images/icon/download.svg" alt="">
                    </a>
                </div>
            </div>
            ';?>
        <?php endif;

      ?>

<?php endif;
}





add_filter( 'woocommerce_get_price_html', 'cw_change_product_price_display' );
add_filter( 'woocommerce_cart_item_price', 'cw_change_product_price_display' );
function cw_change_product_price_display( $price ) {
// Your additional text in a translatable string
    $text = __('from ', 'woodsoft' );

// returning the text before the price
return $text . ' ' . $price;
}



/**
 * Remove "Description" Heading Title @ WooCommerce Single Product Tabs
 */
add_filter( 'woocommerce_product_description_heading', '__return_null' );

