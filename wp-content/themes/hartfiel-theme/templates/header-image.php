<?php 
/**
* Repeatable Header Modules
*
*
* @package photography-theme
*/
?>


<div class="header-imgs">
	<?php if(get_sub_field('header_images')) { ?>


			<div class="header-img-container">

				<?php //variables
					$number = count(get_sub_field('header_images')); //determine number of repeaters
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
				<?php if((get_sub_field('header_type') === '2_img') || (get_sub_field('header_type') === '3_img')) { ?>
					<?php while(has_sub_field('header_images')) { ?>
						<?php $img = get_sub_field('image'); ?>
						
							<div class="img <?php echo esc_attr($default_class) ?> img-container">
								<img src="<?php echo $img['sizes']['head-img']; ?>">		
							</div>	
						<?php } //endwhile?>			
				<?php } //endif ?>

				<?php if(get_sub_field('header_type') === '1_img') { //get bigger image for headers with 1 image ?>
					<?php while(has_sub_field('header_images')) { ?>
						<?php $img = get_sub_field('image'); ?>
							<div class="img <?php echo esc_attr($default_class) ?> img-container">
								<img src="<?php echo $img['sizes']['large']; ?>">		
							</div>	
						<?php } //endwhile?>			
				<?php } //endif ?>

			</div>	<!-- .header-img-container -->


	<?php } //endif ?>	

	<div class="title">
		<div class="grid-wrapper">
			<h3><?php echo the_title(); ?></h3>
		</div>
	</div>

</div> <!-- .header-imgs -->
