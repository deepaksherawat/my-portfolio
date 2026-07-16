<?php get_header(); ?>
<!-- Start Main Section -->
<main class="site-content" id="content">
<!-- START: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>
<!-- END: Breadcrumb and Skill Marquee Section -->
<!-- START: Blog Section -->
<section class="full-width tj-post-details__area">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="tj-post-details__container">
<article class="tj-single__post wow fadeInUp" data-wow-delay=".3s">
<?php 
if ( has_post_thumbnail() ) {
 ?>
<div class="tj-post__thumb">
<?php $img = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
?>
<div class="single_blog_cat">
<?php
$categories = get_the_category();
if (!empty($categories)) {
$output = [];
foreach ($categories as $cat) {
$output[] = '<a class="category" href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
}
echo implode('', $output); // comma ke sath show hoga
}
?>
</div>
</div>
<?php } ?>
<div class="tj-post__content">
<div class="tj-post__meta entry-meta">
<span><i class="fa-solid fa-user"></i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></span>
<span><i class="fa-solid fa-calendar"></i> <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d') ); ?>"><?php the_date(); ?></a></span>
<span><i class="fa-solid fa-comment"></i><a href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></span>
</div>
<h3 class="tj-post__title entry-title"><?php the_title(); ?></h3>
<div class="tj-post__content">
<?php the_content(); ?>
</div>
<?php
$categories = get_the_category();
if ($categories) {
$category_slugs = wp_list_pluck($categories, 'slug');
// WordPress + Shopify
if (
in_array('wordpress', $category_slugs) &&
in_array('shopify', $category_slugs)
) {
echo '<div class="hire-btn"><a href="#hire_me_wrapper" class="tj-primary-btn modal-popup">Hire Me For WordPress & Shopify Development<i class="fa-solid fa-arrow-right"></i></a></div>';
}
// WordPress only
elseif (in_array('wordpress', $category_slugs)) {
echo '<div class="hire-btn"><a href="#hire_me_wrapper" class="tj-primary-btn modal-popup">Hire Me For WordPress Development<i class="fa-solid fa-arrow-right"></i></a></div>';
}
// Shopify only
elseif (in_array('shopify', $category_slugs)) {
echo '<div class="hire-btn"><a href="#hire_me_wrapper" class="tj-primary-btn modal-popup">Hire Me For Shopify Development<i class="fa-solid fa-arrow-right"></i></a></div>';
}
// HTML CSS
elseif (in_array('html-css', $category_slugs)) {
echo '<div class="hire-btn"><a href="#hire_me_wrapper" class="tj-primary-btn modal-popup">Hire Me For HTML/CSS Development<i class="fa-solid fa-arrow-right"></i></a></div>';
}
}
?>
<!-- start: Footer Contact Popup -->
<?php get_template_part('template-parts/hire-me-popup-form'); ?>
<!-- end: Footer Contact Popup -->
</div>
<?php get_template_part('template-parts/single-faq'); ?>
</article>

