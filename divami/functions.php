<?php
/**
 * divami functions and definitions
 *
 * @package divami
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'zeroerror_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function zeroerror_lite_setup() {
        if ( ! isset( $content_width ) )
                $content_width = 640; /* pixels */

        load_theme_textdomain( 'divami', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support('woocommerce');
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-header' );
        add_theme_support( 'title-tag' );
        add_image_size('divami-homepage-thumb',240,145,true);
        register_nav_menus( array(
                'primary' => __( 'Primary Menu', 'divami' ),
                'footer' => __( 'Footer Menu', 'divami' ),
        ) );
        add_theme_support( 'custom-background', array(
                'default-color' => 'ffffff'
        ) );
        add_editor_style( 'editor-style.css' );
}
endif; // zeroerror_lite_setup
add_action( 'after_setup_theme', 'zeroerror_lite_setup' );

// Set the word limit of post content
function zeroerror_lite_content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}

function zeroerror_lite_widgets_init() {

        register_sidebar( array(
                'name'          => __( 'Blog Sidebar', 'divami' ),
                'description'   => __( 'Appears on blog page sidebar', 'divami' ),
                'id'            => 'sidebar-1',
                'before_widget' => '',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
        ) );

}
add_action( 'widgets_init', 'zeroerror_lite_widgets_init' );


function zeroerror_lite_font_url(){
                $font_url = '';

                /* Translators: If there are any character that are not
                * supported by raleway, trsnalate this to off, do not
                * translate into your own language.
                */
                $raleway = _x('on','raleway:on or off','divami');


                /* Translators: If there has any character that are not supported
                *  by Scada, translate this to off, do not translate
                *  into your own language.
                */
                $scada = _x('on','Scada:on or off','divami');

                if('off' !== $raleway ){
                        $font_family = array();

                        if('off' !== $raleway){
                                $font_family[] = 'raleway:300,400,600,700,800,900';
                        }


                        $query_args = array(
                                'family'        => urlencode(implode('|',$font_family)),
                        );

                        $font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
                }

        return $font_url;
        }


function zeroerror_lite_scripts() {
        // wp_enqueue_style('divami-font', zeroerror_lite_font_url(), array());
        wp_enqueue_style( 'divami-basic-style', get_stylesheet_uri() );
        wp_enqueue_style( 'divami-editor-style', get_template_directory_uri()."/editor-style.css" );
        wp_enqueue_script( 'divami-nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
        wp_enqueue_script( 'divami-custom_js', get_template_directory_uri() . '/js/custom.js' );
        wp_enqueue_script( 'divami-backend_js', get_template_directory_uri() . '/js/divami_backend.js' );
    wp_enqueue_script( 'divami-functions_js', get_template_directory_uri() . '/js/divami_functions.js' );
        wp_enqueue_style( 'divami-new-styles', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_script( 'divami_header_js', get_template_directory_uri() . '/js/header.js');
    wp_enqueue_script( 'divami_footer_js', get_template_directory_uri() . '/js/footer.js' );


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }

        if(is_singular() && comments_open() ) {
                wp_enqueue_script( 'divami_comments_js', get_template_directory_uri() . '/js/comment_validation.js' );
                wp_enqueue_script( 'divami_showhidecomments_js', get_template_directory_uri() . '/js/divami_showhidecomments.js' );
        }
}
add_action( 'wp_enqueue_scripts', 'zeroerror_lite_scripts' );

function zeroerror_lite_ie_stylesheet(){
        global $wp_styles;

        /** Load our IE-only stylesheet for all versions of IE.
        *   <!--[if lt IE 9]> ... <![endif]-->
        *
        *  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
        *  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
        *  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
        *  properly handle non-IE conditional comments.
        */
        // wp_enqueue_style('divami-ie', get_template_directory_uri().'/css/ie.css', array('divami-style'));
        // $wp_styles->add_data('divami-ie','conditional','IE');
        }
add_action('wp_enqueue_scripts','zeroerror_lite_ie_stylesheet');


function zeroerror_lite_pagination() {
        global $wp_query;
        $big = 12345678;
        $page_format = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type'  => 'array',
            'prev_text' => '<img class="pageIcon prevIcon" src="'.get_template_directory_uri().'/images/prev.svg"/>',
            'next_text' => '<img class="pageIcon nextIcon" src="'.get_template_directory_uri().'/images/next.svg"/>'
        ) );
        if( is_array($page_format) ) {
                //$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                echo '<div class="d-pagination">';
                echo '<div class="pag-icons">';
                $patternP ='/.*prevIcon.*/';
                preg_match($patternP, $page_format[0], $matches);
                if(count($matches) == 0){
                        echo '<div class="individualPageLink"><img class="pageIcon prevIcon disable" src="'.get_template_directory_uri().'/images/prev.svg"/></div>';
                }
                foreach ( $page_format as $page ) {
                        echo '<div class="individualPageLink">'.$page.'</div>';
                }

                $patternN ='/.*nextIcon.*/';
                preg_match($patternN, $page_format[count($page_format) - 1], $dmatches);
                if(count($dmatches) == 0){
                        echo '<div class="individualPageLink"><img class="pageIcon iconStylesl nextIcon disable" src="'.get_template_directory_uri().'/images/next.svg"/></div>';
                }
                echo '<div class="clear"></div>';
                echo '</div>';
                echo '</div>';
        }
}


