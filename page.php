<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="main-wrapper">
    <div id="main" class="col-full">
        <div class="bisection">
            <div class="section-left">&nbsp;
            </div>
            <div class="section-right">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <?php if(! is_page('Profile')): ?>
					<?php if ( is_front_page() ) { ?>
						<h2><?php the_title(); ?></h2>
					<?php } else { ?>	
						<h1><?php the_title(); ?></h1>
					<?php } ?>				
                <?php endif; ?>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
<?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
