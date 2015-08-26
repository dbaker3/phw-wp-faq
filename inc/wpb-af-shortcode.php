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

		ob_start();

		if ($wp_query->have_posts()){ 
		?>
		<script>
			var faq = [];
		</script>
		<div>
			<div class="welshimer-form">
				<p>Search the FAQ</p>
				<input type="text" id="faq-search" class="text" placeholder="Start typing your question">
			</div>
			<div id="faq-list">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
				<?php $faq_content = get_the_content(); ?>
				<div class="acc-list" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a class="acc-list-category"><?php the_title(); ?></a>
					<?php if( $faq_content && $faq_content != '' ):?>
						<div class="acc-sublist">
		                    <?php the_content(); ?>
		                </div>
		                <script>
		                	faq.push({ 
		                		question: <?php $title = get_the_title(); echo json_encode($title); ?>, 
		                		answer: <?php $content = get_the_content(); echo json_encode($content); ?>, 
		                		tags: "<?php $tags = get_the_terms($post->ID, 'wpb_af_faq_tags', '', ' ', ''); if ($tags) foreach ($tags as $tag) echo $tag->name . ' '; ?>",
		                		id: "<?php echo the_ID(); ?>" 
		                	});
		                </script>
		           	<?php endif;?>
				</div>
		    <?php endwhile; ?>
		    </div>
		</div>
		<div id="faq-alt-assist" class="hidden">
		    <div class="libraryh3lp" jid="milliganlibrarys-queue@chat.libraryh3lp.com" style="display: none;">
				<iframe src="https://us.libraryh3lp.com/chat/milliganlibrarys-queue@chat.libraryh3lp.com?skin=25022" frameborder="0" style="border: 0px; width: 100%; height: 300px;"></iframe>
			</div>

    		<div class="libraryh3lp" style="display: none;"> 
     		   PUT YOUR OFFLINE OPTION HERE by inserting whatever HTML you want.
      		  You might point to your e-mail ref service or to your 24/7 backup chat service.
		    </div>
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