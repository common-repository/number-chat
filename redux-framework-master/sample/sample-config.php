<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */
defined( 'ABSPATH' ) || exit;
if ( !class_exists( 'Redux' ) ) {
    return;
}
// This is your option name where all the Redux data is stored.
$opt_name = 'numberchat';
// YOU MUST CHANGE THIS.  DO NOT USE 'numberchat' IN YOUR PROJECT!!!
// Uncomment to disable demo mode.
/* Redux::disable_demo(); */
// phpcs:ignore Squiz.PHP.CommentedOutCode
$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;
/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */
// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url = Redux_Core::$url . '../sample/patterns/';
$sample_patterns = array();

if ( is_dir( $sample_patterns_path ) ) {
    $sample_patterns_dir = opendir( $sample_patterns_path );
    if ( $sample_patterns_dir ) {
        // phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
        while ( false !== ($sample_patterns_file = readdir( $sample_patterns_dir )) ) {
            
            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                $name = explode( '.', $sample_patterns_file );
                $name = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file,
                );
            }
        
        }
    }
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
    'a'      => array(
    'href' => array(),
),
    'strong' => array(),
    'br'     => array(),
    'code'   => array(),
);
/*
 * ---> BEGIN ARGUMENTS
 */
/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme();
// For use with some settings. Not necessary.
// TYPICAL -> Change these values as you need/desire.
$args = array(
    'opt_name'                  => $opt_name,
    'display_name'              => 'Number Chat',
    'display_version'           => '1.0',
    'menu_type' => 'menu',
    'page_priority' => 50,
    'allow_sub_menu'            => true,
    'menu_title'                => esc_html__( 'Number Chat', 'number-chat' ),
    'page_title'                => esc_html__( 'Number Chat', 'number-chat' ),
    'disable_google_fonts_link' => false,
    'admin_bar'                 => true,
    'admin_bar_icon'            => 'dashicons-whatsapp',
    'global_variable'           => $opt_name,
    'dev_mode'                  => false,
    'customizer'                => true,
    'open_expanded'             => false,
    'disable_save_warn'         => false,
    'page_parent'               => 'themes.php',
    'page_permissions'          => 'manage_options',
    'menu_icon'                 => 'dashicons-whatsapp',
    'last_tab'                  => '',
    'page_icon'                 => 'icon-themes',
    'page_slug'                 => $opt_name,
    'save_defaults'             => true,
    'default_show'              => false,
    'default_mark'              => '*',
    'show_import_export'        => true,
    'transient_time'            => 60 * MINUTE_IN_SECONDS,
    'output'                    => true,
    'output_tag'                => true,
    'footer_credit'             => '',
    'use_cdn'                   => true,
    'admin_theme'               => 'wp',
    'flyout_submenus'           => true,
    'font_display'              => 'swap',
    'hints'                     => array(
    'icon'          => 'el el-question-sign',
    'icon_position' => 'right',
    'icon_color'    => 'lightgray',
    'icon_size'     => 'normal',
    'tip_style'     => array(
    'color'   => 'red',
    'shadow'  => true,
    'rounded' => false,
    'style'   => '',
),
    'tip_position'  => array(
    'my' => 'top left',
    'at' => 'bottom right',
),
    'tip_effect'    => array(
    'show' => array(
    'effect'   => 'slide',
    'duration' => '500',
    'event'    => 'mouseover',
),
    'hide' => array(
    'effect'   => 'slide',
    'duration' => '500',
    'event'    => 'click mouseleave',
),
),
),
    'database'                  => '',
    'network_admin'             => true,
    'search'                    => true,
);
// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
// PLEASE CHANGE THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['admin_bar_links'][] = array(
    'id'    => 'redux-docs',
    'href'  => '//devs.redux.io/',
    'title' => __( 'Documentation', 'number-chat' ),
);
$args['admin_bar_links'][] = array(
    'id'    => 'redux-support',
    'href'  => '//github.com/ReduxFramework/redux-framework/issues',
    'title' => __( 'Support', 'number-chat' ),
);
$args['admin_bar_links'][] = array(
    'id'    => 'redux-extensions',
    'href'  => 'redux.io/extensions',
    'title' => __( 'Extensions', 'number-chat' ),
);
// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
    'url'   => '//github.com/ReduxFramework/ReduxFramework',
    'title' => 'Visit us on GitHub',
    'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
    'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
    'title' => 'Like us on Facebook',
    'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
    'url'   => '//twitter.com/reduxframework',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
    'url'   => '//www.linkedin.com/company/redux-framework',
    'title' => 'Find us on LinkedIn',
    'icon'  => 'el el-linkedin',
);
// Panel Intro text -> before the form.

