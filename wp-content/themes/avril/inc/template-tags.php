<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Avril
 */

if ( ! function_exists( 'avril_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function avril_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'avril' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'avril' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'avril_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function avril_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'avril' ) );
		if ( $categories_list && avril_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'avril' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'avril' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'avril' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'avril' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'avril' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function avril_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'avril_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'avril_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so avril_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so avril_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in avril_categorized_blog.
 */
function avril_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'avril_categories' );
}
add_action( 'edit_category', 'avril_category_transient_flusher' );
add_action( 'save_post',     'avril_category_transient_flusher' );

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('avril_sticky_menu')):
    function avril_sticky_menu()
    {
        $is_sticky = get_theme_mod('hide_show_sticky','1');

        if ($is_sticky == '1'):
            return 'sticky-nav ';
        else:
            return 'not-sticky';
        endif;
    }
endif;


/**
 * Register Google fonts for avril.
 */
function avril_google_font() {
	
    $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function avril_scripts_styles() {
    wp_enqueue_style( 'avril-fonts', avril_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'avril_scripts_styles' );


/**
 * Register Breadcrumb for Multiple Variation
 */
function avril_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');			
}

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'avril_post_layout' )) :
function avril_post_layout(){
	if(is_active_sidebar('avril-sidebar-primary'))
		{ echo 'av-column-8'; } 
	else 
		{ echo 'av-column-12'; }  
} endif;


/**
 * Dynamic Styles
 */
 
if( ! function_exists( 'avril_dynamic_style' ) ):
    function avril_dynamic_style() {

		$output_css = '';
		
		 /**
		 *  Breadcrumb Style
		 */
		 
		$breadcrumb_min_height			= get_theme_mod('breadcrumb_min_height','236');	
		
		if($breadcrumb_min_height !== '') { 
				$output_css .=".breadcrumb-content {
					min-height: " .esc_attr($breadcrumb_min_height). "px;
				}\n";
			}
			
		$breadcrumb_bg_img			= get_theme_mod('breadcrumb_bg_img',esc_url(get_template_directory_uri() .'/assets/images/bg/breadcrumbg.jpg')); 
		$breadcrumb_back_attach		= get_theme_mod('breadcrumb_back_attach','scroll'); 

		if($breadcrumb_bg_img !== '') { 
			$output_css .=".breadcrumb-area {
					background-image: url(" .esc_url($breadcrumb_bg_img). ");
					background-attachment: " .esc_attr($breadcrumb_back_attach). ";
				}\n";
		}
		
        wp_add_inline_style( 'avril-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'avril_dynamic_style' );