<?php
/**
 * Template Name: Template para Titulos Propios
 * Este template es para ser usado en paginas en Titulos Propios
 */

get_header('titulos-propios'); ?>
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
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>

<?php get_footer(); ?>