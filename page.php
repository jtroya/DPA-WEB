<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>
<div class="span5">
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
			
			</div><!-- #content -->
		</div><!-- #primary -->
</div>	
<div class="span2"></div>	
<div class="span2">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>