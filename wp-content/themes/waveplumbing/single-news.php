<?php 
    $option_page = 'cpt_news';
    get_header(); ?>
    <main role="main">
		<!-- section -->
		<section>
            <?php include( locate_template( 'template-parts/article-banner.php', false, false ) ); ?>			
            <article id="post-<?php the_ID(); ?>" <?php post_class("page article-page"); ?>>
                <section class="container">
                    <div class="post-contents">
                        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                            <!-- article -->
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="post-content">
                                    <div class="back-header">
                                        <div class="link-box">
                                            <a href="<?php echo get_post_type_archive_link('news'); ?>" class="btn">Back to news</a>
                                        </div>
                                        
                                        <?php include( locate_template( 'template-parts/post-meta.php', false, false ) ); ?>			
                                    </div>
                                
                                    <?php the_content(); // Dynamic Content ?>

                                    <?php include( locate_template( 'template-parts/post-tags.php', false, false ) ); ?>                          
                                </div>

                            </article>
                            <!-- /article -->

                        <?php endwhile; ?>

                        <?php else: ?>

                            <!-- article -->
                            <article>

                                <h1><?php _e( 'Sorry, nothing to display.', 'wave' ); ?></h1>

                            </article>
                            <!-- /article -->

                        <?php endif; ?>
                    </div>

                    <?php include( locate_template( 'template-parts/post-share.php', false, false ) ); ?>			
                </section>
            </article>
        </section>
        <?php include( locate_template( 'template-parts/related-content.php', false, false ) ); ?>			
    </main>
<?php get_footer(); ?>
