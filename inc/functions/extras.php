<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// auto add alt text to image
function change_empty_alt_to_title($response)
{
    if (!$response['alt']) {
        $response['alt'] = sanitize_text_field($response['title']);
    }

    return $response;
}

add_filter('wp_prepare_attachment_for_js', 'change_empty_alt_to_title');

/* hide css version */
function vc_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

