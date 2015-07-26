<?php
/**
 * The template for a single gallery
 *
 * Displays all of the gallery items 
 *
 * @package photography-theme
 */
?>

<?php get_header(); ?>

<?php if( have_posts() ) { ?>
	<?php while(have_posts()) {
		the_post(); ?>

		<?php echo the_content(); ?>

		<div class="lh-gallery">
	
		<?php if(get_field('gallery')) { ?>
			<?php while(has_sub_field('gallery')) { ?>

				<?php if(have_rows('image_gallery')) { ?>
						<?php while(have_rows('image_gallery')) { the_row(); ?>
					
					<div class="img-container">
						<?php $gallery = get_sub_field('img_gallery'); ?>
						<?php if($gallery) { ?>
							<?php echo $gallery; ?>
						<?php } ?>
					</div><!-- /.img-container -->	

							<?php $images = get_sub_field('image'); ?>

							<?php if( $images ):?>
									
					     		<?php foreach( $images as $image ): ?>

		        			<?php endforeach; ?>
						        	
				      <?php endif; ?>	
		
						<?php } //endwhile row ?>
				<?php } //endif image gallery?>	

			<?php } //endwhile for gallery?>
		<?php } //endif for gallery?>
	    
		</div> <!-- .lh-gallery -->

	<?php } //endwhile?>

<?php } //endif?>

<?php get_footer(); ?>