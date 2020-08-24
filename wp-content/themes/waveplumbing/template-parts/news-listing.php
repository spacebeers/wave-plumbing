<?php
    $author = get_field('author');
    $colors = array();
    $tags = array();
    $cats = get_the_category();
    foreach ($cats as $tag):
        array_push($tags, $tag->slug);
        array_push($colors, $tag);
    endforeach;

    $set_tags_string = implode(' ', $tags);
    $card_color = get_field('colour', $colors[0]);
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('card card-'. $card_color .' mix ' . $set_tags_string); ?>>
    <?php if ( has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="card-image" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>);">
        </a>
    <?php endif; ?>
    <div class="card-main">
        <h3>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <p class="card-meta"><?php echo get_the_title($author); ?> : <?php the_time('F jS, Y'); ?></p>

        <?php
            if ( has_excerpt() ) {
                the_excerpt();
            }
        ?>

        <a href="<?php the_permalink(); ?>" class="btn btn-block" title="<?php the_title(); ?>">Read more</a>
    </div>
</article>