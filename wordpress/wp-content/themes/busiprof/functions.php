<?php 

	/**Includes reqired resources here**/
	define('BUSI_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('BUSI_TEMPLATE_DIR',get_template_directory());
	define('BUSI_THEME_FUNCTIONS_PATH',BUSI_TEMPLATE_DIR.'/functions');

	require_once('theme_setup_data.php');

	//Files for custom - defaults menus
	require( BUSI_THEME_FUNCTIONS_PATH . '/menu/busiprof_nav_walker.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/woo/woocommerce.php' );
	require( BUSI_THEME_FUNCTIONS_PATH .'/font/font.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');


	// Theme functions file including
	require( BUSI_THEME_FUNCTIONS_PATH . '/scripts/script.php');
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/custom-widgets.php' ); // for footer widget
	require( BUSI_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php' ); // for custom contact widget

	// customizer files include
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_general_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_sections_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_template_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_post_slugs_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_layout_manager_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/cust_pro.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_emailcourse.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/customizer.php' );
	
	
	//theme ckeck plugin required 	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	
	//content width
	if ( ! isset( $content_width ) ) $content_width = 750;	


	if ( ! function_exists( 'busiporf_setup' ) ) :
	function busiporf_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'busiprof', get_template_directory() . '/lang' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	
	// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	// supports featured image
	add_theme_support( 'post-thumbnails' );
	
		
	add_theme_support( 'custom-header');
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'busiprof' )
	) );
	
	
} // busiporf_setup
endif;
	
	add_action( 'after_setup_theme', 'busiporf_setup' );
	
	
	function busiprof_inline_style() {
	$custom_css              = '';
	
	
	$busiprof_service_content = get_theme_mod(
		'busiprof_service_content', json_encode(
			array(
				array(
					'color'      => '#e91e63',
				),
				array(
					'color'      => '#00bcd4',
				),
				array(
					'color'      => '#4caf50',
				),
			)
		)
	);
	
	if ( ! empty( $busiprof_service_content ) ) {
		$busiprof_service_content = json_decode( $busiprof_service_content );
		
		
		foreach ( $busiprof_service_content as $key => $features_item ) {
			$box_nb = $key + 1;
			if ( ! empty( $features_item->color ) ) {
				
				$color = ! empty( $features_item->color ) ? apply_filters( 'busiprof_translate_single_string', $features_item->color, 'Features section' ) : '';
				
				$custom_css .= '.service-box:nth-child(' . esc_attr( $box_nb ) . ') .service-icon {
                            color: ' . esc_attr( $color ) . ';
				}';
				
				
			}
		}
	}
	wp_add_inline_style( 'style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'busiprof_inline_style' );	

// //点赞功能的实现
// add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');
// add_action('wp_ajax_bigfa_like', 'bigfa_like');
// function bigfa_like(){
//     global $wpdb,$post;
//     $id = $_POST["um_id"];
//     $action = $_POST["um_action"];
//     if ( $action == 'ding'){
//     $bigfa_raters = get_post_meta($id,'bigfa_ding',true);
//     $expire = time() + 99999999;
//     $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
//     setcookie('bigfa_ding_'.$id,$id,$expire,'/',$domain,false);
//     if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
//         update_post_meta($id, 'bigfa_ding', 1);
//     }
//     else {
//             update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
//         }
//     echo get_post_meta($id,'bigfa_ding',true);
//     }
//     die;
// }

function my_custom_post_product() {
  $labels = array(
    'name'               => _x( '科研产品', 'post type 名称' ),
    'singular_name'      => _x( '科研产品', 'post type 单个 item 时的名称，因为英文有复数' ),
    'add_new'            => _x( '增加产品', '添加新内容的链接名称' ),
    'add_new_item'       => __( '增加一个产品' ),
    'edit_item'          => __( '编辑产品' ),
    'new_item'           => __( '新产品' ),
    'all_items'          => __( '所有产品' ),
    'view_item'          => __( '查看产品' ),
    'search_items'       => __( '搜索产品' ),
    'not_found'          => __( '没有找到有关产品' ),
    'not_found_in_trash' => __( '回收站里面没有相关产品' ),
    'parent_item_colon'  => '',
    'menu_name'          => '科研产品'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => '我们网站的产品信息',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true
  );
  register_post_type( 'product', $args );
}
add_action( 'init', 'my_custom_post_product' );

function my_taxonomies_product() {
	$labels = array(
		'name'              => _x( '产品分类', 'taxonomy 名称' ),
		'singular_name'     => _x( '产品分类', 'taxonomy 单数名称' ),
		'search_items'      => __( '搜索产品分类' ),
		'all_items'         => __( '所有产品分类' ),
		'parent_item'       => __( '该产品分类的上级分类' ),
		'parent_item_colon' => __( '该产品分类的上级分类：' ),
		'edit_item'         => __( '编辑产品分类' ),
		'update_item'       => __( '更新产品分类' ),
		'add_new_item'      => __( '添加新的产品分类' ),
		'new_item_name'     => __( '新产品分类' ),
		'menu_name'         => __( '产品分类' ),
	);
	$args = array(
		'labels' => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'hierarchical' => true, //控制自定义分类法的格式，如果值是false，则将分类（category）转化成标签（tags）
		'show_ui'           => true,
		'query_var'         => true,
        'rewrite'           => true,
        'show_admin_column' => true
	);


	register_taxonomy( 'products', 'product', $args );//products是该自定义分类法的名称；product是对应的自定义文章类型名称
}
add_action( 'init', 'my_taxonomies_product', 0 );

// register post type label args 
function tj_cutom_post_type_label_args($typeName){
    return $labels = array(
        'name' => $typeName,
        'singular_name' => $typeName,
        'add_new' => 'Add New',
        'add_new_item' => 'Add New '.$typeName,
        'edit_item' => 'Edit '.$typeName,
        'new_item' => 'New '.$typeName,
        'all_items' => 'All '.$typeName,         
        'view_item' => 'View '.$typeName,
        'search_items' => 'Search '.$typeName,
        'not_found' =>  'No '.$typeName.' found',
        'not_found_in_trash' => 'No '.$typeName.' found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => $typeName
    );	
}
 
 



// register post type args 
function tj_custom_post_type_args($typeName,$postType="post",$public=true,$queryable=true,$show_ui=true,$show_menu=true,$query_var=true,$has_archive = true, $hierarchical = false,$menu_position = null){
    return $args = array(
        'labels' => tj_cutom_post_type_label_args($typeName),
        'public' => $public,
        'publicly_queryable' => $queryable,
        'show_ui' => $show_ui, 
        'show_in_menu' => $show_menu, 
        'query_var' => $query_var,
        'rewrite' => array( 'slug' => strtolower($typeName)),
        'capability_type' => $postType,
        'has_archive' => $has_archive, 
        'hierarchical' => $hierarchical,
        'menu_position' => $menu_position,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
}

function tj_custom_post_type() {
    register_post_type( 'zhipin', tj_custom_post_type_args("zhipin"));
    register_post_type( 'zh_title', tj_custom_post_type_args("zh_title"));
}
add_action( 'init', 'tj_custom_post_type' );
//注：每一个register_post_type表示创建一个自定义文章类型，注意修改类型名称。
?>