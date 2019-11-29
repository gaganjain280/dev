<?php
// Custom_post_type is used for just creating Custom post
class Custom_post_type{

 public function __construct(){
 
  add_action('init', array($this,'create_post_type')); 
 }

 public function create_post_type() {
         register_post_type( 'your_custom_name',
             array(
                'labels'       => array(
                                      'name'          => __( 'Custom post' ),
                                      'singular_name' => __( 'Custom_post' )
                                 ),
                'public'       => true,
                'has_archive'  => true,
                'rewrite'      => true,
            )
       );
       }
}
$property_obj = new Custom_post_type();
$property_obj->create_post_type();


class Movie_Post{
    public function __construct(){
      add_action('init', array($this,'movies_categories_register')); 
      add_action( 'init', array($this,'create_posttype_movie') );
      add_action( 'init', array($this,'theme_edjesting_movies') );
      add_action( 'pre_get_posts', array($this,'add_my_post_types_to_query'));
    }
    // Our custom post type function create_posttype_movie
    public function create_posttype_movie() {
        register_post_type( 'movies',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Movies' ),
                    'singular_name' => __( 'Movie' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'movies'),
            )
        );
    }
    // movies_categories_register method used for creating Movies texanomy
    public function movies_categories_register() {
    $labels = array(
        'name'                          => 'Movies categories',
        'singular_name'                 => 'Movies Category',
        'search_items'                  => 'Search Movies Categories',
        'popular_items'                 => 'Popular Movies Categories',
        'all_items'                     => 'All Movies Categories',
        'parent_item'                   => 'Parent Movie Category',
        'edit_item'                     => 'Edit Movie Category',
        'update_item'                   => 'Update Movie Category',
        'add_new_item'                  => 'Add New Movie Category',
        'new_item_name'                 => 'New Movie Category',
        'separate_items_with_commas'    => 'Separate Movies categories with commas',
        'add_or_remove_items'           => 'Add or remove Movies categories',
        'choose_from_most_used'         => 'Choose from most used Movies categories'
        );

    $args = array(
        'label'                         => 'Movies Categories',
        'labels'                        => $labels,
        'public'                        => true,
        'hierarchical'                  => true,
        'show_ui'                       => true,
        'show_in_nav_menus'             => true,
        'args'                          => array( 'orderby' => 'term_order' ),
        'rewrite'                       => array( 'slug' => 'movies', 'with_front' => true, 'hierarchical' => true ),
        'query_var'                     => true
    );

     register_taxonomy( 'movies_categories', 'movies', $args );
    }
    public function theme_edjesting_movies() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'crater-free' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'crater-free' ),
        'menu_name'           => __( 'Movies', 'crater-free' ),
        'parent_item_colon'   => __( 'Parent Movie', 'crater-free' ),
        'all_items'           => __( 'All Movies', 'crater-free' ),
        'view_item'           => __( 'View Movie', 'crater-free' ),
        'add_new_item'        => __( 'Add New Movie', 'crater-free' ),
        'add_new'             => __( 'Add New', 'crater-free' ),
        'edit_item'           => __( 'Edit Movie', 'crater-free' ),
        'update_item'         => __( 'Update Movie', 'crater-free' ),
        'search_items'        => __( 'Search Movie', 'crater-free' ),
        'not_found'           => __( 'Not Found', 'crater-free' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'crater-free' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'movies', 'crater-free' ),
        'description'         => __( 'Movie news and reviews', 'crater-free' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
 
  }
  public function add_my_post_types_to_query( $query ){
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'movies' ) );
    return $query;
  }
}
$movie_catagory_obj = new Movie_Post();
$movie_catagory_obj->movies_categories_register();
$movie_catagory_obj->create_posttype_movie();
$movie_catagory_obj->theme_edjesting_movies();
$movie_catagory_obj->add_my_post_types_to_query($query);




