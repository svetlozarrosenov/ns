<div class="sidebar">
	<div class="widgets">
		<ul>
			<?php
			$page_ID = crb_get_page_context();
			if ( is_blog() ) {
				$page_ID = get_option('page_for_posts');
			}
			$sidebar = '';

			# If $page_ID is present, check for custom sidebar
			if ( ! empty( $page_ID ) ) {
				$sidebar = carbon_get_post_meta( $page_ID, 'crb_blog_sidebar' );
			}

			# If sidebar is not set or the $page_ID is not present, assign 'default-sidebar'
			if ( empty( $sidebar ) ) {
				$sidebar = 'default-sidebar';
			}

			dynamic_sidebar( $sidebar );
			?>
		</ul>
	</div><!-- /.widgets -->
</div><!-- /.sidebar -->