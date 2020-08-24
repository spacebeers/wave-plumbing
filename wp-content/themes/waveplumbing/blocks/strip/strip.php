<?php
/**
 * Strip Block Template.
 */
    $theme = get_field('theme');
?>

<div class="strip strip-<?php echo $theme; ?>">
    <div class="container">
        <InnerBlocks />
        <?php
            // $allowed_blocks = array( 'core/image', 'core/paragraph' );
            // echo '<InnerBlocks />';
        ?>
    </div>
</div>