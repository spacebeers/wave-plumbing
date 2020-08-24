<?php
    add_action('acf/init', 'my_acf_init_block_types');
    function my_acf_init_block_types() {
    
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {

            acf_register_block_type(array(
                'name'              => 'contact',
                'title'             => __('Theme Contacts'),
                'description'       => __('A custom contact block.'),
                'render_template'   => 'blocks/contact/contact.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'supports'          => array( 'align' => false ),
                'keywords'          => array( 'contact', 'quote' ),
            ));

            acf_register_block_type(array(
                'name'              => 'service',
                'title'             => __('Service'),
                'description'       => __('A custom service block.'),
                'render_template'   => 'blocks/service/service.php',
                'category'          => 'formatting',
                'icon'              => 'welcome-view-site',
                'supports'          => array( 'align' => false ),
                'keywords'          => array( 'service' ),
            ));
        }
    }