<?php get_header();?>
<div class="box">
    <img src="<?php the_post_thumbnail_url();?>" alt="">
    <h4><?php the_title();?> </h4>
    <p><?php the_content();?></p>
</div>
<?php get_footer();?>