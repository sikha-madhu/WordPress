<?php 

define('WP_USE_THEMES', false);
require('../../../../wp-load.php');

try{
	$req = $_POST;
	$data = $req;
	$limit = $data["limit"];
    $obj = new stdClass();
    // echo json_encode($obj);
	$posts =  get_posts(	array( 
    						'orderby' => 'date',
                            'order' => 'DESC',
                        'numberposts' => 2 ));
                          echo json_encode($posts);
							
	$list = array();					
							
	foreach ( $posts as $post ) {
		$item  = '<li class="j-i">';
			$item .= '<article id="post-'.$post->ID.'">';
				$item .= '<div class="j-desc l-f">';
					$item .= '<h3 class="j-h-t j-name1"><a href="'.get_permalink( $post->ID ).'" target="_blank" rel="bookmark">'. $post->post_title .'</a></h3>'; 
					$item .= '<div class="b-n">';
						setup_postdata($post);
						$item .=  wp_trim_excerpt().'<a class="more_link" href="'.get_permalink( $post->ID ).'" target="_blank" rel="bookmark">...More</a></br>';
						if (has_post_thumbnail($post->ID ) ){
							$item .=  get_the_post_thumbnail($post->ID );
						} else{
							$media = reset(get_attached_media('', $post->ID));
							
							$type = explode("/", $media -> post_mime_type);
							if($type[0] == 'image') {
								$item .=  '<img src="'.$media->guid.'" class="home_attachement_img"/>';
							} else if($type[0] == 'video') {
								$item .=   wp_video_shortcode(array('src'=>$media->guid));
							}
						}
					$item .= '</div>';
					$item .= '<div class="j-d l-f">';
						$item .= '<div class="d-t-e"><img class="clockImage" src="images/clock.svg" /><span class="p_date">'. get_the_date('M j Y', $post->ID).'</span></div>';
					$item .= '</div>';
				$item .= '</div>';
				$item .= '<div class="clear"></div>';
			$item .= '</article>';
		$item .= '</li>';
		
		$list[] = $item;
	}
	
	$obj = new stdClass();
	$obj->data = $list;
	
	echo json_encode($obj);
	
} catch (Exception $exception) {
	echo "failure";
}
?>