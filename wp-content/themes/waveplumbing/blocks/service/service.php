<?php
    /**
     * Block Name: Service
     */
?>

<div class="service-card">
    <div class="service-image">
        <a href="<?php the_field('link'); ?>" class="card-image" style="background-image: url(<?php the_field('image'); ?>);"></a>
    </div>
    <div class="service-content">
        <h3>
            <a href="<?php the_field('link'); ?>">    
                <?php the_field('title'); ?>
            </a>
        </h3>

        <div class="service-text">
            <?php the_field('content'); ?>
        </div>

        <a href="<?php the_field('link'); ?>" class="btn">See more</a>
    </div>
</div>