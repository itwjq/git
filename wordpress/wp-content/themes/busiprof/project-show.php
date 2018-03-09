<!-- <?php /* Template Name: project-show */ ?> -->
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
					<?php if($current_options['link_tag_line']!='') {?>
					<h1 class="section-heading"><?php echo $current_options['link_tag_line']; ?>
					</h1><?php } ?>
					<?php if($current_options['protfolio_description_tag']!='') {?>
					<p><?php echo esc_html($current_options['protfolio_description_tag']); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
				
		<!-- Portfolio Item -->
	<div class="tab-content main-portfolio-section" id="myTabContent">
		<!-- Portfolio Item -->
			<div class="row">
			
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
</section>

<!-- End of Portfolio Section -->
<div class="clearfix"></div>
<?php } ?>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>
<?php get_footer(); ?>