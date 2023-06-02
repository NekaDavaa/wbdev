<?php

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
$current_category_id = get_queried_object_id();
$child_categories = get_term_children($current_category_id, 'category');


if ( ! empty( $child_categories ) ) {
    $args = [
        'post_type' => 'post',
        'category__in' => $child_categories,
        'paged' => $paged, 
        'orderby' => 'date',
        'posts_per_page' => 10,
        'order' => 'DESC'
    ];
} else {
    $args = [
        'post_type' => 'post',
        'cat' => $current_category_id, 
        'paged' => $paged, 
        'orderby' => 'date',
        'posts_per_page' => 10,
        'order' => 'DESC'
    ];
}



    $query = new WP_Query($args);

    $count = 0;
    if ( $query->have_posts() ) : ?>

    <?php while ( $query->have_posts() ) : $query->the_post();

        $count++;

        if ($count == 1) { 
            // Open the news container
            ?>
              
              <div class="category-news-holder banner-pos-6">
                <div class="featured-news-holder-small">
                  <a class="featured-image-news-smallest" href="<?php the_permalink() ?>" target="_self">
                    <img alt="" src="<?php the_post_thumbnail_url(get_the_ID(),'medium')?>">
                  </a>
                  <div>
                    <a class="categoty-label" href="<?php echo getPostCategoryLink() ?>">
                      <span><?php echo getPostCategory() ?></span>
                    </a>
                    <a href="<?php the_permalink() ?>" target="_self">
                      <h3 class="h-16 featured-news-holder-small-title">
                        <span><?php the_title(); ?></span>
                      </h3>
                    </a>
                    <div class="text-date">
                      <span><?php echo the_date() ?></span>
                    </div>
                  </div>
                </div>

        <?php } 
        else if ($count == 5) { // Revive Banner ?>
            <div class="featured-news-holder-small">
              <a class="featured-image-news-smallest" href="<?php the_permalink() ?>" target="_self">
                  <img alt="" src="<?php the_post_thumbnail_url(get_the_ID(),'medium')?>">
              </a>
              <div>
                <a class="categoty-label" href="<?php echo getPostCategoryLink() ?>">
                  <span><?php echo getPostCategory() ?></span>
                </a>
                <a href="<?php the_permalink() ?>" target="_self">
                  <h3 class="h-16 featured-news-holder-small-title">
                    <span><?php the_title(); ?></span>
                  </h3>
                </a>
                <div class="text-date">
                  <span><?php echo the_date() ?></span>
                </div>
              </div>
            </div>
            <div class="banner-300x250"> </div>
        <?php }
        else if ($count == 6) { // Close News holder and Most Readable ?>
                <div class="featured-news-holder-small">
                  <a class="featured-image-news-smallest" href="<?php the_permalink() ?>" target="_self">
                    <img alt="" src="<?php the_post_thumbnail_url(get_the_ID(),'medium')?>">
                  </a>
                  <div>
                    <a class="categoty-label" href="<?php echo getPostCategoryLink() ?>">
                      <span><?php echo getPostCategory() ?></span>
                    </a>
                    <a href="<?php the_permalink() ?>" target="_self">
                      <h3 class="h-16 featured-news-holder-small-title">
                        <span><?php the_title(); ?></span>
                      </h3>
                    </a>
                    <div class="text-date">
                      <span><?php echo the_date() ?></span>
                    </div>
                  </div>
                </div>
            </div>

            <?php
            // Get the current category ID
            $category_id = get_queried_object_id();

            // Get the array of post IDs from the "related_posts" ACF field for this category
            $related_post_ids = get_field( 'most_readable', 'category_' . $category_id );

            // Display the posts
            if ( $related_post_ids ) {
                // Set up a new query to retrieve the related posts
                $related_query = new WP_Query( array(
                    'post_type' => 'post',
                    'post__in' => $related_post_ids,
                    'orderby' => 'post__in',
                ) );
                
                ?> 
                    <div class="most-readable-section border-dotted-black">
              <div class="oxy-dynamic-list most-readable-holder">
                <?php
              
                // Display the posts in a loop
                while ( $related_query->have_posts() ) {
                    $related_query->the_post();
                      // Assuming $post is the current post object from the query
                      $image_url = get_the_post_thumbnail_url($post->ID, 'large'); // Get the URL of the featured image
                      $post_url = get_permalink($post->ID); // Get the URL of the post
                      $post_title = get_the_title($post->ID); // Get the title of the post
                      $post_category = get_the_category($post->ID)[0]->name; // Get the name of the first category of the post
                    ?>

                    <div>
                      <div class="most-readable-article">
                        <a class="most-readable-article-image" href="<?php echo $post_url; ?>" target="_self" style="background-image:url(<?php echo $image_url; ?>);background-size: cover;">
                          <div class="most-readable-article-number">1</div>
                        </a>
                        <div class="most-readable-article-category"><?php echo $post_category; ?></div>
                        <a class="most-readable-article-title" href="<?php echo $post_url; ?>" target="_self" >
                          <span><?php echo $post_title; ?></span>
                        </a>
                      </div>
                    </div>
                <?php
                }
                ?>
                </div>
                    <h2 class="most-readable-section-title">Най-четеното от <?php single_cat_title(); ?></h2>
                </div>
                <?php

                // Restore the original post data
                wp_reset_postdata();
            }
            ?>

            

        <?php }
        else if ($count == 7) { // Open News holder ?>
            
            <div class="category-news-holder banner-pos-8">

                <div class="featured-news-holder-small">
                  <a class="featured-image-news-smallest" href="<?php the_permalink() ?>" target="_self">
                    <img alt="" src="<?php the_post_thumbnail_url(get_the_ID(),'medium')?>">
                  </a>
                  <div>
                    <a class="categoty-label" href="<?php echo getPostCategoryLink() ?>">
                      <span><?php echo getPostCategory() ?></span>
                    </a>
                    <a href="<?php the_permalink() ?>" target="_self">
                      <h3 class="h-16 featured-news-holder-small-title">
                        <span><?php the_title(); ?></span>
                      </h3>
                    </a>
                    <div class="text-date">
                      <span><?php echo the_date() ?></span>
                    </div>
                  </div>
                </div>
                
        <?php }
        else if ($count == 13) { // Banner 300x250 ?>
            

                <div class="featured-news-holder-small">
                  <a class="featured-image-news-smallest" href="<?php the_permalink() ?>" target="_self">
                    <img alt="" src="<?php the_post_thumbnail_url(get_the_ID(),'medium')?>">
                  </a>
                  <div>
                    <a class="categoty-label" href="<?php echo getPostCategoryLink() ?>">
                      <span><?php echo getPostCategory() ?></span>
                    </a>
                    <a href="<?php the_permalink() ?>" target="_self">
                      <h3 class="h-16 featured-news-holder-small-title">
                        <span><?php the_title(); ?></span>
                      </h3>
                    </a>
                    <div class="text-date">
                      <span><?php echo the_date() ?></span>
                    </div>
                  </div>
                </div>
                
            <div class="banner-300x250"> </div>
                
            
        <?php }
        else if ($count == 14) { // Close News holder and Newsletter and open News Holder again ?>
            

                <div class="featured-news-holder-small">
                  <a class="featured-image-news-smallest" href="<?php the_permalink() ?>" target="_self">
                    <img alt="" src="<?php the_post_thumbnail_url(get_the_ID(),'medium')?>">
                    </a>
                  <div>
                    <a class="categoty-label" href="<?php echo getPostCategoryLink() ?>">
                      <span><?php echo getPostCategory() ?></span>
                    </a>
                    <a href="<?php the_permalink() ?>" target="_self">
                      <h3 class="h-16 featured-news-holder-small-title">
                        <span><?php the_title(); ?></span>
                      </h3>
                    </a>
                    <div class="text-date">
                      <span><?php echo the_date() ?></span>
                    </div>
                  </div>
                </div>
            </div>

        <div class="newsletter-box">
          <div style="display: flex; gap: 20px; align-items: center;">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                <path id="Path_246" data-name="Path 246" d="M20,0A20,20,0,1,0,40,20,20,20,0,0,0,20,0M31.25,11.25,20,18.75,8.75,11.25Zm1.249,13.8A2.446,2.446,0,0,1,30.052,27.5H9.948A2.447,2.447,0,0,1,7.5,25.052V13.75L20,21.874,32.5,13.75Z" fill="#fcfcfc"></path>
              </svg>
            </div>
            <h2 class="h-36 font-romper">МАЙКО МЕЙЛА!</h2>
          </div>
          <div class="text-light font-romper" style="margin-bottom: 10px; opacity: .8;">Най-интереснoто от сайта, всяка седмица, директно в пощата ти</div>
          <div id="shortcode-1353-20" class="ct-shortcode">
            <?php echo do_shortcode('[contact-form-7 id="21807" title="Newsletter"]'); ?>
          </div>
        </div>


        <div class="category-news-holder">
        
        <?php }
        else if ($count == 20) { // Close News holder ?>
            

                <div class="featured-news-holder-small">
                  <a class="featured-image-news-smallest" href="<?php the_permalink() ?>" target="_self">
                    <img alt="" src="<?php the_post_thumbnail_url(get_the_ID(),'medium')?>">
                  </a>
                  <div>
                    <a class="categoty-label" href="<?php echo getPostCategoryLink() ?>">
                      <span><?php echo getPostCategory() ?></span>
                    </a>
                    <a href="<?php the_permalink() ?>" target="_self">
                      <h3 class="h-16 featured-news-holder-small-title">
                        <span><?php the_title(); ?></span>
                      </h3>
                    </a>
                    <div class="text-date">
                      <span><?php echo the_date() ?></span>
                    </div>
                  </div>
                </div>
            </div>
        <?php }
        else { ?>
            <div class="featured-news-holder-small">
              <a class="featured-image-news-smallest" href="<?php the_permalink() ?>" target="_self">
                <img alt="" src="<?php the_post_thumbnail_url(get_the_ID(),'medium')?>">
              </a>
              <div>
                <a class="categoty-label" href="<?php echo getPostCategoryLink() ?>">
                  <span><?php echo getPostCategory() ?></span>
                </a>
                <a href="<?php the_permalink() ?>" target="_self">
                  <h3 class="h-16 featured-news-holder-small-title">
                    <span><?php the_title(); ?></span>
                  </h3>
                </a>
                <div class="text-date">
                  <span><?php get_post_field('date', get_the_ID()) ?></span>
                </div>
              </div>
            </div>
        <?php } ?>

    <?php endwhile; ?>
    <!-- end of the loop -->
    <!-- pagination here -->
    
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif;

    // Display pagination links
    ?>  
    <div class="pagination-holder"> 
        <?php
        echo paginate_links( array(
            'total' => $query->max_num_pages, // The total number of pages
            'current' => $paged, // The current page number
            'prev_text' => '<span>< Предшна</span>',
              'next_text' => '<span>Следваща ></span>'
        ) );
        ?>
    </div> 
    <?php

?>
