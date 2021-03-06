<?php
/**
 * Toolbox functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'toolbox_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override toolbox_setup() in a child theme, add your own toolbox_setup to your child theme's
 * functions.php file.
 */
function toolbox_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on toolbox, use a find and replace
	 * to change 'toolbox' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'toolbox', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */


	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery' ) );

	/**
	 * Add support for thumbnails
	 */	
	add_theme_support( 'post-thumbnails' );
}
endif; // toolbox_setup

/**
 * Tell WordPress to run toolbox_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'toolbox_setup' );


function register_my_menus() {
	register_nav_menus(array(
      'grado' => __( 'Grado' ),
      'pfc' => __( 'Proyecto Fin de Carrera' ),      
      'masteres-oficiales' => __( 'Masteres Oficiales' ),
      'instituto-arquitectura' => __( 'Instituto Arquitectura Madrid' ),      
      'doctorado' => __( 'Doctorado' ),
      'investigacion' => __( 'Investigacion' ),
      'innovacion-educativa' => __( 'Innovacion Educativa' ),
      'noticias-dpa' => __( 'Noticias DPA' ),
      'administracion-dpa' => __( 'Administracion DPA' ),
      'master-habilitante' => __( 'Master Habilitante' ),
      'titulos-propios' => __( 'Titulos propios de Posgrado' ),
    )
	 );
}
add_action( 'init', 'register_my_menus' );

/**
 * Set a default theme color array for WP.com.
 */
$themecolors = array(
	'bg' => 'ffffff',
	'border' => 'eeeeee',
	'text' => '444444',
);

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
 /*
function toolbox_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'toolbox_page_menu_args' );
*/

/**
 * Register widgetized area and update sidebar with default widgets
 */
