<?php
/**
 * The template used for displaying page content in page-mpaa.php, page-dpaa.php, page-iam.php
 *
 * @package Toolbox
 * @since Toolbox 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php 
			if ( has_post_thumbnail()) { 
				echo "<div style='width:100%; height:auto;'>";							
				the_post_thumbnail('full');				
				echo "</div>";
			}
		?>
		<h1 class="entry-title title-page"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
