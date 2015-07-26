<?php 
/**
* Main Template for Generic Content
*
* ---------------------------------------------
* This is to be used to import the following:
*	  ** Description
*		** Inline Image
*		** Buttons
*	---------------------------------------------
*
* @package photography-theme
*/
?>

<?php //variables
	$description = get_sub_field('description');
	$inline_img = get_sub_field('inline_img');
	$button_type = get_sub_field('button_link_type');
	$button_label = get_sub_field('button_label');
	$button_internal = get_sub_field('button_internal');
	$button_external = get_sub_field('button_external');
?>

<?php if(!empty($description)) { ?>
	<div class="description">
		<?php echo $description; ?>
	</div>
<?php } ?>

<?php if(!empty($inline_img)) { ?>
	<div class="image">
		<img src="<?php echo $inline_img['sizes']['medium']; ?>" alt="">
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