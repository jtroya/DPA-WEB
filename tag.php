<?php
/**
 * The template used to display Tag Archive pages
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
					<h3 class="page-title"><?php
						printf( __( 'Noticias relacionadas con la palabra clave %s', 'toolbox' ), '<span><i>' . single_tag_title( '', false ) . '</i></span>' );
					?></h3>

					<?php
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) )
							echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
					?>
				</header>

				<?php rewind_posts(); ?>

				<?php toolbox_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php toolbox_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'No se ha encontrado nada', 'toolbox' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Parece que no encontramos lo que estás buscando. Usa la caja de búsqueda.', 'toolbox' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
</div><!-- span5 -->
<div class="span2">
	<?php get_sidebar(); ?>
</div>

<div class="span2">
	<?php wp_related_posts()?>
</div>

<?php get_footer(); ?>