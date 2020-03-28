<?php
if ( ! have_posts() ) {
	return;
}
?>

<div class="loader">
	<img src="<?php echo get_bloginfo('stylesheet_directory') . '/resources/images/loader.svg'; ?>" alt="">	
</div><!-- loader -->

<section class="section-default">
	<div class="shell">
		<div class="section__inner">
			<div class="section__content">
				<div class="articles">
					<ol>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
							$post = [
								'blog_title' => $blog_title
							];
							?>
							<li>
								<div class="article-item">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="article__image">
											<?php echo the_post_thumbnail(); ?>
										</div><!-- /.article__image -->
									<?php endif; ?>
									
									<div class="article__content">
										<h5><?php the_category(', '); ?></h5>
										
										<h4>
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h4>
										
										<?php the_excerpt(); ?>
										
										<a href="<?php the_permalink(); ?>" class="link">
											<span><?php _e( 'Read More', 'crb' ); ?></span>
											
											<i class="fas fa-arrow-right"></i>
										</a>
									</div><!-- /.article__content -->
								</div><!-- /.article-item -->
							</li>
						<?php endwhile; ?>
					</ol>
				</div><!-- /.articles -->
				
				<div class="section__actions">
				<?php
				carbon_pagination( 'posts', [
					'wrapper_before' => '<div id="blog-pagination" class="pagination">',
					'wrapper_after' => '</div>',
					'prev_html' => false,
					'next_html' => '<a href="{URL}" class="btn btn--long js-load-more">' . esc_html__( 'Load More', 'crb' ) . '</a>',
					'enable_prev' => false,
				] );
				?>
				</div><!-- section__actions -->
			</div><!-- /.section__content -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-default -->