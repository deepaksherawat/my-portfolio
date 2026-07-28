<?php get_header(); ?>
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
<span class="subtitle wow fadeInUp" data-wow-delay=".3s">Latest Articles</span>
<h2 class="archive-blog section-title wow fadeInUp" data-wow-delay=".3s">
<?php
if (is_category()) {
echo single_cat_title() . '<span class="blog_text"> Blogs</span>';
} elseif (is_tag()) {
echo single_tag_title() . '<span class="blog_text"> Blogs</span>';
} elseif (is_author()) {
echo get_the_author() . '<span class="blog_text"> Blogs</span>';
} elseif (is_post_type_archive()) {
echo post_type_archive_title() . '<span class="blog_text"> Blogs</span>';
} elseif (is_tax()) {
echo single_term_title() . '<span class="blog_text"> Blogs</span>';
} else {
echo the_archive_title() . '<span class="blog_text"> Blogs</span>';
}
?>
</h2>
<div class="archive-description wow fadeInUp" data-wow-delay=".3s">
<?php the_archive_description(); ?>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="col-lg-4 col-md-4 col-12 blog-col">
<div class="blog-item wow fadeInUp" data-wow-delay=".5s">
<div class="blog-thumb">
<a href="<?php the_permalink(); ?>">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnails');
echo '<img class="portfolio-image" src="'.$img.'" alt="'.get_the_title().'">';
}
?>
</a>
<div class="blog_cat">
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
<div class="blog-content">
<div class="blog-meta">
<ul class="ul-reset">
<li><i class="fa-solid fa-calendar"></i><?php the_date(); ?></li>
<li><i class="fa-solid fa-comment"></i> <a href="<?php comments_link(); ?>">
    <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
</a></li>
</ul>
</div>
<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
<?php get_footer(); ?>