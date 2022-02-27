<?php get_header(); ?>
        <?php get_template_part( 'template-parts/content', 'slider' ); ?>


        <!-- Blog Start Here -->
        <div <?php post_class( array("blogs", "fix") ) ?>>
            <div class="search">
                <?php get_search_form() ; ?>
            </div>
            <br><br><br>
            <div class="blog-left">
                <h4>latest blog</h4>
                <?php get_template_part('template-parts/content', 'blogs'); ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
        <!-- Blog End Here -->
<?php get_footer(); ?>