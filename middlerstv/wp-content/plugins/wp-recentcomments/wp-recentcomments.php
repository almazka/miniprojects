<?php
/*
Plugin Name: WP-RecentComments
Plugin URI: http://www.neoease.com/plugins/
Plugin Description: Show the recent comments in your WordPress sidebar.
Version: 1.8.4
Author: mg12
Author URI: http://www.neoease.com/
*/

/** core functions */
include_once ('core.php');

/** l10n */
load_plugin_textdomain('wp-recentcomments', "/wp-content/plugins/wp-recentcomments/languages/");

/**
 * 打印最新评论列表
 * @param args		参数字符串
 * @param ul		是否包含 <ul> 标签, true: 包含; false: 不包含
 * @param echo		是打印还是返回, true: 打印; false: 返回
 */
function wp_recentcomments($args = '', $echo = true) {
	$html = create_recentcomments($args);

	if ($echo) {
		echo $html;
	} else {
		return $html;
	}
}

// -- widget START ------------------------------------------------------------

/**
 * 定义 Widget
 * @param args		参数字符串
 */
function wp_widget_recentcomments($args) {
	if ( '%BEG_OF_TITLE%' != $args['before_title'] ) {
		if ( $output = wp_cache_get('widget_recentcomments', 'widget') ) {
			return print($output);
		}
		ob_start();
	}

	extract($args);
	$options = get_option('widget_recentcomments');
	$title = empty($options['title']) ? __('Recent Comments', 'wp-recentcomments') : $options['title'];

	// 组合参数字符串
	$argsBinding = 'limit='				. $options['number'] 
				. '&length='			. $options['length'] 
				. '&post='				. ($options['post'] ? 'true' : 'false') 
				. '&pingback='			. ($options['pingback'] ? 'true' : 'false') 
				. '&trackback='			. ($options['trackback'] ? 'true' : 'false') 
				. '&avatar='			. ($options['avatar'] ? 'true' : 'false') 
				. '&avatar_size='		. $options['avatarsize'] 
				. '&avatar_position='	. $options['avatarposition'] 
				. '&avatar_default='	. $options['avatardefault'] 
				. '&navigator='			. ($options['navigator'] ? 'true' : 'false') 
				. '&administrator='		. ($options['administrator'] ? 'true' : 'false') 
				. '&smilies='			. ($options['smilies'] ? 'true' : 'false');

	// 页面上打印
	echo $before_widget;
	echo $before_title . $title . $after_title;
	echo '<ul>';
	wp_recentcomments($argsBinding);
	echo '</ul>';
	echo $after_widget;

	if ( '%BEG_OF_TITLE%' != $args['before_title'] ) {
		wp_cache_add('widget_recentcomments', ob_get_flush(), 'widget');
	}
}

/*
 * 清除缓存
 */
function wp_delete_recentcomments_cache() {
	wp_cache_delete( 'widget_recentcomments', 'widget' );
}
add_action( 'comment_post', 'wp_delete_recentcomments_cache' );
add_action( 'wp_set_comment_status', 'wp_delete_recentcomments_cache' );

/**
 * Widget 选项控制
 */
