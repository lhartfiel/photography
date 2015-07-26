<?php
/**
 * The blog template
 *
 * Displays all of the blog posts 
 *
 * @package photography-theme
 */
?>



<?php get_header(); ?>

<div class="header-imgs">
	<?php if(get_field('header_images', get_option('page_for_posts'))) { ?>

			<div class="header-img-container">

				<?php //variables
					$number = count(get_field('header_images', get_option('page_for_posts'))); //determine number of repeaters
					$class_names = array(
						1 => 'full-img',
						2 => 'col-2-head',
						3 => 'col-3-head'
					);

					//set default class name
					$default_class = $class_names[1];

					//check if $number exists within defined array
					if(array_key_exists( $number, $class_names )) {
						$default_class = $class_names[$number];
					};
				?>
				<?php if((get_field('header_type', get_option('page_for_posts')) === '2_img') || (get_field('header_type', get_option('page_for_posts')) === '3_img')) { ?>
					<?php while(has_sub_field('header_images', get_option('page_for_posts'))) { ?>
						<?php $img = get_sub_field('image'); ?>
						
							<div class="img <?php echo esc_attr($default_class); ?> img-container">
								<img src="<?php echo $img['sizes']['post_thumb_img']; ?>">		
							</div>	
						<?php } //endwhile?>			
				<?php } //endif ?>

				<?php if(get_sub_field('header_type') === '1_img') { //get bigger image for headers with 1 image ?>
					<?php while(has_sub_field('header_images')) { ?>
						<?php $img = get_sub_field('image'); ?>
							<div class="img <?php echo esc_attr($default_class); ?> img-container">
								<img src="<?php echo $img['sizes']['large']; ?>">		
							</div>	
						<?php } //endwhile?>			
				<?php } //endif ?>

			</div>	<!-- .header-img-container -->

	<?php } //endif ?>	

	<div class="title">
		<div class="grid-wrapper">
			<h3><?php echo get_the_title( get_option('page_for_posts') ); ?></h3>
		</div>
	</div>

</div> <!-- .header-imgs -->


<div class="blog-section">
	<div class="grid-wrapper">
	
	<?php
		$paged = (get_query_var('paged'));
		if($paged < 2) { 
		//handle posts on first 'page' of posts only
	?>	
	
		<?php //Start post count to target top 3 recent posts -- initial count variable must be outside the loop ?>
		<?php $count = 0; ?>

		<?php while(have_posts()) { ?>
			<?php the_post(); ?>
			
			<?php //Increment the count by 1 each time through the loop ?>
			<?php $count++; ?>
				
				<?php //Target the most recent post with a class of "most-recent" ?>
				
				<?php if( $count == 1 ) { ?>
					<div class="blog-index most-recent">
						<div class="post-date">
							<h6 class="month"><?php echo get_the_date('M'); ?></h6>
							<h6 class="day"><?php echo get_the_date('j'); ?></h6>
							<h6 class="year"><?php echo get_the_date('Y'); ?></h6>
						</div> <!-- .post-date -->

						<div class="main-content">

							<div class="post-content">
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<?php the_excerpt(); ?>
							</div> <!-- .post-content -->	

							<?php if(has_post_thumbnail()) { ?>
							<div class="post-img">
								<a href=""><?php the_post_thumbnail('post_thumb_img'); ?></a>
							</div>	
							<?php } //endif for post_thumbnail ?>	

						</div><!-- 	.main-content -->

					</div> <!-- .most-recent -->

				<?php } elseif($count == 2) { ?>

					<?php //Add class of top-recent to the 2nd most recent post ?>
					<div class="blog-index top-recent">

						<div class="post-date">
							<h6 class="month"><?php echo get_the_date('M'); ?></h6>
							<h6 class="day"><?php echo get_the_date('j'); ?></h6>
							<h6 class="year"><?php echo get_the_date('Y'); ?></h6>
						</div> <!-- .post-date -->

						<div class="main-content">
							<?php if(has_post_thumbnail()) { ?>
									<div class="post-img">
										<a href=""><?php the_post_thumbnail('post_thumb_img'); ?></a>
									</div>	
							<?php } ?>	

							<div class="post-content">
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<?php the_excerpt(); ?>
							</div> <!-- .post-content -->	

						</div><!-- .main-content -->

					</div> <!-- .blog-index -->

				<?php  } elseif($count == 3) { ?>
				
					<?php //Add class of top-recent to the 2nd most recent post ?>
					<div class="blog-index top-recent right">
						<!-- <div class="grid-wrapper"> -->
						<div class="post-date">
							<h6 class="month"><?php echo get_the_date('M'); ?></h6>
							<h6 class="day"><?php echo get_the_date('j'); ?></h6>
							<h6 class="year"><?php echo get_the_date('Y'); ?></h6>
						</div>

						<div class="main-content">
							<?php if(has_post_thumbnail()) { ?>
							<div class="post-img">
								<a href=""><?php the_post_thumbnail('post_thumb_img'); ?></a>
							</div>	
							<?php } ?>	

							<div class="post-content">
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<?php the_excerpt(); ?>
								
							</div> <!-- .post-content -->	
							
						</div>	<!-- .main-content -->
					</div>

				<?php } else { ?>
				
				<!-- Mark up for all other blog posts -->
				<div class="blog-index all-posts">
					<div class="post-date">
						<h6 class="month"><?php echo get_the_date('M'); ?></h6>
						<h6 class="day"><?php echo get_the_date('j'); ?></h6>
						<h6 class="year"><?php echo get_the_date('Y'); ?></h6>
					</div>

					<div class="main-content">
						<?php if(has_post_thumbnail()) { ?>
						<div class="post-img">
							<a href=""><?php the_post_thumbnail('post_thumb_img'); ?></a>
						</div>	
						<?php } ?>	

						<div class="post-content">
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>
						</div> <!-- .post-content -->	

					</div>	<!-- .main-content -->

				</div> <!-- .blog-index -->

			<?php } ?>

		<?php } //endwhile ?>

	<?php } elseif($paged >= 2) {  //endif for first page of posts and style all other post pages?>

		<?php while(have_posts()) { ?>
			<?php the_post(); ?>

			<div class="blog-index all-posts">

				<div class="post-date">
					<h6 class="month"><?php echo get_the_date('M'); ?></h6>
					<h6 class="day"><?php echo get_the_date('j'); ?></h6>
					<h6 class="year"><?php echo get_the_date('Y'); ?></h6>
				</div> <!-- .post-date -->

				<div class="main-content">
					<?php if(has_post_thumbnail()) { ?>
					<div class="post-img">
						<a href=""><?php the_post_thumbnail('post_thumb_img'); ?></a>
					</div>	
					<?php } ?>	

					<div class="post-content">
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<?php the_excerpt(); ?>
					</div> <!-- .post-content -->	

				</div>	<!-- .main-content -->

			</div> <!-- .blog-index -->

			<?php } //endwhile?>

	<?php } //end elseif for pages greater than or equal to 2 ?>

	</div> <!-- .grid-wrapper -->

</div>	<!-- .blog-section -->

<!-- Pagination -->
<div class="bottom-pagination">
	<div class="grid-wrapper">
		<?php wp_pagination(); ?>
	</div>
</div>			

<?php get_footer(); ?>
