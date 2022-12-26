<section class="filter_prod">
    <div class="filter_prod_block">
        <div class="filter_prod_content">
            <div class="filter_prod_img">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/filter-tool.svg">
                <span><?php _e('Filter','woodsoft');?></span>
            </div>
            <div class="filter_prod_filter">
                <?php echo do_shortcode('[woof]'); ?>
            </div>
        </div>
    </div>
</section>