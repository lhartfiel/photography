<?php 
/**
* Main Template for Cards Modules
*
*
* @package photography-theme
*/
?>


<div class="cards-module">
	<?php if(get_sub_field('cards')) { ?>

	<div class="grid-wrapper">

		<div class="flex-container">
		<?php //Start the while loop ?>
			<?php while(has_sub_field('cards')) { ?>
				
				<?php //Define variables
				$card_type = get_sub_field('card_type');
				$img = get_sub_field('image');
				$header = get_sub_field('header');
				$description = get_sub_field('description');
				$button_type = get_sub_field('button_link_type');
				$button_label = get_sub_field('button_label');
				$button_internal = get_sub_field('button_internal');
				$button_external = get_sub_field('button_external');
				?>

				<?php if($card_type === 'standard') { ?>
					<div class="cards-standard">
						<div class="top-content">
							<?php if(!empty($img)) { ?>
								<div class="image">
									<img src="<?php echo $img['sizes']['medium']; ?>">
								</div>	
							<?php } ?>

							<?php if(!empty($header)) { ?>
								<h5><?php echo $header; ?></h5>
							<?php } ?>
						</div> <!-- .top-content -->	
						<?php if(!empty($description)) { ?>
							<div class="description">
								<?php echo $description; ?>
							</div>
						<?php } ?>
						<?php if(!empty($button_label)) { ?>
								<?php if(($button_type) === 'internal') { ?>
									<a href="<?php echo $button_internal; ?>" class="button small cards"><?php echo $button_label; ?></a>
								<?php } ?>	
								<?php if(($button_type) === 'external') { ?>
									<a href="<?php echo $button_external; ?>" class="button small cards"><?php echo $button_label; ?></a>
								<?php } ?>	
						<?php } ?>
					</div>
				<?php } elseif($card_type === 'featured') { ?>
					<div class="cards-featured">
						<div class="top-content">
							<?php if(!empty($img)) { ?>
								<div class="image">
									<img src="<?php echo $img['sizes']['head-img']; ?>">
								</div>
							<?php } ?>
								
							<?php if(!empty($header)) { ?>
								<h5><?php echo $header; ?></h5>
							<?php } ?>
						</div> <!-- .top-content -->
						<?php if(!empty($description)) { ?>
							<div class="description">
								<?php echo $description; ?>
								<?php if(!empty($button_label)) { ?>
										<?php if(($button_type) === 'internal') { ?>
											<a href="<?php echo $button_internal; ?>" class="button small"><?php echo $button_label; ?></a>
										<?php } ?>	
										<?php if(($button_type) === 'external') { ?>
											<a href="<?php echo $button_external; ?>" class="button small"><?php echo $button_label; ?></a>
										<?php } ?>	
								<?php } ?>	
							</div>
						<?php } ?>
					</div>
				<?php }; ?>	
				
			<?php } //end while loop ?>
			</div> <!-- .flex-container -->

		</div><!-- /.grid-wrapper -->
		
	<?php } //end else if statement ?>

</div> <!-- cards-module -->



