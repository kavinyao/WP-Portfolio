<?php if(! portfolio_is_ajax()): ?>
<?php get_header(); ?>

<div id="main-wrapper">
    <div id="main" class="col-full">
<?php else: ?>
    <div class="single-project">
<?php endif; ?>
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="bisection">
            <div class="section-left"><?php if(portfolio_is_ajax()): ?><a class="back-to-projects">&laquo; back</a><?php else: ?>&nbsp;<?php endif; ?></div>
            <div class="section-right">
                <div class="post-part">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="bisection">
            <div class="section-left">
                <?php portfolio_show_slide_images(); ?>
&nbsp;
            </div>
            <div class="section-right">
                <div class="post-part">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
                </div>
                <div class="post-part">
                    <?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
                        <h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
                        <?php the_author_meta( 'description' ); ?>
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                            <?php printf( __( 'View all posts by %s &rarr;', 'twentyten' ), get_the_author() ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; // end of the loop. ?>
<?php if(! portfolio_is_ajax()): ?>
    </div>
</div>
<?php get_footer(); ?>
<?php else: ?>
    </div>
<?php endif; ?>
