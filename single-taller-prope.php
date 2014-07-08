<?php
/**
 * Template Name: Talleres Propedeuticos
 * 
 */

get_header('taller-prope'); ?>

<!-- <div id="primary"> -->
	<div class="span7 single" >
		<div id="content" role="main">			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'taller-prope' ); ?>

				<?php //comments_template( '', false ); ?>

			<?php endwhile; // end of the loop. ?>
			<?php wp_reset_postdata();  ?>
		</div><!-- #content -->
	</div><!-- #span7 -->	
 <!-- #primary -->
 <div  class="span2">
	 <div class="unidad_docente">
	 	<header class="entry-header">
			 <h3 class="entry-title"><i class="icondpa-circle"></i> Talleres Propedéuticos</h3>   
		</header>

		<?php	
			$args = array( 
				'post_type'		 => 'taller-prope',							
				'posts_per_page' => '-1',	
				'orderby'		 => 'title',
				'order'			 => 'ASC'								
				);

			$loop = new WP_Query( $args );	

			while ( $loop->have_posts() ) : 
				$loop->the_post(); 		
		?>

 	
		<?php get_template_part( 'content', 'lista-talleres-prope' ); ?>

		<?php 
			endwhile; // end of the loop. 
			// Reset Post Data
			wp_reset_postdata();
		?>	
	</div>
 </div>

<?php get_footer(); ?>