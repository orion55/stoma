<?php
/**
 * stoma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package stoma
 */

if ( ! function_exists( 'stoma_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function stoma_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on stoma, use a find and replace
		 * to change 'stoma' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'stoma', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'    => esc_html__( 'Верхнее меню', 'stoma' ),
			'in_footer' => 'Меню в подвале'
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'stoma_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_filter( 'show_admin_bar', '__return_false' );
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
	}
endif;
add_action( 'after_setup_theme', 'stoma_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stoma_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stoma_content_width', 640 );
}

add_action( 'after_setup_theme', 'stoma_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stoma_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stoma' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'stoma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'stoma_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stoma_scripts() {
	wp_enqueue_style( 'stoma-style', get_stylesheet_uri() );
	wp_enqueue_style( 'stoma-style-main', get_template_directory_uri() . '/assets/css/main.min.css' );
	wp_enqueue_style( 'stoma-style-vendor', get_template_directory_uri() . '/assets/css/vendor.min.css' );

	wp_enqueue_script( 'stoma-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'stoma-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'stoma-main', get_template_directory_uri() . '/assets/js/main.min.js', array( 'jquery' ), '20171028', true );
}

add_action( 'wp_enqueue_scripts', 'stoma_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class Stoma {
	private $stoma_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'stoma_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'stoma_page_init' ) );
	}

	public function stoma_add_plugin_page() {
		add_menu_page(
			'Stoma', // page_title
			'Stoma', // menu_title
			'manage_options', // capability
			'stoma', // menu_slug
			array( $this, 'stoma_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			81 // position
		);
	}

	public function stoma_create_admin_page() {
		$this->stoma_options = get_option( 'stoma_option_name' ); ?>

        <div class="wrap">
            <h2>Тема "Стоматология"</h2>
            <p></p>
			<?php settings_errors(); ?>

            <form method="post" action="options.php">
				<?php
				settings_fields( 'stoma_option_group' );
				do_settings_sections( 'stoma-admin' );
				submit_button();
				?>
            </form>
        </div>
	<?php }

	public function stoma_page_init() {
		register_setting(
			'stoma_option_group', // option_group
			'stoma_option_name', // option_name
			array( $this, 'stoma_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'stoma_setting_section', // id
			'Настройки', // title
			array( $this, 'stoma_section_info' ), // callback
			'stoma-admin' // page
		);

		add_settings_field(
			'name_0', // id
			'Наименование', // title
			array( $this, 'name_0_callback' ), // callback
			'stoma-admin', // page
			'stoma_setting_section' // section
		);

		add_settings_field(
			'address1_1', // id
			'Адрес1', // title
			array( $this, 'address1_1_callback' ), // callback
			'stoma-admin', // page
			'stoma_setting_section' // section
		);

		add_settings_field(
			'address2_2', // id
			'Адрес2', // title
			array( $this, 'address2_2_callback' ), // callback
			'stoma-admin', // page
			'stoma_setting_section' // section
		);

		add_settings_field(
			'phone1_3', // id
			'Телефон1', // title
			array( $this, 'phone1_3_callback' ), // callback
			'stoma-admin', // page
			'stoma_setting_section' // section
		);

		add_settings_field(
			'phone2_4', // id
			'Телефон2', // title
			array( $this, 'phone2_4_callback' ), // callback
			'stoma-admin', // page
			'stoma_setting_section' // section
		);
	}

	public function stoma_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['name_0'] ) ) {
			$sanitary_values['name_0'] = sanitize_text_field( $input['name_0'] );
		}

		if ( isset( $input['address1_1'] ) ) {
			$sanitary_values['address1_1'] = sanitize_text_field( $input['address1_1'] );
		}

		if ( isset( $input['address2_2'] ) ) {
			$sanitary_values['address2_2'] = sanitize_text_field( $input['address2_2'] );
		}

		if ( isset( $input['phone1_3'] ) ) {
			$sanitary_values['phone1_3'] = sanitize_text_field( $input['phone1_3'] );
		}

		if ( isset( $input['phone2_4'] ) ) {
			$sanitary_values['phone2_4'] = sanitize_text_field( $input['phone2_4'] );
		}

		return $sanitary_values;
	}

	public function stoma_section_info() {

	}

	public function name_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="stoma_option_name[name_0]" id="name_0" value="%s">',
			isset( $this->stoma_options['name_0'] ) ? esc_attr( $this->stoma_options['name_0']) : ''
		);
	}

	public function address1_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="stoma_option_name[address1_1]" id="address1_1" value="%s">',
			isset( $this->stoma_options['address1_1'] ) ? esc_attr( $this->stoma_options['address1_1']) : ''
		);
	}

	public function address2_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="stoma_option_name[address2_2]" id="address2_2" value="%s">',
			isset( $this->stoma_options['address2_2'] ) ? esc_attr( $this->stoma_options['address2_2']) : ''
		);
	}

	public function phone1_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="stoma_option_name[phone1_3]" id="phone1_3" value="%s">',
			isset( $this->stoma_options['phone1_3'] ) ? esc_attr( $this->stoma_options['phone1_3']) : ''
		);
	}

	public function phone2_4_callback() {
		printf(
			'<input class="regular-text" type="text" name="stoma_option_name[phone2_4]" id="phone2_4" value="%s">',
			isset( $this->stoma_options['phone2_4'] ) ? esc_attr( $this->stoma_options['phone2_4']) : ''
		);
	}

}
if ( is_admin() )
	$stoma = new Stoma();

/*
 * Retrieve this value with:
 * $stoma_options = get_option( 'stoma_option_name' ); // Array of All Options
 * $name_0 = $stoma_options['name_0']; // Name
 * $address1_1 = $stoma_options['address1_1']; // Address1
 * $address2_2 = $stoma_options['address2_2']; // Address2
 * $phone1_3 = $stoma_options['phone1_3']; // Phone1
 * $phone2_4 = $stoma_options['phone2_4']; // Phone2
 */
