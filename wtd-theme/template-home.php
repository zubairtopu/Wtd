<?php
/*
Template Name: Template Home
 */
get_header();?>
         <!-- Banner Start Here -->
         <div class="banner owl-carousel">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slide1.jpg" alt="Banner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slide2.jpg" alt="Banner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slide3.jpg" alt="Banner">
            </div>
        <!-- Banner End Here -->
        <?php
get_template_part('template-parts/content', 'services')
?>

        <!-- Blog Start Here -->
        <div class="blogs">
            <div class="blog-left">
                <h4>latest blog</h4>
                <?php get_template_part('template-parts/content', 'blogs');?>
            </div>
            <?php get_sidebar();?>
        </div>
        <!-- Blog End Here -->
<?php get_footer();?>