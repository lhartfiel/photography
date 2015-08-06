<?php
/**
 * The footer template
 *
 * Displays all of the <footer> section and everything after closing <div id="main"> tag
 *
 * @package photography-theme
 */
?>



	</div><!-- close the #main div -->

	<?php //variables
		$bizname = get_field('business_name', 'option');
	?>

		<footer>
			<div class="bkg-pattern">
				<img src="<?php echo get_site_url()."/wp-content/themes/hartfiel-theme/assets/img/cta_pattern.jpg" ?>">
			</div>
			<div class="grid-wrapper">
				<p>&copy;<?php the_time('Y'); ?></p>
				<p><?php echo $bizname; ?></p>
				<div class="site-by">
        	<p>Design & Dev by <a href="http://www.lindsayhartfiel.com">Lindsay Hartfiel</a></p>
      	</div>
			</div> <!-- .grid-wrapper -->
		</footer>

		<?php wp_footer(); ?>
</body>
</html>
