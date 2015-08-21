<?php

/*
	WPB Advanced FAQ
	By WPBean
	
*/

/*
*  8-19-15 Modified by David Baker, Milligan College
*  Original Project by wpbean, http://wpbean.com/wpb-advanced-faq
*
*  -Simplified & customized element layout for use with our theme
*  -Added Lunr searching (@TODO)
*  
*/

if ( !function_exists('wpb_af_shortcode_function') ){
	function wpb_af_shortcode_function ($atts) {

		extract(shortcode_atts(array(
	      'post' 			=> -1,
	      'order' 			=> 'ASC',
	      'orderby' 		=> 'menu_order',
	      'category'		=> '',
	      'tags'			=> '',
	      'theme'			=> 'flat', // ui, 
	      'close_previous'	=> 'yes', // no
		  
	   ), $atts));
	   
		$wp_query = new WP_Query( array( 
			'post_type' 			=> 'wpb_af_faq', 
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'posts_per_page' 		=> $post,
			'wpb_af_faq_category'	=> $category,
			'wpb_af_faq_tags'		=> $tags,
		));

		$wpb_af_id = rand(10,1000);

		ob_start();

		if ($wp_query->have_posts()){ 
		?>
		<script>var faq = [];</script>
		<div>
			<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
				<?php $faq_content = get_the_content(); ?>
				<div class="acc-list" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a class="acc-list-category"><?php the_title(); ?></a>
					<?php if( $faq_content && $faq_content != '' ):?>
						<div class="acc-sublist">
		                    <?php the_content(); ?>
		                </div>
		                <script>faq.push({ question: <?php $title = get_the_title(); echo json_encode($title); ?>, answer: <?php $content = get_the_content(); echo json_encode($content); ?> });</script>
		           	<?php endif;?>
				</div>
		    <?php endwhile; ?>
		</div>

		<?php
		}else{
			_e( '<h2 class="text-center">'.'No Post Found For FAQ.'.'</h2>', 'margo' );
		}
		wp_reset_postdata();  // Reset
		return ob_get_clean();
	}
	add_shortcode( 'wpb_af_faqs', 'wpb_af_shortcode_function' );
}	