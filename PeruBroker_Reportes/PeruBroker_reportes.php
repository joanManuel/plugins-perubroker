<?php
/*
    Plugin Name: PeruBroker Reportes
    Plugin URI: 
    Description: Añade Post Types al sitio PeruBroker
    Version: 1.0.0
    Author: Joel Torres / Joan Torres
    Author URI: https://www.facebook.com/cyberzsoft/
    Text Domain: PeruBroker
 */
 //Cuando alguien trate de acceder no le muestre el contenido del plugin solo se muestre en blanco.
 if(!defined('ABSPATH')) die();
// ADDING CUSTOM POST TYPE
add_action('init', 'PeruBroker_reportes');
//add_action( 'init', 'PeruBroker_reportes', 0 );

function PeruBroker_reportes() {
$types = array(
array('the_type' => 'Estadistica','single' => 'Estadistica','plural' => 'Estadisticas'),
array('the_type' => 'Reporte de pesca','single' => 'Reporte de pesca','plural' => 'Reporte de pesca'),
array('the_type' => 'Reportes','single' => 'Reporte','plural' => 'Reportes'));

foreach ($types as $type) {
	$the_type = $type['the_type'];
	$single = $type['single'];
	$plural = $type['plural'];
	$labels = array(
		'name' => _x($plural, 'Reportes PeruBroker'),
		'singular_name' => _x($single, 'Reportes PeruBroker'),
		// 'add_new' => _x('Agregar nuevo', $single),
		// 'add_new_item' => __('Agregar nuevo '. $single),
		//'edit_item' => __('Editar '.$single),
		//'new_item' => __('Nuevo '.$single),
		// 	$labels = array(
		// 'name'                  => _x( 'Reportes', 'Post Type General Name', 'broker' ),
		// 'singular_name'         => _x( 'Reportes', 'Post Type Singular Name', 'broker' ),
		// 'menu_name'             => __( 'Reportes', 'broker' ),
		// 'name_admin_bar'        => __( 'Reportes', 'broker' ),
		// 'view_item' => __('Ver '.$single),
		// 'search_items' => __('Buscar '.$plural),
		// 'not_found' =>  __('No '.$plural.' found'),
		// 'not_found_in_trash' => __('No '.$plural.' No encontrado en eliminados'),'parent_item_colon' => ''
	);
	if ( $the_type == 'Estadistica'){
		$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'capability_type' => 'post',
				'taxonomies'           => array( 'category' ),
				//'show_ui' => true,
				//		'show_in_menu'          => 'edit.php?post_type=broker_staff',
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'menu_icon'             => 'dashicons-format-aside',
				'hierarchical' => false,
				'menu_position' => 4,
				'supports' => array('title','thumbnail','custom-fields'));
	}
	else 
	if ($the_type == 'Reporte de pesca')
	{
		$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_in_menu'          => 'edit.php?post_type=estadistica',
				'taxonomies'           => array( 'category' ),
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'menu_icon'             => 'dashicons-format-aside',
				'hierarchical' => false,
				'menu_position' => 4,
				'supports' => array('title','thumbnail','custom-fields'));
	}
	else if ($the_type == 'Reportes')
	{
		$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_in_menu'          => 'edit.php?post_type=estadistica',
				'taxonomies'           => array( 'category' ),
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'menu_icon'             => 'dashicons-format-aside',
				'hierarchical' => false,
				'menu_position' => 4,
				'supports' => array('title','thumbnail','custom-fields')
	);
};
register_post_type($the_type, $args);
}


}


add_action( 'admin_menu', 'remover_submenus', 999 );
function remover_submenus() {
	remove_submenu_page('edit.php?post_type=estadistica','post-new.php?post_type=estadistica' );
}
// function remove_menus() {
// 	//remove_menu_page('plugins.php');
// 	remove_submenu_page('post-new.php?post_type=estadistica');
// 	}
// 	add_action('admin_menu', 'remove_menus');
	

