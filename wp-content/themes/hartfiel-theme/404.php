<?php
/*
Template Name: Gallery Archive
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
				<h3>Not Found</h3>
			</div>
		</div>

</div> <!-- .header-imgs -->

<div class="error-container">
	<div class="grid-wrapper">
		<h2>Oh, Snap!</h2>
		<h5>Looks like we couldn't find what you're looking for. Try going back to the <a href="<?php echo site_url(); ?>">homepage</a></h5>
	</div>
</div> <!-- .error-container -->

<?php get_footer(); ?>