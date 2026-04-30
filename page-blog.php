<?php 
/*
Template Name: Blog
*/
get_header();
?>
<main class="site-content" id="content">
<!-- START: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>
<!-- END: Breadcrumb and Skill Marquee Section -->
<!-- BLOG SECTION STAR -->
<section class="blog-section blog_page">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-5 center">
<div class="sec-text center">
<span class="subtitle" data-wow-delay=".3s">Articles</span>
<h2 class="section-title wow fadeInUp" data-wow-delay=".3s">Recent Blogs</h2>
</div>
</div>
</div>
</div>
<div class="row">
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1
);
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
<div class="col-lg-4 col-md-4 col-12 blog-col">
<div class="blog-item wow fadeInUp" data-wow-delay=".5s">
<div class="blog-thumb">
<a href="blog-details.html">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnails');
echo '<img class="portfolio-image" src="'.$img.'" alt="'.get_the_title().'">';
}
?>
</a>
<a href="#" class="category">Tutorial</a>
</div>
<div class="blog-content">
<div class="blog-meta">
<ul class="ul-reset">
<li><i class="fa-solid fa-calendar"></i> Oct 01, 2022</li>
<li><i class="fa-solid fa-comment"></i> <a href="#">Comment (0)</a></li>
</ul>
</div>
<h3 class="blog-title"><a href="blog-details.html"><?php the_title(); ?></a></h3>
</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
<div class="blog_btn text-center mt-4">
  <button id="loadMoreBlog" class="blog_loadmore_btn btn tj-btn-primary">Load More<i class="fa-solid fa-arrow-right"></i></button>
</div>
</div>
</div>
</section>
<!-- BLOG SECTION END -->
</main>
<!-- End Main Section -->
<?php get_footer(); ?>