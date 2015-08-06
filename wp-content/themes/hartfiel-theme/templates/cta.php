<?php 
/**
* Main Template for CTA
*
*
* @package photography-theme
*/
?>

<?php 
	$title = get_sub_field('title');
	$button_type = get_sub_field('button_link_type');
	$button_label = get_sub_field('button_label');
	$button_internal = get_sub_field('button_internal');
	$button_external = get_sub_field('button_external');

?>

<div class="cta-module">
	<div class="bkg-pattern">
		<img src="../wp-content/themes/hartfiel-theme/assets/img/cta_pattern.jpg">
	</div>

	<div class="grid-wrapper">
		<div class="content">
			<?php if(!empty($title)) { ?>
				<div class="title">
					<h4><?php echo $title; ?></h4>
				</div>
			<?php } ?>

			<?php if(!empty($button_label)) { ?>
					<?php if(($button_type) === 'internal') { ?>
						<a href="<?php echo $button_internal; ?>" class="button white"><?php echo $button_label; ?></a>
					<?php } ?>	
					<?php if(($button_type) === 'external') { ?>
						<a href="<?php echo $button_external; ?>" class="button white"><?php echo $button_label; ?></a>
					<?php } ?>	
			<?php } ?>
		</div> <!-- .content -->
	</div>	<!-- .grid-wrapper -->

</div><!-- /.cta -->