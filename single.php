<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>
<div id="main-wrapper">
    <div id="main" class="col-full">
        <div class="bisection">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <div class="section-left">
                <?php portfolio_show_slide_images(); ?>
            </div>
            <div class="section-right">
            <div class="post-part">
                        <h1><?php the_title(); ?></h1>
                            <?php //twentyten_posted_on(); ?>
            </div>
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
        <?php endwhile; // end of the loop. ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
