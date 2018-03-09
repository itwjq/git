<?php get_header(); ?>
	<!-- Column 1 /Content -->
	<div class="grid_8">
		<!-- Blog Post -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
			<!-- Post Title -->
			<h3 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3> 
			<!-- Post Data -->
			<?php the_tags('标签：', ', ', ''); ?> &bull; <?php the_time('Y年n月j日') ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
			<?php edit_post_link('编辑', ' • ', ''); ?>
			<div class="hr dotted clearfix">&nbsp;</div>
			<!-- Post Image 可能不需要文章缩略图 -->
			<!-- <img class="thumb" alt="" src="<?php bloginfo('template_url'); ?>/images/610x150.gif" /> -->
			<!-- Post Content -->
			<?php the_excerpt(); ?>
			<!-- Read More Button -->
			<p class="clearfix"><a href="single.html" class="button right"> Read More...</a></p>
		</div>
		<div class="hr clearfix"> </div>
		<?php endwhile; ?>
		<!-- Blog Navigation 分页 -->
		<p class="clearfix"> <a href="#" class="button float">&lt;&lt; Previous Posts</a> <a href="#" class="button float right">Newer Posts >></a> </p>
	<?php else : ?>
		<h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
		<p>没有找到任何文章！</p>
		<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
	<?php get_footer(); ?>
