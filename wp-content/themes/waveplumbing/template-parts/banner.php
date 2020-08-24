<?php if (get_field('show_image_banner')): ?>

    <div class="banner" style="background-image: url(<?php echo esc_url($banner_image['url']); ?>);">
        <div class="container">
            <h1>
                <?php the_field('banner_title'); ?>
                <?php
                if (get_field('banner_text')):
                    echo "<span class=\"banner_text\">" . get_field('banner_text') . "</span>";
                endif;
            ?>
            </h1>

            <?php edit_post_link( __( 'Edit', 'wave' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
        </div>
    </div>

<?php endif; ?>