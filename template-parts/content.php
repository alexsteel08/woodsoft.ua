<?php if( have_rows('content') ): ?>
    <?php while( have_rows('content') ): the_row(); ?>

        <?php if( get_row_layout() == 'baner' ): ?>
            <?php get_template_part( 'template-parts/blocks/baner' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'baner_only_image' ): ?>
            <?php get_template_part( 'template-parts/blocks/baner_only_image' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'category' ): ?>
            <?php get_template_part( 'template-parts/blocks/category_list' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'sales_leaders' ): ?>
            <?php get_template_part( 'template-parts/blocks/sales_leaders' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'about_usv2' ): ?>
            <?php get_template_part( 'template-parts/blocks/about_usv2' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'about_blocks' ): ?>
            <?php get_template_part( 'template-parts/blocks/about_blocks' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'about_us' ): ?>
            <?php get_template_part( 'template-parts/blocks/about_us' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'preview' ): ?>
            <?php get_template_part( 'template-parts/blocks/preview' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'social' ): ?>
            <?php get_template_part( 'template-parts/blocks/social' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'philosophy' ): ?>
            <?php get_template_part( 'template-parts/blocks/philosophy' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'contacts' ): ?>
            <?php get_template_part( 'template-parts/blocks/contacts' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'guarantee' ): ?>
            <?php get_template_part( 'template-parts/blocks/guarantee' );?>
        <?php endif; ?>


    <?php endwhile; ?>
<?php endif; ?>