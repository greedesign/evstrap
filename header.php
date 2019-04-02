<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
// Collect and format customizer variables for output
// @TODO create simple function to pass inf check if customizer setting is set so we can reduce the amount of code in out templates
$container = get_theme_mod( 'understrap_navbar_container' );
$navbar_position = get_theme_mod('understrap_navbar_position'); //@TODO add CSS to apply appropriate spacing for navbar position body classes
$navbar_breakpoint = get_theme_mod( 'understrap_navbar_breakpoint' );
$navbar_shortcodes = get_theme_mod( 'understrap_navbar_shortcode' );
$navbar_color_scheme = get_theme_mod( 'understrap_navbar_color_scheme' );
$navbar_bgcolor = get_theme_mod( 'understrap_navbar_bgcolor' );
$navbar_bgalpha = get_theme_mod( 'understrap_navbar_bgalpha' );

// check if variable has value
$navbar_breakpoint !== '' ? $navbar_breakpoint : '';
$navbar_color_scheme !== '' ? $navbar_color_scheme : '';
$navbar_position !== '' ? $navbar_position : '';
$navbar_bgcolor !== '' ? $navbar_bgcolor : '';
$navbar_bgalpha !== '' ? $navbar_bgalpha : '';
if($navbar_bgalpha !== '') {
	function navbar_header_styles() {
		wp_enqueue_style(
		'custom-navbar-style',
		get_template_directory_uri() . '/style.css'
		);

		$understrap_color_primary = get_theme_mod( 'understrap_color_primary' );
		$understrap_color_secondary = get_theme_mod( 'understrap_color_secondary' );
		$understrap_color_light = get_theme_mod( 'understrap_color_light' );
		$understrap_color_dark = get_theme_mod( 'understrap_color_dark' );
		$understrap_color_white = get_theme_mod( 'understrap_color_white' );

		
		// Style
		$navbar_css = "
		.navbar {
			background-color: 
		}";

		wp_add_inline_style( 'custom-header-style', $navbar_css );
	}
	add_action( 'wp_enqueue_scripts', 'navbar_header_styles' );

 }


// concatinate all variables into tidy class string
$navbar_classes[] = $navbar_breakpoint;
$navbar_classes[] = $navbar_color_scheme;
//$navbar_classes[] = $navbar_position;
$navbar_classes[] = $navbar_bgcolor;

$navbar_classes = implode (" ", $navbar_classes);
*/

$container = get_theme_mod( 'understrap_navbar_container' );
$navbar_shortcodes = (get_theme_mod( 'understrap_navbar_shortcode' ) !== '' ? get_theme_mod( 'understrap_navbar_shortcode' ) : '');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="<?php understrap_navbar_wrapper(); //echo $navbar_fixed; ?>" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
		<?php //@TODO Add function to loop through all applicable navbar classes and output in one declaration to cleanup code ?>
		<nav class="navbar <?php understrap_navbar(); //echo $navbar_class; ?>">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>

				<?php if ( $navbar_shortcodes !== '' ) : ?>
					<div class="ev-navbar-region">
						<?php
							$navbar_shortcodes = explode(",", $navbar_shortcodes);
							foreach ( $navbar_shortcodes as $navbar_shortcode ) {
								if ( false === strpos( $navbar_shortcode, '[' ) ) {
									echo htmlspecialchars_decode($navbar_shortcode);
								} else {
									echo do_shortcode( $navbar_shortcode );
								}
							}
						?>
					</div>
				<?php endif; ?>

			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