function wp_widget_recentcomments_control() {

	// 获取参数
	$options = $newoptions = get_option('widget_recentcomments');

	// 默认参数
	if (!is_array($options)) {
		$options['title']			= '';
		$options['number']			= 5;
		$options['length']			= 50;
		$options['post']			= true;
		$options['pingback']		= true;
		$options['trackback']		= true;
		$options['avatar']			= true;
		$options['avatarsize']		= 32;
		$options['avatarposition']	= 'left';
		$options['avatardefault']	= '';
		$options['navigator']		= true;
		$options['administrator']	= true;
		$options['smilies']			= false;
	}

	// 更新参数
	if ( $_POST["recentcomments-submit"] ) {
		$newoptions['title']			= strip_tags(stripslashes($_POST["recentcomments-title"]));
		$newoptions['number']			= (int)$_POST["recentcomments-number"];
		$newoptions['length']			= (int)$_POST["recentcomments-length"];
		$newoptions['post']				= (bool)$_POST["recentcomments-post"];
		$newoptions['pingback']			= (bool)$_POST["recentcomments-pingback"];
		$newoptions['trackback']		= (bool)$_POST["recentcomments-trackback"];
		$newoptions['avatar']			= (bool)$_POST["recentcomments-avatar"];
		$newoptions['avatarsize']		= (int)$_POST["recentcomments-avatarsize"];
		$newoptions['avatarposition']	= (string)$_POST["recentcomments-avatarposition"];
		$newoptions['avatardefault']	= strip_tags(stripslashes($_POST["recentcomments-avatardefault"]));
		$newoptions['navigator']		= (bool)$_POST["recentcomments-navigator"];
		$newoptions['administrator']	= (bool) $_POST["recentcomments-administrator"];
		$newoptions['smilies']			= (bool)$_POST["recentcomments-smilies"];

		$options = $newoptions;
		update_option('widget_recentcomments', $options);
		wp_delete_recentcomments_cache();
	}

	// 限定参数
	$title = attribute_escape($options['title']);
	if ( !$number = (int)$options['number'] ) {
		$number = 5;
	} else if ( $number < 1 ) {
		$number = 1;
	} else if ( $number > 20 ) {
		$number = 20;
	}
	if ( !$length = (int)$options['length'] ) {
		$length = 50;
	} else if ( $length < 10 ) {
		$length = 10;
	}
	if ( !$avatarsize = (int)$options['avatarsize'] ) {
		$avatarsize = 32;
	} else if ( $avatarsize < 8 ) {
		$avatarsize = 8;
	} else if ( $avatarsize > 96 ) {
		$avatarsize = 96;
	}
	$avatardefault = attribute_escape($options['avatardefault']);

	// 后台选项的显示
?>
	<p>
		<label for="recentcomments-title">
			<?php _e('Title: ', 'wp-recentcomments'); ?>
			<input class="widefat" id="recentcomments-title" name="recentcomments-title" type="text" value="<?php echo $title; ?>" />
		</label>
	</p>

	<p>
		<label for="recentcomments-number">
			<?php _e('Number of comments to show: ', 'wp-recentcomments'); ?>
			<input style="width: 25px;" id="recentcomments-number" name="recentcomments-number" type="text" value="<?php echo $number; ?>" />
		</label>
		<br />
		<small><?php _e('(at most 20)', 'wp-recentcomments'); ?></small>
	</p>

	<p>
		<label for="recentcomments-length">
			<?php _e('Length of each comment: ', 'wp-recentcomments'); ?>
			<input style="width: 25px;" id="recentcomments-length" name="recentcomments-length" type="text" value="<?php echo $length; ?>" />
		</label>
	</p>

	<p>
		<label for="recentcomments-post">
			<input name="recentcomments-post" type="checkbox" value="checkbox" <?php if($options['post']) echo "checked='checked'"; ?> />
			 <?php _e('Show post titles.', 'wp-recentcomments'); ?>
		</label>
	</p>

	<p>
		<label for="recentcomments-pingback">
			<input name="recentcomments-pingback" type="checkbox" value="checkbox" <?php if($options['pingback']) echo "checked='checked'"; ?> />
			 <?php _e('Show pingback comments.', 'wp-recentcomments'); ?>
		</label>
	</p>

	<p>
		<label for="recentcomments-trackback">
			<input name="recentcomments-trackback" type="checkbox" value="checkbox" <?php if($options['trackback']) echo "checked='checked'"; ?> />
			 <?php _e('Show trackback comments.', 'wp-recentcomments'); ?>
		</label>
	</p>

	<p>
		<label for="recentcomments-avatar">
			<input name="recentcomments-avatar" type="checkbox" value="checkbox" <?php if($options['avatar']) echo "checked='checked'"; ?> />
			 <?php _e('Show author avatars.', 'wp-recentcomments'); ?>
		</label>
	</p>

	<p>
		<label for="recentcomments-avatarsize">
			<?php _e('The size of avatars: ', 'wp-recentcomments'); ?>
			<input style="width: 25px;" id="recentcomments-avatarsize" name="recentcomments-avatarsize" type="text" value="<?php echo $avatarsize; ?>" />
		</label>
		<br />
		<small><?php _e('(8 - 96)'); ?></small>
	</p>

	<p>
		<label for="recentcomments-avatarposition">
			<?php _e('The position of avatars: ', 'wp-recentcomments'); ?>
			<select id="recentcomments-avatarposition" name="recentcomments-avatarposition" size="1">
				<option value="left" <?php if($options['avatarposition'] != 'right') echo ' selected '; ?>><?php _e('Left', 'wp-recentcomments'); ?></option>
				<option value="right" <?php if($options['avatarposition'] == 'right') echo ' selected '; ?>><?php _e('Right', 'wp-recentcomments'); ?></option>
			</select>
		</label>
	</p>

	<p>
		<label for="recentcomments-avatardefault">
			<?php _e('The default avatar: ', 'wp-recentcomments'); ?>
			<input style="width: 100px;" name="recentcomments-avatardefault" type="text" value="<?php if($avatardefault != ''){echo $avatardefault;} ?>" />
		</label>
		<br />
		<small><?php _e('(Filename from \'/wp-recentcomments/avatars/\' directory or Internet address)', 'wp-recentcomments'); ?></small>
	</p>

	<p>
		<label for="recentcomments-navigator">
			<input name="recentcomments-navigator" type="checkbox" value="checkbox" <?php if($options['navigator']) echo "checked='checked'"; ?> />
			 <?php _e('Show navigator buttons.', 'wp-recentcomments'); ?>
		</label>
	</p>

	<p>
		<label for="recentcomments-administrator">
			<input name="recentcomments-administrator" type="checkbox" value="checkbox" <?php if($options['administrator']) echo "checked='checked'"; ?> />
			 <?php _e('Show the comments from administrators.', 'wp-recentcomments'); ?>
		</label>
	</p>

	<p>
		<label for="recentcomments-smilies">
			<input name="recentcomments-smilies" type="checkbox" value="checkbox" <?php if($options['smilies']) echo "checked='checked'"; ?> />
			 <?php _e('Convert emoticons like <code>:-)</code> and <code>:-P</code> to graphics on display.', 'wp-recentcomments'); ?>
		</label>
	</p>

	<input type="hidden" id="recentcomments-submit" name="recentcomments-submit" value="1" />
<?php
}

