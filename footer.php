<?php get_template_part( 'template-parts/social' );?>


<footer class="footer">
    <div class="top-footer">
        <div class="container">
            <div class="flex">
                <div class="col">
                    <?php if (get_field('footer_title1', 'option')): ?>
                        <h3><?php the_field('footer_title1', 'option'); ?></h3>
                    <?php endif; ?>

                    <?php if (have_rows('footer_links1', 'option')): ?>
                        <nav class="nav-footer">
                            <ul class="menu">
                                <?php while (have_rows('footer_links1', 'option')): the_row(); ?>
                                    <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('text'); ?></a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <?php if (get_field('footer_title2', 'option')): ?>
                        <h3><?php the_field('footer_title2', 'option'); ?></h3>
                    <?php endif; ?>

                    <?php if (have_rows('footer_links2', 'option')): ?>
                        <nav class="nav-footer">
                            <ul class="menu">
                                <?php while (have_rows('footer_links2', 'option')): the_row(); ?>
                                    <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('text'); ?></a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
                <div class="col contact-col">
                    <?php if (get_field('footer_title3', 'option')): ?>
                        <h3><?php the_field('footer_title3', 'option'); ?></h3>
                    <?php endif; ?>
                    <?php if (get_field('address', 'option')): ?>
                        <p><?php the_field('address', 'option'); ?></p>
                    <?php endif; ?>

                    <?php if (get_field('phone1', 'option')): $footer_phone1 = get_field('phone1', 'option'); ?>
                        <div class="link">
                            <a href="tel:<?php if ($footer_phone1) { echo preg_replace('/[^0-9]/', '', $footer_phone1); } ?>">
                                <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/phone.svg" alt=""> <?php echo $footer_phone1; ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('phone2', 'option')): $footer_phone2 = get_field('phone2', 'option'); ?>
                        <div class="link">
                            <a href="tel:<?php if ($footer_phone2) { echo preg_replace('/[^0-9]/', '', $footer_phone2); } ?>">
                                <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/phone.svg" alt=""> <?php echo $footer_phone2; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('email', 'option')): ?>
                    <div class="link email-link"><a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></div>
                    <?php endif; ?>

                    <div class="popup-btn">
                        <a class="callback" > <?php _e('Leave a request','woodsoft'); ?></a>
                    </div>
                    <?php if( have_rows('social_links', 'option') ): ?>
                        <ul class="social">
                            <?php while( have_rows('social_links', 'option') ): the_row();  $image = get_sub_field('logo'); ?>
                                <li><a href="<?php the_sub_field('link'); ?>"><img class="svg-image" src="<?php echo $image; ?>" alt=""></a></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>



    <?php if (get_field('footer_big_logo', 'option')): ?>
        <div class="footer-logo">
            <div class="container">
                <div class="logo">
                    <img src=" <?php the_field('footer_big_logo', 'option'); ?>" alt="">
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="bottom-flex">
                <div class="col">
                    <p>© Woodsoft | 2022</p>
                </div>
                <div class="col">
<!--                    <div class="developer-link"><span>Розроблено в</span> <a href=""><img src="images/dist/webkitchen.png" alt=""></a></div>-->
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal_callback">
    <div class="modal_callback_block">
        <div class="modal_close callback">X</div>
        <div class="modal_callback_content">
            <?php if(ICL_LANGUAGE_CODE=='en'): ?>
                <?php echo do_shortcode('[contact-form-7 id="8587" title="cf_footer_en"]');?>
            <?php elseif(ICL_LANGUAGE_CODE=='uk'): ?>
                <?php echo do_shortcode('[contact-form-7 id="1407" title="cf_footer"]');?>
            <?php elseif(ICL_LANGUAGE_CODE=='ru'): ?>
                <?php echo do_shortcode('[contact-form-7 id="8586" title="cf_footer_ru"]');?>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="modal_callback_model">
    <div class="modal_callback_block">
        <div class="modal_close callback">X</div>
        <div class="modal_callback_content">

            <?php if( get_field('form_shortcode') ): ?>

                  <?php the_field('form_shortcode'); ?>

            <?php endif; ?>
<!--            --><?php //echo do_shortcode('[contact-form-7 id="4888" title="cf_3model"]');?>
        </div>
    </div>
