<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?><?php if(is_home()) echo ' ' . portfolio_home_body_style(); ?>>
        <div id="header-wrapper">
            <div id="header" class="col-full">
                <h1>
                <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            </h1>

            <div class="bisection" role="navigation">
                <div class="section-left">&nbsp;</div>
                <div class="section-right">
                <div class="section-elements">
                    <div class="section-element">
                        <h2 <?php if(is_page('Profile')): ?>class="active"<?php endif; ?>><a href="<?php echo portfolio_get_page_link('Profile'); ?>" title="Profile Page">Profile</a></h2>
                    </div>
                    <div class="section-element">
                        <h2 id="projects-trigger" <?php if(is_single()): ?>class="active"<?php endif; ?>>Project</h2>
                    </div>
                    <div class="section-element">
                        <h2 <?php if(is_page('Art')): ?>class="active"<?php endif; ?>><a href="<?php echo portfolio_get_page_link('Art'); ?>" title="Art Page">&nbsp;&nbsp;&nbsp;Art&nbsp;&nbsp;&nbsp;</a></h2>
                    </div>
                    <div class="section-element">
                        <h2 <?php if(is_page('Contact')): ?>class="active"<?php endif; ?>><a href="<?php echo portfolio_get_page_link('Contact'); ?>" title="Contact Page">Contact</a></h2>
                    </div>
                    </div>
                    <?php if(! is_home()): ?>
                    <div id="projects" style="display: none;">
                        <ul>
                        <?php wp_get_archives('type=alpha'); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
