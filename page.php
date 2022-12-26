<?php

if (!defined('ABSPATH')) {
	exit;
}


get_header(); ?>




<?php get_template_part('template-parts/content'); ?>

<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>
    <div class="content_page">
        <div class="content_width">
            <h1 class="content_title"><?php the_title();?></h1>
            <div class="content_text">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php } ?>
<?php

get_footer();
