<?php 
	$option_page = 'cpt_news';
	get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="mixer">
			<?php include( locate_template( 'template-parts/options-banner.php', false, false ) ); ?>			
			<div class="container archive-header">			

				<h2><?php the_field('page_title', $option_page); ?></h2>

				<?php the_field('content', $option_page); ?>		

				<?php
					$template = $GLOBALS['current_theme_template'];
					$tax = 'category';
				?>

				<div class="filter-box">
					<div class="collapse" id="filters">
						<div class="tag-nav">
							<ul>
								<li class="key">
									<strong>Filter by:</strong>
								</li>
								<li>
									<button class='filter-button' data-filter="all">All</button>
								</li>
								<?php
									$terms = get_terms( $tax, array(
										'hide_empty' => true
									));
									if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
										foreach ( $terms as $term ) {
											$classSelected = "";
											if ($term->term_id == $filter_tag):
												$classSelected = "selected";
											endif;
											if ($term->slug !== "uncategorised"):
												echo "<li class=' ".$classSelected."'><button class='filter-button' data-filter='.".$term->slug."'>" . $term->name . "</button></li>";
											endif;
										}
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>	

			<?php get_template_part('loop-news'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
