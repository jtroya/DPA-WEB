<?php
/**
 * Template Name: Newsletter Full-width, no sidebar 
 * Description: A full-width template with no sidebar for newsletter
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header('sin-menu'); ?>

		<!-- <div id="primary" class="full-width"> -->
			<div class="span12">
				<div id="content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'newsletter' ); ?>

					<?php comments_template( '', true ); ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #content -->
			</div>
		<!-- </div> -->  <!-- #primary -->

<?php get_footer(); ?>