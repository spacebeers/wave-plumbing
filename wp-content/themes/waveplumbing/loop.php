<div class="posts-grid">
    <?php if (have_posts()): while (have_posts()) : the_post();
        $tags = array();
        $cats = get_the_category();
        foreach ($cats as $value):
            array_push($tags, $value->slug);
        endforeach;
        array_push($tags, "blog-article");
        array_push($tags, "mix");
        $string = implode(' ', $tags);
    ?>

        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class($string); ?>>
            <!-- post thumbnail -->
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <div class="post-image">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>);">
                    </a>
                </div>
            <?php endif; ?>
            <!-- /post thumbnail -->
            <div class="post-main">
                <!-- post title -->
                <h2>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
                <!-- /post title -->



                <a href="<?php the_permalink(); ?>" class="more-link">Read more</a>
            </div>
        </article>
        <!-- /article -->
    <?php endwhile; ?>
</div>
<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'wave' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
