<?php get_header(); ?>

<section class="section-default section-default--404">
	<div class="shell">
		<div class="section__content">
			<?php
			crb_the_title( '<h2 class="pagetitle">', '</h2>' );

			printf( __( '<p>Please check the URL for proper spelling and capitalization.<br />If you\'re having trouble locating a destination, try visiting the:<br><a class="btn" href="%1$s">home page</a></p>', 'crb' ), home_url( '/' ) );
			?>
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-default -->


<?php
get_footer();