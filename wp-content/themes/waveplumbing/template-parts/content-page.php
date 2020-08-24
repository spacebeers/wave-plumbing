<?php $banner_image = get_field('banner_image'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <?php include( locate_template( 'template-parts/banner.php', false, false ) ); ?>	
    <div class="container">
    
        <h1 class="page_title"><?php the_title(); ?></h1>

        <?php the_content(); ?>

    </div>		
</article>