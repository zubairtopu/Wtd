<?php
    /* Template Name: Custom Query Template */
get_header(); ?>
<div class="container">
    <?php
            $args = array(
                'post_type' => 'post',
                'tax_query'  => array(
                    'relation'  => 'OR',
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'news',
                        'operator' => 'IN'
                    ),
                    array(
                        'taxonomy' => 'tag',
                        'field' => 'slug',
                        'terms' => 'amazing'
                    )
                )
            );
            $query = new WP_Query($args);
            while($query-> have_posts()){
                $query-> the_post();
                ?>
    <div class="box">
        <h4>Title: <?php the_title();  ?></h4>
        <p>Price: <?php the_field('price');?></p>
        <p>Size: <?php the_field('size') ?></p>
        <p>Color: <?php the_field('color'); ?></p>
    </div>
    <?php
        }
        ?>
</div>
<?php get_footer(); ?>
