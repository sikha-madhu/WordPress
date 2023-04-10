<?php 

define('WP_USE_THEMES', false);
require('../../../../wp-load.php');

try{
	$req = $_POST;
	$data = $req;
	$limit = $data["limit"];
	$posts =  get_posts(	array( 
    						'orderby' => 'date',
                            'order' => 'DESC',
                        'numberposts' => 3 ));
	$list = array();					
	foreach ( $posts as $post ) {
        setup_postdata($post);
        $dirURL = get_template_directory_uri();
        $imageURL = "/images/banner.jpg";
        $defaultImage = $dirURL.$imageURL;
        $postDate = get_the_date( 'd M, Y' );
        $user = get_userdata(get_the_author_meta('ID'));
            $item .= '<a href="'.get_permalink().'" class="bolg_card " target="_blank">';
                $item .= '<div class="blog_card-profile-details">';
                    $item .= '<div class="blog_card-title title-height">';
                        $item .= wp_trim_words(get_the_title(), 10,'...');
                    $item .= '</div>';
                    $item .= '<div class="blog_card-posted-by"> - ';
                            $item .= $user -> display_name;
                            $item .= '<div class="date">';
                                 $item .=  $postDate;
                            $item .= '</div>';
                    $item .= '</div>';
                $item .= '</div>';
                $item .= '<div class="blog_card-image">';
                    $item .= '<img src='.get_the_post_thumbnail_url().' alt="'.get_the_title().'" />';
                $item .= '</div>';
                $item .= '<div class="blog_card-des">';
                    $item .=    '<div class="blog_card-meta-data">';
                            $item .= '<div class="blog_card-title">';
                                $item .= wp_trim_words(get_the_title(), 10,'...');
                            $item .= '</div>';
                            $item .= '<div class="blog_card-content m-hide">';
                                    $content = get_the_content();
                                    $item .= wp_trim_words($content,30, '...'); 
                            $item .= '</div>';
                        $item .= '<div class="blog_card-content m-show">';
                                    $content = get_the_content(); 
                                    $item .= wp_trim_words($content,20, '...');
                        $item .= '</div>';
                    $item .=  '</div>';
                    $item .= '<div class="arrow__btn-link">';
                        $item .= '<div class="arrow__btn-link-text">Read More</div>';
                            $item .= '<img src="'.get_template_directory_uri().'/images/stroke-arrow-right.svg" alt="arrow right icon" class="arrow__btn-icon">';
                        $item .=  '</div>';
                    $item .= '</div>';
            $item .= '</a>';
        }
    wp_reset_query();
    array_push($list, $item);
    $obj = new stdClass();
    $obj->data = $list;
    
    echo json_encode($obj);
} catch (Exception $exception) {
	echo "failure";
}
?>