function toolbox_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'toolbox' ),
		'id' => 'sidebar-1',
		'description' => __( 'Sidebar que va en la columna derecha', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title"><i class="icondpa-circle"></i>&nbsp;' ,
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar 2', 'toolbox' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional second sidebar area', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title"><i class="icondpa-circle"></i>&nbsp;',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar 3', 'toolbox' ),
		'id' => 'sidebar-3',
		'description' => __( 'Sidebar que va debajo del menu principal', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title"><i class="icondpa-circle"></i>&nbsp;',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar MPAA', 'toolbox' ),
		'id' => 'sidebar-mpaa',
		'description' => __( 'Sidebar para masteres oficiales | MPAA', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title"><i class="icondpa-circle"></i>&nbsp;',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar DPAA', 'toolbox' ),
		'id' => 'sidebar-dpaa',
		'description' => __( 'Sidebar para doctorado | DPAA', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title"><i class="icondpa-circle"></i>&nbsp;',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar iAM', 'toolbox' ),
		'id' => 'sidebar-iam',
		'description' => __( 'Sidebar para iAM', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title"><i class="icondpa-circle"></i>&nbsp;',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar iAM Cursos', 'toolbox' ),
		'id' => 'sidebar-iam-cursos',
		'description' => __( 'Sidebar para cursos del iAM', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title"><i class="icondpa-circle"></i>&nbsp;',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar PFC', 'toolbox' ),
		'id' => 'sidebar-pfc',
		'description' => __( 'Sidebar para PFC', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title"><i class="icondpa-circle"></i>&nbsp;',
		'after_title' => '</h1>',
	) );
}

add_action( 'init', 'toolbox_widgets_init' );

if ( ! function_exists( 'toolbox_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Toolbox 1.2
 */
function toolbox_content_nav( $nav_id ) {
	global $wp_query;

	?>
	<nav id="<?php echo $nav_id; ?>">
		<h1 class="assistive-text section-heading"><?php _e( 'Post navigation', 'toolbox' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'toolbox' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'toolbox' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Anteriores noticias', 'toolbox' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Recientes noticias <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // toolbox_content_nav


if ( ! function_exists( 'toolbox_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own toolbox_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Toolbox 0.4
 */
function toolbox_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'toolbox' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'toolbox' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'toolbox' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'toolbox' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'toolbox' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'toolbox' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for toolbox_comment()

if ( ! function_exists( 'toolbox_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own toolbox_posted_on to override in a child theme
 *
 * @since Toolbox 1.2
 */
function toolbox_posted_on() {
	printf( __( '<span class="sep">Publicado el </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> por </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'toolbox' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'toolbox' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Toolbox 1.2
 */
function toolbox_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'toolbox_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since Toolbox 1.2
 */
function toolbox_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so toolbox_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so toolbox_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in toolbox_categorized_blog
 *
 * @since Toolbox 1.2
 */
function toolbox_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'toolbox_category_transient_flusher' );
add_action( 'save_post', 'toolbox_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function toolbox_enhanced_image_navigation( $url ) {
	global $post, $wp_rewrite;

	$id = (int) $post->ID;
	$object = get_post( $id );
	if ( wp_attachment_is_image( $post->ID ) && ( $wp_rewrite->using_permalinks() && ( $object->post_parent > 0 ) && ( $object->post_parent != $id ) ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'toolbox_enhanced_image_navigation' );


/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a Toolbox.
 */



/**
 * Agenda del DPA
 */

add_action( 'add_meta_boxes', array ( 'agenda', 'metabox_agenda' ) );

class agenda {
    /**
     * Replaces the meta boxes.
     *
     * @return void
     */
    public static function metabox_agenda()
    {
        if ( $GLOBALS['post']->post_type!='post' ) {
            return;
        }

        /*
        remove_meta_box(
            'postexcerpt' // ID
        ,   ''            // Screen, empty to support all post types
        ,   'normal'      // Context
        );
        */

        add_meta_box(
            'fechaagenda'     // Reusing just 'postexcerpt' doesn't work.
        ,   __( 'Evento en la Agenda (Recuerda marcar la Categor&iacute;a de Agenda)' )    // Title
        ,   array ( __CLASS__, 'show' ) // Display function
        ,   null              // Screen, we use all screens with meta boxes.
        ,   'normal'          // Context
        ,   'core'            // Priority
        );
    }

    /**
     * Output for the meta box.
     *
     * @param  object $post
     * @return void
     */
    public static function show( $post )
    {
    ?>
        <label for="titulo">T&iacute;tulo del evento</label><input type="text" class="widefat" id="tituloevento" name="tituloevento" value="<?php echo get_post_meta( $post->ID, 'tituloevento', true ); ?>" />
            <br /><br />
            <label for="fecha">Fecha y hora. <i>FORMATO: AAAA-mm-dd-hhmm</i></label><input type="text" class="widefat" placeholder="AAAA-mm-dd-hhmm" id="fechaevento" name="fechaevento" value="<?php echo get_post_meta( $post->ID, 'fechaevento', true ); ?>" />  
            <label for="lugar">Lugar</label><input type="text" class="widefat" placeholder="Aula, Centro" id="lugarevento" name="lugarevento" value="<?php echo get_post_meta( $post->ID, 'lugarevento', true ); ?>" />  
                <?php
        
    }

}

add_action('save_post', 'save_agenda');

function save_agenda(){
    global $post;
    if ($post->post_type=='post') {
	    if ($_POST['tituloevento']) {
	    update_post_meta($post->ID, "tituloevento", $_POST["tituloevento"]);
	    }
	    if ($_POST["fechaevento"]) {
	    update_post_meta($post->ID, "fechaevento", $_POST["fechaevento"]);
	    }
	    if ($_POST["lugarevento"]) {
	    update_post_meta($post->ID, "lugarevento", $_POST["lugarevento"]);
	    }
    }
}



/**
 * Tipos de contenido para las unidades docentes
 *
 */
function my_custom_post_unidad_docente() {
	$labels = array(
		'name'               => _x( 'Unidades Docentes', 'unidad_docente' ),
		'singular_name'      => _x( 'Unidad docente', 'unidad_docente' ),
		'add_new'            => _x( 'Agregar nueva unidad docente', 'unidad_docente' ),
		'add_new_item'       => __( 'Agregar nueva Unidad Docente' ),
		'edit_item'          => __( 'Editar' ),
		'new_item'           => __( 'Nueva Unidad Docente' ),
		'all_items'          => __( 'Todas las Unid. Docentes' ),
		'view_item'          => __( 'Ver Unidad Docente' ),
		'search_items'       => __( 'Buscar Unidad Docente' ),
		'not_found'          => __( 'No se han encontrado Unidades Docentes' ),
		'not_found_in_trash' => __( 'No se han encontrado Unidades Docentes en la papelera' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Unidades Docentes'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Manten actualizada la información de las unidades docentes',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'author', 'thumbnail' ),
		'has_archive'   => true,
    	'query_var'		=> true,
    	'rewrite' 		=> array( 'slug' => 'unidades-docentes' ),
    	//'taxonomies' 	=> array( 'category' )
	);
	register_post_type( 'unidad_docente', $args );
}

add_action( 'init', 'my_custom_post_unidad_docente' );


/***
* Crear la taxonomia para las unidades docentes
*
**/

function create_proyectos_taxonomy () {
	$labels = array(
		'name'              => _x( 'Proyectos', 'taxonomy general name' ),
		'singular_name'     => _x( 'Proyectos', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar en Proyectos' ),
		'all_items'         => __( 'Todas los Proyectos' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Editar Proyectos' ), 
		'update_item'       => __( 'Actualizar Proyectos' ),
		'add_new_item'      => __( 'Agregar Proyecto' ),
		'new_item_name'     => __( 'Nuevo Proyecto' ),
		'menu_name'         => __( 'Proyectos' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
    	'show_admin_column' => true,
    	'query_var' => true,
    	'rewrite' => array( 'slug' => 'proyectos' )
	);

	register_taxonomy( 'proyectos', 'unidad_docente', $args );
}

add_action( 'init', 'create_proyectos_taxonomy', 0 );


/***
* Taxonomia para las unidades docentes - Aulas
*
**/
function create_aulas_taxonomy () {
	$labels = array(
		'name'              => _x( 'Aulas', 'taxonomy general name' ),
		'singular_name'     => _x( 'Aula', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar en Aulas' ),
		'all_items'         => __( 'Todas las aulas' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Editar Aulas' ), 
		'update_item'       => __( 'Actualizar Aulas' ),
		'add_new_item'      => __( 'Agregar Aula' ),
		'new_item_name'     => __( 'Nueva Aula' ),
		'menu_name'         => __( 'Aulas' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
    	'show_admin_column' => true,
    	'query_var' => true,
    	'rewrite' => array( 'slug' => 'aulas' )
	);

	register_taxonomy( 'aulas', 'unidad_docente', $args );
}

add_action( 'init', 'create_aulas_taxonomy', 0 );


/**
 * Tipos de contenido para grupos de investigacion
 *
 */

function my_custom_post_gdi() {
	$labels = array(
		'name'               => _x( 'Grupos de Investigación', 'grupos-investigacion' ),
		'singular_name'      => _x( 'Grupo de investigación', 'grupos-investigacion' ),
		'add_new'            => _x( 'Agregar nuevo grupo de investigación', 'grupos-investigacion' ),
		'add_new_item'       => __( 'Agregar nuevo Grupo de Investigación' ),
		'edit_item'          => __( 'Editar' ),
		'new_item'           => __( 'Nueva Grupo de Investigación' ),
		'all_items'          => __( 'Todos los Grupos de Investigación' ),
		'view_item'          => __( 'Ver Grupo de Investigación' ),
		'search_items'       => __( 'Buscar Grupo de Investigación' ),
		'not_found'          => __( 'No se han encontrado Grupos de Investigación' ),
		'not_found_in_trash' => __( 'No se han encontrado Grupos de Investigación en la papelera' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Grupos de Investigación'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Manten actualizada la información de los grupos de investigación',
		'public'        => true,
		'menu_position' => 7,
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'   => true,
    	'query_var'		=> true,
    	'rewrite' 		=> array( 'slug' => 'grupos-investigacion' ),
    	//'taxonomies' 	=> array( 'category' )
	);
	register_post_type( 'grupos-investigacion', $args );
}

add_action( 'init', 'my_custom_post_gdi' );


/**
 * Tipos de contenido para grupos de investigacion
 *
 */

function my_custom_post_profesores() {
	$labels = array(
		'name'               => _x( 'Profesores', 'profesores' ),
		'singular_name'      => _x( 'Profesor', 'profesores' ),
		'add_new'            => _x( 'Agregar nuevo profesor', 'profesores' ),
		'add_new_item'       => __( 'Agregar un nuevo profesor' ),
		'edit_item'          => __( 'Editar' ),
		'new_item'           => __( 'Nuevo Profesor' ),
		'all_items'          => __( 'Todos los profesores' ),
		'view_item'          => __( 'Ver profesor' ),
		'search_items'       => __( 'Buscar a un profesor' ),
		'not_found'          => __( 'No se han encontrado Profesores' ),
		'not_found_in_trash' => __( 'No se han encontrado Profesores en la papelera' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Profesorado'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Manten actualizada la información de los profesores',
		'public'        => true,
		'menu_position' => 9,
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'   => true,
    	'query_var'		=> true,
    	'rewrite' 		=> array( 'slug' => 'profesores' ),
    	
	);
	register_post_type( 'profesores', $args );
}

add_action( 'init', 'my_custom_post_profesores' );


/***
* Crear la taxonomia para los profesores
*
**/

function create_tipo_profesor_taxonomy () {
	$labels = array(
		'name'              => _x( 'Tipo vinculación', 'taxonomy general name' ),
		'singular_name'     => _x( 'Tipo vinculación', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar en Tipo vinculación' ),
		'all_items'         => __( 'Todas los Tipo de vinculación' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Editar Tipo vinculación' ), 
		'update_item'       => __( 'Actualizar Tipo vinculación' ),
		'add_new_item'      => __( 'Agregar Tipo de vinculación' ),
		'new_item_name'     => __( 'Nuevo Tipo de vinculación' ),
		'menu_name'         => __( 'Tipo de vinculación' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
    	'show_admin_column' => true,
    	'query_var' => true,
    	'rewrite' => array( 'slug' => 'tipo-profesor' )
	);

	register_taxonomy( 'tipo-profesor', 'profesores', $args );
}

add_action( 'init', 'create_tipo_profesor_taxonomy', 0 );



/**
 * Tipos de contenido para libre configuracion
 *
 */
function my_custom_post_libre_configuracion() {
	$labels = array(
		'name'               => _x( 'Libre Configuracion', 'libre-cfg' ),
		'singular_name'      => _x( 'Libre Configuracion', 'libre-cfg' ),
		'add_new'            => _x( 'Agregar nueva', 'libre-cfg' ),
		'add_new_item'       => __( 'Agregar nueva unid. de Libre Configuracion' , 'libre-cfg' ),
		'edit_item'          => __( 'Editar' ),
		'new_item'           => __( 'Nueva Unid. Libre Configuracion' ),
		'all_items'          => __( 'Listado Unid. de Libre Configuracion' ),
		'view_item'          => __( 'Ver Unid. de Libre Configuracion' ),
		'search_items'       => __( 'Buscar Unid. de Libre Configuracion' ),
		'not_found'          => __( 'No se han encontrado Unidades de Libre Configuracion' ),
		'not_found_in_trash' => __( 'No se han encontrado Unidades de Libre Configuracion en la papelera' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Unid. Libre Configuracion'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Manten actualizada la información de las unidades de libre configuracion',
		'public'        => true,
		'menu_position' => 10,
		'supports'      => array( 'title', 'editor', 'author', 'thumbnail' ),
		'has_archive'   => true,
    	'query_var'		=> true,
    	'rewrite' 		=> array( 'slug' => 'libre-configuracion' ),    	
	);
	register_post_type( 'libre-cfg', $args );
}

add_action( 'init', 'my_custom_post_libre_configuracion' );


/***
* Taxonomia para libre configuracion - Aulas
*
**/
function create_aulas_libre_cfg_taxonomy () {
	$labels = array(
		'name'              => _x( 'Aulas', 'taxonomy general name' ),
		'singular_name'     => _x( 'Aula', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar en Aulas' ),
		'all_items'         => __( 'Todas las aulas' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Editar Aulas' ), 
		'update_item'       => __( 'Actualizar Aulas' ),
		'add_new_item'      => __( 'Agregar Aula' ),
		'new_item_name'     => __( 'Nueva Aula' ),
		'menu_name'         => __( 'Aulas' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
    	'show_admin_column' => true,
    	'query_var' => true,
    	'rewrite' => array( 'slug' => 'aulas-libre-cfg' )
	);

	register_taxonomy( 'aulas-libre-cfg', 'libre-cfg', $args );
}

add_action( 'init', 'create_aulas_libre_cfg_taxonomy', 0 );


/**
 * Tipos de contenido para talleres propedeuticos
 *
 */
function my_custom_post_talleres_propedeuticos() {
	$labels = array(
		'name'               => _x( 'Taller Propedeutico', 'taller-prope' ),
		'singular_name'      => _x( 'Taller Propedeutico', 'taller-prope' ),
		'add_new'            => _x( 'Agregar nuevo', 'taller-prope' ),
		'add_new_item'       => __( 'Agregar nueva taller propedeutico' , 'taller-prope' ),
		'edit_item'          => __( 'Editar' ),
		'new_item'           => __( 'Nuevo Taller Propedeutico' ),
		'all_items'          => __( 'Listado Talleres Propedeuticos' ),
		'view_item'          => __( 'Ver Taller Propedeutico' ),
		'search_items'       => __( 'Buscar Taller Propedeutico' ),
		'not_found'          => __( 'No se han encontrado Talleres Propedeuticos' ),
		'not_found_in_trash' => __( 'No se han encontrado Talleres Propedeuticos en la papelera' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Talleres Propedeuticos'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Manten actualizada la información de los talleres propedeuticos',
		'public'        => true,
		'menu_position' => 12,
		'supports'      => array( 'title', 'editor', 'author', 'thumbnail' ),
		'has_archive'   => true,
    	'query_var'		=> true,
    	'rewrite' 		=> array( 'slug' => 'talleres-propedeuticos' ),    	
	);
	register_post_type( 'taller-prope', $args );
}

add_action( 'init', 'my_custom_post_talleres_propedeuticos' );

/***
* Taxonomia para talleres propedeuticos - proyectos
*
**/
function create_proyectos_taller_propedeutico_taxonomy () {
	$labels = array(
		'name'              => _x( 'Proyectos', 'taxonomy general name' ),
		'singular_name'     => _x( 'Proyecto', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar en Proyectos' ),
		'all_items'         => __( 'Todas los proyectos' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Editar Proyectos' ), 
		'update_item'       => __( 'Actualizar Proyectos' ),
		'add_new_item'      => __( 'Agregar Proyecto' ),
		'new_item_name'     => __( 'Nuevo Proyecto' ),
		'menu_name'         => __( 'Proyectos' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
    	'show_admin_column' => true,
    	'query_var' => true,
    	'rewrite' => array( 'slug' => 'proyectos-taller-prope' )
	);

	register_taxonomy( 'proyectos-taller-prope', 'taller-prope', $args );
}

add_action( 'init', 'create_proyectos_taller_propedeutico_taxonomy', 0 );



/**
 * Tipos de contenido para aulas pfc. Es una categoria dentro del 
 * custom post type unidad_docente
 *
 */
function my_custom_post_aulas_pfc() {
	$labels = array(
		'name'               => _x( 'Aulas-PFC', 'aula-pfc' ),
		'singular_name'      => _x( 'Aulas-PFC', 'aula-pfc' ),		
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Información relacionada con Aulas PFC',
		'public'        => true,
		'has_archive'   => true,
    	'query_var'		=> true,
    	'show_ui'		=> false,
    	'show_in_menu'	=> false,
    	'rewrite' 		=> array( 'slug' => 'aulas-pfc' ),    
	);
	register_post_type( 'aula-pfc', $args );
}

add_action( 'init', 'my_custom_post_aulas_pfc' );
	


/**
 * Metabox para unidades docentes, grupos de investagacion, profesores, libre configuracion
 *
 */

define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));

function my_meta_init() {
	// add a meta box for Unidad Docente
	foreach (array('unidad_docente') as $type)  {
	    add_meta_box('my_all_meta', 'Información Adicional de la Unidad Docente', 'my_meta_setup', $type, 'normal', 'high');
	}

	// add a meta box for grupos de investigacion
	foreach (array('grupos-investigacion') as $type)  {
	    add_meta_box('my_all_meta', 'Información Adicional de los grupos de investigacion', 'my_meta_setup', $type, 'normal', 'high');
	}

	// add a meta box for profesores
	foreach (array('profesores') as $type)  {
	    add_meta_box('my_all_meta', 'Información Adicional para Profesores', 'my_meta_setup', $type, 'normal', 'high');
	}

	// add a meta box for libre configuracion
	foreach (array('libre-cfg') as $type)  {
	    add_meta_box('my_all_meta', 'Información Adicional para Unid. Libre Configuracion', 'my_meta_setup', $type, 'normal', 'high');
	}

	// add a meta box for talleres propedeuticos
	foreach (array('taller-prope') as $type)  {
	    add_meta_box('my_all_meta', 'Información Adicional para Talleres Propedeuticos', 'my_meta_setup', $type, 'normal', 'high');
	}

	// add a callback function to save any data a user enters in
    add_action('save_post','my_meta_save');
}


function my_meta_setup() {
	global $post;
  
    // using an underscore, prevents the meta variable
    // from showing up in the custom fields section
    $meta = get_post_meta($post->ID,'_my_meta',TRUE);
    //logConsole('my meta ', $meta);

    // para unidades docentes
    if ($post->post_type=='unidad_docente') {
    	include(MY_THEME_FOLDER . '/custom/meta.php');
    } 

    // para grupos de investigacion
    if ($post->post_type=='grupos-investigacion') {
    	include(MY_THEME_FOLDER . '/custom/meta-gdi.php');
    }

    // para profesores
    if ($post->post_type=='profesores') {
    	include(MY_THEME_FOLDER . '/custom/meta-profesores.php');
    }

    // para libre configuracion
    if ($post->post_type=='libre-cfg') {
    	include(MY_THEME_FOLDER . '/custom/meta-libre-cfg.php');    	
    }

    // para talleres propedeuticos
    if ($post->post_type=='taller-prope') {
    	include(MY_THEME_FOLDER . '/custom/meta-taller-prope.php');    	
    }

    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

add_action('admin_init','my_meta_init');

function my_meta_save($post_id) {
    // authentication checks
 
    // make sure data came from our meta box
    if (!wp_verify_nonce($_POST['my_meta_noncename'],__FILE__)) return $post_id;
 
    // check user permissions
    if (!current_user_can('edit_post', $post_id)) return $post_id;
     
    $current_data = get_post_meta($post_id, '_my_meta', TRUE);  
  
    $new_data = $_POST['_my_meta'];
 
    my_meta_clean($new_data);
     
    if ($current_data) {
        if (is_null($new_data)) {
        	delete_post_meta($post_id,'_my_meta');
        } else { 
        	update_post_meta($post_id,'_my_meta',$new_data);
        }
    }
    elseif (!is_null($new_data)) {
        add_post_meta($post_id,'_my_meta',$new_data,TRUE);
    }

    return $post_id;
}


function my_meta_clean(&$arr) {
    if (is_array($arr)) {
        foreach ($arr as $i => $v) {
            if (is_array($arr[$i])) {
                my_meta_clean($arr[$i]);
 
                if (!count($arr[$i]))  {
                    unset($arr[$i]);
                }
            } else {
                if (trim($arr[$i]) == '')  {
                    unset($arr[$i]);
                }
            }
        }
 
        if (!count($arr)) {
            $arr = NULL;
        }
    }
}


// Changing excerpt length
function new_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Changing excerpt more
function new_excerpt_more($more) {
	return '...';
	//return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Funcion para conectar los grupos de investigacion con los profesores
function gdi_to_profesor_connection_type() {
    p2p_register_connection_type( array(
        'name' => 'gdi_to_profesor',
        'from' => 'profesores',
        'to' => 'grupos-investigacion',
        'sortable' => 'any',
        'admin_box' => array(
					    'show' => 'any',
					    'context' => 'advanced'
					),         
        'fields' => array(
        				'role' => array( 'title' => 'Role',
        								 'type' => 'select',
        								 'values' => array('Investigador Responsable', 'Investigador Asociado')
         						  ),        						
        			),
        'from_labels' => array(
				      'singular_name' => __( 'Profesor', 'my-profesores' ),
				      'search_items' => __( 'Buscar profesores', 'my-profesores' ),
				      'not_found' => __( 'No se encontraron profesores', 'my-profesores' ),
				      'create' => __( 'Agregar un profesor al grupo de investigacion', 'my-profesores' ),
				  	),
		'to_labels' => array(
				      'singular_name' => __( 'Grupo de investigacion', 'my-gdi' ),
				      'search_items' => __( 'Buscar grupos de investigacion', 'my-gdi' ),
				      'not_found' => __( 'No se encontraron grupos de investigacion. ', 'my-gdi' ),
				      'create' => __( 'Asociar a un grupo de investigacion', 'my-gdi' ),
					),        
    ) );
}
add_action( 'p2p_init', 'gdi_to_profesor_connection_type' );



/**
 * Funcion para obtener el nombre del menu
 *
 * @param $theme_location: nombre del menu
 * @return $menu_title: el nombre que ha puesto al menu
 * @author Erik Ford
 */

function dpa_get_theme_menu_name( $theme_location ) {

     if ( !has_nav_menu( $theme_location ) ) return false;

     $menus      = get_nav_menu_locations();
     $menu_title = wp_get_nav_menu_object( $menus[$theme_location] )->name;

     return $menu_title;

}



/**
 * Logs messages/variables/data to browser console from within php
 *
 * @param $name: message to be shown for optional data/vars
 * @param $data: variable (scalar/mixed) arrays/objects, etc to be logged
 * @param $jsEval: whether to apply JS eval() to arrays/objects
 *
 * @return none
 * @author Sarfraz
 */
 function logConsole($name, $data = NULL, $jsEval = FALSE) {
 	if (! $name) return false;

		  $isevaled = false;
		  $type = ($data || gettype($data)) ? 'Type: ' . gettype($data) : '';

	if ($jsEval && (is_array($data) || is_object($data))) {
		    $data = 'eval(' . preg_replace('#[\s\r\n\t\0\x0B]+#', '', json_encode($data)) . ')';
	    	$isevaled = true;
	} else {
		$data = json_encode($data);
	}

	# sanitalize
	$data = $data ? $data : '';
	$search_array = array("#'#", '#""#', "#''#", "#\n#", "#\r\n#");
	$replace_array = array('"', '', '', '\\n', '\\n');
	$data = preg_replace($search_array,  $replace_array, $data);
	$data = ltrim(rtrim($data, '"'), '"');
	$data = $isevaled ? $data : ($data[0] === "'") ? $data : "'" . $data . "'";

$js = <<<JSCODE
\n<script>
 // fallback - to deal with IE (or browsers that don't have console)
 if (! window.console) console = {};
 console.log = console.log || function(name, data){};
 // end of fallback

 console.log('$name');
 console.log('------------------------------------------');
 console.log('$type');
 console.log($data);
 console.log('\\n');
</script> 
JSCODE;

      echo $js;
 } # end logConsole




?>
