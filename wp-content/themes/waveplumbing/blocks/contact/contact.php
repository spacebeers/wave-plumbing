<?php
/**
 * Block Name: Contact
 */
?>
<div class="contact-block">
    <ul>
        <?php if (get_theme_mod( 'wave_phone')): ?>
            <li>
                <a href="tel:<?php echo get_theme_mod( 'wave_phone'); ?>" target="_blank">
                    <?php echo file_get_contents(get_template_directory() . '/assets/phone.svg', true); ?>
                    <?php echo get_theme_mod( 'wave_phone'); ?>
                </a>
            </li>
        <?php endif; ?>
        <?php if (get_theme_mod( 'wave_mobile')): ?>
            <li>
                <a href="tel:<?php echo get_theme_mod( 'wave_mobile'); ?>" target="_blank">
                    <?php echo file_get_contents(get_template_directory() . '/assets/mobile.svg', true); ?>
                    <?php echo get_theme_mod( 'wave_mobile'); ?>
                </a>
            </li>
        <?php endif; ?>
        <?php if (get_theme_mod( 'wave_email')): ?>
            <li>
                <a href="mailto:<?php echo get_theme_mod( 'wave_email'); ?>" target="_blank">
                    <?php echo file_get_contents(get_template_directory() . '/assets/email.svg', true); ?>
                    <?php echo get_theme_mod( 'wave_email'); ?>
                </a>
            </li>
        <?php endif; ?>
        <?php if (get_theme_mod( 'wave_facebook')): ?>
            <li>
                <a href="<?php echo get_theme_mod( 'wave_facebook'); ?>" target="_blank">
                    <?php echo file_get_contents(get_template_directory() . '/assets/facebook.svg', true); ?>
                    Find us on Facebook
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>

