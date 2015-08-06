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

	
			<!-- <div class="header-img-container"> -->

					<?php  $count = 1; ?>
				
					<?php while(has_sub_field('header_images')) { ?>
						<?php $img = get_sub_field('image'); ?>
							
							<div class="img-<?php echo $count; ?>  img-container">
								<img src="<?php echo $img['sizes']['head-img']; ?>">		
							</div>	

							<?php $count++ ?>
						<?php } //endwhile?>			

						<div class="title">
								<h6><?php echo the_title(); ?></h6>
								<p><?php echo get_sub_field('description'); ?></p>
						</div>

			<!-- </div> -->	<!-- .header-img-container -->


	<?php } //endif ?>	

	

</div> <!-- .header-imgs -->
