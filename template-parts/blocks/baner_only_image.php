<?php if( get_sub_field('baner_image') ): ?>
    <section class="about-hero">
        <div data-aos="fade-up" class="full-image object-fit">
            <img src="<?php the_sub_field('baner_image'); ?>" alt="">
        </div>
    </section>
<?php endif; ?>