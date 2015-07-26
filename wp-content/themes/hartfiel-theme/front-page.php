<?php 
/**
* Main Template File
*
*
* This file is used to display a page when nothing more specific matches a query.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package photography-theme
*/
?>

<?php get_header(); ?>

<?php is_front_page(); ?>

	<?php //Define Variables
		$img = get_field('image');
		$heading = get_field('heading');
		$subheading = get_field('subheading');
		$button = get_field('buttons');
		$button_link = get_sub_field('button_link');
		$button_text = get_sub_field('button_text');
	?>

	<div class="home-container">
	
		<div class="content-area">
					
					<div class="home-img">
						<img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt'] ?>">
					</div>
						
					<div class="grid-wrapper">

							<div class="home-content">
								<h2><?php echo $heading; ?></h2>

								<?php if( !empty ($subheading) ) { ?>

									<h3><?php echo $subheading; ?></h3>

								<?php } //endif ?>

								<?php while( has_sub_field('buttons') ) { ?>

									<a href="<?php echo get_sub_field('button_link'); ?>" class="button btn-large" alt="">
										<?php echo get_sub_field('button_text'); ?>
									</a>
								<?php }; //endwhile loop for buttons ?>

							</div><!-- /.home-content -->
							
					</div> <!-- .grid-wrapper -->

		</div> <!-- .content-area -->		

	</div> <!-- .home -->	
		

<?php get_footer(); ?>	
