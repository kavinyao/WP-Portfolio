<? if(have_posts()): ?>
    <? while(have_posts()): the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Project %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    <? endwhile; ?>
<? endif; ?>
