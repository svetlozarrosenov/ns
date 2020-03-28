<?php get_header(); ?>

<section class="section-default">
	<div class="shell">
		<div class="section__inner">
			<div class="section__content">
				<?php
				crb_the_title( '<h1 class="pagetitle">', '</h1>' );

				the_content();
				?>
			</div><!-- /.section__content -->

			<div class="section__sidebar">
				<?php get_sidebar(); ?>
			</div><!-- /.section__sidebar -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-default -->

<?php get_footer();