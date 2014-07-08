<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header('gdi'); ?>

<?php 
	$args = array( 
		'post_type'		 => 'grupos-investigacion',			
		'posts_per_page' => '-1',	
		'orderby'		 => 'title',
		'order'			 => 'ASC'								
		);

	$loop = new WP_Query( $args );
	// Find connected pages (for all posts)
	p2p_type( 'gdi_to_profesor' )->each_connected( $loop );
?>

<div class="span9" id="content">
	<div id="content" role="main">	
		<section id="primary">
			<div id="content" role="main">

			<?php if ( $loop->have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">Grupos de Investigación</h1>
				</header>
				<!-- <div class="row-fluid"> -->
					<?php $g=0; /* Variable para generar las filas de los grupos */ ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	
						<?php
																		
							//Para buscar los profesores vinculados a los grupos de investigacion
							$connected = new WP_Query( array(
							  'connected_type' => 'gdi_to_profesor',
							  'connected_items' => $post,
							  'nopaging' => true,
							) );
							//Verificar si $g es impar para generar una nueva fila
							$g++;
							if (($g > 2)||($g == 1)) { echo '<div class="row-fluid gdi-boxes">'; }
						?>
						<div class="span6">
							<div class="span4">
								<div class="logo-gdi-big">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(array(135, 135)); ?>
									</a>
								</div>								
							</div>				
							<div class="span8 gdi-miembros">
								<h3>
									<a class="gdi-nombre" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
										<?php the_title() ?>
									</a>
								</h3>
								<p>Investigador Principal</p>

								<?php 
									/*
									foreach ( $post->connected as $post ) : setup_postdata( $post );
								        the_title();
								        echo '<p>Connection ID: ' . $post->p2p_id . '</p>';
								    endforeach; 
								    */
								?>

								<?php 
									if ($connected->have_posts()) { 
										$connected->the_post();
										echo '<ul><li>';
										the_title();
										echo '</li></ul>'; 										
									} else { 
										echo ":-( Error al buscar inv. responsable"; 
									} 									
								?>									
								<!-- <p>Investigadores</p> -->
								<br>
								<?php
									
									if ($connected->have_posts()) {
										echo "<p>Investigadores</p>";	
										echo "<ul>";
										while ($connected->have_posts() ) {
											$connected->the_post();	
											echo "<li>";
											the_title();											
											echo "</li>";
										}
										echo "</ul>";
									}									
								?>
							</div>			
						</div>	<!-- span6 -->
						<?php
						//Verificar si $g es 2 para generar una nueva fila
						if ($g == 2) { echo '</div>'; $g=0;	}																			
						?>
					<?php endwhile; ?>
					<?php  wp_reset_postdata(); ?>					
				<!--</div> -->  <!-- row-fluid -->				
			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
	</div>
</div>

<?php get_footer(); ?>