<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Los_Broders
 */

get_header();
?>
<?php echo '<!-- ' . basename( get_page_template() ) . ' -->'; ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			if(is_front_page()) {
				get_template_part( 'framework/home-page' );
			} else {
			get_template_part( 'template-parts/content', 'page' );
			}
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if(!is_front_page()) {
	get_sidebar();
};

get_footer();
