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
 
// Registrar Custom Post Type
function PeruBroker_reportes() {

	$labels = array(
		'name'                  => _x( 'Reportes', 'Post Type General Name', 'broker' ),
		'singular_name'         => _x( 'Reportes', 'Post Type Singular Name', 'broker' ),
		'menu_name'             => __( 'Reportes', 'broker' ),
		'name_admin_bar'        => __( 'Reportes', 'broker' ),
		'archives'              => __( 'Archivo', 'broker' ),
		'attributes'            => __( 'Atributos', 'broker' ),
		'parent_item_colon'     => __( 'Reporte Padre', 'broker' ),
		'all_items'             => __( 'Todas Los reportes', 'broker' ),
		'add_new_item'          => __( 'Agregar Reporte', 'broker' ),
		'add_new'               => __( 'Agregar Reporte', 'broker' ),
		'new_item'              => __( 'Nueva Reportes', 'broker' ),
		'edit_item'             => __( 'Editar Reportes', 'broker' ),
		'update_item'           => __( 'Actualizar Reportes', 'broker' ),
		'view_item'             => __( 'Ver Reportes', 'broker' ),
		'view_items'            => __( 'Ver Reportes', 'broker' ),
		'search_items'          => __( 'Buscar Reportes', 'broker' ),
		'not_found'             => __( 'No Encontrado', 'broker' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker' ),
		'featured_image'        => __( 'Imagen Destacada', 'broker' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'broker' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'broker' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'broker' ),
		'insert_into_item'      => __( 'Insertar en Reportes', 'broker' ),
		'uploaded_to_this_item' => __( 'Agregado en Reportes', 'broker' ),
		'items_list'            => __( 'Lista de Reporteses', 'broker' ),
		'items_list_navigation' => __( 'Navegación de Reportes', 'broker' ),
		'filter_items_list'     => __( 'Filtrar Reporteses', 'broker' ),
	);
	$args = array(
		'label'                 => __( 'reportes', 'broker' ),
		'description'           => __( 'Reportes para el Sitio Web', 'broker' ),
		'labels'                => $labels,
        'supports'              => array( 'title','author', 'thumbnail','categories' ),
        'taxonomies'           => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-format-aside',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        'capability_type'     => 'post',
        'rewrite'             => array('slug' => 'reportes'),
    );
    add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
    function namespace_add_custom_types( $query ) {
    
        if ( !is_admin() && empty( $query->query_vars['suppress_filters'] ) && $query->is_main_query() ) {
            $post_type = get_query_var('post_type');
            $post_types = get_post_types( array( 'public' => true ) );
        
            if ($post_type) {
                $post_type = $post_type;
            } else {
                $post_type = $post_types;
            }
        
            $query->set('post_type',$post_type);
            return $query;
            }
        
      }
      

          register_post_type( 'reportes', $args );
      }
	//register_post_type( 'broker_Reporte', $args );

//}
add_action( 'init', 'PeruBroker_reportes', 0 );
?>