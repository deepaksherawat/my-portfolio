<?php get_header(); ?>
<!-- Start Main Section -->
<main class="site-content" id="content">
<!-- START: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>
<!-- END: Breadcrumb and Skill Marquee Section -->
<!-- START: Portfolio Section -->
<section class="full-width tj-post-details__area">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="portfolio_title"><h2><span>Project: </span><?php the_title(); ?></h2></div>
<!-- portfolio gallery -->
<?php
$gallery = get_field('project_gallery'); // apna ACF field name check karo

if ($gallery): ?>
  <div class="portfolio_gallery portfolio_page owl-carousel">
    <?php foreach ($gallery as $image): ?>
      <div class="gallery_item">
        <?php
        if (is_array($image)) {
          echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
        } elseif (is_numeric($image)) {
          echo wp_get_attachment_image($image, 'full');
        } else {
          echo '<img src="' . esc_url($image) . '" alt="">';
        }
        ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<!-- end portfolio gallery -->
<div class="portfolio_metas">
<ul class="port_meta">
<li class="port_meta_text"><i class="fa-solid fa-p"></i><span> Project Name:</span> <?php the_field('project_name'); ?></li>
<li class="port_meta_text"><i class="fa-solid fa-d"></i><span> Developed In:</span> <?php the_field('developed_in'); ?></li>
<li class="port_meta_text"><i class="fa-solid fa-t"></i><span> Technology:</span> <?php the_field('technology'); ?></li>
<li class="port_meta_text"><i class="fa-solid fa-l"></i><span> Launch Date:</span> <?php the_field('launch_date'); ?></li>
<li class="port_meta_text"><a class="btn tj-btn-primary link" href="<?php the_field('website_url'); ?>" target="_blank">Live Preview<i class="fa-solid fa-arrow-right"></i></a></li>
</ul>
</div>
<?php if( have_rows('project_case_study') ): ?>
<div class="portfolio_story_approach single_project">
<?php while( have_rows('project_case_study') ) : the_row();
$project_title = get_sub_field('case_study_heading');
$project_content = get_sub_field('case_study_content'); ?>
<div class="portfolio_story">
<div class="story_title">
<h2 class="title"><?php echo $project_title; ?></h2>
</div>
<div class="story_content">
<?php echo $project_content; ?>
</div>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>
<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
?>
<div class="single-post__navigation">
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

<div class="sidebar_widget widget_categories wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="widget_title">
<h3 class="title">Project Types</h3>
</div>
<ul>
<?php
// Get all terms from taxonomy
$terms = get_terms(array(
'taxonomy'   => 'project-type',
'hide_empty' => false, // true karoge to empty terms hide ho jayenge
));
if (!empty($terms) && !is_wp_error($terms)) :
foreach ($terms as $term) :
?>
<li><a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>(<?php echo esc_html($term->count); ?>)</li>
 <?php endforeach; endif; ?>
</ul>
</div>

<!-- start only current post category posts -->
<?php
// Current post ki taxonomy terms lo
$current_terms = wp_get_post_terms(get_the_ID(), 'project-type');

if (!empty($current_terms) && !is_wp_error($current_terms)) {

    // Current taxonomy term IDs
    $term_ids = wp_list_pluck($current_terms, 'term_id');

    // Current project type name
    $first_project_type = $current_terms[0];

    // Related projects query
    $related_projects = new WP_Query(array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'post__not_in'   => array(get_the_ID()),
        'tax_query'      => array(
            array(
                'taxonomy' => 'project-type',
                'field'    => 'term_id',
                'terms'    => $term_ids,
            ),
        ),
    ));

    if ($related_projects->have_posts()) :
?>
<div class="sidebar_widget tj_recent_posts wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="widget_title">
<h3 class="title"><span class="current_post_title"><?php echo esc_html($first_project_type->name); ?></span> Related Projects</h3>
</div>
<ul>
<?php while ($related_projects->have_posts()) : $related_projects->the_post(); ?>
<li>
<?php if (has_post_thumbnail()) : ?>
<div class="recent-post_thumb project_thumb">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail('medium'); ?>
</a>
</div>
<?php endif; ?>
<div class="recent-post_content">
<h4 class="recent-post_title">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
</h4>
</div>
</li>
<?php endwhile; ?>
</ul>
</div>
<?php
endif;
wp_reset_postdata();
}
?>
<!-- end only current post category posts -->
<!-- start all posts except current category posts -->
<?php
// Current post ki project-type terms lo
$current_terms = wp_get_post_terms(get_the_ID(), 'project-type');

if (!empty($current_terms) && !is_wp_error($current_terms)) {

    // Current project-type IDs
    $exclude_term_ids = wp_list_pluck($current_terms, 'term_id');

    // Query: sab projects lao except current project-type wale
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'post__not_in'   => array(get_the_ID()), // current project hide
        'tax_query'      => array(
            array(
                'taxonomy' => 'project-type',
                'field'    => 'term_id',
                'terms'    => $exclude_term_ids,
                'operator' => 'NOT IN',
            ),
        ),
    );

    $related_projects = new WP_Query($args);

    if ($related_projects->have_posts()) : ?>
<div class="sidebar_widget tj_recent_posts wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="widget_title">
<h3 class="title"><span class="current_post_title">Other</span> Projects</h3>
</div>
<ul>
<?php while ($related_projects->have_posts()) : $related_projects->the_post(); ?>
<li>
<div class="recent-post_thumb">
<a href="<?php the_permalink(); ?>">
<?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); endif; ?>
</a>
</div>
<div class="recent-post_content">
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
endif; wp_reset_postdata();
}
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
<a class="call_me" href="tel:+918595746074"><i class="fa-solid fa-phone"></i> +91-8595746074</a>
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
<!-- END: Portfolio Section -->
</main>
<!-- End Main Section -->
<?php get_footer(); ?>