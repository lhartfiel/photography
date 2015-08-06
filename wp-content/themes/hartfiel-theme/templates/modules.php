<?php 
/**
* Include the Modules
*
*
* @package photography-theme
*/
?>


<?php if( have_rows('repeater') ) { ?>

	<?php while( have_rows('repeater') ) { the_row();  ?>

				<?php if( get_sub_field('modules') === 'header_img') { ?>
					<?php echo get_template_part('templates/header-image'); ?>
				<?php } elseif( get_sub_field('modules') === 'cards') { ?>
					<?php echo get_template_part('templates/cards'); ?>
				<?php	} elseif( get_sub_field('modules') === 'cta') { ?>
					<?php echo get_template_part('templates/cta'); ?>
				<?php } elseif( get_sub_field('modules') === 'full-width') { ?>
					<?php echo get_template_part('templates/full-width'); ?>
				<?php } elseif( get_sub_field('modules') === ('2-col')) { ?>
					<?php echo get_template_part('templates/2-col'); ?>
				<?php } elseif( get_sub_field('modules') === 'accordion') { ?>
					<?php echo get_template_part('templates/accordion'); ?>
				<?php } elseif( get_sub_field('modules') === 'form') { ?>
					<?php echo get_template_part('templates/form'); ?>
				<?php }?>

	<?php } //endwhile ?>

<?php } //endif ?>	