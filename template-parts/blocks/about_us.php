<section class="about about-home">
    <div class="container">
        <div class="flex">
            <div class="col-9">
                <?php if (get_sub_field('label')): ?>
                    <div class="category-title"><?php the_sub_field('label'); ?></div>
                <?php endif; ?>

                <div data-aos="fade-right" class="about-content">
                    <?php if (get_sub_field('title')): ?>
                        <h2><?php the_sub_field('title'); ?></h2>
                    <?php endif; ?>

                    <?php if (get_sub_field('company_name')): ?>
                        <div class="title">
                            <span><?php the_sub_field('company_name'); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('text')): ?>
                        <p><?php the_sub_field('text'); ?></p>
                    <?php endif; ?>

                    <?php if (have_rows('list')): ?>
                    <ul>
                        <?php while (have_rows('list')): the_row(); ?>
                            <li><?php the_sub_field('text'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-3">
                <div data-aos="fade-left" class="image-inner">
                    <?php if (get_sub_field('image_first')): ?>
                        <div class="about-img1 object-fit">
                            <img src="<?php the_sub_field('image_first'); ?>" alt="">
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('image_second')): ?>
                        <div class="about-img2 object-fit">
                            <img src="<?php the_sub_field('image_second'); ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>