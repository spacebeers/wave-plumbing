<div class="stipped-loop">
	<!-- START LOOP -->
	<?php $counter = 1 ?>
    <div class="row">
        <div class="container">
            <div class="card-grid">
				<?php 
					if (have_posts()): while (have_posts()) : the_post();
						get_template_part('template-parts/news-listing');
						if ($counter % 3 == 0):
							echo '</div></div></div><div class="row"><div class="container"><div class="card-grid">';
						endif;                   
						$counter++ ; 
					endwhile; 
					else:
						_e( 'Sorry, nothing to display.', 'wave' );
					endif;
				?>
            </div>
        </div>
    </div>
</div>
