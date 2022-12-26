<?php if( have_rows('category_list','option') ): ?>
    <div class="category">
        <div data-aos="fade-up" class="category-list">
            <?php while( have_rows('category_list','option') ): the_row();  $image = get_sub_field('logo'); ?>
                <div class="col">
                    <a class="category-link" href="<?php the_sub_field('link'); ?>">
                        <div class="icon">
                            <img src="<?php echo $image; ?>" alt="">
                        </div>
                        <span><?php the_sub_field('name'); ?></span>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>



<?php


?>