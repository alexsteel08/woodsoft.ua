<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


get_header(); ?>


    <main class="main">


    <section class="blog">
        <div class="container">


            <div >
                <h1>
                    <?php
                    $category = get_the_category();
                    $current_category = $category[0];
                    $parent_category = $current_category->category_parent;
                    if ( $parent_category != 0 ) {
                        echo get_cat_name($parent_category);
                    }
                    echo  $current_category->cat_name ;
                    ?>
                </h1>
            </div>



            <div class="blog-category">
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
                $paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $cat_name = get_queried_object()->name;
                $cat_id   = get_cat_ID( $cat_name );
                $new_loop = new WP_Query( array(
                        'post_type'      => 'post',
                        'posts_per_page' => 6,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'id',
                                'terms'    => $cat_id,
                            ),
                        ),
                        'paged'          => $paged
                    )

                );
                if ( $new_loop->have_posts() ): ?>


                    <?php
                    while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>

                        <?php get_template_part( 'template-parts/postitem' );?>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata();
                endif; ?>




            </div>


            <div  class="pagination">
                <?php pagination_bar( $new_loop ); ?>
            </div>

        </div>
    </section>

    </main>

<?php get_footer(); ?>