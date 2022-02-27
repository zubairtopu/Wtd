<?php get_header();?>

    <div class="page-box">
        <div class="page-left">
            <h4><?php the_title() ; ?></h4>
            <?php the_content() ; ?>
        </div>
        <div class="about-menu">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
    </div>

<?php get_footer(); ?>