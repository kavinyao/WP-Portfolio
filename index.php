<?php get_header(); ?>

<div id="main-wrapper">
    <div id="main" class="col-full">
        <div class="bisection projects">
            <div class="section-left">&nbsp;
            </div>
            <div class="section-right">
            <? if(have_posts()): ?>
                <? while(have_posts()): the_post(); ?>
                <h2><a class="project-load-trigger" data-slug="<?php echo esc_attr($post->post_name); ?>" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Project %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <? endwhile; ?>
            <? endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