/**
 * 初始化 Widget
 */
function wp_widgets_recentcomments_init() {
	if ( !is_blog_installed() ) {
		return;
	}

	$widget_ops = array('classname' => 'widget_recentcomments', 'description' => __("The most recent comments", 'wp-recentcomments') );
	wp_register_sidebar_widget('recentcomments', __('WP-RecentComments', 'wp-recentcomments'), 'wp_widget_recentcomments', $widget_ops);
	wp_register_widget_control('recentcomments', __('WP-RecentComments', 'wp-recentcomments'), 'wp_widget_recentcomments_control' );
}

/**
 * 执行 Widget 初始化
 */
add_action('widgets_init', 'wp_widgets_recentcomments_init');

// -- widget END ------------------------------------------------------------

// -- options START ------------------------------------------------------------

class WPRecentCommentsOptions {

	function getOptions() {
		$options = get_option('wp_recentcomments_options');
		if (!is_array($options)) {
			$options['js_type'] = 'normal';
			$options['jquery_url'] = '';
			update_option('wp_recentcomments_options', $options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['wp_recentcomments_save'])) {
			$options = WPRecentCommentsOptions::getOptions();

			$options['js_type'] = $_POST['js_type'];
			$options['jquery_url'] = stripslashes($_POST['jquery_url']);

			update_option('wp_recentcomments_options', $options);

		} else {
			WPRecentCommentsOptions::getOptions();
		}

		add_options_page(__('WP-RecentComments', 'wp-recentcomments'), __('WP-RecentComments', 'wp-recentcomments'), 10, basename(__FILE__), array('WPRecentCommentsOptions', 'display'));
	}

