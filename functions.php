<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function job_listing_enqueue_google_fonts() {

	require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'google-fonts-crimson-text',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'google-fonts-inter',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'google-fonts-poppins',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'google-fonts-croissant-one',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Croissant+One&display=swap' ),
		array(),
		'1.0'
	);
	
}
add_action( 'wp_enqueue_scripts', 'job_listing_enqueue_google_fonts' );

if (!function_exists('job_listing_enqueue_scripts')) {

	function job_listing_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('job-listing-style', get_stylesheet_uri(), array() );

		wp_enqueue_style('dashicons');

		wp_style_add_data('job-listing-style', 'rtl', 'replace');

		wp_enqueue_style(
			'job-listing-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'job-listing-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'job-listing-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'bootstrap-js',get_template_directory_uri() . '/js/bootstrap.js',
			array('jquery'),
			'5.1.3',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'job-listing-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( get_theme_mod( 'job_listing_animation_enabled', true ) ) {
	        wp_enqueue_script(
	            'job-listing-wow-script',
	            get_template_directory_uri() . '/js/wow.js',
	            array( 'jquery' ),
	            '1.0',
	            true
	        );

	        wp_enqueue_style(
	            'job-listing-animate',
	            get_template_directory_uri() . '/css/animate.css',
	            array(),
	            '4.1.1'
	        );
	    }

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$job_listing_css = '';

		if ( get_header_image() ) :

			$job_listing_css .=  '
				.header-outter, .page-template-frontpage .header-outter{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'job-listing-style', $job_listing_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'job-listing-style',$job_listing_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'job_listing_enqueue_scripts' );
}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('job_listing_after_setup_theme')) {

	function job_listing_after_setup_theme() {

		load_theme_textdomain( 'job-listing', get_stylesheet_directory() . '/languages' );
		if ( ! isset( $job_listing_content_width ) ) $job_listing_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'job-listing' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100,
			'flex-height' => true,
			'flex-width' => true,
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'job_listing_after_setup_theme', 999 );

}

function job_listing_template_setup() {

require get_template_directory() .'/core/includes/customizer-notice/job-listing-customizer-notify.php';
require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/theme-breadcrumb.php';
require get_template_directory() . '/core/includes/customizer.php';
require get_template_directory() . '/core/includes/importer/config.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

}
add_action('after_setup_theme', 'job_listing_template_setup');

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function job_listing_logo_resizer() {

    $job_listing_theme_logo_size_css = '';
    $job_listing_logo_resizer = get_theme_mod('job_listing_logo_resizer');

	$job_listing_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($job_listing_logo_resizer).'px !important;
			width: '.esc_attr($job_listing_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'job-listing-style',$job_listing_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'job_listing_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function job_listing_global_color() {

    $job_listing_theme_color_css = '';
    $job_listing_copyright_bg = get_theme_mod('job_listing_copyright_bg');

	$job_listing_theme_color_css = '
    .copyright {
			background: '.esc_attr($job_listing_copyright_bg).';
		}
	';
    wp_add_inline_style( 'job-listing-style',$job_listing_theme_color_css );
    wp_add_inline_style( 'job-listing-woocommerce-css',$job_listing_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'job_listing_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('job_listing_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function job_listing_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'job-listing');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'job-listing'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_attr('%1$s at %2$s', '1: date, 2: time', 'job-listing'), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'job-listing' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'job-listing'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for job_listing_comment()

if (!function_exists('job_listing_widgets_init')) {

	function job_listing_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','job-listing'),
			'id'   => 'job-listing-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'job-listing'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 2','job-listing'),
			'id'   => 'job-listing-sidebar-2',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'job-listing'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 3','job-listing'),
			'id'   => 'job-listing-sidebar-3',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'job-listing'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer Sidebar','job-listing'),
			'id'   => 'job-listing-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'job-listing'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'job_listing_widgets_init' );

}

function job_listing_get_categories_select() {
	$job_listing_teh_cats = get_categories();
	$job_listing_results = array();
	$job_listing_count = count($job_listing_teh_cats);
	for ($i=0; $i < $job_listing_count; $i++) {
	if (isset($job_listing_teh_cats[$i]))
  		$job_listing_results[$job_listing_teh_cats[$i]->slug] = $job_listing_teh_cats[$i]->name;
	else
  		$job_listing_count++;
	}
	return $job_listing_results;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'job_listing_loop_columns');
if (!function_exists('job_listing_loop_columns')) {
	function job_listing_loop_columns() {
		$job_listing_columns = get_theme_mod( 'job_listing_per_columns', 3 );
		return $job_listing_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'job_listing_per_page', 20 );
function job_listing_per_page( $job_listing_cols ) {
  	$job_listing_cols = get_theme_mod( 'job_listing_product_per_page', 9 );
	return $job_listing_cols;
}

// Add filter to modify the number of related products
add_filter( 'woocommerce_output_related_products_args', 'job_listing_products_args' );
function job_listing_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

add_action( 'customize_register', 'job_listing_remove_setting', 20 );
function job_listing_remove_setting( $wp_customize ) {
    // Check if the setting or control exists before removing
    if ( $wp_customize->get_setting( 'header_textcolor' ) ) {
        $wp_customize->remove_setting( 'header_textcolor' );
    }

    if ( $wp_customize->get_control( 'header_textcolor' ) ) {
        $wp_customize->remove_control( 'header_textcolor' );
    }
}

// edit link option
if (!function_exists('job_listing_edit_link')) :
    function job_listing_edit_link($view = 'default')
    {
    global $post;
        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'job-listing'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link"><i class="fas fa-edit"></i>',
            '</span>'
        );
    }
endif;

function get_page_id_by_title($pagename){

    $args = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'title' => $pagename
    );
    $query = new WP_Query( $args );

    $page_id = '1';
    if (isset($query->post->ID)) {
        $page_id = $query->post->ID;
    }

    return $page_id;
}

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );

/*-----------------------------------------------------------------------------------*/
/* Dark Mode */
/*-----------------------------------------------------------------------------------*/

function job_listing_body_class( $job_listing_classes ) {
    $job_listing_dark_mode_enabled = get_theme_mod( 'job_listing_is_dark_mode_enabled', false );

    if ( $job_listing_dark_mode_enabled ) {
        $job_listing_classes[] = 'dark-mode';
    }

    return $job_listing_classes;
}
add_filter( 'body_class', 'job_listing_body_class' );