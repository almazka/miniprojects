<?php 
	
	/**
	* All general styles & scripts
	**/

	function load_style_script() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap_min', get_template_directory_uri() . '/js/bootstrap.min.js');
		wp_enqueue_style('style',  get_template_directory_uri() . '/style.css');
		wp_enqueue_style('bootstrap_style',  get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('bxslider',  get_template_directory_uri() . '/css/jquery.bxslider.css');
		wp_enqueue_style('bxslider',  get_template_directory_uri() . '/css/jquery.formstyler.css');
		
	}
	add_action('wp_enqueue_scripts', 'load_style_script');

	register_sidebar(array(
		'name' => 'Menu',
		'id' => 'menu_header',
		'before_widget' => '',
		'after_widget' => ''
		));
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(256,200);

	function new_excerpt_length($length) {   
	return 10;   
	}   
	add_filter('excerpt_length', 'new_excerpt_length');

	register_sidebar(array(
	'name'=>'sidebar-bottom',
	'id' => 'sidebar-bottom',
	));

	register_sidebar(array(
	'name'=>'menu-register',
	'id' => 'menu-register',
	));

	register_sidebar(array(
	'name'=>'slider-text',
	'id' => 'slider-text',
	));

	register_sidebar(array(
	'name'=>'slider-text2',
	'id' => 'slider-text2',
	));
	register_sidebar(array(
	'name'=>'footer-menu',
	'id' => 'footer-menu',
	));
	register_sidebar(array(
	'name'=>'footer-menu2',
	'id' => 'footer-menu2',
	));
	
	add_action('init', 'translations');
	function translations(){
		$labels = array(
			 'name' => 'Название видео' // основное название для типа записи
			,'singular_name' => 'Лечшее видео' // название для одной записи этого типа
			,'add_new' => 'Добавить новое видео' // для добавления новой записи
			,'add_new_item' => 'Добавление видео (миниатюра к этому видео должна быть (560x315)px) !!! ' // заголовка у вновь создаваемой записи в админ-панели.
			,'edit_item' => 'Редактировать запись с видео' // для редактирования типа записи
			,'new_item' => '' // текст новой записи
			,'view_item' => '' // для просмотра записи этого типа.
			,'search_items' => '' // для поиска по этим типам записи
			,'not_found' => 'Нет ни одной записи по вашему запросу' // если в результате поиска ничего не было найдень
			,'not_found_in_trash' => '' // если не было найдено в корзине
			,'parent_item_colon' => '' // для родительских типов. для древовидных типов
			,'menu_name' => 'Лучшие видео' // название меню
		);
		$args = array(
			 'label' => null 
			,'labels' => $labels 
			,'description' => '' 
			,'public' => true 
			,'publicly_queryable' => true
			,'exclude_from_search' => null
			,'show_ui' => true
			,'show_in_menu' => true 
			,'menu_position' => null 
			,'menu_icon' => null 
			,'capability_type' => 'post' 
			,'hierarchical' => false
			,'supports' => array('title','editor', 'thumbnail')
			,'taxonomies' => array('')
			,'has_archive' => true
			,'rewrite' => true
			,'query_var' => true
			,'show_in_nav_menus' => null
		);
		register_post_type( 'video', $args );
	}

	if (current_user_can('streamer')) {  // замените роль 'author' на другую по вашему выбору
	  if (is_admin()) {
	 
	    function limit_categories_for_role($exclusions) {
	 
	      $cats_to_exclude = array(1, 6);  // вставьте сюда идентификаторы блокируемых категорий
	      foreach ($cats_to_exclude as $cat_id) {
	        $exclusions .= " AND (t.term_id<>$cat_id)";
	      }
	 
	      return $exclusions;
	    }
	 
	    add_filter('list_terms_exclusions', 'limit_categories_for_role');
	  }
	}

	function the_field666( $field_name, $post_id = false ) {
	
		$value = get_field($field_name, $post_id);
		
		if( is_array($value) )
		{
			$value = @implode(', ',$value);
		}
		
		return $value;
	}
	

?>