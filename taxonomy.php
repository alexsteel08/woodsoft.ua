<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


get_header(); ?>


	<div id="primary">
		<div id="content" role="main">
			<div class="blog_baner" <?php if ( get_field( 'blog_baner_bi', 'option' ) ): ?> style="background-image: url(<?php the_field( 'blog_baner_bi', 'option' ); ?>)"<?php endif; ?>>
				<div class="blog_baner_block">
					<div class="blog_baner_content">
						<div class="blog_baner-title title">
							<?php
							$taxonomy = get_queried_object();
							echo  $taxonomy->name;
							?>
						</div>

<!--						--><?php
//						the_archive_description( '<div class="blog_baner-text">', '</div>' );
//						?>
						<div class="blog_baner_search">
							<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
								<label class="screen-reader-text" for="s">Поиск: </label>
								<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s"/>
								<!--                                <input type="submit" id="searchsubmit" value="найти" />-->
							</form>
						</div>
						<div class="blog_baner_cat">
							<?php
							$terms = get_terms( 'tags' );
							echo '<ul>';
							foreach ( $terms as $term ) {
								$term_link = get_term_link( $term );
								if ( is_wp_error( $term_link ) ) {
									continue;
								}
								echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
							}
							echo '</ul>';
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="blog_posts">
				<div class="blog_posts_block">
					<div class="blog_posts_content">
						<?php
						$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$cat_name = get_queried_object()->name;
						$cat_id   = get_cat_ID( $cat_name );
						$new_loop = new WP_Query( array(
								'post_type'      => 'analytics',
								'posts_per_page' => 6,
//								'tax_query'      => array(
//									array(
//										'taxonomy' => 'category',
//										'field'    => 'id',
//										'terms'    => $cat_id,
//									),
//								),
								'paged'          => $paged
							)

						);
						if ( $new_loop->have_posts() ): ?>

						<div class="latest_news">
							<?php
							while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>

								<?php get_template_part( 'template-parts/analytics' ); ?>

							<?php endwhile; ?>

							<?php wp_reset_postdata();
							endif; ?>
							<nav class="pagination">
								<?php pagination_bar( $loop ); ?>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>