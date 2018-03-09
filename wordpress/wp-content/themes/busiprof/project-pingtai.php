<!-- <?php /* Template Name: project-pingtai */ ?> -->
<?php  
get_header();
// get_template_part('index', 'bannerstrip');
?>
<!-- Blog & Sidebar Section -->
<?php 
$current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), theme_setup_data() );

if( $current_options['home_project_section_enabled'] == 'on' ) { 
?>

<!-- Portfolio Section -->
<section id="section" class="portfolio bg-color">
	<div class="container">
		<!-- Section Title -->
		<div class="row">	
			<div class="col-md-12">
				<div class="section-title">
				<?php  global $wpdb;  ?> 
				<?php    
						$sql = "select * from wp_posts where post_type='zh_title' and post_status = 'publish'  ";
				         $resaults = $wpdb->get_results($sql,ARRAY_A); 
				         foreach ($resaults as $key => $value) {
				        echo  '<div style=" float:left;position:relative; left:-16px;top:-40px;width:80px;height:80px; ">'.$value[post_content] .'</div>';
				        echo '<div style="float:left;position:relative; left:20px;top:-40px;width:800px;height:80px; ">
					<ul>
					<span class="text-left"><li><font style="font-size:"10px"" >'.$value['post_title'].'</font></li></span>'
				         ;
					echo '<span class="text-left"><li>'.$value[post_excerpt].'</li></span>';
				     
				     echo '</ul>';
					echo '</div>';
				}
				           ?>
					<!-- <div style=" float:left;position:relative; left:-16px;top:-40px;width:80px;height:80px; "> <img src="<?php echo get_template_directory_uri() . '/images/logo.png';?>" > </div> -->	
					<div style=" float:left;position:relative; left:114px;top:-40px;width:124px;height:80px; ">

					<button type="button" id="a1" class="btn btn-primary btn-lg active">加入社区</button>
					<script type="text/javascript">
						$(function() {
							("#a1").click(function(){

						alert('1');
					})
						})
					
					</script>
					<!-- <a href="#?id=<?php echo $current_user->ID?>">
					<?php
						if((!empty($current_user->ID))){
						echo '<button type="button" class="btn btn-primary btn-lg active">加入社区</button>';

						}else{
						echo '<button type="button" class="btn btn-primary btn-lg active">请先登录</button>';

						}
					?>
					</a> -->
					<!-- <?php
						global $wpdb;
						$sql = "update wp_users set 'colloect_status' = {1} where id=".$_GET['id'];
						$wpdb->query($sql);
					?> -->
						<!-- <button type="button" class="btn btn-primary btn-lg active">加入社区</button> -->
					<!-- </a> -->
					</div>
				</div>
			</div>
		</div>
		<div>

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">家</a></li>
		    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">项目</a></li>
		    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">讨论</a></li>
		    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">制品</a></li>
		    <li role="presentation"><a href="#vip" aria-controls="vip" role="tab" data-toggle="tab">会员</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="home">
	<div class="tab-content main-portfolio-section" id="myTabContent">
		<div class="row" >
				<?php  global $wpdb;  ?> 
				<?php    
						$sql = "select * from wp_posts where post_type='product' and post_status = 'publish'  ";
				         $resaults = $wpdb->get_results($sql,ARRAY_A);   
				         // var_dump($resaults);   
				         	// $urll=bloginfo('url').'/home/project/page-particular/?pid=';

				         foreach ($resaults as $key => $value) {
							$url = $urll.$value[ID];
							echo '<div class="col-md-3 col-sm-6 col-xs-12">';
								echo '<aside class="post">';
									echo '<figure class="post-thumbnail">';
										// echo "<a href=".bloginfo('url').'/wordpress/home/project/page-particular/?pid='.$value[ID].">";
										echo "<a href={bloginfo('url')}/wordpress/home/project/page-particular/?pid={$value[ID]}>";
										echo $value['post_content'];
										echo'</a>';
									echo '</figure>';
									echo '<div class="portfolio-info">';
										echo '<div class="entry-header">';
											echo'<h4 class="entry-title">123</h4>';
										echo '</div>';
										echo '<div class="entry-content">12345678</div>';
									echo '</div>';					
								echo '</aside>';
							echo '</div>';
							
				          } 
				?>  
			</div>	
	  </div>
 </div>
<div role="tabpanel" class="tab-pane" id="profile">
					<!-- Portfolio Item -->
	<div class="tab-content main-portfolio-section" id="myTabContent">
		<!-- Portfolio Item -->
			<div class="row">
				<?php  global $wpdb;  ?> 
			<?php    
					$sql = "select * from wp_posts where post_type='product' and post_status = 'publish'  ";
			         $resaults = $wpdb->get_results($sql,ARRAY_A);   
			         // var_dump($resaults);   
			         foreach ($resaults as $key => $value) {
						echo '<div class="col-md-3 col-sm-6 col-xs-12">';
							echo '<aside class="post">';
								echo '<figure class="post-thumbnail">';
									echo ($value['post_content']);
								echo '</figure>';
								echo '<div class="portfolio-info">';
									echo '<div class="entry-header">';
										echo'<h4 class="entry-title">123</h4>';
									echo '</div>';
									echo '<div class="entry-content">12345678</div>';
								echo '</div>';					
							echo '</aside>';
						echo '</div>';
			          } 
			?>  
			</div>
	</div>
</div>
<div role="tabpanel" class="tab-pane" id="messages">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<aside class="post">
				<figure class="post-thumbnail">
					<?php if($current_options['project_one_url']!='') {?>
					<a href="<?php echo esc_url($current_options['project_one_url']); ?>">
					<?php } ?>
					<?php if($current_options['project_thumb_one']!='') {?>
					<img alt="" src="<?php echo esc_url($current_options['project_thumb_one']); ?>" class="project_feature_img" />
					<?php } ?></a>
				</figure>
				<div class="portfolio-info">
					<div class="entry-header">
						<?php if($current_options['project_one_url']!='') {?>
						<h4 class="entry-title"><a href="<?php echo esc_url($current_options['project_one_url']); ?>">
						<?php } if($current_options['project_title_one']!='') {
						echo esc_html($current_options['project_title_one']); ?></a>
						<?php } ?>
						</h4>
					</div>
					<div class="entry-content">
						<?php if($current_options['project_text_one']!='') {?>
						<p><?php echo esc_html($current_options['project_text_one']); ?></p>
						<?php } ?>
					</div>
				</div>					
			</aside>
		</div>
	</div>
</div>
<!-- 专题制品 -->
<div role="tabpanel" class="tab-pane" id="settings">
			<?php  global $wpdb;  ?> 
			<?php    
					$sql = "select * from wp_posts where post_type='zhipin' and post_status = 'publish'  ";
			         $resaults = $wpdb->get_results($sql,ARRAY_A);   
			         // var_dump($resaults);   
			         foreach ($resaults as $key => $value) {
				echo'<div class="row">';
						echo '<div class="col-md-3 col-sm-6 col-xs-12">';
							echo '<aside class="post">';
								echo '<figure class="post-thumbnail">';
									echo ($value['post_content']);
								echo '</figure>';
												
							echo '</aside>';
						echo '</div>';
						echo '<div class="portfolio-info">';
									echo '<div class="entry-header">';
										echo'<h4 class="entry-title">';
										echo ($value['post_title']);
										echo '</h4>';
									echo '</div>';
									echo '<div class="entry-content">';
									echo ($value['post_excerpt']);
									echo '</div>';
									echo '<div class="entry-header">';
										echo '<a href="https://www.hackster.io/raspberry-pi/products" class="btn btn-primary btn-lg active" role="button">立即购买</a>';
									echo '</div>';
									$nbsp;$nbsp;$nbsp;
									echo '<div class="entry-content">';
										echo '<a href="https://www.hackster.io/raspberry-pi/products" class="btn btn-primary btn-lg active" role="button">添加到工具箱</a>';
									echo '</div>';
								echo '</div>';	
				echo'</div>';
			          } 
			?>  
</div>
</div>
 <div role="tabpanel" class="tab-pane" id="vip">
			<?php    
					global $wpdb;
					$sql = "select * from wp_users where collect_status=1  ";
			        $resaults = $wpdb->get_results($sql,ARRAY_A);  


			         ?>

 </div>
</div>
</div>
		<!-- /Section Title -->
		
				
	
</section>
<!-- End of Portfolio Section -->
<div class="clearfix"></div>
<?php } ?>
<!-- End of Blog & Sidebar Section -->
<div class="clearfix"></div>
<?php get_footer(); ?>