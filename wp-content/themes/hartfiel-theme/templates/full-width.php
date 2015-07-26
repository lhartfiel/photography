<?php 
/**
* Main Template for Cards Modules
*
*
* @package photography-theme
*/
?>

<?php //variables
	$description = get_sub_field('description');
	$bkg_img = get_sub_field('bkg_img');
	$inling_img = get_sub_field('inline_img');
	$button_type = get_sub_field('button_link_type');
	$button_label = get_sub_field('button_label');
	$button_internal = get_sub_field('button_internal');
	$button_external = get_sub_field('button_external');
?>

<div class="full-width">

	<?php if(!empty($bkg_img)) { ?>
		<div class="full-width-img">
			<img src="<?php echo $bkg_img['sizes']['large']; ?>" alt=""> 
		</div>

	<?php } ?>

	<div class="grid-wrapper">

			<?php if(!empty($description)) { ?>
				<div class="description">
					<?php echo $description; ?>
				</div>
			<?php } ?>

			<?php if(!empty($inline_img)) { ?>
				<div class="full-width-img">
					<img src="<?php echo $inline_img['sizes']['large']; ?>" alt=""> 
				</div>
			<?php } ?>

			<?php if(!empty($button_label)) { ?>
					<?php if(($button_type) === 'internal') { ?>
						<a href="<?php echo $button_internal; ?>" class="button small"><?php echo $button_label; ?></a>
					<?php } ?>	
					<?php if(($button_type) === 'external') { ?>
						<a href="<?php echo $button_external; ?>" class="button small"><?php echo $button_label; ?></a>
					<?php } ?>	
			<?php } ?>

	</div>	<!-- .grid-wrapper -->

</div><!-- /.full-width -->