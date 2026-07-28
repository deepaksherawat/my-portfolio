<?php
get_header();
?>
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
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<article id="<?php echo get_the_ID(); ?>" class="tj__post tj-post wow fadeInUp post-id-<?php echo get_the_ID(); ?> has-post-thumbnail" data-wow-delay="0.3s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<!-- post thumbnail -->
<div class="tj-post__thumb">
<a href="<?php the_permalink(); ?>">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
}
?>
</a>
</div>
<div class="tj-post__content">

<!-- entry-meta -->
<div class="tj-post__meta entry-meta">
<span><i class="fa-light fa-user"></i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php echo get_the_author(); ?></a></span>
<span><i class="fa-solid fa-calendar"></i><a href="<?php echo esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ); ?>">
        <?php echo get_the_date(); ?></a></span>
<span><i class="fa-solid fa-comment"></i><a href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></span>
</div>
<!-- entry title -->
<h3 class="tj-post__title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<div class="tj-post__excerpt">
<!-- post excerpt -->
<?php echo wp_trim_words( get_the_content(), 100, '...' ); ?></div>
<!-- post btn -->
<div class="tj-post__btn">
<a href="<?php the_permalink(); ?>" class="tj-btn tj-btn-primary">Read More <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
<div class="tj-clearfix"></div>
</article>


<?php endwhile; ?>
<div class="tj__pagination">
        <?php
        echo paginate_links( array(
            'prev_text' => '<i class="fal fa-arrow-left"></i>',
            'next_text' => '<i class="fal fa-arrow-right"></i>',
            'type'      => 'list',
        ) );
        ?>
    </div>
<?php else : ?>
<p>No results found.</p>
<?php endif; ?>
<!-- <div class="tj__pagination">
<ul>
<li><span aria-current="page" class="page-numbers current">1</span></li>
<li><a class="page-numbers" href="https://gerold.themejunction.net/page/2/?s=Role+of+Technology">2</a></li>
<li><a class="next page-numbers" href="https://gerold.themejunction.net/page/2/?s=Role+of+Technology"><i class="fal fa-arrow-right"></i></a></li>
</ul>
</div> -->



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
<h3 class="title"><span class="current_post_title">Latest</span> Posts</h3>
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
<!-- END: Skills Section -->
</main>
<?php get_footer(); ?>