	function display() {
		$options = WPRecentCommentsOptions::getOptions();
?>

<form action="#" method="post" enctype="multipart/form-data" name="wp_recentcomments_form">
	<div class="wrap">
		<h2><?php _e('WP-RecentComments Options', 'wp-recentcomments'); ?></h2>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('JavaScript Library', 'wp-recentcomments'); ?></th>
					<td>
						<label style="margin-right:20px;">
							<input name="js_type" type="radio" value="normal" <?php if($options['js_type'] != 'custom_jquery' && $options['js_type'] != 'wp_jquery') echo "checked='checked'"; ?> />
							 <?php _e('Use normal JavaScript library that is supported by this plugin.', 'wp-recentcomments'); ?>
						</label>
						<br />
						<label>
							<input name="js_type" type="radio" value="wp_jquery" <?php if($options['js_type'] == 'wp_jquery') echo "checked='checked'"; ?> />
							 <?php _e('Use jQuery library that is supported by WordPress.', 'wp-recentcomments'); ?>
						</label>
						<br />
						<label>
							<input name="js_type" type="radio" value="custom_jquery" <?php if($options['js_type'] == 'custom_jquery') echo "checked='checked'"; ?> />
							 <?php _e('Custom jQuery.', 'wp-recentcomments'); ?>
						</label>
						 <label>
							<?php _e('Please input the URL of jQuery:', 'wp-recentcomments'); ?>
							 <input type="text" name="jquery_url" class="code" size="40" value="<?php echo($options['jquery_url']); ?>" />
						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<p class="submit">
			<input class="button-primary" type="submit" name="wp_recentcomments_save" value="<?php _e('Save Changes', 'wp-recentcomments'); ?>" />
		</p>
	</div>
</form>

<!-- donation -->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<div class="wrap" style="background:#E3E3E3; margin-bottom:1em;">

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Donation</th>
					<td>
						If you find my work useful and you want to encourage the development of more free resources, you can do it by donating...
						<br />
						<input type="hidden" name="cmd" value="_s-xclick" />
						<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" />
						<input style="border:none;" type="image" src="https://www.paypal.com/en_GB/i/btn/btn_donate_LG.gif" name="submit" alt="" />
						<img alt="" src="https://www.paypal.com/zh_XC/i/scr/pixel.gif" />
					</td>
				</tr>
			</tbody>
		</table>

	</div>
</form>

<?php
	}
}

add_action('admin_menu', array('WPRecentCommentsOptions', 'add'));

// -- options END ------------------------------------------------------------

// -- head START ------------------------------------------------------------

/**
 * 打印样式和脚本代码
 */
function recentcomments_head() {
	$css_url = get_bloginfo("wpurl") . '/wp-content/plugins/wp-recentcomments/css/wp-recentcomments.css';
	if ( file_exists(TEMPLATEPATH . "/wp-recentcomments.css") ){
		$css_url = get_bloginfo("template_url") . "/wp-recentcomments.css";
	}

	$options = get_option('wp_recentcomments_options');

	$script_html = '';
	if($options['js_type'] == 'normal') {
		$script_html = '<script type="text/javascript" src="' . get_bloginfo('wpurl') . '/wp-content/plugins/wp-recentcomments/js/wp-recentcomments.js"></script>';
	} else if($options['js_type'] == 'custom_jquery') {
		if($options['jquery_url'] == '') {
			$script_html = '';
		} else {
			$script_html = '<script type="text/javascript" src="' . $options['jquery_url'] . '"></script>';
		}
		$script_html .= '<script type="text/javascript" src="' . get_bloginfo('wpurl') . '/wp-content/plugins/wp-recentcomments/js/wp-recentcomments-jquery.js"></script>';
	} else {
		$script_html = '<script type="text/javascript" src="' . get_bloginfo('wpurl') . '/wp-content/plugins/wp-recentcomments/js/wp-recentcomments-jquery.js"></script>';
	}

	echo "\n" . '<link rel="stylesheet" href="' . $css_url . '" type="text/css" media="screen" />' . $script_html;
}
add_action('wp_head', 'recentcomments_head');

function add_wp_jquery() {
	wp_enqueue_script('jquery');
}
$options = get_option('wp_recentcomments_options');
if($options['js_type'] == 'wp_jquery') {
	add_action ('wp_print_scripts', 'add_wp_jquery');
}

// -- head END ------------------------------------------------------------
?>
