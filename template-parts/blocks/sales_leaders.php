<section class="sales-leaders">
    <div class="container">
        <?php if (get_sub_field('title')): ?>
            <div class="category-title">
                <?php the_sub_field('title'); ?>
            </div>
        <?php endif; ?>
        <?php if (get_sub_field('big_title')): ?>
            <div data-aos="fade-up">
                <h2><?php the_sub_field('big_title'); ?></h2>
            </div>
        <?php endif; ?>
        <?php if (have_rows('products')): ?>
            <div data-aos="fade-up" class="flex">
                <?php while (have_rows('products')): the_row();
                    $image = get_sub_field('image'); ?>
                    <div class="col">
                        <a href="" class="product-block">
                            <div class="image">
                                <img src="<?php echo $image; ?>" alt="<?php the_sub_field('title'); ?>">
                            </div>
                            <div class="info">
                                <div class="title"><?php the_sub_field('title'); ?></div>
                                <div class="price"><?php the_sub_field('price'); ?></div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="container load-container">
        <div data-aos="fade-up" class="load-more">
            <a href="<?php echo wc_get_page_permalink( 'shop' ) ?>"><?php _e('Load more','woodsoft'); ?></a>
        </div>
    </div>
</section>