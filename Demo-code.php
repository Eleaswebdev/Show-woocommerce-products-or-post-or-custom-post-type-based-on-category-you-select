<div class="container">
	<h3>Show products based on select category</h3>

	<div class="row">
		  <?php 

    $cat_id = get_field('select_product_category_pro',get_the_ID());
    
	$args = array(
	  'post_type'     => 'product', //or your postype 
	  //'post_status'   => 'publish',
	  'posts_per_page'        => '-1',
	  'tax_query' => array(
	  array(
         'taxonomy' => 'product_cat',
         'field'    => 'term_id',
         'terms'     => $cat_id, // When you have more term_id's seperate them by komma.
         'operator'  => 'IN'
         ),
	)
    );
    
    $query = new WP_Query( $args );
	if ( $query->have_posts() ) : 
	    while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="col-lg-4">
			<?php  the_title(); ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	      
		</div>
	
     <?php endwhile; ?>
     <?php endif; ?>
     <?php wp_reset_postdata(); ?>
	 
	</div>
</div>	
