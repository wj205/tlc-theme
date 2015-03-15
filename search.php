<?php

get_header(); ?>
	
	<!-- site-content -->
	<div class="site-content clearfix">

		<!-- main-column -->
		<div class="main-column">

			<h2>Search results for: <?php the_search_query(); ?></h2>

			<?php if (have_posts()) : 

				while(have_posts()) : the_post();				
				
				get_template_part('content', get_post_format());

				endwhile;

				else :
					echo '<p>No content found</p>';

				endif; ?>

		</div><!-- /main-column -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer();

?>