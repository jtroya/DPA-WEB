<?php
/**
* Menu de opciones del DPA
* Para incluir el menu se debe usar la instruccion: include_once("menu-dpa.php")
* en el fichero donde quiera que se muestre el menu.
**/

?>


<div class="contmenu grado">
	<div class="icono">
		<i class="icondpa-grado"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'grado' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'grado' ) ); ?>
	</div>
</div>


<div class="contmenu pfc">
	<div class="icono">
		<i class="icondpa-pfc"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'pfc' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'pfc' ) ); ?>
	</div>
</div>


<div class="contmenu master">
	<div class="icono">
		<i class="icondpa-master"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'masteres-oficiales' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'masteres-oficiales' ) ); ?>
	</div>
</div>


<div class="contmenu titulos-propios">
	<div class="icono">
		<i class="icondpa-titulos-propios"></i>
	</div>
	<div class="elements">	
		<p><?php echo dpa_get_theme_menu_name( 'titulos-propios' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'titulos-propios' ) ); ?>		
	</div>
</div>


<div class="contmenu doctorado">
	<div class="icono">
		<i class="icondpa-doctorado"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'doctorado' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'doctorado' ) ); ?>
	</div>
</div>


<div class="contmenu investigacion">
	<div class="icono">
		<i class="icondpa-investigacion"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'investigacion' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'investigacion' ) ); ?>
	</div>
</div>


<div class="contmenu innovacion">
	<div class="icono">
		<i class="icondpa-innovacion"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'innovacion-educativa' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'innovacion-educativa' ) ); ?>
	</div>
</div>


<div class="contmenu instituto-arquitectura">
	<div class="icono">
		<i class="icondpa-circle"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'instituto-arquitectura' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'instituto-arquitectura' ) ); ?>
	</div>
</div>


<div class="contmenu noticias">
	<div class="icono">
		<i class="icondpa-noticias"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'noticias-dpa' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'noticias-dpa' ) ); ?>
	</div>
</div>


<div class="contmenu administracion">
	<div class="icono">
		<i class="icondpa-adm"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'administracion-dpa' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'administracion-dpa' ) ); ?>
	</div>
</div>
