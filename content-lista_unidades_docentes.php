<?php
/**
 * Template Name: Lista Unidades Docentes
 * 
 */

//get_header(); ?>

<?php	
	//$args = array( 
	//	'post_type' => 'unidad_docente',			
	//	'order' 	=> 'ASC' ,		
	//	);

	//$loop = new WP_Query( $args );	

	//while ( $loop->have_posts() ) : $loop->the_post(); 
		$metas=get_post_meta($post->ID,'_my_meta',true);
?>
		<div class='box-lista-ud'>
			<div class='nombre-ud'>
				<div class='ud icono'>
				<?php 
					if ($metas['numero_ud'])  { 
						$nombre_unidad = $metas['numero_ud'];
						if(strlen(trim($metas['numero_ud'])) <= 2 ) {
							echo "<p>";
						} else {
							if ( strcmp(strtolower($metas['numero_ud']), 'pfch') == 0 ) {
								echo "<p class='ud-grande-pfc'>";
							}else {
								echo "<p class='ud-grande'>";
							}
						}											
					} else { 
						echo "<p>";
						$nombre_unidad = ':-(';												
					}
				?>
				<?php echo trim($nombre_unidad); ?>
					</p>
					<i class="icondpa-aro"></i>
				</div>
			</div>
			<?php if ($metas['nombre_corto_ud'])  { $nombre_ud = $metas['nombre_corto_ud']; } else { $nombre_ud = 'Unidad Docente'; }  ?>
			 <a href="<?php echo get_permalink() ?>"><?php echo $nombre_ud; ?></a>
			
		</div>
<?php 
	//endwhile; // end of the loop. 
	// Reset Post Data
	//wp_reset_postdata();
?>
