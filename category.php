<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage OSN
 * @since OSN 0.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>
				<?php
					if ( is_category() ) {
						$category = get_category( get_query_var('cat') );

						if ( ! empty( $category ) )
							echo '<div class="category-feed">Subscribe to the RSS feed: <a href="' . get_category_feed_link( $category->cat_ID ) . '" title="' . sprintf( __( 'Subscribe to this category', 'appthemes' ), $category->name ) . '">' . '<img src="' . get_stylesheet_directory_uri() . '/images/feed-icon-28x28.png" alt="RSS feed icon" />' . '</a></div>';

					}

					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
