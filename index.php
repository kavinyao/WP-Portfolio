<?php get_header(); ?>

<div id="main-wrapper">
    <div id="main" class="col-full">
        <div class="bisection">
            <div class="section-left">&nbsp;
            </div>
            <div class="section-right">
			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
            ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
