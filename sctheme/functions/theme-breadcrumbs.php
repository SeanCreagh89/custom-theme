<?php

/**
    * Theme Breadcrumbs Output
    *
    * @package SCTheme
    * @author Sean Creagh
*/



function theme_breadcrumbs() {

    $separator = '<span style="white-space: pre;">      <i class="icon-angle-right"></i>      </span>';
    $home = get_the_title( get_option( 'page_on_front' ) );
    $blog = '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '" class="underlined-link" title="' . get_the_title( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) . '</a>';

    global $post, $wp_query;

    if ( !is_front_page() ) {

        echo '<div id="breadcrumb-bar" class="wrapper">';
        echo '<div class="container clearfix">';
        echo '<p>';

        if ( !is_search() && !is_author() ) {

            echo '<a href="' . get_home_url() . '" class="underlined-link" title="' . $home . '">' . $home . '</a>';
            echo $separator;

        }
        
        if ( is_page() ) {

            if ( $post->post_parent ) { 

                $ancestor = get_post_ancestors( $post->ID );
                $ancestor = array_reverse( $ancestor );

                if ( !isset( $parents ) ) $parents = null;

                foreach ( $ancestor as $ancestors ) {

                    $parents = '<a href="' . get_permalink( $ancestors ) . '" class="underlined-link" title="' . get_the_title( $ancestors ) . '">' . get_the_title( $ancestors ) . '</a>';

                }

                echo $parents;
                echo $separator;
                echo get_the_title();

            } else {

                echo get_the_title();

            }

        } elseif ( is_home( get_option( 'page_for_posts' ) ) ) {

            echo get_the_title( get_option( 'page_for_posts' ) );

        } elseif ( is_single() ) {

            echo $blog;
            echo $separator;
            echo get_the_title();

        } elseif ( is_category() ) {

            echo $blog;
            echo $separator;
            echo single_cat_title('', false);

        } elseif ( is_tag() ) {

            $term_id = get_query_var( 'tag_id' );
            $terms = get_terms( 'post_tag', 'include=' . $term_id );
            $get_term_name = $terms[0]->name;

            echo $blog;
            echo $separator;
            echo $get_term_name;

        } elseif ( is_author() ) {

            global $author;
            $userdata = get_userdata ( $author );

            echo 'Posts by ' . $userdata->display_name;

        } elseif ( is_search() ) {

            $result_counter = $wp_query->found_posts;
            echo $result_counter . ' results found for: '. get_search_query();

        } elseif ( is_404() ) {

            echo '404 Error';

        }

        echo '<p>';
        echo '</div>';
        echo '</div>';

    }

}