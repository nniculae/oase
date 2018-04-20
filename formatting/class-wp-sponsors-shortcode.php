<?php
// nicu
add_filter( 'post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5 );
 
function remove_thumbnail_width_height( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


    /**
     * Adds sponsors shortcode option
     */
    function sponsors_register_shortcode($atts)
    {
        // define attributes and their defaults
        extract(shortcode_atts([
            'type'        => 'post',
            'image'       => 'yes',
            'images'      => 'yes',
            'category'    => '',
            'size'        => 'default',
            'style'       => 'list',
            'description' => 'no',
            'orderby'     => 'menu_order',
            'title'       => 'no',
            'max'         => '-1',
            'debug'       => null
        ], $atts));

        $args = [
            'post_type'             => 'sponsor',
            'post_status'           => 'publish',
            'pagination'            => false,
            'order'                 => 'ASC',
            'orderby'               => isset($atts['orderby']) ? $atts['orderby'] : 'menu_order',
            'posts_per_page'        => isset($atts['max']) ? $atts['max'] : '-1',
            'tax_query'             => [],
        ];

        if (!$atts) {
            $atts = [];
        };

        $nofollow = (defined('SPONSORS_NO_FOLLOW')) ? SPONSORS_NO_FOLLOW : true;

        if (!empty($category)) {
            $args['tax_query'] = [
            [
              'taxonomy'  => 'sponsor_categories',
              'field'     => 'slug',
              'terms'     => $category,
            ],
          ];
        }

        // $sizes = array('small' => '15%', 'medium' => '30%', 'large' => '50%', 'full' => '100%', 'default' => '30%');
        ob_start();

        // Set default options with then shortcode is used without parameters
        // style options defaults to list
        if (empty($atts['style'])) {
            $atts['style'] = 'list';
        }
        // images options default to yes

        $images != 'no' && $image != 'no' ? $images = true : $images = false;
        // debug option defaults to false
        isset($debug) ? $debug                = true : $debug                = false;
        $description === 'yes' ? $description = true : $description = false;
        $title === 'yes' ? $title             = true : $title             = false;

        $query = new WP_Query($args);

        // Set up the shortcode styles
        $style  = [];
        $layout = $atts['style'];

        $shame = new Wp_Sponsors_Shame();

        switch ($layout) {
            case 'list':
                $style['containerPre']  = '<div id="wp-sponsors"><ul>';
                $style['containerPost'] = '</ul></div>';
                $style['wrapperClass']  = 'sponsor-item';
                $style['wrapperPre']    = 'li';
                $style['wrapperPost']   = '</li>';
                break;
            case 'linear':
           
            // nicu
            case 'grid':
            $style['containerPre']  = '<div class="row sponsor-cards">';
            $style['containerPost'] = '</div>';
            $style['wrapperClass']  = 'col-lg-4 col-sm-6';
            $style['wrapperPre']    = 'div';
            $style['wrapperPost']   = '</div>';
            $style['imageSize']     = 'full';
            break;
        }

        if ($query->have_posts()) {
            while ($query->have_posts()) : $query->the_post();

            if ($query->current_post === 0) {
                echo $style['containerPre'];
            }
            // Check if the sponsor was a link
            get_post_meta(get_the_ID(), 'wp_sponsors_url', true) != '' ? $link = get_post_meta(get_the_ID(), 'wp_sponsors_url', true) : $link = false;
            $link_target                                                       = get_post_meta(get_the_ID(), 'wp_sponsor_link_behaviour', true);
            $target                                                            = ($link_target == 1) ? 'target="_blank"' : '';
            $class                                                             = '';
            $class .= $size;
            if ($debug) {
                $class .= ' debug';
            }

            echo '<' . $style['wrapperPre'] . ' class="' . $style['wrapperClass'] . ' ' . $class . '">';

            echo '<a class="card h-100" href=' . $link . ' ' . $target . '>';
             //get_the_post_thumbnail( $post_ID, 'medium' );
            //  echo get_the_post_thumbnail(get_the_ID(), 'full', [ 'class' => 'card-img-top' ] );
                echo ' <div class="card-body">';
                    echo '<h5 class="card-title">';
                        echo get_the_title(); 
                    echo '</h5>';
                    echo '<p class="card-text">';
                        echo get_post_meta(get_the_ID(), 'wp_sponsors_desc', true);
                    echo '</p>';
                echo '</div>';
                echo get_the_post_thumbnail(get_the_ID(), 'full', [ 'class' => 'card-img-bottom' ] );
            echo '</a>';




            echo $style['wrapperPost'];
            if (($query->current_post + 1) === $query->post_count) {
                echo $style['containerPost'];
            }
            endwhile;
            wp_reset_postdata();
            return ob_get_clean();
        }
    }
    add_shortcode('sponsors', 'sponsors_register_shortcode');