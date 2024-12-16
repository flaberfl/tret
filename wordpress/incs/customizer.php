<?php

add_action( 'customize_register', function ( WP_Customize_Manager
$wp_customize ) {
    $wp_customize->add_section( 'tretbed_theme_options', array(
        'title' => ( 'Контакты' ),
        'priority' => 10,
        ) );
        
        // WhatsApp
         $wp_customize->add_setting('tretbed_whatsapp');
         $wp_customize->add_control('tretbed_whatsapp', array(
             'label' => 'WhatsApp',
             'section' => 'tretbed_theme_options'
             ));
             
             
        // Telegram
         $wp_customize->add_setting('tretbed_telegram');
         $wp_customize->add_control('tretbed_telegram', array(
             'label' => 'Telegram',
             'section' => 'tretbed_theme_options'
             ));
             
        // Email
         $wp_customize->add_setting('tretbed_email');
         $wp_customize->add_control('tretbed_email', array(
             'label' => 'E-mail',
             'section' => 'tretbed_theme_options'
             ));
} );


function tretbed_theme_options() {
    return array(
        'whatsapp' => get_theme_mod( 'tretbed_whatsapp' ),
        'telegram' => get_theme_mod( 'tretbed_telegram' ),
        'email' => get_theme_mod( 'tretbed_email' ),
        );
    
}