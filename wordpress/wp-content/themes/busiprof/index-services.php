<?php
// 给定一个默认值。一般这种变量是做一些逻辑判断的，判断的时候我们习惯性的以true为满足条件执行满足条件过后的逻辑。所以定义的时候将其设置为false只是为了他在初始值时不满足我们的条件而已
$default_content = false;
$current_options = get_option('busiprof_theme_options');
$busiprof_service_content  = get_theme_mod( 'busiprof_service_content', $default_content );

if(!empty($current_options)){
if(empty($busiprof_service_content)){
	
			$old_theme_servives = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), theme_setup_data() );;
			if($old_theme_servives['service_image_one']!= '' || $old_theme_servives['service_icon_one']!= '' || $old_theme_servives['service_title_one']!= '' || $old_theme_servives['service_text_one']!= '' 
			|| $old_theme_servives['service_image_two']!= '' || $old_theme_servives['service_icon_two']!= '' || $old_theme_servives['service_title_two']!= '' || $old_theme_servives['service_text_two']!= '' 
			|| $old_theme_servives['service_image_three']!= '' || $old_theme_servives['service_icon_three']!= '' || $old_theme_servives['service_title_three']!= '' || $old_theme_servives['service_text_three']!= ''
			||$old_theme_servives['service_image_four']!= '' || $old_theme_servives['service_icon_four']!= '' || $old_theme_servives['service_title_four']!= '' || $old_theme_servives['service_text_four']!= '')
			{
			
					$busiprof_service_content = json_encode( array(
						array(
						'icon_value' => isset($old_theme_servives['service_icon_one'])? $old_theme_servives['service_icon_one']:'',
						'image_url'	 => isset($old_theme_servives['service_image_one'])? $old_theme_servives['service_image_one']:'',
						'title'      => isset($old_theme_servives['service_title_one'])? $old_theme_servives['service_title_one']:'',
						'text'       => isset($old_theme_servives['service_text_one'])? $old_theme_servives['service_text_one']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						'color'      => '#e91e63',
						),
						array(
						'icon_value' => isset($old_theme_servives['service_icon_two'])? $old_theme_servives['service_icon_two']:'',
						'image_url'	 => isset($old_theme_servives['service_image_two'])? $old_theme_servives['service_image_two']:'',
						'title'      => isset($old_theme_servives['service_title_two'])? $old_theme_servives['service_title_two']:'',
						'text'       => isset($old_theme_servives['service_text_two'])? $old_theme_servives['service_text_two']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						'color'      => '#00bcd4',
						),
						array(
						'icon_value' => isset($old_theme_servives['service_icon_three'])? $old_theme_servives['service_icon_three']:'',
						'image_url'	 => isset($old_theme_servives['service_image_three'])? $old_theme_servives['service_image_three']:'',
						'title'      => isset($old_theme_servives['service_title_three'])? $old_theme_servives['service_title_three']:'',
						'text'       => isset($old_theme_servives['service_text_three'])? $old_theme_servives['service_text_three']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						'color'      => '#4caf50',
						),
						
						array(
						'icon_value' => isset($old_theme_servives['service_icon_four'])? $old_theme_servives['service_icon_four']:'',
						'image_url'	 => isset($old_theme_servives['service_image_four'])? $old_theme_servives['service_image_four']:'',
						'title'      => isset($old_theme_servives['service_title_four'])? $old_theme_servives['service_title_four']:'',
						'text'       => isset($old_theme_servives['service_text_four'])? $old_theme_servives['service_text_four']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b96',
						'color'      => '#4caf50',
						),
					
					
						) );
			}
}
}


