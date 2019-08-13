<?php
/*
    Plugin Name: Broker Staff - Post Types
    Plugin URI: 
    Description: Añade Post Types al sitio PeruBroker
    Version: 1.0.0
    Author: Joel Torres / Joan Torres
    Author URI: https://www.facebook.com/cyberzsoft/
    Text Domain: PeruBroker
 */
 //Cuando alguien trate de acceder no le muestre el contenido del plugin solo se muestre en blanco.
 if(!defined('ABSPATH')) die();
 
// Registrar Custom Post Type
function brokerstaff_post_type() {

	$labels = array(
		'name'                  => _x( 'Staff', 'Post Type General Name', 'broker' ),
		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'broker' ),
		'menu_name'             => __( 'Staff', 'broker' ),
		'name_admin_bar'        => __( 'Staff', 'broker' ),
		'archives'              => __( 'Archivo', 'broker' ),
		'attributes'            => __( 'Atributos', 'broker' ),
		'parent_item_colon'     => __( 'Staff Padre', 'broker' ),
		'all_items'             => __( 'Todas los Staffs', 'broker' ),
		'add_new_item'          => __( 'Agregar Staff', 'broker' ),
		'add_new'               => __( 'Agregar Staff', 'broker' ),
		'new_item'              => __( 'Nueva Staff', 'broker' ),
		'edit_item'             => __( 'Editar Staff', 'broker' ),
		'update_item'           => __( 'Actualizar Staff', 'broker' ),
		'view_item'             => __( 'Ver Staff', 'broker' ),
		'view_items'            => __( 'Ver Staff', 'broker' ),
		'search_items'          => __( 'Buscar Staff', 'broker' ),
		'not_found'             => __( 'No Encontrado', 'broker' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker' ),
		'featured_image'        => __( 'Imagen Destacada', 'broker' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'broker' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'broker' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'broker' ),
		'insert_into_item'      => __( 'Insertar en Staff', 'broker' ),
		'uploaded_to_this_item' => __( 'Agregado en Staff', 'broker' ),
		'items_list'            => __( 'Lista de Staff', 'broker' ),
		'items_list_navigation' => __( 'Navegación de Staffes', 'broker' ),
		'filter_items_list'     => __( 'Filtrar Staffes', 'broker' ),
	);
	$args = array(
		'label'                 => __( 'Staff', 'broker' ),
		'description'           => __( 'Staffes para el Sitio Web', 'broker' ),
		'labels'                => $labels,
		'supports'              => array( 'title',  'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'broker_Staff', $args );

}
add_action( 'init', 'brokerstaff_post_type', 0 );


function cptui_register_my_taxes_prueba() {

	/**
	 * Taxonomy: pruebas.
	 */

	$labels = array(
		"name" => __( "pruebas", "PeruBroker" ),
		"singular_name" => __( "pruebita", "PeruBroker" ),
		"menu_name" => __( "Probando", "PeruBroker" ),
		"all_items" => __( "todas las pruebas", "PeruBroker" ),
		"edit_item" => __( "editiar prueba", "PeruBroker" ),
		"view_item" => __( "ver prueba", "PeruBroker" ),
		"update_item" => __( "subir prueba", "PeruBroker" ),
		"add_new_item" => __( "agregar nueva prueba", "PeruBroker" ),
		"new_item_name" => __( "nueva prueba", "PeruBroker" ),
	);

	$args = array(
		"label" => __( "pruebas", "PeruBroker" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => false,
		"rewrite" => array( 'slug' => 'prueba', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "prueba",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "prueba", array( "broker_staff" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_prueba' );



?>
