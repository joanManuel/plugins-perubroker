<?php
/*
    Plugin Name: Broker - Post Types
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
function broker_post_type() {

	$labels = array(
		'name'                  => _x( 'Nosotros', 'Post Type General Name', 'broker' ),
		'singular_name'         => _x( 'Nosotros', 'Post Type Singular Name', 'broker' ),
		'menu_name'             => __( 'Nosotros', 'broker' ),
		'name_admin_bar'        => __( 'Seccion', 'broker' ),
		'archives'              => __( 'Archivo', 'broker' ),
		'attributes'            => __( 'Atributos', 'broker' ),
		'parent_item_colon'     => __( 'Seccion Padre', 'broker' ),
		'all_items'             => __( 'Todas Las Secciones', 'broker' ),
		'add_new_item'          => __( 'Agregar Seccion', 'broker' ),
		'add_new'               => __( 'Agregar Seccion', 'broker' ),
		'new_item'              => __( 'Nueva Seccion', 'broker' ),
		'edit_item'             => __( 'Editar Seccion', 'broker' ),
		'update_item'           => __( 'Actualizar Seccion', 'broker' ),
		'view_item'             => __( 'Ver Seccion', 'broker' ),
		'view_items'            => __( 'Ver Secciones', 'broker' ),
		'search_items'          => __( 'Buscar Seccion', 'broker' ),
		'not_found'             => __( 'No Encontrado', 'broker' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker' ),
		'featured_image'        => __( 'Imagen Destacada', 'broker' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'broker' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'broker' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'broker' ),
		'insert_into_item'      => __( 'Insertar en Seccion', 'broker' ),
		'uploaded_to_this_item' => __( 'Agregado en Seccion', 'broker' ),
		'items_list'            => __( 'Lista de Secciones', 'broker' ),
		'items_list_navigation' => __( 'Navegación de Secciones', 'broker' ),
		'filter_items_list'     => __( 'Filtrar Secciones', 'broker' ),
	);
	$args = array(
		'label'                 => __( 'Seccion', 'broker' ),
		'description'           => __( 'Secciones para el Sitio Web', 'broker' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-admin-site-alt3',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'broker_Seccion', $args );

}
add_action( 'init', 'broker_post_type', 0 );
?>