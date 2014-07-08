<!DOCTYPE html>

<!--[if IE 6]>

<html id="ie6" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 7]>

<html id="ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html id="ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php

	/*

	 * Print the <title> tag based on what is being viewed.

	 */

	global $page, $paged;



	wp_title( '|', true, 'right' );



	// Add the blog name.

	bloginfo( 'name' );



	// Add the blog description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		echo " | $site_description";



	// Add a page number if necessary:

	if ( $paged >= 2 || $page >= 2 )

		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );



	?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<link href="<?php bloginfo( 'template_url' ); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php bloginfo( 'template_url' ); ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/font/style.css" /> -->

<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/font/dpawebtype/style.css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/font/social-icons/styles.css" />

<!--[if lte IE 7]><script src="<?php bloginfo( 'template_url' ); ?>/font/lte-ie7.js"></script><![endif]-->

<!-- <link rel="profile" href="http://gmpg.org/xfn/11" /> -->

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>

<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>

<![endif]-->



<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo( 'template_url' ); ?>/mstile-144x144.png">


<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>



<div class="container-fluid" id="principal">

	<?php do_action( 'before' ); ?>

	<header id="branding" role="banner">		

		<div class="row-fluid" id="header">

			<div class="span12">		    

			    <div class="row-fluid">

			      <div class="span5">

			      	<div id="logos">

						<hgroup>

							<div id="logopa" class="icondpa-circle">
								<a href="<?php echo get_bloginfo('url'); ?>" alt="Departamento de Proyectos Arquitectónicos">
									<i class="icondpa-dpa" id="logo-dpa"></i>
								</a>
							</div>

							<div id="breadcrumbs-titulos-propios">								
								<i id="logo-titulos-propios" class="icondpa-circle"></i>														
							</div>						

							<div id="blogname">
								<h1 id="site-title">
									Títulos Propios <br />
									Departamento de Proyectos <br />									
									Arquitectónicos
									</a>
								</h1>
							</div>

						</hgroup>

					</div>			

			      </div>



			      <div class="span3 offset4">

			      	<div id="logos">

						<hgroup>

							<div id="info-dpa">

								<p class="iconos">
									<i class="icondpa-dpa"></i> 
									<a href="http://etsamadrid.aq.upm.es/" alt="ETSAM" title="Escuela tecnica superior de arquitectura de madrid etsam">
										<i class="icondpa-etsam"></i>
									</a> 
									<a href="http://www.upm.es" title="Universidad Politecnica de madrid">										
										<img class="upm-icono" alt="UPM" src="<?php bloginfo( 'template_url' ); ?>/images/upm-icon.png">
									</a>									
								</p>

								<p class="nigger">Departamento de Proyectos Arquitect&oacute;nicos</p>

								<p><a href="mailto:proyectos.arquitectura@upm.es" alt="email departamento proyectos etsam madrid">proyectos.arquitectura@upm.es</a></p>

								<p>Tel&eacute;fono 91 336 65 37 / 89</p>

								<p>Avenida Juan de Herrera, 4. 28040 Madrid</p>

							</div>

						</hgroup>

					</div>

			      </div>

			    </div>

		  	</div>			

		</div>

	</header><!-- #branding -->			



	<div class="row-fluid">
		<div class="span3 menu-dpa">
			<?php include_once("menu-dpa.php"); ?>
			<div>
				<?php dynamic_sidebar( 'sidebar-3' ); ?>	
			</div>
		</div><!-- span3 menu-dpa -->

