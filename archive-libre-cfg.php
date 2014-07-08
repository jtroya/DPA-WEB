<?php
/**
 * The template for displaying Archive pages for Libre Configuración y Optativas.
 *
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header('grado'); ?>

<div class="span9" id="content">
		<!-- <section id="primary"> -->
			<div id="content" role="main">	
				<header class="entry-header">
					<h1 class="entry-title">Libre Configuración y Optativas</h1>
				</header>
				<div class="entry-content">
					<div class="row-fluid proyectos-box">
						<?php	
							$args = array( 
								'post_type'		 => 'libre-cfg',									
								'posts_per_page' => '-1',	
								'orderby'		 => 'title',
								'order'			 => 'ASC'								
								);

							$loop = new WP_Query( $args );							
						?>
						<div class="proyectos-title-box"><i class="punto"></i><span></span></div>	

						<?php if ( $loop->have_posts() ) : ?>
							<?php while ($loop->have_posts() ) : $loop->the_post(); ?>								
								<?php
									
									//Limpiar los datos de los profesores
									$miembro_ud_2 = '';
									$miembro_ud_3 = '';
									$miembro_ud_4 = '';
									$miembro_ud_5 = '';
									$miembro_ud_6 = '';
									$miembro_ud_7 = '';
								
									//Definir consulta por taxonomia Proyectos y agrupar las UD
									$metas = get_post_meta($post->ID,'_my_meta',true);
									//Consulta el numero de la unidad
									if ($metas['numero_ud']) {	
										$nro_ud = $metas['numero_ud'];
									} else {
										$nro_ud = ":-(";
									}
									//Consulta el nombre corto de la unidad
									if ($metas['nombre_corto_ud']) {
										$nom_corto_ud = $metas['nombre_corto_ud'];
									} else {
										$nom_corto_ud = "ud.sin nombre";
									}


									//Consulta el director de la unidad
									if ($metas['director_ud']) { 
										$director_ud = trim($metas['director_ud']); 
									} else {
										$director_ud = "Ausente";
									}
									//Consulta los profesores miembros
									if ($metas['miembro_ud_2']) { $miembro_ud_2 =  $metas['miembro_ud_2']; }
									if ($metas['miembro_ud_3']) { $miembro_ud_3 =  $metas['miembro_ud_3']; }
									if ($metas['miembro_ud_4']) { $miembro_ud_4 =  $metas['miembro_ud_4']; }
									if ($metas['miembro_ud_5']) { $miembro_ud_5 =  $metas['miembro_ud_5']; }
									if ($metas['miembro_ud_6']) { $miembro_ud_6 =  $metas['miembro_ud_6']; }
									if ($metas['miembro_ud_7']) { $miembro_ud_7 =  $metas['miembro_ud_7']; }							
									//the_title();								
								?>								
								<div class="box-unidad">
									<div class="box-numero-ud">
										<div <?php if (preg_match('/\s/', $metas['numero_ud'])) echo 'class="fondo-numero-gm"'; else echo 'class="fondo-numero-ud"';  ?> >
											<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo $nro_ud; ?></a>
										</div>
									</div> <!-- box-numero-ud -->	
									<div class="box-unidad-miembros">
										<p><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><span class="title-ud"><?php echo $nom_corto_ud; ?></span></a></p>
										<!--
										<ul class="lista-miembros">
											<li><?php //echo $director_ud; ?></li>
											<li><?php //echo $miembro_ud_2; ?></li>
											<li><?php //echo $miembro_ud_3; ?></li>
											<li><?php //echo $miembro_ud_4; ?></li>
											<li><?php //echo $miembro_ud_5; ?></li>
											<li><?php //echo $miembro_ud_6; ?></li>
											<li><?php //echo $miembro_ud_7; ?></li>
										</ul>
										-->
									</div>							
								</div> <!-- box-unidad -->																
							<?php endwhile; ?>	
							<?php wp_reset_postdata(); ?>													
						<?php else : ?>
							<article id="post-0" class="post no-results not-found">
								<header class="entry-header">
									<h1 class="entry-title"><?php _e( 'No existen unidades de Libre configuración y optativas', 'toolbox' ); ?></h1>
								</header><!-- .entry-header -->
							</article><!-- #post-0 -->
						<?php endif; ?>																								
					</div>  <!-- row-fluid proyectos-box -->
				</div>	<!-- #entry-content -->

			</div><!-- #content -->
		<!-- </section> --> <!-- #primary -->
</div>

<?php get_footer(); ?>