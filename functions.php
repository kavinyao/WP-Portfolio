<?php
define('PORTFOLIO_SLIDE_IMAGE_SIZE', 120);

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function twentyten_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'twentyten' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'twentyten_filter_wp_title', 10, 2 );

function portfolio_unregister_default_filters() {
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
}
add_action('init', 'portfolio_unregister_default_filters');

function portfolio_register_assets() {
    $base_url = get_bloginfo('template_url');
    wp_enqueue_style('portfolio', "{$base_url}/css/portfolio.css");

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', "{$base_url}/js/jquery.min.js", false, '1.8.3', true);

    if(is_singular()) {
        wp_enqueue_style('fancybox', "{$base_url}/js/fancybox/jquery.fancybox-1.3.4.css");
        wp_enqueue_script('fancybox', "{$base_url}/js/fancybox/jquery.fancybox-1.3.4.pack.js", array('jquery'), '1.3.4', true);
    }

    // notice the position so that it's loaded after fancybox
    wp_enqueue_script('portfolio-main', "{$base_url}/js/portfolio-main.js", array('jquery'), '1.0', true);
    // put all config in array to avoid polluting boolean values
    wp_localize_script('portfolio-main', 'portfolio', array(
        'conf' => array(
            'is_singular' => is_singular(),
        )
    ));
}
add_action('wp_enqueue_scripts', 'portfolio_register_assets');

function portfolio_get_page_link($title) {
    $page = get_page_by_title($title);
    if($page) {
        return get_page_link($page->ID);
    } else {
        return home_url('/');
    }
}

function portfolio_show_slide_images() {
    global $post;
    $post = get_post($post);

    $images = get_children(array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'output' => 'ARRAY_N',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_parent' => $post->ID,
    ));

    foreach($images as $image_ID => $_){
        $img = wp_get_attachment_image($image_ID, array(PORTFOLIO_SLIDE_IMAGE_SIZE, PORTFOLIO_SLIDE_IMAGE_SIZE), false);
        $image_attrs = wp_get_attachment_image_src($image_ID, 'full');
        $image_url = $image_attrs[0];
        echo "<a href=\"{$image_url}\" class=\"slide\" rel=\"slideshow\">{$img}</a>";
    }
}
