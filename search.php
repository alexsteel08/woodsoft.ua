<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header(); ?>


	<div id="primary">
		<div id="content" role="main">
			<div class="blog_baner" <?php if( get_field('blog_baner_bi','option') ): ?> style="background-image: url(<?php the_field('blog_baner_bi','option'); ?>)"<?php endif; ?>>
				<div class="blog_baner_block">
					<div class="blog_baner_content">
						<?php if( get_field('blog_baner-title','option') ): ?>
							<div class="blog_baner-title title">
								<?php the_field('blog_baner-title','option'); ?>
							</div>
						<?php endif; ?>
						<?php if( get_field('blog_baner-text','option') ): ?>
							<div class="blog_baner-text">
								<?php the_field('blog_baner-text','option'); ?>
							</div>
						<?php endif; ?>

                        <div class="blog_baner_search">
                            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
                                <label class="screen-reader-text" for="s"><?php _e('Search:','mtl');?></label>
                                <input placeholder="<?php _e('Search','mtl');?>" type="text" value="<?php echo get_search_query() ?>"
                                name="s" id="s"/>
                                <div class="inp_logo"></div>
                            </form>
                        </div>
                        <div class="blog_baner_cat">
                            <ul>
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
                        <div class="blog_back_to_list">
                            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">< <?php _e('Back to list','mtl');?></a>
                        </div>



                    </div>
				</div>
			</div>

			<div class="blog_posts">
				<div class="blog_posts_block">
					<div class="blog_posts_content">
                        <div class="latest_news">
						<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

						$s=get_search_query();
						$args = array(
							's' =>$s,
							'paged'          => $paged
						);
						// The Query
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) { _e("");
							while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
								<?php get_template_part( 'template-parts/postitem' );?>

                            <?php } }else{ ?>
                                <div class="no_result">
                                    <h2 style='text-align:center;font-weight:bold;color:#000'><?php _e('Nothing Found','mtl');?></h2>

                                </div>
						<?php } ?>

                        </div>
                        <nav class="pagination">
							<?php pagination_bar( $the_query ); ?>
                        </nav>


                    </div>
				</div>
			</div>


		</div>
	</div>


<?php get_footer(); ?>