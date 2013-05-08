<?php get_header(); ?>

<div id="main-wrapper">
    <div id="main" class="col-full">
        <div class="bisection">
            <div class="section-left">&nbsp;</div>
            <div class="section-right">
            <?php if(have_posts()) while(have_posts()): the_post(); ?>
                <?php if(! is_page('Profile')): ?>
					<?php if(is_front_page()): ?>
						<h2><?php the_title(); ?></h2>
					<?php else: ?>
						<h1><?php the_title(); ?></h1>
					<?php endif; ?>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
