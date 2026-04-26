<!-- BLOG SECTION STAR -->
<section class="blog-section">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="container">
<div class="row">
<div class="col-12">

<div class="section-header style-3 blog_nav_desktop">
<div class="sec-text">
<span class="subtitle wow fadeInLeft" data-wow-delay=".3s">Articles</span>
<h2 class="title">Recent Blogs</h2>
</div>
<div class="blog-navigation wow fadeInRight" data-wow-delay=".4s">
<div class="blog-prev"><i class="fa-solid fa-arrow-left"></i></div>
<div class="blog-next"><i class="fa-solid fa-arrow-right"></i></div>
</div>
<div class="blog-button wow fadeInRight" data-wow-delay=".5s">
<a class="btn tj-btn-primary" href="#">View All Blogs <i class="fa-solid fa-arrow-right"></i></a>
</div>

</div>

</div>
</div>
<div class="row">
<div class="col-12">
<div class="swiper blog-slider 5">
<div class="swiper-wrapper">
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1
);
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
<div class="swiper-slide">
<div class="blog-item wow fadeInUp" data-wow-delay=".6s">
<div class="blog-thumb">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail('blog-card'); ?>
</a>
<?php
$categories = get_the_category();
foreach ($categories as $cat) {
echo '<a class="category" href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a> ';
}
?>
</div>
<div class="blog-content">
<div class="blog-meta">
<ul class="ul-reset">
<li><i class="fa-solid fa-calendar"></i> <?php echo get_the_date('d M Y'); ?></li>
<li><i class="fa-solid fa-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></li>
</ul>
</div>
<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
              
</div>
<div class="blog-pagination"></div>
</div>
<div class="blog_nav_mobile">
<div class="blog-navigation wow fadeInRight" data-wow-delay=".4s">
<div class="blog-prev"><i class="fa-solid fa-arrow-left"></i></div>
<div class="blog-next"><i class="fa-solid fa-arrow-right"></i></div>
</div>
<div class="blog-button wow fadeInRight" data-wow-delay=".5s">
<a class="btn tj-btn-primary" href="#">View All Blogs <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- BLOG SECTION END -->