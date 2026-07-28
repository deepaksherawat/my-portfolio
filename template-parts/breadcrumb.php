<!-- START: Breadcrumb Area -->
<?php
$all_projects_link      = get_field('all_projects_link', 'option') ?: '#';
?>
<section class="breadcrumb_area">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div id="particles-js"></div>
<div class="container">
<div class="row">
<div class="col">
<!-- dynamic breadcrum start -->
<div class="breadcrumb_content d-flex flex-column align-items-center">
<h2 class="title wow fadeInUp" data-wow-delay=".3s">
<?php
// PAGE
if (is_page()) {
echo get_the_title();
// BLOG ARCHIVE
} elseif (is_home() || is_post_type_archive('post')) {
echo 'Blogs';
// CATEGORY
} elseif (is_category()) {
single_cat_title();
// TAG
} elseif (is_tag()) {
echo '<span>Tag: ';
single_tag_title();
echo '</span>';
// SEARCH
} elseif (is_search()) {
echo 'Search Results: <span class="search_word">' . esc_html( get_search_query() ) . '</span>';
// AUTHOR
} elseif (is_author()) {
the_author();
// DATE ARCHIVE
} elseif (is_date()) {
echo get_the_date('F Y');
// PROJECT TAX
} elseif (is_tax('project-type')) {
$term = get_queried_object();
echo '<span class="page_span_title">Project Type: </span>' . $term->name;
// SINGLE PROJECT
} elseif (is_singular('project')) {
echo '<span class="page_span_title">Case Study: </span>' .  get_the_title();
// SINGLE MY EXPERTISE
} elseif (is_singular('my-expertise')) {
echo get_the_title();
// SINGLE SKILLS
} elseif (is_singular('skills')) {
echo '<span class="page_span_title">Skill: </span>' . get_the_title();
// SINGLE POST
} elseif (is_single()) {
echo get_the_title();
// OTHER CPT ARCHIVES
} elseif (is_post_type_archive()) {
post_type_archive_title();
}
?>
</h2>
<div class="breadcrumb_navigation wow fadeInUp" data-wow-delay=".5s">
<span>
<a href="<?php echo home_url(); ?>">Home</a>
</span>
<i class="fa-solid fa-arrow-right"></i>
<?php
// PAGE
if (is_page()) {
echo '<span>' . get_the_title() . '</span>';
// BLOG ARCHIVE
} elseif (is_home() || is_post_type_archive('post')) {
echo '<span>Blogs</span>';
// CATEGORY
} elseif (is_category()) {
echo '<span><a href="' . get_permalink(2680) . '">Blogs</a></span><i class="fa-solid fa-arrow-right"></i>';
echo '<span>';
single_cat_title();
echo '</span>';
// TAG
} elseif (is_tag()) {
echo '<span><a href="' . get_permalink(2680) . '">Blogs</a></span><i class="fa-solid fa-arrow-right"></i>';
single_tag_title();
// SEARCH
} elseif (is_search()) {
echo '<span>Search Results</span>';
// AUTHOR
} elseif (is_author()) {
echo '<span><a href="' . get_permalink(2680) . '">Blogs</a></span><i class="fa-solid fa-arrow-right"></i>';
echo '<span>';
the_author();
echo '</span>';
// DATE ARCHIVE
} elseif (is_date()) {
echo '<span><a href="' . get_permalink(2680) . '">Blogs</a></span><i class="fa-solid fa-arrow-right"></i>';
echo '<span>' . get_the_date('F Y') . '</span>';
// PROJECT TAX
} elseif (is_tax('project-type')) {
$term = get_queried_object();
echo '<span><a href="' . get_post_type_archive_link('project') . '">All Projects</a></span><i class="fa-solid fa-arrow-right"></i>';
echo '<span>' . $term->name . '</span>';
// SINGLE PROJECT
} elseif (is_singular('project')) {
echo '<span><a href="' . esc_html( $all_projects_link ) . '">All Projects</a></span><i class="fa-solid fa-arrow-right"></i>';
$terms = get_the_terms(get_the_ID(), 'project-type');
if ($terms && !is_wp_error($terms)) {
$term = $terms[0];
echo '<span><a href="' . get_term_link($term) . '">' . $term->name . '</a></span><i class="fa-solid fa-arrow-right"></i>';
}
echo '<span>' . get_the_title() . '</span>';
// SINGLE MY EXPERTISE
} elseif (is_singular('my-expertise')) {
echo '<span><a href="' . get_post_type_archive_link('my-expertise') . '">My Expertise</a></span><i class="fa-solid fa-arrow-right"></i>';
echo '<span>' . get_the_title() . '</span>';
// SINGLE SKILLS
} elseif (is_singular('skills')) {
echo '<span>Skill: ' . get_the_title() . '</span>';
// SINGLE BLOG POST
} elseif (is_single()) {
echo '<span><a href="' . get_permalink(2680) . '">Blogs</a></span><i class="fa-solid fa-arrow-right"></i>';
// CATEGORY
$categories = get_the_category();
if ($categories) {
$category = $categories[0];
echo '<span><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></span><i class="fa-solid fa-arrow-right"></i>';
}
echo '<span>' . get_the_title() . '</span>';
// OTHER CPT ARCHIVE
} elseif (is_post_type_archive()) {
echo '<span>';
post_type_archive_title();
echo '</span>';
}
?>
</div>
</div>
<!-- dynamic breadcrumb ends -->
</div>
</div>
</div>
</section>
<!-- END: Breadcrumb Area -->

<script>

</script>