<!-- post tags & social share -->
<div class="single-post_tag_share wow fadeInUp" data-wow-delay=".3s">
<!-- post tags -->
<div class="tj_tag">
<h4 class="tag__title">Tags:</h4>
<?php
$post_tags = get_the_tags();
if ($post_tags) {
foreach ($post_tags as $tag) {
echo '<div class="tagcloud">';
echo '<a rel="tag" href="' . get_tag_link($tag->term_id) . '">'
. esc_html($tag->name) .
'</a>';
echo '</div>';
}
}
?>
</div>
<div class="share_link">
<a href="#" target="_blank" class="facebook" title="Share this on Facebook"><i class="fa-brands fa-facebook-f"></i></a>
<a href="#" class="twitter" title="Share this on Twitter" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
<a href="#" class="linkedin" title="Share this on Linkedin" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
<a href="#" class="pinterest" title="Pin this Post" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>
</div>
</div>
<!-- post navigation -->
<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
?>
<div class="single-post__navigation wow fadeInUp" data-wow-delay=".3s">
<!-- Previous Post -->
<?php if (!empty($prev_post)) : ?>
<div class="tj-navigation_post previous">
<div class="tj-navigation-post_inner prev_post">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="navigation-post_img">
<a href="<?php echo get_permalink($prev_post->ID); ?>">
<?php
if (has_post_thumbnail($prev_post->ID)) {
echo get_the_post_thumbnail($prev_post->ID, 'thumbnail');
}
?>
</a>
</div>
<div class="tj-content">
<div class="post_pagination_nav">
<i class="fa-solid fa-arrow-left"></i> Previous
</div>
<div class="post_pagination_title">
<h5 class="title">
<a href="<?php echo get_permalink($prev_post->ID); ?>">
<?php echo get_the_title($prev_post->ID); ?>
</a>
</h5>
</div>
</div>
</div>
</div>
<?php endif; ?>
<!-- Next Post -->
<?php if (!empty($next_post)) : ?>
<div class="tj-navigation_post next">
<div class="tj-navigation-post_inner next_post">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="tj-content">
<div class="post_pagination_nav">
Next <i class="fa-solid fa-arrow-right"></i>
</div>
<div class="post_pagination_title">
<h5 class="title">
<a href="<?php echo get_permalink($next_post->ID); ?>">
<?php echo get_the_title($next_post->ID); ?>
</a>
</h5>
</div>
</div>
<div class="navigation-post_img">
<a href="<?php echo get_permalink($next_post->ID); ?>">
<?php
if (has_post_thumbnail($next_post->ID)) {
echo get_the_post_thumbnail($next_post->ID, 'thumbnail');
}
?>
</a>
</div>
</div>
</div>
<?php endif; ?>
</div>
<!-- comments area -->
<div class="tj-comments__container wow fadeInUp" data-wow-delay=".3s">
<div class="tj-comments__wrap">
<div class="tj-comment__title">
<h3>
<?php
$comments_count = get_comments(array(
    'post_id' => get_the_ID(),
    'status'  => 'approve',
    'parent'  => 0, // sirf top-level comments
    'count'   => true
));

if ($comments_count == 0) {
    echo '0 Comments';
} elseif ($comments_count == 1) {
    echo '1 Comment';
} else {
    echo $comments_count . ' Comments';
}
?>
</h3>
</div>
<div class="tj-latest__comments">
<?php

$comments = get_comments(array(
    'post_id' => get_the_ID(),
    'status'  => 'approve',
));

if ($comments) :
?>

    <ul class="comment-list">

        <?php
        wp_list_comments(array(
            'style'       => 'ul',
            'short_ping'  => true,
            'avatar_size' => 60,
        ), $comments);
        ?>

    </ul>

<?php else : ?>

    <p class="no_comments">No Comments</p>

<?php endif; ?>
</div>
</div>
<div class="comment-respond">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<?php
if (comments_open()) {
    comment_form();
}
?>
</div>
</div>
</div>

</div>
<div class="col-lg-4">
<div class="tj_main_sidebar">
<div class="sidebar_widget widget_search wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<!-- search Form -->
<?php get_template_part('template-parts/search-form');  ?>
<!-- end search Form -->
</div>

