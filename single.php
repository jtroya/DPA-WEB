<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

<div class="span5 single" id="content">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

	<div class="row-fluid post-navigator">
		<div class="span12"><?php toolbox_content_nav( 'nav-above' ); ?></div>
	</div>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			//if ( comments_open() || '0' != get_comments_number() )
			//	comments_template( '', false );
		?>

	<?php endwhile; // end of the loop. ?>
</div>
<div class="span2"></div>
<div class="span2">
	<?php wp_related_posts()?>
</div>

<?php get_footer(); ?>