$current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), theme_setup_data() ); ?>
<section id="section" class="service">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php if( $current_options['service_heading_one'] != '' ) { ?>
					<h1 class="section-heading"><?php echo $current_options['service_heading_one']; ?></h1>
					<?php } if( $current_options['service_tagline'] != '' ) { ?>
					<p><?php echo $current_options['service_tagline']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php busiprof_service_content( $busiprof_service_content ); ?>
		<div class="clearfix"></div>
			<!-- <div class="col-md-12 col-xs-12">
				<div class="btn-wrap">
					<div class="services_more_btn">
						<?php if($current_options['service_link_btn']!='') {?>
						<a href="<?php echo esc_url($current_options['service_link_btn']); ?>">
					   <?php } if($current_options['service_button_value']!='') { 
					   echo esc_html($current_options['service_button_value']); ?></a>
					   <?php } ?>	
					</div>
				</div>
			</div> -->
		</div>
</section>	
		
<?php
/**
 * Get content for features section.
 *
 * @since 1.1.30
 * @access public
 * @param string busiprof_service_content Section content in json format.
 * @param bool   $is_callback Flag to check if it's callback or not.
 */
function busiprof_service_content( $busiprof_service_content, $is_callback = false ) {
	if ( ! $is_callback ) { ?>
		<div class="row busiprof-features-content">
	    <?php
	}
	if ( ! empty( $busiprof_service_content ) ) {
		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$busiprof_service_content = json_decode( $busiprof_service_content );
		foreach ( $busiprof_service_content as $features_item ) :
			$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'busiprof_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
			$title = ! empty( $features_item->title ) ? apply_filters( 'busiprof_translate_single_string', $features_item->title, 'Features section' ) : '';
			$text = ! empty( $features_item->text ) ? apply_filters( 'busiprof_translate_single_string', $features_item->text, 'Features section' ) : '';
			$link = ! empty( $features_item->link ) ? apply_filters( 'busiprof_translate_single_string', $features_item->link, 'Features section' ) : '';
			$image = ! empty( $features_item->image_url ) ? apply_filters( 'hestia_translate_single_string', $features_item->image_url, 'Features section' ) : '';
			$color = '';
			if ( is_customize_preview() && ! empty( $features_item->color ) ) {
				$color = $features_item->color;
			}
			?>
			<div class="col-md-3 col-sm-6 col-xs-12 service-box">
			<div class="post">
								<?php if ( ! empty( $image ) ) : ?>
									<?php if ( ! empty( $link ) ) : ?>
										<a href="<?php echo esc_url( $link ); ?>">
									<?php endif; ?>
									<img class="services_cols_mn_icon"
										 src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
									<?php if ( ! empty( $link ) ) : ?>
										</a>
									<?php endif; ?>
								<?php endif; ?>
			
			<?php if ( ! empty( $link ) ) : ?>
						<a href="<?php echo esc_url( $link ); ?>">
							<?php endif; ?>
				<?php if ( ! empty( $icon ) ) :?>
							<div class="service-icon" <?php if ( ! empty( $color ) ) { echo 'style="color:' . $color . '"'; } ?>>
									<i class="fa <?php echo esc_html( $icon ); ?>"></i>
								</div>
							<?php endif; ?>
				<?php if ( ! empty( $title ) ) : ?>
				
								<div class="entry-header">
								<h4 class="entry-title"><?php echo esc_html( $title ); ?></h4>
								</div>
							<?php endif; ?>
				<?php if ( ! empty( $link ) ) : ?>
						</a>
					<?php endif; ?>
			<?php if ( ! empty( $text ) ) : ?>
			
							<div class="entry-content">
							<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
							</div>
			
							
						<?php endif; ?>
			</div>
			</div>
			<?php
			endforeach;
			}
			else
			{
			$colors = array('#00bcd4','#e91e63','#4caf50', '#5ca2df');
			$title = array (__('浏览项目教程>','busiprof'), __('输入设计挑战>','busiprof'), __('加入现场活动和网络研讨会>','busiprof'), __('关注主题和平台>','busiprof'));
			$icon = array('fa fa-laptop','fa fa-tasks','fa fa-thumbs-o-up','fa fa-life-ring');
			//后加内容（李）
			$text = array('寻找灵感，并学习如何建立自己的互联网连接电子',
							'通过设计挑战测试您的技能，有机会赢得大奖',
							'学习通过在线或在当地参加研讨会来构建电子产品',
							'随时关注您最喜爱的主题和平台，并与社区联系');
			$url = array(0 => 'https://www.hackster.io/projects',
						 1 => 'https://www.hackster.io/contests',
						 2 => 'https://www.hackster.io/live',
						 3 => 'https://www.hackster.io/channels'
				);
			for($i=0; $i<=3; $i++) { ?>
			<div class="col-md-3 col-sm-6 col-xs-12 service-box" title="Shift-click to edit this widget.">
				<div class="post">
				<a href="<?php echo $url[$i]?>">
					<div class="service-icon" style="color:<?php echo $colors[$i]; ?>">
						<i class="<?php echo $icon[$i]; ?>"></i>
					</div>
					<div class="entry-header">
						<h4 class="entry-title"><?php echo $title[$i]; ?></h4>
					</div>
				</a>
				<div class="entry-content">
					<p><?php echo _e($text[$i]); ?></p>
				</div>		
				</div>
			</div>
			<?php } 
	}
	if ( ! $is_callback ) { ?>
		</div>
		<?php
	}
}

if ( function_exists( 'busiprof_features' ) ) {
	$section_priority = apply_filters( 'busiprof_section_priority', 10, 'busiprof_features' );
	add_action( 'busiprof_sections', 'busiprof_features', absint( $section_priority ) );
	add_action( 'after_setup_theme', 'busiprof_features_register_strings', 11 );
}
?>