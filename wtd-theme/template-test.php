<?php
/* Template Name: Template Test */
get_header(); ?>
</br>
<div class="container">
    <?php
        $args = array(
            'post_type' => 'post',
            'post_per_page' => 7,
            // 'meta_compare' => '=',
            // 'meta_value'    =>  'david',
            // // 'meta_key'      => 'name',
            // 'category__not_in' => array(9,10 ),

        );
        $query = new WP_Query($args);
        while($query -> have_posts()){
            $query-> the_post();
            ?>
           <div class="box">
            <h1><?php the_title() ; ?></h1>
                <p>Price: <?php the_field('price'); ?></p>
                <p>Size: <?php the_field('size'); ?></p>
                <p>Color: <?php  the_field('color'); ?></p>
           </div>
            </br>
            <?php
        }
    ?>
</div>

    </br>

<?php get_footer() ; ?>