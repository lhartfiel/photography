<?php 
/**
* Main Template File
*
*
* This file is used to display a page when nothing more specific matches a query.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package photography-theme
*/
?>

<?php get_header(); ?>


<section id="primary" role="main">

    <?php if ( have_posts() ) { ?>
        <!-- there IS content for this query -->


		<!-- Begin the loop -->
        <?php while ( have_posts() ) { 
            the_post(); ?>

        	<article>
        		<header class="entry-header">
    				<h1><?php the_title(); ?></h1>
        		</header>

        		<?php the_content(); ?>

        	</article>

        <?php } //endwhile ?>

	<?php } else { //endif ?> 

        <!-- there IS NOT content for this query -->
    	<article>
    		<header class="entry-header">
					<h1><?php _e('Oh no!', 'photography-theme') ?></h1>
    		</header>
    		<p><?php _e( "We can&#039;t find content for this page!", "photography-theme" ); //error message ?></p>

    <?php } //end else ?> 

</section><!-- #primary -->


<?php get_footer(); ?>
