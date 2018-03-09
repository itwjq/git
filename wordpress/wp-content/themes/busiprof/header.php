<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="http://127.0.0.1/wordpress/wp-content/themes/busiprof/css/style.css">
	<script type="text/javascript" src="http://127.0.0.1/wordpress/wp-content/themes/busiprof/js/jquery.min.js"></script>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); 
$current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), theme_setup_data() );
?>	
</head>
<body <?php body_class(); ?>>
<!-- Navbar -->	
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>" class="brand">
				<?php
				if( $current_options['enable_logo_text'] == true ){
					bloginfo('name');
				}else{
				?>
				<img alt="<?php bloginfo("name"); ?>" src="<?php echo ( esc_url($current_options['upload_image']) ? $current_options['upload_image'] : get_template_directory_uri() . '/images/logo.png' ); ?>" 
				alt="<?php bloginfo("name"); ?>"
				class="logo_imgae" style="width:<?php echo esc_html($current_options['width']).'px'; ?>; height:<?php echo esc_html($current_options['height']).'px'; ?>;">
				<?php } ?>
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<!-- 对于wp_nav_menu()的解释 -->
		<!-- <?php
			$defaults = array(
			'theme_location' => '',//用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
			'menu' => '',//使用导航菜单的名称调用菜单，可以是 id, slug, name (按顺序匹配的) 。
			'container' => 'div',//最外层容器标签名
			'container_class' => '',//最外层容器class名
			'container_id' => '',//最外层容器id值
			'menu_class' => 'menu',//ul 节点的 class 属性值。
			'menu_id' => '',//ul 节点的 id 属性值。
			'echo' => true,//确定直接显示导航菜单还是返回 HTML 片段，如果想将导航的代码作为赋值使用，可设置为false。
			'fallback_cb' => 'wp_page_menu',//备用的导航菜单函数，用于没有在后台设置导航时调用
			'before' => '',//显示在导航a标签之前
			'after' => '',//显示在导航a标签之后
			'link_before' => '',//显示在导航链接名之前
			'link_after' => '',//显示在导航链接名之后
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',//使用字符串替换修改ul的class。
			'depth' => 0,//显示菜单的深度, 当数值为 0 时显示所有深度的菜单。
			'walker' => ''//自定义的遍历对象，调用一个对象定义显示导航菜单。
			);
			wp_nav_menu( $defaults );
?> -->
			<?php 
				wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'  => 'nav-collapse collapse navbar-inverse-collapse',
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => 'busiprof_fallback_page_menu',
				'walker' => new busiprof_nav_walker()) 
				); 
			?>			
		</div>
	</div>
</nav>	
<!-- End of Navbar -->