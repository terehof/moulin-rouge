<?
/***
 *  downloadable styles and scripts
 **/
function load_style_script () {
    wp_enqueue_script('jquery-1.11.2.min' , get_template_directory_uri() . '/js/jquery-1.11.2.min.js');
    wp_enqueue_script('bootstrap.min' , get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('select2.min' , get_template_directory_uri() . '/js/select2.min.js');
    wp_enqueue_script('jquery.fancybox.pack' , get_template_directory_uri() . '/js/jquery.fancybox.pack.js');
    wp_enqueue_script('main' , get_template_directory_uri() . '/js/main.js');
//	wp_enqueue_style('select2', get_template_directory_uri() . '/css/select2.css');
//	wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
//    wp_enqueue_style('jquery.fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css');
//    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
}
/***
 * load styles and scripts
 **/
add_action('wp_enqueue_scripts', 'load_style_script');

/***
 * анкеты
 **/
add_action('init', 'profile');
function profile() {
    add_theme_support( 'post-thumbnails' );
    register_post_type('profile', array(
        'public' => true,
        'supports' => array('title', 'editor'),
        'labels' => array(
            'name' => 'Анкеты',
            'all_items' => 'Все анкеты',
            'singular_name' => 'анкета',
            'add_new' => 'Добавить анкету',
            'add_new_item' => 'Добавление новой анкеты',
            'not_found' => 'Анкет нет.'
        ),
        'menu_icon' => 'dashicons-media-text',
        'menu_position' => 22,
        'taxonomies' => array(
            'service',
            'location'
        )
    ));
}

/****
 **  услуги
 ****/
add_action('init', 'create_service_taxonomy');
function create_service_taxonomy(){
    // заголовки
    $labels = array(
        'name'              => 'Услуги',
        'singular_name'     => 'услуга',
        'search_items'      => 'Поиск услуг',
        'all_items'         => 'Все услуги',
        'edit_item'         => 'Редактирование услуги',
        'add_new_item'      => 'Добавить услугу',
        'menu_name'         => 'Услуги',
    );
    // параметры
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy('service', array('profile'), $args );
}

/****
 **  районы
 ****/
add_action('init', 'create_location_taxonomy');
function create_location_taxonomy(){
    // заголовки
    $labels = array(
        'name'              => 'Районы',
        'singular_name'     => 'район',
        'search_items'      => 'Поиск районов',
        'all_items'         => 'Все районы',
        'edit_item'         => 'Редактирование района',
        'add_new_item'      => 'Добавить район',
        'menu_name'         => 'Районы',
    );
    // параметры
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy('location', array('profile'), $args );
}




?>