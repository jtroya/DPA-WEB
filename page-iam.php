<?php
/**
 * Template Name: Template para iAM
 * Este template es para ser usado en paginas para el instituto de arquitectura Madrid
 */

get_header('iam'); ?>
<div class="span5">
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'mpaa-dpaa-iam' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
			
			</div><!-- #content -->
		</div><!-- #primary -->
</div>	
<div class="span2"></div>	
<div class="span2">
	<?php dynamic_sidebar( 'sidebar-iam' ); ?>
</div>

<?php get_footer(); ?>