</div>
<div class="modal_overlay"></div>
<script>
    function videoId(button) {
        var $videoUrl = button.attr("data-video");
        if ($videoUrl !== undefined) {
            var $videoUrl = $videoUrl.toString();
            var srcVideo;

            if ($videoUrl.indexOf("youtube") !== -1) {
                var et = $videoUrl.lastIndexOf("&");
                if (et !== -1) {
                    $videoUrl = $videoUrl.substring(0, et);
                }
                var embed = $videoUrl.indexOf("embed");
                if (embed !== -1) {
                    $videoUrl =
                        "https://www.youtube.com/watch?v=" +
                        $videoUrl.substring(embed + 6, embed + 17);
                }

                srcVideo =
                    "https://www.youtube.com/embed/" +
                    $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
                    "?autoplay=1&mute=1&loop=1&playlist=" +
                    $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
                    "";
            } else if ($videoUrl.indexOf("youtu") !== -1) {
                var et = $videoUrl.lastIndexOf("&");
                if (et !== -1) {
                    $videoUrl = $videoUrl.substring(0, et);
                }
                var embed = $videoUrl.indexOf("embed");
                if (embed !== -1) {
                    $videoUrl =
                        "https://youtu.be/" +
                        $videoUrl.substring(embed + 6, embed + 17);
                }

                srcVideo =
                    "https://www.youtube.com/embed/" +
                    $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
                    "?autoplay=1&mute=1&loop=1&playlist=" +
                    $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
                    "";

            } else if ($videoUrl.indexOf("vimeo") !== -1) {
                srcVideo =
                    "https://player.vimeo.com/video/" +
                    $videoUrl
                        .substring($videoUrl.indexOf(".com") + 5, $videoUrl.length)
                        .replace("/", "") +
                    "?autoplay=1";


            } else if ($videoUrl.indexOf("mp4") !== -1) {
                return (
                    '<video loop playsinline autoplay><source src="' +
                    $videoUrl +
                    '" type="video/mp4"></video>'
                );
            } else {
                alert(
                    "The video assigned is not from Youtube, Vimeo or MP4, remember to enter the correct complete video link .\n - Youtube: https://www.youtube.com/watch?v=43ngkc2Ejgw\n - Vimeo: https://vimeo.com/111939668\n - MP4 https://server.com/file.mp4"
                );
                return false;
            }
            return (
                '<iframe src="' +
                srcVideo +
                '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
            );
        } else {
            alert("No video assigned.");
            return false;
        }
    }


    jQuery(document).ready(function($){
        $(".lets-play").click(function (e) {
            e.preventDefault();
            var $theVideo = videoId($(this));
            if ($theVideo) {
                $("#video-wrap")
                    .html(
                        '<span class="video-overlay"></span><div class="video-container">' +
                        $theVideo +
                        '</div><button class="close-video">x</button>'
                    )
                    .addClass("active");
            }
        });

        $(document).on("click", ".close-video, .video-overlay", function () {
            $("#video-wrap").empty().removeClass("active");
        });

    });
    jQuery(document).ready(function($){
        $( document ).ready(function() {
            $('.trigger').click(function() {
                $('.modal-wrapper').toggleClass('open');
                $('.page-wrapper').toggleClass('blur');
                $('body').toggleClass('_lock');
                return false;
            });
        });

    });


    jQuery(document).ready(function($){
        $('.callback').click(function(event) {
            $('.modal_callback').addClass('open');
            $('.modal_overlay').addClass('open');
            $('body').addClass('_lock');
        });
        $('.modal_close').click(function(event) {
            $('.modal_callback').removeClass('open');
            $('.modal_overlay').removeClass('open');
            $('body').removeClass('_lock');
        });

    });

    jQuery(document).ready(function($){
        $('.model3d').click(function(event) {
            $('.modal_callback_model').addClass('open');
            $('.modal_overlay').addClass('open');
            $('body').addClass('_lock');
        });
        $('.modal_close').click(function(event) {
            $('.modal_callback_model').removeClass('open');
            $('.modal_overlay').removeClass('open');
            $('body').removeClass('_lock');
        });
    });


</script>
<?php wp_footer(); ?>
</div>
</body>
</html>
