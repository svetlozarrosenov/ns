<?php
if ( ! have_posts() ) {
	return;
}
?>
<section class="section-default">
	<div class="shell">
		<div class="section__inner">
			<div class="section__content">
				<div class="articles">
					<ol>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
							$post = [
								'image' => carbon_get_the_post_meta( 'crb_post_image' ),
								'blog_title' => $blog_title
							];
							?>
							<li>
								<div class="article-item">
									<?php if ( ! empty( $post['image'] ) ) : ?>
										<div class="article__image js-animation animation-left">
											<?php echo wp_get_attachment_image( $post['image'], 'crb_post_image_size' ); ?>
										</div><!-- /.article__image -->
									<?php endif; ?>
									
									<div class="article__content js-animation animation-right">
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
				
				<?php
				carbon_pagination( 'posts', [
					'wrapper_before' => '<div class="section__actions js-animation crb-posts-pagination">',
					'wrapper_after' => '</div>',
					'prev_html' => false,
					'next_html' => '<a href="{URL}" class="btn btn--long js-load-more">' . esc_html__( 'Load More', 'crb' ) . '</a>',
					'enable_prev' => false,
				] );
				?>
			</div><!-- /.section__content -->
			
			<aside class="section__aside">
				<?php get_sidebar(); ?>
			</aside><!-- /.section__aside -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-default -->