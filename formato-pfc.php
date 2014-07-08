<?php
/**
 * Template Name: Plantilla para PFC
 * Description: Template with one sidebar para PFC
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header('pfc'); ?>

<div class="span5">
	<div id="primary">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'mpaa-dpaa-iam' ); ?>

			<?php //comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>		
		</div><!-- #content -->
	</div> <!-- #primary -->
</div> <!-- #span5 -->
<div class="span2"></div>	
<div class="span2">
	<?php dynamic_sidebar( 'sidebar-pfc' ); ?>
</div>

<?php get_footer(); ?>