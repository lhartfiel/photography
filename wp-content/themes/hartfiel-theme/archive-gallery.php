<?php
/*
Template Name: Gallery Archive
*/
?>

<?php get_header(); ?>

<div class="gallery-archive">
	<!-- <h1><?php the_title(); ?></h1> -->
	<div class="loader-container">
		<div class="sk-chasing-dots">
		 	<div class="sk-child sk-dot1"></div>
		 	<div class="sk-child sk-dot2"></div>
		</div>
	</div>

	<?php
	//query for the gallery post type
	$args = array(
		'post_type' => 'gallery'
	);

	$query = new WP_Query($args)
	?>

	<?php if($query -> have_posts()) { ?>
		<?php while($query -> have_posts()) { ?>
			<?php $query -> the_post(); ?>

			<div class="images">
				
				<a href="" class="collapse fa fa-minus-circle">Collapse</a>
				<?php the_content(); ?>
				<?php if(has_post_thumbnail()) { ?>
					<a href="" class="img-wrap"><?php the_post_thumbnail(); ?></a>

					<?php if(get_field('gallery')) { ?>
						<?php while(has_sub_field('gallery')) { ?>

							<?php if(get_sub_field('image_gallery')) { ?>
								<?php while(has_sub_field('image_gallery')) { ?>
									<?php $photo_category = get_sub_field('photo_category') ?>

									<?php if( !empty($photo_category) ) { ?>
										<h1><?php echo get_sub_field('photo_category'); ?></h1>
										<h5><?php echo get_sub_field('photo_category'); ?></h5>
									<?php } //endif ?>
									
								<?php } //endwhile for image_gallery?>
							<?php } //endif for image_gallery?>	
						<?php } //endwhile for gallery?>
					<?php } //endif for gallery?>					
				<?php } ?>	

				<div class="image-reveal">
					<?php if(get_field('gallery')) { ?>
						<?php while(has_sub_field('gallery')) { ?>

							<?php if(get_sub_field('image_gallery')) { ?>
								<?php while(has_sub_field('image_gallery')) { ?>
									<div class="image-reveal-content">
										<h2><?php echo get_sub_field('photo_category'); ?></h2>
										<?php echo get_sub_field('teaser'); ?>
										<?php if(get_sub_field('button_link_type') === 'internal') { ?>
											<a href="<?php echo get_sub_field('button_internal'); ?>" class="button black center"><?php echo get_sub_field('button_label'); ?></a>
										<?php } ?>	
										<?php if(get_sub_field('button_link_type') === 'external') { ?>
											<a href="<?php echo get_sub_field('button_external'); ?>" class="button black center"><?php echo get_sub_field('button_label'); ?></a>
										<?php } ?>	
									</div>
							
								<?php } ?>
							<?php } ?>	

						<?php } ?>
					<?php } ?>	
				</div>
			</div>
		<?php } //endwhile ?>
		<?php wp_reset_postdata(); ?> 
	<?php } ?>	

	
</div><!-- /.gallery-archive -->


<?php get_footer(); ?>