<?php 

class PluginExample {
	public function __construct() {		
		// create shortcode key
		add_shortcode('property_short_code', array($this, 'property_list_fun'));
	}
	public function property_list_fun() {
		?>
        <div class="col-md-12">
		<?php $propertyArgs = array( 'post_type' => 'property', 'posts_per_page' => 10 );
		    $propertyShow_query = new WP_Query( $propertyArgs ); 
		    if( $propertyShow_query->have_posts()):							
				while($propertyShow_query->have_posts()) :
				    $propertyShow_query->the_post(); ?>  
	                <div class="row">
				    <div class="entry-content col-md-4">
				        <!-- grab the url for the full size featured image -->
				        <?php $featured_img_url = get_the_post_thumbnail_url('full'); 
                           /* link thumbnail to full size image for use with lightbox*/
                        echo '<a href="'.$featured_img_url.'" rel="lightbox">'; 
                        the_post_thumbnail('thumbnail');
                        echo '</a>'; ?>
				    </div>
				    <div class="col-md-7">
	                    <label for="address">Address:</label>
				                       <?php echo get_field('address'); ?>
				    <br><label for="price">Price:</label>
			                          <?php echo get_field('price'); ?>
			        <br><label for="price">Status:</label>  
			            <?php the_field('status'); ?>
			        <br><label for="price">Amenities:</label> 
			            <?php the_field('amenities'); ?> 
			        </div>
			        </div>
		        <?php endwhile; ?>
						<!-- add pagination -->
						<nav class="pagination">
				     	 <?php the_posts_pagination(); ?>
				       </nav> 
            <?php endif; ?>
            </div>
        <?php
    }
}

$pluginExample = new PluginExample();