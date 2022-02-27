<?php
    /*  Template Name: Event Template */

    get_header();
?>
<div class="services">
    <div class="title">
        <h4>exclusive services</h4>
    </div>
    <div class="service service-page fix">
        <?php
            $args = array(
                'post_type'     => 'events',
                'post_per_page' => 3,
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) {
                $query->the_post();
            ?>
                <div class="single-service " style="width:313px;">
                    <img src="<?php the_post_thumbnail_url();?>" alt="Service 3">
                    <h4><?php the_title()?></h4>
                    <div class="meta">
                        <ul>
                            <li><i class="fas fa-map-marker-alt"><?php the_field('location');?></i></li>
                            <li><i class="far fa-calendar-check"><?php the_field('event_date');?></i></li>
                        </ul>
                        <ul>
                            <li><?php
                                    $terms = get_the_terms(get_the_ID(), 'event_category');
                                    print_r($terms);
                                    ?></li>
                        </ul>
                    </div>
                    <p><?php the_excerpt();?></p>
                    <a href="<?php the_permalink();?>" class="btn">read more</a>
                </div>
        <?php
            }
        ?>

    </div>
</div>
<!-- Services End Here -->
<?php get_footer();?>