function plugin_myContentFilter($content)
{
    // Take the existing content and return a subset of it
    return substr($content, 0, 200).'...';
}


function zeroerror_lite_comments_pagination() {
        global $wp_query;
        $big = 12345678;
        $page_format = get_the_comments_pagination( array(
            'type'  => 'array',
            'prev_text' => '<img class="pageIcon prevIcon" src="'.get_template_directory_uri().'/images/prev.svg"/>',
            'next_text' => '<img class="pageIcon nextIcon" src="'.get_template_directory_uri().'/images/next.svg"/>'
        ));
        if( strlen($page_format) ) {
                //$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                echo '<div class="d-pagination">';
                echo '<div class="pag-icons">';
                $patternP ='/.*prevIcon.*/';
                preg_match($patternP, $page_format, $matches);
                if(count($matches) == 0){
                        echo '<div class="individualPageLink"><img style="margin-top: 4px;" class="pageIcon prevIcon disable" src="'.get_template_directory_uri().'/images/prev.svg"/></div>';
                }
                echo '<div class="individualPageLink">'.$page_format.'</div>';

                $patternN ='/.*nextIcon.*/';
                preg_match($patternN, $page_format, $dmatches);
                if(count($dmatches) == 0){
                        echo '<div class="individualPageLink"><img style="margin-top: 4px;" class="pageIcon iconStylesl nextIcon disable" src="'.get_template_directory_uri().'/images/next.svg"/></div>';
                }
                echo '<div class="clear"></div>';
                echo '</div>';
                echo '</div>';
        }
}


define('GRC_URL','http://www.gracethemes.com','');
define('GRC_THEME_DOC','http://gracethemes.com/documentation/zeroerror/','');
define('GRC_PRO_THEME_URL','http://gracethemes.com/themes/zeroerror-business-wordpress-theme/','');
define('GRC_LIVE_DEMO','http://gracethemes.com/demo/zeroerror/','');

/**
 * Implement the Custom Header feature.
 */







function zeroerror_lite_custom_blogpost_pagination( $wp_query ){
        $big = 999999999; // need an unlikely integer
        if ( get_query_var('paged') ) { $pageVar = 'paged'; }
        elseif ( get_query_var('page') ) { $pageVar = 'page'; }
        else { $pageVar = 'paged'; }
        $pagin = paginate_links( array(
                'base'                  => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'                => '?'.$pageVar.'=%#%',
                'current'               => max( 1, get_query_var($pageVar) ),
                'total'                 => $wp_query->max_num_pages,
                'prev_text'             => '&laquo; Prev',
                'next_text'     => 'Next &raquo;',
                'type'  => 'array'
        ) );
        if( is_array($pagin) ) {
                $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                echo '<div class="pagination"><div><ul>';
                echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
                foreach ( $pagin as $page ) {
                        echo "<li>$page</li>";
                }
                echo '</ul></div></div>';
        }
}
// get slug by id
function zeroerror_lite_get_slug_by_id($id) {
        $post_data = get_post($id, ARRAY_A);
        $slug = $post_data['post_name'];
        return $slug;
}


add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

        <h3>Extra profile information</h3>

        <table class="form-table">

                <tr>
                        <th><label for="JobTitle">JobTitle</label></th>

                        <td>
                                <input type="text" name="jobtitle" id="jobtitle" value="<?php echo esc_attr( get_the_author_meta( 'jobtitle', $user->ID ) ); ?>" class="regular-text" /><br />
                                <span class="description">Please enter your Jobtitle.</span>
                        </td>
                </tr>

        </table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

        if ( !current_user_can( 'edit_user', $user_id ) )
                return false;

        /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
        update_usermeta( $user_id, 'jobtitle', $_POST['jobtitle'] );
}

