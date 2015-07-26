<?php 
/**
* Main Template for the Accordion Module
*
*
* @package photography-theme
*/
?>

<div class="accordion-module">
	<?php if(get_sub_field('accordion')) { ?>

	<div class="grid-wrapper">
	<h3><?php echo get_sub_field('accordion_heading'); ?></h3>
		<?php //Start the while loop ?>
			<?php while(has_sub_field('accordion')) { ?>

				<?php //variables 
					$question = get_sub_field('faq_heading');
					$answer = get_sub_field('faq_answer');
				?>

				<div class="question">
					<p><?php echo $question; ?></p>
				</div>

				<div class="answer">
					<?php echo $answer; ?>
				</div>

			<?php } //endwhile loop ?>
	</div> <!-- .grid-wrapper -->	
	
	<?php } //endif ?>	

</div> <!-- .accordion-module -->