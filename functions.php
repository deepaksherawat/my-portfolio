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
wp_enqueue_style('splitting-css', 'https://unpkg.com/splitting/dist/splitting.css', array(), null);

// JS
// 1. jQuery (WordPress default)
wp_enqueue_script('jquery');

// 2. jQuery dependent core plugins
wp_enqueue_script('imagesloaded');
wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery','imagesloaded'), null, true);
wp_enqueue_script('appear', get_template_directory_uri() . '/assets/js/jquery.appear.min.js', array('jquery'), null, true);

// 3. UI / Plugins (jQuery dependent)
wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
wp_enqueue_script('meanmenu', get_template_directory_uri() . '/assets/js/meanmenu.js', array('jquery'), null, true);
wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array('jquery'), null, true);
wp_enqueue_script('lightcase', get_template_directory_uri() . '/assets/js/lightcase.js', array('jquery'), null, true);
wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array('jquery'), null, true);
wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), null, true);

// 4. Non-jQuery libraries
wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), null, true);
wp_enqueue_script('lenis', get_template_directory_uri() . '/assets/js/lenis.min.js', array(), null, true);
wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), null, true);
wp_enqueue_script('splitting-js', 'https://unpkg.com/splitting/dist/splitting.min.js', array(), null, true);
wp_enqueue_script('gsap-scroll-trigger', get_template_directory_uri() . '/assets/js/gsap-scroll-trigger.min.js', array('gsap'), null, true);
wp_enqueue_script('gsap-scroll-to', get_template_directory_uri() . '/assets/js/gsap-scroll-to-plugin.min.js', array('gsap'), null, true);

// 5. Misc
wp_enqueue_script('odometer', get_template_directory_uri() . '/assets/js/odometer.min.js', array(), null, true);
wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), null, true);
wp_enqueue_script('validate', get_template_directory_uri() . '/assets/js/validate.min.js', array('jquery'), null, true);
wp_enqueue_script('backToTop', get_template_directory_uri() . '/assets/js/backToTop.js', array('jquery'), null, true);

// 6. MAIN JS (Always last)
wp_enqueue_script(
    'main-js',
    get_template_directory_uri() . '/assets/js/main.js',
    array('jquery','splitting-js','imagesloaded','isotope','appear'),
    '1.0',
    true
);


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

function my_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('site-icon');
    add_theme_support('post-thumbnails');
    add_image_size('project_image_size', 937, 429, true); // true = crop (no stretch)
    add_image_size('project_thumbnail', 584, 500, true);
    add_theme_support('automatic-feed-links');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'my_theme_setup');


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

add_theme_support('post-thumbnails');

add_image_size('blog-card', 409, 368, true); // true = hard crop


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'  => 'Theme Settings',
        'menu_title'  => 'Theme Settings',
        'menu_slug'   => 'theme-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));

}

?>