<div class="sidebar_widget widget_categories wow fadeInUp" data-wow-delay=".4s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="widget_title">
<h3 class="title">Categories</h3>
</div>
<ul>
<?php
$categories = get_categories(array(
'taxonomy'   => 'category',
'hide_empty' => false, // empty categories bhi show hongi
));
foreach ($categories as $category) :
?>
<li><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>(<?php echo $category->count; ?>)</li>
<?php endforeach; ?>
</ul>
</div>
<!-- start only current post category posts -->
<div class="sidebar_widget tj_recent_posts wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<?php
$current_post_id = get_the_ID();
// Current post ki categories lo
$categories = get_the_category($current_post_id);
if ($categories) {
$first_category = $categories[0];
$category_ids = array();
foreach ($categories as $category) {
$category_ids[] = $category->term_id;
}
// Same category ke posts fetch karo
$related_posts = new WP_Query(array(
'post_type'      => 'post',
'posts_per_page' => 10,
'post__not_in'   => array($current_post_id), // Current post exclude
'category__in'   => $category_ids,
'orderby'        => 'date',
'order'          => 'DESC'
));
if ($related_posts->have_posts()) : ?>
<div class="widget_title">
<h3 class="title"><span class="current_post_title"><?php echo esc_html($first_category->name); ?></span> Related Posts</h3>
</div>
<ul>
<?php while ($related_posts->have_posts()) : 
$related_posts->the_post(); ?>
<li>
<div class="recent-post_thumb">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail('medium'); ?>
</a>
</div>
<div class="recent-post_content">
<div class="tj-post__meta entry-meta">
<span><i class="fa-solid fa-calendar"></i><a href="<?php echo get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d') ); ?>"><?php echo get_the_date('M j, Y'); ?></a></span>
<span><i class="fa-solid fa-comment"></i><a href="<?php comments_link(); ?>">
    <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
</a></span>
</div>
<h4 class="recent-post_title">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h4>
</div>
</li>
<?php endwhile; ?>
</ul>
<?php endif; wp_reset_postdata(); } ?>
</div>
<!-- end only current post category posts -->
<!-- start all posts except current category posts -->
<?php
$current_post_id = get_the_ID();
// Current post ki categories
$categories = get_the_category($current_post_id);
$cat_ids = array();
$first_cat_name = 'Related';
if ($categories) {
$first_cat_name = $categories[0]->name;
foreach ($categories as $cat) {
$cat_ids[] = $cat->term_id;
}
}
// Current post ki category ke posts exclude
$args = array(
'post_type'      => 'post',
'posts_per_page' => 10,
'post__not_in'   => array($current_post_id),
'category__not_in' => $cat_ids,
);
$related_query = new WP_Query($args);
if ($related_query->have_posts()) :
?>
<div class="sidebar_widget tj_recent_posts wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="widget_title">
<h3 class="title"><span class="current_post_title">Other</span> Posts</h3>
</div>
<ul>
<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
<li>
<div class="recent-post_thumb">
<a href="<?php the_permalink(); ?>">
<?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); endif; ?>
</a>
</div>
<div class="recent-post_content">
<div class="tj-post__meta entry-meta">
<span>
<i class="fa-solid fa-calendar"></i>
<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d') ); ?>">
<?php echo get_the_date('M j, Y'); ?>
</a>
</span>
<span>
<i class="fa-solid fa-comment"></i>
<a href="<?php comments_link(); ?>">
<?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
</a>
</span>
</div>
<h4 class="recent-post_title">
<a href="<?php the_permalink(); ?>">
<?php the_title(); ?>
</a>
</h4>
</div>
</li>
<?php endwhile; ?>
</ul>
</div>
<?php
wp_reset_postdata();
endif;
?>
<!-- ends all posts except current category posts -->
<?php
$post_tags = get_the_tags();
if ($post_tags) { ?>
<div class="sidebar_widget widget_tag_cloud wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="widget_title">
<h3 class="title">Popular tag</h3>
</div>
<?php
echo '<div class="tagcloud">';
foreach ($post_tags as $tag) {
echo '<a rel="tag" href="' . get_tag_link($tag->term_id) . '">' . esc_html($tag->name) . '</a>';
}
echo '</div>';
?>
</div>
<?php } ?>

<!-- get in touch sidebar -->
<div class="sidebar_widget contact_form wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="sidebar_getintouch">
<div class="getintouch_logo">
<a href="<?php echo site_url(); ?>">
<?php 
$logo = get_field('main_logo', 'option');
if( !empty( $logo ) ): ?>
    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
<?php endif; ?>
<p class="logo_tagline"><?php echo get_field('main_logo_tagline', 'option'); ?></p>
</a>
</div>
<div class="getintouch_text">
<p>Don't Hesitate to Contact Me</p>
<?php $about_phone  =  get_field('about_phone_number', 'option') ?: '9999999999'; ?>
<a class="call_me" href="tel:+<?php echo esc_html( $about_phone ); ?>"><i class="fa-solid fa-phone"></i> +<?php echo esc_html( $about_phone ); ?></a>
<div class="hire-btn"><a href="#contact-wrapper" class="tj-primary-btn modal-popup">Get Free Quote Now<i class="fa-solid fa-arrow-right"></i></a></div>
</div>
</div>
</div>
<!-- end get in touch sidebar -->
</div>
</div>
</div>
</div>
</section>
<!-- END: Blog Section -->
</main>
<!-- End Main Section -->
<?php get_footer(); ?>