if ( !isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
    
    if ( !empty($args['global_variable']) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
    
    // translators:  Panel opt_name.
    $args['intro_text'] = '<p>' . sprintf( esc_html__( 'Please update your chat features from the given options below.', 'number-chat' ), '<strong>' . $v . '</strong>' ) . '<p>';
} else {
    $args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'number-chat' ) . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'number-chat' ) . '</p>';
Redux::set_args( $opt_name, $args );
/*
 * ---> END ARGUMENTS
 */
/*
 * ---> START HELP TABS
 */
$help_tabs = array( array(
    'id'      => 'redux-help-tab-1',
    'title'   => esc_html__( 'Theme Information 1', 'number-chat' ),
    'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'number-chat' ) . '</p>',
), array(
    'id'      => 'redux-help-tab-2',
    'title'   => esc_html__( 'Theme Information 2', 'number-chat' ),
    'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'number-chat' ) . '</p>',
) );
Redux::set_help_tab( $opt_name, $help_tabs );
// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'number-chat' ) . '</p>';
Redux::set_help_sidebar( $opt_name, $content );
/*
 * <--- END HELP TABS
 */
/*
 * ---> START SECTIONS
 */
// -> START Basic Fields
Redux::set_section( $opt_name, array(
    'title'            => esc_html__( 'Chat Settings', 'number-chat' ),
    'id'               => 'basic',
    'desc'             => esc_html__( 'We can configure the chat widget from here.', 'number-chat' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-home',
) );


Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__( 'Chat Options', 'number-chat' ),
        'id'               => 'basic-text',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(

            array( 
                    'id'       => 'opt-raw',
                    'type'     => 'raw',
                    
                    'content'  => '<span class="upgrade_to_add_more">Want to add more representatives? <a href="'.nc_fs()->get_upgrade_url() .'">Upgrade Now!</a></span>'
            ),

            array(
                'id'       => 'text-example',
                'type'     => 'text',
                'title'    => esc_html__( 'Hello', 'number-chat' ),
                'default'  => esc_html__( 'Hello', 'number-chat' ),
            ),
            array(
                'id'       => 'text-example-hint',
                'type'     => 'text',
                'title'    => esc_html__( 'Click Below Text', 'number-chat' ),
                'default'  => 'Hint Title',
                'hint'     => array(
                    'title'   => 'Hint Title',
                    'content' => 'Hint content about this field!',
                ),
            ),

            array(
                'id'       => 'need_help_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Need Help Text', 'number-chat' ),
                'default'  => 'Need Help? Contact with us.',
                'hint'     => array(
                    'title'   => 'Hint Title',
                    'content' => 'Hint content about this field!',
                ),
            ),

            array(
                'id'       => 'text-exam',
                'type'     => 'text',
                'title'    => esc_html__( 'Email', 'number-chat' ),
                'default'  => 'Email',
                'hint'     => array(
                    'title'   => 'Hint Title',
                    'content' => 'Hint content about this field!',
                ),
            ),

            array(
                'id'       => 'txt-exam',
                'type'     => 'text',
                'title'    => esc_html__( 'Phone and Timings', 'number-chat' ),
                'default'  => 'Phone and Timings',
                'hint'     => array(
                    'title'   => 'Phone and Timings',
                    'content' => 'Hint content about this field!',
                ),
            ),





            array(
                'id'       => 'txt-custmer_sales',
                'type'     => 'text',
                'title'    => esc_html__( 'Representative 1 designation', 'number-chat' ),
                'desc'     => esc_html__( 'Field Description', 'number-chat' ),
                'default'  => 'Representative 1 designation',
                'hint'     => array(
                    'title'   => 'Hint Title',
                    'content' => 'Hint content about this field!',
                ),
            ),
            
            array(
                'id'       => 'txt-custmer_service_1',
                'type'     => 'text',
                'title'    => esc_html__( 'Representative 1 Name', 'number-chat' ),
                
                'desc'     => esc_html__( 'Field Description', 'number-chat' ),
                'default'  => 'John Doe',
                'hint'     => array(
                    'title'   => 'Hint Title',
                    'content' => 'Hint content about this field!',
                ),
            ),

            array(
                'id'       => 'number-custmer_service_1',
                'type'     => 'text',
                'title'    => esc_html__( 'Representative 1 Number', 'number-chat' ),
                
                'desc'     => esc_html__( 'Field Description', 'number-chat' ),
                'default'  => '001234567890',
                'hint'     => array(
                    'title'   => 'Hint Title',
                    'content' => 'Hint content about this field!',
                ),
            ),

            array(
                'id'        => 'representative_1_imageeeeee',
                'type'      => 'media',
                'url'       => true,
                'title'     => __('Representative 1 Picture', 'number-chat' ),
                'compiler'  => 'false',
                'subtitle'  => __('Upload your Picture', 'number-chat' ),
                'default'  => array('url' => plugin_dir_url( __FILE__ ) .'img/avatar1.png')
            ),

            array(
                'id'        => 'representative_1_message_text',
                'type'      => 'text',
                'url'       => true,
                'title'     => __('Representative 1 message text', 'number-chat' ),
                'compiler'  => 'false',
                'default'  => 'Hello! What can I do for you?',
            ),


            array( 
                    'id'       => 'opt-more-add',
                    'type'     => 'raw',
                    'content'  => '<span class="upgrade_to_add_more">Want to add more representatives? <a href="'.nc_fs()->get_upgrade_url() .'">Upgrade Now!</a></span>'
            ),


            // array(
            //     'id'        => 'representative_4_message_text',
            //     'type'      => 'text',
            //     'url'       => true,
            //     'title'     => __('Representative 4 message text', 'number-chat' ),
            //     'compiler'  => 'false',
            //     
            //     'default'  => '4- Hello! What can I do for you?',
            // ),

        ),
    )
);


