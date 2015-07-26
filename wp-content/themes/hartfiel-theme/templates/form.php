<?php 
/**
* Main Template for Forms
*
*
* @package photography-theme
*/
?>

<?php 
	$map = get_sub_field('map');
	$description = get_sub_field('description');
	$address = get_sub_field('address');
	$intro = get_sub_field('contact_info');

?>

<div class="contact-form module">
	<div class="grid-wrapper">
		<h6><?php echo $intro; ?></h6>
		<div class="form">
			<?php echo $description; ?>
		</div>
		<div class="contact-info">
				<div class="address">
					<?php echo $address; ?>
				</div>
				<?php if(!empty($map)) { ?>
				<div class="map">
					<?php echo $map; ?>
				</div>
				<?php } ?>
		</div>
	</div><!-- /.grid-wrapper -->

</div>