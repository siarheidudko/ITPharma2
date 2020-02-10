<?php
/**
 * Основная тема для сайта itpharma.by
 *
 * @package ITPharma2
 * @subpackage ITPharma2
 * @since 1.0
 * @version 1.0
 * @author Siarhei Dudko
 * @license MIT
 * @page хуки в ядро
 */

function itpharma2_wptuts_scripts_basic()  
{  
	wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery-3.4.0.min.js', '', '3.4.0' );  
    wp_enqueue_script( 'jquery' );
	
	wp_register_script( 'bootstrapminjs', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', '', '4.3.1' );  
    wp_enqueue_script( 'bootstrapminjs' );
	
	wp_register_style( 'bootstrapmincss', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', '', '4.3.1' );  
    wp_enqueue_style( 'bootstrapmincss' );
	
	wp_register_style( 'bootstrap-gridmincss', get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css', '', '4.3.1' );  
    wp_enqueue_style( 'bootstrap-gridmincss' );
	
	wp_register_style( 'bootstrap-rebootmincss', get_stylesheet_directory_uri() . '/css/bootstrap-reboot.min.css', '', '4.3.1' );  
    wp_enqueue_style( 'bootstrap-rebootmincss' );
}  
add_action( 'wp_enqueue_scripts', 'itpharma2_wptuts_scripts_basic' );

function itpharma2_delete_junk_from_header() {
    remove_action( 'wp_head', 'feed_links', 2 ); // Удаляет ссылки RSS-лент записи и комментариев
    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Удаляет ссылки RSS-лент категорий и архивов
    
    remove_action( 'wp_head', 'rsd_link' ); // Удаляет RSD ссылку для удаленной публикации
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Удаляет ссылку Windows для Live Writer
    
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0); // Удаляет короткую ссылку
    remove_action( 'wp_head', 'wp_generator' ); // Удаляет информацию о версии WordPress
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Удаляет ссылки на предыдущую и следующую статьи
    
    // отключение WordPress REST API
    remove_action( 'wp_head', 'rest_output_link_wp_head' ); 
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}
add_filter( 'after_setup_theme', 'itpharma2_delete_junk_from_header' );

function itpharma2_theme_support() {
	//добавляю кастомный лого
	add_theme_support( 'custom-logo', [
		'height'      => 35,
		'width'       => 126,
		'flex-width'  => false,
		'flex-height' => false,
		'header-text' => 'ITPharma',
	] );
	//добавляю кастомный фон
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => 'repeat', // повторять
		'default-position-x'     => 'left', // выровнять по левому краю
		'default-attachment'     => 'fixed', // фон прокручивается со страницей
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
	//добавляю поддержку миниатюр записей
	add_theme_support( 'post-thumbnails' );
	//обрезаю миниатюры
	set_post_thumbnail_size( 380, 301, true );
	//добавляю меню
	register_nav_menu( 'primary', 'Меню в шапке' );
	register_nav_menu( 'secondary', 'Меню в подвале' );
}
add_filter( 'after_setup_theme', 'itpharma2_theme_support' );

//добавляю настройки кастомайзера темы
function itpharma2_customize_register($wp_customize) {
	//имя секции настроек
	$wp_customize->add_section( 'itpharma2_customizer' , array(
		'title'      => __('Настройка темы','itpharma2'),
		'priority'   => 30,
	));
	//цвет фона за пределами страницы
	$wp_customize->add_setting( 'itpharma2_page_background' , array(
		'default' => '#616161',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	//контроллер цвета фона за пределами страницы
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'itpharma2_page_background_', 
		array(
			'label'      => __( 'Цвет фона страницы (за пределами сайта)', 'itpharma2' ),
			'section'    => 'itpharma2_customizer',
			'settings'   => 'itpharma2_page_background',
			'priority'   => 1
		)
	));
	//стиль текста шапки и подвала
	$wp_customize->add_setting( 'itpharma2_header_footer_textstyle' , array(
		'default' => 'light',
	));
	//контроллер стиля текста шапки и подвала
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_header_footer_textstyle_', 
		array(
			'label'    => __( 'Стиль текста шапки и подвала', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_header_footer_textstyle',
			'type'     => 'radio',
			'choices'  => array(
				'dark'  => 'Темный текст',
				'light' => 'Светлый текст',
			),
		)
	));
	//цвет фона шапки и подвала
	$wp_customize->add_setting( 'itpharma2_header_footer_background' , array(
		'default' => '#0D3445',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	//контроллер цвета фона шапки и подвала
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'itpharma2_header_footer_background_', 
		array(
			'label'      => __( 'Цвет фона шапки и подвала', 'itpharma2' ),
			'section'    => 'itpharma2_customizer',
			'settings'   => 'itpharma2_header_footer_background',
			'priority'   => 1
		)
	));
	//логотип в подвале
	$wp_customize->add_setting( 'itpharma2_footer_logo' , array(
		'default' => '',
	));
	//контроллер логотипа в подвале
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			'itpharma2_footer_logo_',
			array(
				'label'      => __( 'Логотип в подвале', 'itpharma2' ),
				'section'    => 'itpharma2_customizer',
				'settings'   => 'itpharma2_footer_logo',
				'height' => 42,
				'width' => 151,
				'flex_width ' => false,
				'flex_height ' => false,
				'priority' => 1
			)
       )
	);
	//емайл в подвале
	$wp_customize->add_setting( 'itpharma2_footer_email' , array(
		'default' => 'info@itpharma.by',
	));
	//контроллер емайла в подвале
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_footer_email_', 
		array(
			'label'    => __( 'Email-адрес в подвале', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_footer_email',
			'type'     => 'text',
		)
	));
	//телефон в подвале
	$wp_customize->add_setting( 'itpharma2_footer_tel' , array(
		'default' => '+375 (17) 269-88-34',
	));
	//контроллер телефона в подвале
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_footer_tel_', 
		array(
			'label'    => __( 'Телефон в подвале', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_footer_tel',
			'type'     => 'text',
		)
	));
	//фейсбук в подвале
	$wp_customize->add_setting( 'itpharma2_footer_facebook' , array(
		'default' => '',
	));
	//контроллер фейсбука в подвале
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_footer_facebook_', 
		array(
			'label'    => __( 'Cсылка на facebook в подвале', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_footer_facebook',
			'type'     => 'url',
		)
	));
	//линкедин в подвале
	$wp_customize->add_setting( 'itpharma2_footer_linkedin' , array(
		'default' => '',
	));
	//контроллер линкедина в подвале
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_footer_linkedin_', 
		array(
			'label'    => __( 'Cсылка на linkedin в подвале', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_footer_linkedin',
			'type'     => 'url',
		)
	));
	//скайп в подвале
	$wp_customize->add_setting( 'itpharma2_footer_skype' , array(
		'default' => '',
	));
	//контроллер скайпа в подвале
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_footer_skype_', 
		array(
			'label'    => __( 'Cсылка на скайп в подвале', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_footer_skype',
			'type'     => 'text',
		)
	));
	//телефон (факс) на странице связаться с нами
	$wp_customize->add_setting( 'itpharma2_contacts_tel' , array(
		'default' => '+375 (17) 269-88-30',
	));
	//контроллер телефона (факса) на странице связаться с нами
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_contacts_tel_', 
		array(
			'label'    => __( 'Факс на странице связаться с нами', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_contacts_tel',
			'type'     => 'text',
		)
	));
	//адрес на странице связаться с нами
	$wp_customize->add_setting( 'itpharma2_contacts_address' , array(
		'default' => 'Минск,пр. Независимости, д.177, офис 62',
	));
	//контроллер адреса на странице связаться с нами
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_contacts_address_', 
		array(
			'label'    => __( 'Адресс на странице связаться с нами', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_contacts_address',
			'type'     => 'text',
		)
	));
	//код внутри блока <HEAD></HEAD>
	$wp_customize->add_setting( 'itpharma2_head_code' , array(
		'default' => '',
	));
	//контроллер кода внутри блока <HEAD></HEAD>
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_head_code_', 
		array(
			'label'    => __( 'HTML-код внутри блока <HEAD></HEAD>', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_head_code',
			'type'     => 'textarea',
		)
	));
	//код в шапке
	$wp_customize->add_setting( 'itpharma2_header_code' , array(
		'default' => '',
	));
	//контроллер кода в шапке
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_header_code_', 
		array(
			'label'    => __( 'HTML-код в шапке (над меню, сразу после <BODY>)', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_header_code',
			'type'     => 'textarea',
		)
	));
	//код в подвале
	$wp_customize->add_setting( 'itpharma2_footer_code' , array(
		'default' => '',
	));
	//контроллер кода в подвале
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'itpharma2_footer_code_', 
		array(
			'label'    => __( 'HTML-код в подвале (перед </BODY>)', 'itpharma2' ),
			'section'  => 'itpharma2_customizer',
			'settings' => 'itpharma2_footer_code',
			'type'     => 'textarea',
		)
	));
}
add_action( 'customize_register', 'itpharma2_customize_register' );