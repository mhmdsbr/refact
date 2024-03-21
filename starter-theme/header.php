<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header class="header o-section">
		<div class="o-section__wrapper">
			<div class="header__navbar row u-flex--center">
				<a class="header__navbar-logo p-0 col-lg-2 col-md-3 col-4" href="#" aria-label="Home">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.svg" title="Logo" aria-hidden="true" alt="Logo" class="header__logo" />
					<span class="sr-only">Home</span>
				</a>
				<nav class="header__navbar-container p-0 col-lg-10 col-sm-12 col-8">
					<div class="header__navbar-hamburger-icon js-header-hamburger" aria-label="Toggle Navigation Menu">
						<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M34 28.3337H0V24.5559H34V28.3337ZM34 18.8892H0V15.1114H34V18.8892ZM34 5.66699V9.44477H0V5.66699H34Z" fill="white"/>
						</svg>
					</div>
					<ul class="header__navbar-nav">
						<li class="header__nav--close-icon js-close-icon" aria-hidden="true">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_72_608)">
									<path d="M24 1.41269L22.6087 0.0244141L12 10.6128L1.39129 0.0244141L0 1.41269L10.6087 12.0012L0 22.5889L1.39129 23.9771L12 13.3894L22.6087 23.9771L24 22.5889L13.3905 12.0012L24 1.41269Z" fill="white"/>
								</g>
								<defs>
									<clipPath id="clip0_72_608">
										<rect width="24" height="24" fill="white"/>
									</clipPath>
								</defs>
							</svg>
						</li>
						<li class="header__nav-item active">
							<a class="nav-link" href="#why-us" aria-label="Why Us">Why Us</a>
						</li>
						<li class="header__nav-item">
							<a class="nav-link" href="#menu" aria-label="Menu">Menu</a>
						</li>
						<li class="header__nav-item">
							<a class="nav-link" href="#popular" aria-label="Popular Dishes">Popular Dishes</a>
						</li>
						<li class="header__nav-item">
							<a class="nav-link" href="#booking" aria-label="Book">Book</a>
						</li>
						<li class="header__nav-item">
							<a class="nav-link" href="#contact" aria-label="Contact">Contact</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