/*
 * <--- END SECTIONS
 */
/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */
/*
 * --> Action hook examples.
 */
// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section. Can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( !function_exists( 'compiler_action' ) ) {
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field's value has changed and compiler=>true is set.
     *
     * @param array  $options        Options values.
     * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
     * @param array  $changed_values Any values changed since last save.
     */
    function compiler_action( array $options, string $css, array $changed_values )
    {
        echo  '<h1>The compiler hook has run!</h1>' ;
        echo  '<pre>' ;
        // phpcs:ignore WordPress.PHP.DevelopmentFunctions
        print_r( $changed_values );
        // Values that have changed since the last save.
        // echo '<br/>';
        // print_r($options); //Option values.
        // echo '<br/>';
        // print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS ).
        echo  '</pre>' ;
    }

}
if ( !function_exists( 'redux_validate_callback_function' ) ) {
    /**
     * Custom function for the callback validation referenced above
     *
     * @param array $field          Field array.
     * @param mixed $value          New value.
     * @param mixed $existing_value Existing value.
     *
     * @return array
     */
    function redux_validate_callback_function( array $field, $value, $existing_value ) : array
    {
        $error = false;
        $warning = false;
        // Do your validation.
        
        if ( 1 === (int) $value ) {
            $error = true;
            $value = $existing_value;
        } elseif ( 2 === (int) $value ) {
            $warning = true;
            $value = $existing_value;
        }
        
        $return['value'] = $value;
        
        if ( true === $error ) {
            $field['msg'] = 'your custom error message';
            $return['error'] = $field;
        }
        
        
        if ( true === $warning ) {
            $field['msg'] = 'your custom warning message';
            $return['warning'] = $field;
        }
        
        return $return;
    }

}
if ( !function_exists( 'dynamic_section' ) ) {
    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
     *
     * @param array $sections Section array.
     *
     * @return array
     */
    function dynamic_section( array $sections ) : array
    {
        $sections[] = array(
            'title'  => esc_html__( 'Section via hook', 'number-chat' ),
            'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'number-chat' ) . '</p>',
            'icon'   => 'el el-paper-clip',
            'fields' => array(),
        );
        return $sections;
    }

}
if ( !function_exists( 'change_arguments' ) ) {
    /**
     * Filter hook for filtering the args.
     * Good for child themes to override or add to the args array. Can also be used in other functions.
     *
     * @param array $args Global arguments array.
     *
     * @return array
     */
    function change_arguments( array $args ) : array
    {
        $args['dev_mode'] = true;
        return $args;
    }

}
if ( !function_exists( 'change_defaults' ) ) {
    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     *
     * @param array $defaults Default value array.
     *
     * @return array
     */
    function change_defaults( array $defaults ) : array
    {
        $defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'number-chat' );
        return $defaults;
    }

}
if ( !function_exists( 'redux_custom_sanitize' ) ) {
    /**
     * Function to be used if the field sanitize argument.
     * Return value MUST be the formatted or cleaned text to display.
     *
     * @param string $value Value to evaluate or clean.  Required.
     *
     * @return string
     */
    function redux_custom_sanitize( string $value ) : string
    {
        $return = '';
        foreach ( explode( ' ', $value ) as $w ) {
            foreach ( str_split( $w ) as $k => $v ) {
                
                if ( ($k + 1) % 2 !== 0 && ctype_alpha( $v ) ) {
                    $return .= mb_strtoupper( $v );
                } else {
                    $return .= $v;
                }
            
            }
            $return .= ' ';
        }
        return $return;
    }

}