// add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));
add_action('wp_logout','creating_functions');
function creating_functions(){
	return create_function('','wp_redirect(home_url());exit();');
}



/**
 * Adds divami user list widget.
 */
class Divami_user_listWidget extends WP_Widget {

        /**
         * Register widget with WordPress.
         */
        function __construct() {
                parent::__construct(
                        'divami_user_list', // Base ID
                        __( 'Divami Authors List', 'text_domain' ), // Name
                        array( 'description' => __( 'Divami Design labs', 'text_domain' ), ) // Args
                );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {
                echo $args['before_widget'];
                if ( ! empty( $instance['title'] ) ) {
                        echo '<h3 class="widget-title author-title">'.apply_filters( 'widget_title', $instance['title'] ).'</h3>';
                }

                echo '<aside id="authors" class="authorside">';
                        echo '<ul>';
                                $authors = get_users(array(orderby => 'display_name', has_published_posts => true));
                                if ($authors) {
                        foreach ($authors as $author) {
                                $userRef = explode("@",$author->user_email)[0];
                                                echo '<li>';
                                                echo '<a href="/people/'.$userRef.'" target="_blank">';
                                        echo get_avatar( $author->ID, 52 );
                                        echo '<div class="d-i-b"><div class="p-b a-d-n">' . $author->display_name . '</div>';
                                                echo '<div class="a-r">' .((get_the_author_meta('jobtitle', $author->ID)!="") ? get_the_author_meta('jobtitle', $author->ID) : 'General'). '</div></div>';
                                                echo '</a></li>';
                                        }
                                }
                        echo '</ul>';
        echo '</aside>';


                echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {
                $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Authors', 'text_domain' );
                ?>
                <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
                </p>
                <?php
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
                $instance = array();
                $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

                return $instance;
        }

}

// register widget
function register_divami_user_list_widget() {
    register_widget( 'Divami_user_listWidget' );
}
add_action( 'widgets_init', 'register_divami_user_list_widget' );


/**
 * Adds divami categories list widget.
 */
class Divami_CATEGORIES extends WP_Widget {

        /**
         * Register widget with WordPress.
         */
        function __construct() {
                parent::__construct(
                        'divami_categories_list', // Base ID
                        __( 'Divami Categories List', 'text_domain' ), // Name
                        array( 'description' => __( 'Divami Design labs', 'text_domain' ), ) // Args
                );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {
                echo $args['before_widget'];
                if ( ! empty( $instance['title'] ) ) {
                        echo '<h3 class="widget-title">'.apply_filters( 'widget_title', $instance['title'] ).'</h3>';
                }

                echo '<aside id="categories" class="categorieside">';
                        echo '<ul class="categoriesul">';
                                $args = array(
                                    'title_li' => "",
                                    'show_count' => true,
                                    'hide_empty' => true);
                wp_list_categories($args);
                        echo '</ul>';
        echo '</aside>';


                echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {
                $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories', 'text_domain' );
                ?>
                <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
                </p>
                <?php
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
                $instance = array();
                $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

                return $instance;
        }

}

// register widget
function register_CATEGORIES_widget() {
    register_widget( 'Divami_CATEGORIES' );
}
add_action( 'widgets_init', 'register_CATEGORIES_widget' );




/**
 * Adds divami Archives list widget.
 */
class Divami_Archives extends WP_Widget {

        /**
         * Register widget with WordPress.
         */
        function __construct() {
                parent::__construct(
                        'divami_Archives_list', // Base ID
                        __( 'Divami Archives', 'text_domain' ), // Name
                        array( 'description' => __( 'Divami Design labs', 'text_domain' ), ) // Args
                );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {
                echo $args['before_widget'];
                if ( ! empty( $instance['title'] ) ) {
                        echo '<h3 class="widget-title">'.apply_filters( 'widget_title', $instance['title'] ).'</h3>';
                }

                echo ' <aside id="tags" class="archivesside">';
                        echo '<ul>';
                                $args = array(
                                        'type'            => 'monthly',
                                        'format'          => 'html',
                                        'show_post_count' => true,
                                        'echo'            => 1,
                                        'order'           => 'DESC',
                                    'post_type'     => 'post'
                                   );
                                wp_get_archives( $args );
                        echo '</ul>';
        echo '</aside>';


                echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {
                $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Archives', 'text_domain' );
                ?>
                <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
                </p>
                <?php
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
                $instance = array();
                $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

                return $instance;
        }

}

// register widget
function register_Archives_widget() {
    register_widget( 'Divami_Archives' );
}
add_action( 'widgets_init', 'register_Archives_widget' );



/**
 * Adds divami recent_posts list widget.
 */
class Divami_recent_posts extends WP_Widget {

        /**
         * Register widget with WordPress.
         */
        function __construct() {
                parent::__construct(
                        'divami_recent_posts_list', // Base ID
                        __( 'Divami Recent Posts', 'text_domain' ), // Name
                        array( 'description' => __( 'Divami Design labs', 'text_domain' ), ) // Args
                );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {
                echo $args['before_widget'];
                if ( ! empty( $instance['title'] ) ) {
                        echo '<h3 class="widget-title">'.apply_filters( 'widget_title', $instance['title'] ).'</h3>';
                }

                echo '<aside id="recentposts" class="recentpostsside">';
                        echo '<ul>';
                                $args = array(
                                    'numberposts' => 5,
                                    'offset' => 0,
                                    'category' => 0,
                                    'orderby' => 'post_date',
                                    'order' => 'DESC',
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'suppress_filters' => true );

                                $recent_posts = wp_get_recent_posts($args);
                                foreach( $recent_posts as $recent ){
                                        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                                }
                        echo '</ul>';
        echo '</aside>';


                echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {
                $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Recent Posts', 'text_domain' );
                ?>
                <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
                </p>
                <?php
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
                $instance = array();
                $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

                return $instance;
        }

}

// register widget
function register_recent_posts_widget() {
    register_widget( 'Divami_recent_posts' );
}
add_action( 'widgets_init', 'register_recent_posts_widget' );


function add_back_to_top(){
        // echo '<div id="top" class="b-t-p hide">';
    // echo '<img class="b-t-t-logo l-f" src="'.get_template_directory_uri().'/images/up-arrow.svg" alt="" />';
    // echo '<span class="b-t-t l-f" >Back to top</span>';
    // echo '</div>';
}

// support post lists and all tags
function wpse_allowedtags() {
    // Add custom tags to this string
    return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>';
}

/**
* Ignore UA Sniffing and override the user_can_richedit function
* and just check the user preferences
*
* @return bool
*/
function user_can_richedit_override() {
    global $wp_rich_edit;

    if (get_user_option('rich_editing') == 'true' || !is_user_logged_in()) {
        $wp_rich_edit = true;
        return true;
    }

    $wp_rich_edit = false;
    return false;
}
add_filter('user_can_richedit', 'user_can_richedit_override');


if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) :

    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
    $raw_excerpt = $wpse_excerpt;
        if ( '' == $wpse_excerpt ) {

            $wpse_excerpt = get_the_content('');

                        preg_match_all('/<img[^>]+\>/i', $wpse_excerpt, $imagematches);
                        preg_match_all('/\[video[^\]]+\]\[\/video\]/i', $wpse_excerpt, $videomatches);

                        //$videoshtml = wp_video_shortcode($videomatches);

                        //removing all image tags
                        $wpse_excerpt = preg_replace("/<img[^>]+\>/i", "", $wpse_excerpt);

            //removing all shortcodes
            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );

            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);


            // $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 75;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

                foreach ($tokens[0] as $token) {

                    if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) {
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }
                $wpse_excerpt = trim(force_balance_tags($excerptOutput));

                $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'wpse' ), get_the_title()) . '</a>';
                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

                //$pos = strrpos($wpse_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                if($excerpt_length <= $count){
                        $wpse_excerpt .= $excerpt_more; /*Add read more in new paragraph */
                }
                                if(has_post_thumbnail()){
                                        if(is_single()){
                                                $excerpt_trim_content = $wpse_excerpt;
                                        } else{
                                                $excerpt_trim_content = the_post_thumbnail().$wpse_excerpt;
                                        }
                                } else{
                                        if($imagematches[0][0]){
                                                $excerpt_trim_content = $imagematches[0][0].$wpse_excerpt;
                                        } else {
                                                $excerpt_trim_content = do_shortcode($videomatches[0][0]).$wpse_excerpt;
                                        }
                                }

            return $excerpt_trim_content;

        }
        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }

endif;

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt');

// remove tool bar for all users
show_admin_bar(false);