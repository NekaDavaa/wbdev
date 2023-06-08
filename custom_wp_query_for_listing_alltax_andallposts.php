<?php
$current_cat = get_queried_object();
$args = array(
    'taxonomy' => 'partner-category',
    'parent' => $current_cat->term_id,
    'hide_empty' => false
);
$subcategories = get_categories($args);
if ($subcategories) {
    foreach ($subcategories as $subcategory) {
        echo '<span class="partners-author-taxonomy-top-line"></span>';
        echo '<div class="partners-author-taxonomy-heading-line ct-headline h-28">';
        echo $subcategory->name;
        echo '<a href="https://dev.maikomila.bg/partners/#_header_row-3-19">';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 72 72" class="back-to-top-icon">';
        echo '<g id="Group_231" data-name="Group 231" transform="translate(-152 -11338)">';
        echo '<circle id="Ellipse_56" data-name="Ellipse 56" cx="36" cy="36" r="36" transform="translate(152 11338)" fill="#242424"/>';
        echo '<path id="Path_36" data-name="Path 36" d="M157.5,10.923,140.823,27.141l3.468,3.468h.306l6.987-7.038c1.224-1.275,2.4-2.652,3.366-3.825l.1.051c-.1,1.53-.153,3.519-.153,5.2V50.907h5.151V25c0-1.683-.051-3.672-.153-5.2l.1-.051c.969,1.173,2.142,2.55,3.366,3.825l7.038,7.038h.306l3.468-3.468Z" transform="translate(30.178 11343.077)" fill="#fcfcfc"/>';
        echo '</g>';
        echo '</svg>';
        echo '</a>';
        echo '</div>';

        $post_args = array(
            'post_type' => 'partner-author',
            'tax_query' => array(
                array(
                    'taxonomy' => 'partner-category',
                    'field' => 'term_id',
                    'terms' => $subcategory->term_id,
                ),
            ),
        );
        $posts = new WP_Query($post_args);

        if ($posts->have_posts()) {
            echo '<div class="partners-author-taxonomy-post-grid">';
            while ($posts->have_posts()) {
                $posts->the_post();

  echo '<div class="partners-author-taxonomy-post">';
   echo '<div class="partners-author-main-col">'; 
                
                echo '<div class="partners-author-left-col">';
                echo '<h2>' . get_the_title() . '</h2>';
                echo '<p class="partners-wrap-content">' . get_the_content() . '</p>';
                echo '<a href="' . get_permalink() . '"><span class="partners-author-all-articles">Всички статии на автора</span></a>';
                echo '</div>';


                if (has_post_thumbnail()) {
                    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    
             echo '<div class="partners-author-right-col">
        <div class="partner-author-taxonomy-image">
            <img src="' . $thumbnail[0] . '" alt="' . get_the_title() . '" style="height:100%;" class="ct-image">
        </div>
    </div>';
                }

                echo '</div>';
             echo '</div>';
            }
            
            echo '</div>';

            wp_reset_postdata();
        }
    }
}

?>