<?php get_header(); ?>
<style>
ul.skills-list > li.extra-item{
    display: none;
}
</style>
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
<article class="tj-single__post">
<?php 
if ( has_post_thumbnail() ) {
 ?>
<div class="tj-post__thumb">
<?php $img = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
?>
</div>
<?php } ?>
<div class="tj-post__content">
<div class="tj-post__meta entry-meta">
<span><i class="fa-solid fa-user"></i> <?php echo get_the_author(); ?></span>
<span><i class="fa-solid fa-calendar"></i> <?php the_date(); ?></span>
</div>
<h3 class="tj-post__title entry-title"><?php the_title(); ?></h3>
<div class="tj-post__content">
<?php the_content(); ?>
</div>
</div>
</article>
<!-- post navigation -->
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
</div>
<div class="col-lg-4">
<div class="tj_main_sidebar">
<div class="sidebar_widget widget_search wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="tj-widget__search form_group">
<form class="search-form" action="#" method="get">
<input type="search" id="search" name="search" placeholder="Search..." />
<button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
</div>
</div>
<div class="sidebar_widget widget_categories wow fadeInUp" data-wow-delay=".3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="widget_title">
<h3 class="title">My Other Skills</h3>
</div>
<ul class="skills-list">
<?php
$current_post_id = get_the_ID();

$args = array(
    'post_type'      => 'skills',
    'posts_per_page' => -1,
    'post__not_in'   => array($current_post_id),
);

$query = new WP_Query($args);

if ($query->have_posts()) :

    $count = 0;

    while ($query->have_posts()) : $query->the_post();

        // 10 ke baad hidden class add hogi
        $hidden_class = ($count >= 10) ? 'extra-item' : '';
?>
        <li class="<?php echo $hidden_class; ?>">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </li>

<?php
        $count++;
    endwhile;

    wp_reset_postdata();

endif;
?>

<!-- Toggle Button -->
<li class="toggle-btn">
    <button id="toggleSkills">View More Skills <i class="fa-solid fa-arrow-right"></i></button>
</li>

</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- END: Skills Section -->
</main>
<?php get_footer(); ?>