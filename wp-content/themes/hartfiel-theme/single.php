<?php
/**
 * The blog template
 *
 * Displays all of the blog posts 
 *
 * @package photography-theme
 */
?>

<?php get_header(); ?>

<!-- //Query for pagination -->
<?php
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<?php if( have_posts() ) { ?>
	<?php while( have_posts() ) {
		the_post(); ?>
		
		<div class="single-post-body">

			<div class="single-post-img">
				<?php if(has_post_thumbnail()) { ?>
						<div class="post-img img-container">
							<?php the_post_thumbnail('large'); ?>
						</div>	
				<?php } ?>
				<div class="grid-wrapper">
					<h2 class="single-title"><?php echo the_title(); ?></h2>
				</div><!-- /.grid-wrapper -->
			</div>

			<div class="grid-wrapper">
				<div class="single-content-wrapper">
					<p class="single-date"><?php echo the_date();?></p>
					<div class="single-body-copy">
						<?php echo the_content(); ?>
					</div>
				</div><!-- /.single-content-wrapper -->
			</div><!-- /.grid-wrapper -->

		</div> <!-- .single-post-body -->

	<?php } //endwhile?>

	<!-- Add the pagination options below. -->

	<div class="bottom-pagination">
		<div class="grid-wrapper">

			<?php if(get_adjacent_post(false, '', true)) { ?>
				<div class="nav-previous prev"><?php previous_post_link( '%link', 'Previous' ); ?></div>
			<?php } else { ?>
				<!-- Keep this empty so styles don't appear when there is no previous post -->
			<?php } ; ?>

			<?php if(get_adjacent_post(false, '', false)) { ?>
				<div class="nav-next next"><?php next_post_link( '%link', 'Next' ); ?></div> 
			<?php  } else { ?>
				<!-- Keep this empty so styles don't appear when there is no previous post -->
			<?php } ; ?>
			
		</div> <!-- /.grid-wrapper -->
	</div>

<?php } //endif ?>



<?php get_footer(); ?>


				 
				
