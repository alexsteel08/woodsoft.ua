<section class="contacts">
    <div class="container">
        <?php if( get_sub_field('title') ): ?>
            <div data-aos="fade-up">
                <h1><?php the_sub_field('title'); ?></h1>
            </div>
        <?php endif; ?>
        <?php if( get_sub_field('map') ): ?>
            <div data-aos="fade-up" class="map-block object-fit">
              <?php the_sub_field('map'); ?>
            </div>
        <?php endif; ?>

        <div data-aos="fade-up" class="conatct-flex">
            <?php if( get_sub_field('title_phone') && get_sub_field('number_phone') ): $num_phone = get_sub_field('number_phone'); ?>
                <div class="col">
                    <h3><?php the_sub_field('title_phone'); ?></h3>
                    <div class="link">
                        <a href="tel:<?php if ($num_phone) { echo preg_replace('/[^0-9]/', '', $num_phone); } ?>"><?php the_sub_field('number_phone'); ?></a>
                    </div>
                    <div class="popup-link popup-btn">
                        <a class="callback"><?php _e('Leave a request','woodsoft'); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if( get_sub_field('title_email') && get_sub_field('e-mail_address') ): ?>
                <div class="col">
                    <h3><?php the_sub_field('title_email'); ?></h3>
                    <div class="link">
                        <a href="mailto:<?php the_sub_field('e-mail_address'); ?>"><?php the_sub_field('e-mail_address'); ?></a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if( get_sub_field('title_address') && get_sub_field('contact_address') ): ?>
                <div class="col">
                    <h3><?php the_sub_field('title_address'); ?></h3>
                    <p><?php the_sub_field('contact_address'); ?></p>
                </div>
            <?php endif; ?>
            <?php if( get_sub_field('title_work_time') && get_sub_field('work_time') ): ?>
                <div class="col">
                    <h3><?php the_sub_field('title_work_time'); ?></h3>
                    <p><?php the_sub_field('work_time'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>