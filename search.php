<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>
<div class="span5">
		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php printf( __( 'Resultados') ); ?>
						<?php //printf( __( 'Resultados para: %s', 'toolbox' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
					<p><?php get_search_form(); ?></p>
				</header>

				<?php toolbox_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php toolbox_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( '¡Upss!...No hemos encontrado nada :-(', 'toolbox' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Lo sentimos, pero no hemos encontramos nada relacionado con el/los término(s) de búsqueda. Inténtalo por favor con otros términos.', 'toolbox' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

</div>
<div class="span2"></div>	
<div class="span2">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>

<?php get_footer(); ?>