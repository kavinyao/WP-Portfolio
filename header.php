<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?><?php if(is_home()): ?>style="opacity: 0.3;"<?php endif; ?>>
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
                        <h2 <? if(is_page('Profile')): ?>class="active"<? endif; ?>><a href="<? echo portfolio_get_page_link('Profile'); ?>" title="Profile Page">Profile</a></h2>
                    </div>
                    <div class="section-element">
                        <h2 id="projects-trigger" <? if(is_single()): ?>class="active"<? endif; ?>>Project</h2>
                    </div>
                    <div class="section-element">
                        <h2 <? if(is_page('Art')): ?>class="active"<? endif; ?>><a href="<? echo portfolio_get_page_link('Art'); ?>" title="Art Page">&nbsp;&nbsp;&nbsp;Art&nbsp;&nbsp;&nbsp;</a></h2>
                    </div>
                    <div class="section-element">
                        <h2 <? if(is_page('Contact')): ?>class="active"<? endif; ?>><a href="<? echo portfolio_get_page_link('Contact'); ?>" title="Contact Page">Contact</a></h2>
                    </div>
                    </div>
                    <? if(! is_home()): ?>
                    <div id="projects" style="display: none;">
                        <ul>
                        <? wp_get_archives('type=alpha'); ?>
                        </ul>
                    </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
