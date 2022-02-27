<div class="blogs">
    <?php
        if(have_posts()){
            while(have_posts(  )){
                the_post(  );
               ?>
                <div class="single-blog">
                        <h4><a href="<?php the_permalink(  ) ; ?>"><?php the_title(); ?></a></h4>
                        <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                        <div class="blog-meta">
                            <?php the_author_posts_link( ) ?>
                            <a href=""><?php the_date( 'F j' ) ?></a>
                            <?php the_category( ); ?>
                        </div>
                        <p><?php the_excerpt( ); ?></p>
                        <a href="<?php the_permalink( ); ?>">read more</a>
                    </div>      
               <?php
            }
            wp_reset_postdata(  );
        }
    ?>
   
</div>