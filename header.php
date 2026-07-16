<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- CSS here -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<?php wp_head(); ?>
</head>
<body>
<!-- Preloader Area Start -->
<div class="preloader">
<svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
<path id="preloaderSvg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
</svg>
<div class="preloader-heading">
<?php
$loading_text = get_field('loading_text', 'option') ?: 'LOADING';
if ( ! empty( $loading_text ) ) : ?>
<div class="load-text">
<?php foreach ( preg_split('//u', $loading_text, -1, PREG_SPLIT_NO_EMPTY) as $char ) : ?>
<span><?php echo $char === ' ' ? '&nbsp;' : esc_html( $char ); ?></span>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
</div>
<!-- Preloader Area End -->
<!-- start: Back To Top -->
<div class="progress-wrap active-progress" id="scrollUp">
<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 219.817;"></path>
</svg>
</div>
<!-- end: Back To Top -->
<!-- start: Header Area -->
<header class="tj-header-area header-10 header-absolute">
<div class="container-fluid">
<div class="row">
<div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
<div class="logo-box">
<a href="<?php echo site_url(); ?>">
<?php 
$logo = get_field('main_logo', 'option');
if( !empty( $logo ) ): ?>
    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
<?php endif; ?>
<p class="logo_tagline"><?php echo get_field('main_logo_tagline', 'option'); ?></p>
</a>
</div>
<div class="header-menu" id="headerMenu">
<?php
wp_nav_menu(array(
'theme_location' => 'primary-menu',
'menu_class'     => 'main-menu',
'container'      => 'nav'
));
?>
</div>
<div class="mobile-menu d-lg-none"></div>
<div class="header-button d-none d-lg-inline-flex">
<?php
$head_right_button_text = get_field('head_right_button_text', 'option') ?: 'Hire Me';
$head_right_button_link = get_field('head_right_button_link', 'option') ?: '#contact-wrapper';
$target_url = '#contact-wrapper';
?>
<!-- <a href="#contact-wrapper" class="btn tj-btn-primary link modal-popup">Hire Me <i class="fa-solid fa-arrow-right"></i></a> -->

<a href="<?php echo ! empty( $head_right_button_link ) ? esc_url( $head_right_button_link ) : '#'; ?>" class="btn tj-btn-primary <?php if( $head_right_button_link === $target_url ) : ?>link modal-popup<?php endif; ?>"><?php echo esc_html( $head_right_button_text ); ?> <i class="fa-solid fa-arrow-right"></i></a>

</div>
<div class="menu-bar d-lg-none">
<button>
<span></span>
<span></span>
<span></span>
<span></span>
</button>
</div>
</div>
</div>
</div>
</header>
<header class="tj-header-area header-2 header-10 header-sticky sticky-out">
<div class="container-fluid">
<div class="row">
<div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
<div class="logo-box">
<a href="<?php echo site_url(); ?>">
<?php 
$logo = get_field('main_logo', 'option');
if( !empty( $logo ) ): ?>
    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
<?php endif; ?>
<p class="logo_tagline"><?php echo get_field('main_logo_tagline', 'option'); ?></p>
</a>
</div>
<div class="header-menu">
<?php
wp_nav_menu(array(
'theme_location' => 'primary-menu',
'menu_class'     => 'main-menu',
'container'      => 'nav'
));
?>
</div>
<div class="mobile-menu d-lg-none"></div>
<div class="header-button d-none d-lg-inline-flex">
<a href="#contact-wrapper" class="btn tj-btn-primary link modal-popup">Hire Me <i class="fa-solid fa-arrow-right"></i></a>
</div>
<div class="menu-bar d-lg-none">
<button>
<span></span>
<span></span>
<span></span>
<span></span>
</button>
</div>
</div>
</div>
</div>
</header>
<!-- end: Header Area -->