<?php

class Bunch_Taxonomies

{


	var $gallery_slug = '' ;

	var $property_slug = '' ;

	var $testimonials_slug = '' ;

	

	var $gallery_cat_slug = '';

	var $property_cat_slug = '' ;

	var $faqs_cat_slug = '' ;

	var $testimonials_cat_slug = '' ;

	

	

	function __construct()



	{



		// Hook into the 'init' action

		//add_action( 'init', array($this, 'taxonomies'), 0 );



		$theme_option = _WSH()->option() ; 



		$this->property_cat_slug = dreamland_set($theme_option , 'property_category_permalink' , 'property_category') ;

	

		$this->gallery_cat_slug = dreamland_set($theme_option , 'gallery_category_permalink' , 'gallery_category') ;

		

		$this->testimonials_cat_slug = dreamland_set($theme_option , 'testimonial_category_permalink' , 'testimonials_category') ;



		$this->faqs_cat_slug = dreamland_set($theme_option , 'faqs_category_permalink' , 'faqs_category') ;

		

		$this->taxonomies();



	}



	// Register Custom Taxonomy



	function taxonomies()  {



		/*** Register service taxonomy property_category */



		$labels = array(

			'name'                       => _x( 'Category', 'Property Category', BUNCH_NAME ),

			'singular_name'              => _x( 'Category', 'Category', BUNCH_NAME ),

			'menu_name'                  => __( 'Category', BUNCH_NAME ),

			'all_items'                  => __( 'All Categories', BUNCH_NAME ),

			'parent_item'                => __( 'Parent Category', BUNCH_NAME ),

			'parent_item_colon'          => __( 'Parent Category:', BUNCH_NAME ),

			'new_item_name'              => __( 'New Category Name', BUNCH_NAME ),

			'add_new_item'               => __( 'Add New Category', BUNCH_NAME ),

			'edit_item'                  => __( 'Edit Category', BUNCH_NAME ),

			'update_item'                => __( 'Update Category', BUNCH_NAME ),

			'separate_items_with_commas' => __( 'Separate Categories with commas', BUNCH_NAME ),

			'search_items'               => __( 'Search Categories', BUNCH_NAME ),

			'add_or_remove_items'        => __( 'Add or remove Categories', BUNCH_NAME ),

			'choose_from_most_used'      => __( 'Choose from the most used Categories', BUNCH_NAME ),

		);



		$rewrite = array(

			'slug'                       => $this->property_cat_slug,

			'with_front'                 => true,

			'hierarchical'               => true,

		);



		$args = array(

			'labels'                     => $labels,

			'hierarchical'               => true,

			'public'                     => true,

			'show_ui'                    => true,

			'show_admin_column'          => true,

			'show_in_nav_menus'          => true,

			'show_tagcloud'              => true,

			'rewrite'                    => $rewrite,

		);



		register_taxonomy('property_category', 'bunch_property', $args );

	

		/*** Register testimonial taxonomy testimonials_category */	



		$labels = array(

			'name'                       => _x( 'Category', 'Testimonial Category', BUNCH_NAME ),

			'singular_name'              => _x( 'Category', 'Category', BUNCH_NAME ),

			'menu_name'                  => __( 'Category', BUNCH_NAME ),

			'all_items'                  => __( 'All Categories', BUNCH_NAME ),

			'parent_item'                => __( 'Parent Category', BUNCH_NAME ),

			'parent_item_colon'          => __( 'Parent Category:', BUNCH_NAME ),

			'new_item_name'              => __( 'New Category Name', BUNCH_NAME ),

			'add_new_item'               => __( 'Add New Category', BUNCH_NAME ),

			'edit_item'                  => __( 'Edit Category', BUNCH_NAME ),

			'update_item'                => __( 'Update Category', BUNCH_NAME ),

			'separate_items_with_commas' => __( 'Separate Categories with commas', BUNCH_NAME ),

			'search_items'               => __( 'Search Categories', BUNCH_NAME ),

			'add_or_remove_items'        => __( 'Add or remove Categories', BUNCH_NAME ),

			'choose_from_most_used'      => __( 'Choose from the most used Categories', BUNCH_NAME ),

		);



		$rewrite = array(

			'slug'                       => $this->testimonials_cat_slug,

			'with_front'                 => true,

			'hierarchical'               => true,

		);



		$args = array(

			'labels'                     => $labels,

			'hierarchical'               => true,

			'public'                     => true,

			'show_ui'                    => true,

			'show_admin_column'          => true,

			'show_in_nav_menus'          => true,

			'show_tagcloud'              => true,

			'rewrite'                    => $rewrite,

		);



		register_taxonomy( 'testimonials_category', 'bunch_testimonials', $args );

		

	    /*** Register FAQs taxonomy faqs_category */

	

		$labels = array(

			'name'                       => _x( 'Category', 'FAQs Category', BUNCH_NAME ),

			'singular_name'              => _x( 'Category', 'Category', BUNCH_NAME ),

			'menu_name'                  => __( 'Category', BUNCH_NAME ),

			'all_items'                  => __( 'All Categories', BUNCH_NAME ),

			'parent_item'                => __( 'Schedule Category', BUNCH_NAME ),

			'parent_item_colon'          => __( 'Schedule Category:', BUNCH_NAME ),

			'new_item_name'              => __( 'New Category Name', BUNCH_NAME ),

			'add_new_item'               => __( 'Add New Category', BUNCH_NAME ),

			'edit_item'                  => __( 'Edit Category', BUNCH_NAME ),

			'update_item'                => __( 'Update Category', BUNCH_NAME ),

			'separate_items_with_commas' => __( 'Separate Categories with commas', BUNCH_NAME ),

			'search_items'               => __( 'Search Categories', BUNCH_NAME ),

			'add_or_remove_items'        => __( 'Add or remove Categories', BUNCH_NAME ),

			'choose_from_most_used'      => __( 'Choose from the most used Categories', BUNCH_NAME ),

		);



		$rewrite = array(

			'slug'                       => $this->faqs_cat_slug,

			'with_front'                 => true,

			'hierarchical'               => true,

		);



		$args = array(

			'labels'                     => $labels,

			'hierarchical'               => true,

			'public'                     => true,

			'show_ui'                    => true,

			'show_admin_column'          => true,

			'show_in_nav_menus'          => true,

			'show_tagcloud'              => true,

			'rewrite'                    => $rewrite,

		);



		register_taxonomy( 'faqs_category', 'bunch_faqs', $args );


				/*** Register event taxonomy events_category */



		$labels = array(

			'name'                       => _x( 'Category', 'Gallery Category', BUNCH_NAME ),

			'singular_name'              => _x( 'Category', 'Category', BUNCH_NAME ),

			'menu_name'                  => __( 'Category', BUNCH_NAME ),

			'all_items'                  => __( 'All Categories', BUNCH_NAME ),

			'parent_item'                => __( 'Parent Category', BUNCH_NAME ),

			'parent_item_colon'          => __( 'Parent Category:', BUNCH_NAME ),

			'new_item_name'              => __( 'New Category Name', BUNCH_NAME ),

			'add_new_item'               => __( 'Add New Category', BUNCH_NAME ),

			'edit_item'                  => __( 'Edit Category', BUNCH_NAME ),

			'update_item'                => __( 'Update Category', BUNCH_NAME ),

			'separate_items_with_commas' => __( 'Separate Categories with commas', BUNCH_NAME ),

			'search_items'               => __( 'Search Categories', BUNCH_NAME ),

			'add_or_remove_items'        => __( 'Add or remove Categories', BUNCH_NAME ),

			'choose_from_most_used'      => __( 'Choose from the most used Categories', BUNCH_NAME ),

		);



		$rewrite = array(

			'slug'                       => $this->gallery_cat_slug,

			'with_front'                 => true,

			'hierarchical'               => true,

		);



		$args = array(

			'labels'                     => $labels,

			'hierarchical'               => true,

			'public'                     => true,

			'show_ui'                    => true,

			'show_admin_column'          => true,

			'show_in_nav_menus'          => true,

			'show_tagcloud'              => true,

			'rewrite'                    => $rewrite,

		);



		register_taxonomy('gallery_category', 'bunch_gallery', $args );







	}



}