// // Registrar Custom Post Type
// function PeruBroker_reportes() {
// 	$labels = array(
// 		'name'                  => _x( 'Reportes', 'Post Type General Name', 'broker' ),
// 		'singular_name'         => _x( 'Reportes', 'Post Type Singular Name', 'broker' ),
// 		'menu_name'             => __( 'Reportes', 'broker' ),
// 		'name_admin_bar'        => __( 'Reportes', 'broker' ),
// 		'archives'              => __( 'Archivo', 'broker' ),
// 		'attributes'            => __( 'Atributos', 'broker' ),
// 		'parent_item_colon'     => __( 'Reporte Padre', 'broker' ),
// 		'all_items'             => __( 'Reportes', 'broker' ),
// 		'add_new_item'          => __( 'Agregar Reporte', 'broker' ),
// 		'add_new'               => __( 'Agregar Reporte', 'broker' ),
// 		'new_item'              => __( 'Nueva Reportes', 'broker' ),
// 		'edit_item'             => __( 'Editar Reportes', 'broker' ),
// 		'update_item'           => __( 'Actualizar Reportes', 'broker' ),
// 		'view_item'             => __( 'Ver Reportes', 'broker' ),
// 		'view_items'            => __( 'Ver Reportes', 'broker' ),
// 		'search_items'          => __( 'Buscar Reportes', 'broker' ),
// 		'not_found'             => __( 'No Encontrado', 'broker' ),
// 		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker' ),
// 		'featured_image'        => __( 'Imagen Destacada', 'broker' ),
// 		'set_featured_image'    => __( 'Guardar Imagen destacada', 'broker' ),
// 		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'broker' ),
// 		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'broker' ),
// 		'insert_into_item'      => __( 'Insertar en Reportes', 'broker' ),
// 		'uploaded_to_this_item' => __( 'Agregado en Reportes', 'broker' ),
// 		'items_list'            => __( 'Lista de Reporteses', 'broker' ),
// 		'items_list_navigation' => __( 'Navegación de Reportes', 'broker' ),
// 		'filter_items_list'     => __( 'Filtrar Reporteses', 'broker' ),
// 	);
// 	$args = array(
// 		'label'                 => __( 'reportes', 'broker' ),
// 		'description'           => __( 'Reportes para el Sitio Web', 'broker' ),
// 		'labels'                => $labels,
//         'supports'              => array( 'title','author', 'thumbnail','categories' ),
//         'taxonomies'           => array( 'category'),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => 'edit.php?post_type=broker_staff',
//        // 'menu_position'         => 6,
//         'menu_icon'             => 'dashicons-format-aside',
// 		//'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'can_export'            => true,
// 		'has_archive'           => true,
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
//         'capability_type'     => 'post',
//         'rewrite'             => array('slug' => 'reportes'),
// 	);
	
	
//     add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
//     function namespace_add_custom_types( $query ) {
    
//         if ( !is_admin() && empty( $query->query_vars['suppress_filters'] ) && $query->is_main_query() ) {
//             $post_type = get_query_var('post_type');
//             $post_types = get_post_types( array( 'public' => true ) );
        
//             if ($post_type) {
//                 $post_type = $post_type;
//             } else {
//                 $post_type = $post_types;
//             }
        
//             $query->set('post_type',$post_type);
//             return $query;
//             }
//       }
// 		  register_post_type( 'reportes', $args );
// 	  }
	  
// 	//   function admin_submenu_additional_self_test(){
// 	// 	add_submenu_page(
// 	// 	  'test',
// 	// 	  'Test',
// 	// 	  'Test',
// 	// 	  'read',
// 	// 	  'test',
// 	// 	  '',
// 	// 	  'dashicons-admin-users',
// 	// 	  2
// 	// 	);
// 	// 	}
// 	// 	add_action( 'admin_menu', 'admin_submenu_additional_self_test' );

// add_action( 'init', 'PeruBroker_reportes', 0 );
?>
