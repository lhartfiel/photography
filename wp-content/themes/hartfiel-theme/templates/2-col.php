<?php 
/**
* Main Template for module with 2 Columns
*
*
* @package photography-theme
*/
?>

<?php if(get_sub_field('column_layout') === 'half_half')  { ?>

	<?php //variables
		$bkg_img = get_sub_field('bkg_img');
	?>
		
		<div class="col-2 half">
			
			<?php //Insert optional background image ?>
			<?php if(!empty($bkg_img)) { ?>
				<div class="bkg-img">
					<img src="<?php echo $bkg_img['sizes']['large']; ?>">
				</div><!-- /.bkg-img -->
			<?php } ?>

			<?php if(get_sub_field('columns')) { ?>

			<div class="grid-wrapper">

					<?php while(has_sub_field('columns')) { ?>

						<?php if(get_row_layout() === 'left_column') { ?>
						
							<div class="col-left">
								<?php echo get_template_part('templates/generic-content'); ?>
							</div> <!-- .col-left-->

						<?php } //endif for left column ?>

						<?php if(get_row_layout() === 'right_column') { ?>
						
							<div class="col-right">
								<?php echo get_template_part('templates/generic-content'); ?>
							</div> <!-- .col right -->

						<?php } //endif for right column ?>
			 
					<?php } //endwhile for columns ?>

			</div><!-- /.grid-wrapper -->

		</div> <!-- .2-col -->

	<?php } //endif ?>
<?php } elseif(get_sub_field('column_layout') === 'left_2_3')  { ?>

	<?php //variables
		$bkg_img = get_sub_field('bkg_img');
	?>
		
		<div class="col-2 two-third-left">
			
			<?php //Insert optional background image ?>
			<?php if(!empty($bkg_img)) { ?>
				<img src="<?php echo $bkg_img['sizes']['large']; ?>">
			<?php } ?>

			<?php if(get_sub_field('columns')) { ?>

			<div class="grid-wrapper">

					<?php while(has_sub_field('columns')) { ?>

						<?php if(get_row_layout() === 'left_column') { ?>
						
							<div class="col-left">
								<?php echo get_template_part('templates/generic-content'); ?>
							</div> <!-- .col-left-->

						<?php } //endif for left column ?>

						<?php if(get_row_layout() === 'right_column') { ?>
						
							<div class="col-right">
								<?php echo get_template_part('templates/generic-content'); ?>
							</div> <!-- .col right -->

						<?php } //endif for right column ?>
			 
					<?php } //endwhile for columns ?>

			</div><!-- /.grid-wrapper -->

		</div> <!-- .2-col -->

	<?php } //endif ?>
<?php } elseif(get_sub_field('column_layout') === 'left_1_3')  { ?>

	<?php //variables
		$bkg_img = get_sub_field('bkg_img');
	?>
		
		<div class="col-2 one-third-left">
			
			<?php //Insert optional background image ?>
			<?php if(!empty($bkg_img)) { ?>
				<img src="<?php echo $bkg_img['sizes']['large']; ?>">
			<?php } ?>

			<?php if(get_sub_field('columns')) { ?>

			<div class="grid-wrapper">

					<?php while(has_sub_field('columns')) { ?>

						<?php if(get_row_layout() === 'left_column') { ?>
						
							<div class="col-left">
								<?php echo get_template_part('templates/generic-content'); ?>
							</div> <!-- .col-left-->

						<?php } //endif for left column ?>

						<?php if(get_row_layout() === 'right_column') { ?>
						
							<div class="col-right">
								<?php echo get_template_part('templates/generic-content'); ?>
							</div> <!-- .col right -->

						<?php } //endif for right column ?>
			 
					<?php } //endwhile for columns ?>

			</div><!-- /.grid-wrapper -->

		</div> <!-- .2-col -->

	<?php } //endif ?>
<?php } ?>