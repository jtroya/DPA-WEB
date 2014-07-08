<?php
/**
 * Template Name: Talleres propedeuticos
 * 
 */

//get_header(); ?>

<?php
	$metas=get_post_meta($post->ID,'_my_meta',true);
	
	//Consultar taxonomia Proyectos y Talleres
	$pytos = get_the_terms($post->ID, 'proyectos-taller-prope');
	if ( $pytos && ! is_wp_error( $pytos ) ) {
		$pytos_links = array();
		foreach ($pytos as $pyto) {
			$pytos_links[] = $pyto->name;
		}
		$pytos_talleres = join(" / ", $pytos_links);
	}

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<!-- Display the taller propedeutico contents -->
	<div class="entry-content">
		<div class="row-fluid">
			<div class="span8">
			<header class="entry-header">			
		        <!-- Display Title -->
		        <h1 class="entry-title"><i class="icondpa-circle"></i> <?php the_title(); ?></h1>        
			</header>
				<?php the_post_thumbnail( array( 480, 270 ) ); ?>
				<br>
				<p></p>
				<?php the_content(); ?>

			</div>
			<div class="span4">
				<header class="entry-header">						        
			        <h3 class="entry-title"><i class="icondpa-circle"></i> Niveles</h3>       
				</header>				
				<p>						
					<span class="ud-nivel-proyecto"><?php echo $pytos_talleres; ?> </span>			
				</p>
				<br>			
				<header class="entry-header">
					<h3 class="entry-title"><i class="icondpa-circle"></i> Contacto</h3>
				</header>
				<p>
					<?php 
						if ($metas['sitio_web_ud']) { echo "<a href='".$metas['sitio_web_ud']."' target='_blank'>"."Sitio web" . "</a>" ; }						
					?>
				</p>
				<p><?php if ($metas['info_contacto_adicional_ud']) { echo $metas['info_contacto_adicional_ud']; } ?></p>
				<br>	
				<header class="entry-header">
					<h3 class="entry-title"><i class="icondpa-circle"></i> Profesores</h3>	
				</header>			
				<ul>
					<?php if ($metas['director_ud'])  { echo "<li>" . $metas['director_ud']  . "</li>"; } ?>
					<?php if ($metas['miembro_ud_2']) { echo "<li>" . $metas['miembro_ud_2'] . "</li>"; } ?>
					<?php if ($metas['miembro_ud_3']) { echo "<li>" . $metas['miembro_ud_3'] . "</li>"; } ?>
					<?php if ($metas['miembro_ud_4']) { echo "<li>" . $metas['miembro_ud_4'] . "</li>"; } ?>
					<?php if ($metas['miembro_ud_5']) { echo "<li>" . $metas['miembro_ud_5'] . "</li>"; } ?>
					<?php if ($metas['miembro_ud_6']) { echo "<li>" . $metas['miembro_ud_6'] . "</li>"; } ?>
					<?php if ($metas['miembro_ud_7']) { echo "<li>" . $metas['miembro_ud_7'] . "</li>"; } ?>
				</ul>
				<br>
				<header class="entry-header">
					<h3 class="entry-title"><i class="icondpa-circle"></i> Horario</h3>
				</header>
				<p>
					<?php if ($metas['horario_ud']) { echo $metas['horario_ud']; } ?>
				</p><br>				
			</div>
		</div>
	</div>
</article>					
