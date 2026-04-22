<?php
function mytheme_assets() {

// CSS
wp_enqueue_style('animate-min-css', get_template_directory_uri() . '/assets/css/animate.min.css');
wp_enqueue_style('backToTop-css', get_template_directory_uri() . '/assets/css/backToTop.css');
wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
wp_enqueue_style('flaticon_gerold-css', get_template_directory_uri() . '/assets/css/flaticon_gerold.css');
wp_enqueue_style('font-awesome-pro-min-css', get_template_directory_uri() . '/assets/css/font-awesome-pro.min.css');
wp_enqueue_style('light-mode-css', get_template_directory_uri() . '/assets/css/light-mode.css');
wp_enqueue_style('magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css');
wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css');
wp_enqueue_style('main-2-css', get_template_directory_uri() . '/assets/css/main-2.css');
wp_enqueue_style('main-3-css', get_template_directory_uri() . '/assets/css/main-3.css');
wp_enqueue_style('meanmenu-css', get_template_directory_uri() . '/assets/css/meanmenu.css');
wp_enqueue_style('nice-select-css', get_template_directory_uri() . '/assets/css/nice-select.css');
wp_enqueue_style('odometer-theme-default-css', get_template_directory_uri() . '/assets/css/odometer-theme-default.css');
wp_enqueue_style('owl-carousel-min-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
wp_enqueue_style('responsive-css', get_template_directory_uri() . '/assets/css/responsive.css');
wp_enqueue_style('swiper-min-css', get_template_directory_uri() . '/assets/css/swiper.min.css');

// JS
wp_enqueue_script('appear-min-js', get_template_directory_uri() . '/assets/js/appear.min.js', array(), null, true);
wp_enqueue_script('backToTop-js', get_template_directory_uri() . '/assets/js/backToTop.js', array(), null, true);
wp_enqueue_script('bootstrap-bundle-min-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), null, true);
wp_enqueue_script('gsap-min-js', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), null, true);
wp_enqueue_script('gsap-scroll-to-plugin-min-js', get_template_directory_uri() . '/assets/js/gsap-scroll-to-plugin.min.js', array(), null, true);
wp_enqueue_script('gsap-scroll-trigger.-min-js', get_template_directory_uri() . '/assets/js/gsap-scroll-trigger.min.js', array(), null, true);
wp_enqueue_script('gsap-split-text-js', get_template_directory_uri() . '/assets/js/gsap-split-text.min.js', array(), null, true);
wp_enqueue_script('imagesloaded-pkgd-js', get_template_directory_uri() . '/assets/js/imagesloaded-pkgd.js', array(), null, true);
wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), null);
wp_enqueue_script('jquery-appear', get_template_directory_uri() . '/assets/js/jquery.appear.min.js', array('jquery'), null, true);
wp_enqueue_script('isotope-pkgd-min-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), null, true);
wp_enqueue_script('jquery-min-js', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);
wp_enqueue_script('lenis-min-js', get_template_directory_uri() . '/assets/js/lenis.min.js', array(), null, true);
wp_enqueue_script('lightcase-js', get_template_directory_uri() . '/assets/js/lightcase.js', array(), null, true);
wp_enqueue_script('magnific-popup-js', get_template_directory_uri() . '/assets/js/magnific-popup.js', array(), null, true);
wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
wp_enqueue_script('meanmenu-js', get_template_directory_uri() . '/assets/js/meanmenu.js', array(), null, true);
wp_enqueue_script('nice-select-min-js', get_template_directory_uri() . '/assets/js/nice-select.min.js', array(), null, true);
wp_enqueue_script('odometer-min-js', get_template_directory_uri() . '/assets/js/odometer.min.js', array(), null, true);
wp_enqueue_script('owl-carousel-min-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), null, true);
wp_enqueue_script('swiper-min-js', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), null, true);
wp_enqueue_script('validate-min-js', get_template_directory_uri() . '/assets/js/validate.min.js', array(), null, true);
wp_enqueue_script('wow-min-js', get_template_directory_uri() . '/assets/js/wow.min.js', array(), null, true);


}
add_action('wp_enqueue_scripts', 'mytheme_assets');


function load_fontawesome() {
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css',
        array(),
        '7.0.1'
    );
}
add_action('wp_enqueue_scripts', 'load_fontawesome');


function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
            'footer-menu'  => __('Footer Menu')
        )
    );
}
add_action('init', 'register_my_menus');


function remove_archive_prefix($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
    return $title;
}
add_filter('get_the_archive_title', 'remove_archive_prefix');


wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
    array(),
    null
);

?>