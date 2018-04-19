<?php
/**
 *
 * This file adds Google fonts option to the WordPress Customiser, with the help of Kirki
 *
 * @author  Nicholas Duell
 * @license GPL-2.0+
 * @link    https://www.duellingpixels.com/
 */


function dp_kirki_sections( $wp_customize ) {
     /**
     * Add sections
     */

     $wp_customize->add_section( 'typography', array(
        'title'       => __( 'Fonts', 'los-broders' ),
        'priority'    => 20,
    ) );


}


add_action( 'customize_register', 'dp_kirki_sections' );

function dp_kirki_fields( $fields ) {

	$fields[] = array(
        'type'        => 'select',
        'setting'     => 'site_title_font_family',
        'label'       => __( 'Site Title Font Family', 'los-broders' ),
        'description' => __( 'Please choose a font for your site. This font-family will be applied to Site title element on your page.', 'los-broders' ),
        'section'     => 'typography',
        'default'     => 'Lato',
        'priority'    => 1,
        'choices'     => Kirki_Fonts::get_font_choices(),
        'output'      => array(
            array(
                'element'  => '.site-title',
                'property' => 'font-family',
            ),
        ),
        'transport'   => 'refresh',
        'js_vars'     => array(
            array(
                'element'  => '.site-title',
                'function' => 'css',
                'property' => 'font-family',
            ),
        ),
    );


    $fields[] = array(
        'type'        => 'select',
        'setting'     => 'heading_font_family',
        'label'       => __( 'Heading Font Family', 'los-broders' ),
        'description' => __( 'Please choose a font for your site. This font-family will be applied to heading elements on your page.', 'los-broders'),
        'section'     => 'typography',
        'default'     => '',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_font_choices(),
        'output'      => array(
            array(
                'element'  => 'h1, h2, h3, h4, h5, h6',
                'property' => 'font-family',
            ),
        ),
        'transport'   => 'refresh',
        'js_vars'     => array(
            array(
                'element'  => 'h1, h2, h3, h4, h5, h6',
                'function' => 'css',
                'property' => 'font-family',
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'select',
        'setting'     => 'body_font_family',
        'label'       => __( 'Body Font Family', 'los-broders'),
        'description' => __( 'Please choose a font for your site. This font-family will be applied to body elements on your page.', 'los-broders'),
        'section'     => 'typography',
        'default'     => 'Lato',
        'priority'    => 20,
        'choices'     => Kirki_Fonts::get_font_choices(),
        'output'      => array(
            array(
                'element'  => 'body, body > div',
                'property' => 'font-family',
            ),
        ),
        'transport'   => 'refresh',
        'js_vars'     => array(
            array(
                'element'  => 'body, body > div',
                'function' => 'css',
                'property' => 'font-family',
            ),
        ),
    );


    return $fields;

}
add_filter( 'kirki/fields', 'dp_kirki_fields' );
