<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'job-listing' ); ?></a>

<?php if(get_theme_mod('job_listing_site_loader',false)!= ''){ ?>
    <?php if(get_theme_mod( 'job_listing_preloader_type','four-way-loader') == 'four-way-loader'){ ?>
	    <div class="cssloader">
	    	<div class="sh1"></div>
	    	<div class="sh2"></div>
	    	<h1 class="lt"><?php esc_html_e( 'loading',  'job-listing' ); ?></h1>
	    </div>
    <?php }else if(get_theme_mod( 'job_listing_preloader_type') == 'cube-loader') {?>
		<div class="cssloader">
    		<div class="loader-main ">
				<div class="triangle35b"></div>
				<div class="triangle35b"></div>
				<div class="triangle35b"></div>
			</div>
    	</div>
    <?php }?>
<?php }?>

<div class="<?php if( get_theme_mod( 'job_listing_sticky_header', false) != '') { ?>sticky-header<?php } else { ?>close-sticky main-menus<?php } ?>">
	<header id="site-navigation">
		<div class="header-outter py-2">
			<div class="container">
				<div class="row">
					<div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 align-self-center">
						<div class="logo text-start">
				    		<div class="logo-image">
				    			<?php the_custom_logo(); ?>
					    	</div>
					    	<div class="logo-content">
						    	<?php
						    		if ( get_theme_mod('job_listing_display_header_title', true) == true ) :
							      		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
							      			echo esc_html(get_bloginfo('name'));
							      		echo '</a>';
							      	endif;

							      	if ( get_theme_mod('job_listing_display_header_text', false) == true ) :
						      			echo '<span>'. esc_html(get_bloginfo('description')) . '</span>';
						      		endif;
					    		?>
							</div>
						</div>
					</div>					
					<div class="col-xl-6 col-lg-5 col-md-3 col-12 col-sm-12 align-self-center">
							<div class="top-menu-wrapper">
							    <div class="navigation_header">
							        <div class="toggle-nav mobile-menu">
							            <button onclick="job_listing_openNav()">
							                <span class="dashicons dashicons-menu"></span>
							            </button>
							        </div>
							        <div id="mySidenav" class="nav sidenav">
							            <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'job-listing' ); ?>">
							                <?php {
							                    wp_nav_menu(
							                        array(
							                            'theme_location' => 'main-menu',
							                            'container_class' => 'navi clearfix navbar-nav',
							                            'menu_class'     => 'menu clearfix',
							                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							                            'fallback_cb'    => 'wp_page_menu',
							                        )
							                    );
							                } ?>
							            </nav>
							            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="job_listing_closeNav()">
							                <span class="dashicons dashicons-no"></span>
							            </a>
							        </div>
							    </div>
							</div>
					</div>
					<div class="col-xl-4 col-lg-5 col-md-6 col-12 col-sm-12 align-self-center contact-box text-start d-flex justify-content-end align-item-center">
						<?php if ( get_theme_mod('job_listing_wislist_url')) : ?>
							<a href="<?php echo esc_url( get_theme_mod('job_listing_wislist_url' ) ); ?>" class="myacunt-url"><i class="fas fa-heart"></i></a>
						<?php endif; ?>
						<?php if(class_exists('woocommerce')){ ?>
				          	<?php if ( is_user_logged_in() ) { ?>
				            	<a class="account-box" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-in-alt me-2"></i><?php esc_html_e('Login / Register','job-listing'); ?></a>
				          	<?php }
				          	else { ?>
				            	<a class="account-box" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','job-listing'); ?>"><i class="fas fa-user me-2"></i><?php esc_html_e('Login / Register','job-listing'); ?></a>
				          	<?php } ?>
        				<?php }?>
						<?php if ( get_theme_mod('job_listing_header_newsletter_button_text') || get_theme_mod('job_listing_header_newsletter_button_url') ) : ?>
							<p class="info-button mb-0 text-center text-md-start"><a href="<?php echo esc_url(get_theme_mod('job_listing_header_newsletter_button_url'));?>"><span class="dashicons dashicons-plus-alt2 me-2"></span><?php echo esc_html(get_theme_mod('job_listing_header_newsletter_button_text'));?></a></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</header>
</div>