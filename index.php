<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header(); ?>



    <main class="main">


        <section class="blog">
            <div class="container">


                <div data-aos="fade-up">
                    <h1><?php the_title();?></h1>
                </div>


                <div data-aos="fade-up" class="blog-category">
                    <ul>
                        <li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Блог</a></li>
                        <?php
                        $categories = get_categories(array(
                            'orderby' => 'name',
                            'order' => 'ASC'
                        ));
                        foreach( $categories as $category ){
                            echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li> ';
                        }
                        ?>
                    </ul>
                </div>

                <div class="flex">
                    <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $loop = new WP_Query( array(
                            'post_type' => 'post',

                            'paged'          => $paged )
                    );
                    if ( $loop->have_posts() ): ?>


                        <?php
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <?php get_template_part( 'template-parts/postitem' );?>

                        <?php endwhile; ?>

                        <?php wp_reset_postdata();
                        endif; ?>




                </div>


                <div data-aos="fade-up" class="pagination">
                    <?php pagination_bar( $loop ); ?>
                </div>

            </div>
        </section>

<?php get_footer(); ?>