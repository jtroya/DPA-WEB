<?php
/**
 * Template para Unidades Docentes
 * 
 */

get_header('unidad_docente'); ?>

<!-- <div id="primary"> -->
	<div class="span7 single" >
		<div id="content" role="main">
			<?php //query_posts( 'post_type=unidad_docente'); ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'unidad_docente' ); ?>

				<?php //comments_template( '', false ); ?>

			<?php endwhile; // end of the loop. ?>
			<?php wp_reset_postdata();  ?>
		</div><!-- #content -->
	</div><!-- #span7 -->	
 <!-- #primary -->
 <div  class="span2">
	 <div class="unidad_docente">
	 	<header class="entry-header">
			 <h3 class="entry-title"><i class="icondpa-circle"></i> Unidades Docentes</h3>   
		</header>

		<?php	
			$args = array( 
				'post_type'		 => 'unidad_docente',							
				//'tax_query' 	 => array( 
				//						array ('taxonomy' 	=> 'proyectos',	
				//							   'field' 	=> 'slug',										
				//							   'terms' 	=> 'aula-pfc',
				//							   'operator' => 'NOT IN'
				//							  )
				//					),					
				'posts_per_page' => '-1',	
				'orderby'		 => 'title',
				'order'			 => 'ASC'								
				);

			$loop = new WP_Query( $args );	

			while ( $loop->have_posts() ) : 
				$loop->the_post(); 		
		?>

 	
		<?php get_template_part( 'content', 'lista_unidades_docentes' ); ?>

		<?php 
			endwhile; // end of the loop. 
			// Reset Post Data
			wp_reset_postdata();
		?>	
	</div>
 </div>

<?php get_footer(); ?>