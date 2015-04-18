<?php

// проверка на наличие корня сайта
if (!defined('ABSPATH')) exit;

class gdbbPressTools {
    private $wp_version;
    private $plugin_path;
    private $plugin_url;

    public $l;
    public $o;

    public $is_search = false;

    public $mod = array('a' => null, 'i' => null, 's' => null, 'q' => null, 't' => null, 'v' => null);

    function __construct() {
        $this->_init(); // выполняем функцию _init(), которая в gd-bbpress-tools кладет массив определенных значений

        add_action('bbp_init', array($this, 'load_modules'), 1); // кладем в экшен bbp_init массив с приоритетом 1
        add_action('bbp_init', array($this, 'init_modules'), 2);
        add_action('bbp_init', array($this, 'load_plugin'), 3);

        add_action('bbp_init', array($this, 'hook_modules'));
    }

    private function _init() {
        global $wp_version; // заводим глобальную переменную
        $this->wp_version = substr(str_replace('.', '', $wp_version), 0, 2); // берем $wp_version, заменяем в ней точку на пустоту и выдергиваем из этой строки первые два символа, записываем это в переменную $this->wp_version
        define('GDBBPRESSTOOLS_WPV', intval($this->wp_version)); // создаем константу и в нее записываем содержимое this->wp_version, которое приводим к интенжеру

        $gdd = new gdbbPressTools_Defaults(); // создаем новый объект и экз класса кладем в переменную gdd

        $this->o = get_option('gd-bbpress-tools'); // значение опции gd-bbpress-tools из кэша или бд заносим в переменную $this->o
        if (!is_array($this->o)) { // если там не массив, то
            $this->o = $gdd->default_options; // в переменную $this->o кладем массив default_options, который прописан в объекте gdbbPressTools_Defaults
            update_option('gd-bbpress-tools', $this->o); // берем опцию gd-bbpress-tools и в ее значение записываем массив из $this->o
        }

        if (!isset($this->o['build']) || $this->o['build'] != $gdd->default_options['build']) { // если не существует $this->o['build'] или оно не равно $gdd->default_options['build'], то берем $this->o и 
            $this->o = $this->_upgrade($this->o, $gdd->default_options); // с помощью функции _upgrade заменяем все, что внутри $this->o на $gdd->default_options

            $this->o['version'] = $gdd->default_options['version']; // вручную практически вписываем все данные
            $this->o['date'] = $gdd->default_options['date'];
            $this->o['status'] = $gdd->default_options['status'];
            $this->o['build'] = $gdd->default_options['build'];
            $this->o['revision'] = $gdd->default_options['revision'];
            $this->o['edition'] = $gdd->default_options['edition'];

            update_option('gd-bbpress-tools', $this->o); // и еще раз берем опцию gd-bbpress-tools и в ее значение записываем массив из $this->o
        }

        define('GDBBPRESSTOOLS_INSTALLED', $gdd->default_options['version'].' Free'); // константы прописываем
        define('GDBBPRESSTOOLS_VERSION', $gdd->default_options['version'].'_b'.($gdd->default_options['build'].'_free'));

        $this->plugin_path = dirname(dirname(dirname(__FILE__))).'/'; // в переменную plugin_path кладем путь к данному файлу со слешем
        $this->plugin_url = plugins_url('/gd-bbpress-tools/'); 

        define('GDBBPRESSTOOLS_URL', $this->plugin_url); // в константы это записываем
        define('GDBBPRESSTOOLS_PATH', $this->plugin_path);
    }
// старое заменяет на новое, старый массив на новый массив
    private function _upgrade($old, $new) {
        foreach ($new as $key => $value) { // берем переданное $new и форичем раскладываем
            if (!isset($old[$key])) $old[$key] = $value; // если не существует в первом аргументе ячейки с key, то присваиваем ему значения из new
        }

        $unset = array(); // пустой массив создаем
        foreach ($old as $key => $value) { // раскладываем old 
            if (!isset($new[$key])) $unset[] = $key; // если не существует нового с ячейками с именами старого, то заполняем ансет ключами из старого
        }

        foreach ($unset as $key) { // раскладываем unset
            unset($old[$key]); // удаляем $old[$key]
        }

        return $old; // возвращаем олд
    }

    public function load_modules() {
        if (!function_exists('bbp_version')) {
            return;
        }

        if (function_exists('bbp_is_search')) {
            $this->is_search = bbp_is_search();
        }

        if (is_admin()) {
            if ($this->o['admin_disable_active'] == 1 && !d4p_bbp_is_role('admin_disable')) {
                require_once(GDBBPRESSTOOLS_PATH.'code/mods/access.php');

                $this->mod['a'] = new gdbbMod_Access();
            }
        } else {
            // запуск класса с описанием цитирования при условии, что в $o есть включенная опция цитирования
            if ($this->o['quote_active'] == 1 && d4p_bbp_is_role('quote') && !$this->is_search) {
                require_once(GDBBPRESSTOOLS_PATH.'code/mods/quote.php');

                $this->mod['q'] = new gdbbMod_Quote(
                        $this->o['quote_location'], 
                        $this->o['quote_method']);
            }
        }

        if ($this->o['signature_active'] == 1) {
            require_once(GDBBPRESSTOOLS_PATH.'code/mods/signature.php');

            $this->mod['i'] = new gdbbMod_Signature(
                    $this->o['signature_length'], 
                    d4p_bbp_is_role('signature_enhanced'),
                    $this->o['signature_method'],
                    $this->o['signature_buddypress_profile_group']);
            $this->mod['i']->active = d4p_bbp_is_role('signature');
        }

        if ($this->o['bbcodes_active'] == 1) {
            require_once(GDBBPRESSTOOLS_PATH.'code/mods/bbcodes.php');

            $this->mod['s'] = new gdbbMod_Shortcodes(
                    $this->o['bbcodes_bbpress_only'] == 1, 
                    !d4p_bbp_is_role('bbcodes_special'),
                    'info',
                    $this->o['bbcodes_deactivated'],
                    $this->o['bbcodes_notice'] == 1);
        }

        if (GDBBPRESSTOOLS_WPV > 32 && $this->o['toolbar_active'] == 1 && d4p_bbp_is_role('toolbar')) {
            require_once(GDBBPRESSTOOLS_PATH.'code/mods/toolbar.php');

            $this->mod['t'] = new gdbbMod_Toolbar();
        }

        $views = array();
        $active = false;
        foreach ($this->o as $key => $val) {
            if (substr($key, 0, 5) == 'view_') {
                $parts = explode('_', $key, 3);
                $views[$parts[1]][$parts[2]] = $val;

                if (!$active && $parts[2] == 'active' && $val == 1) {
                    $active = true;
                }
            }
        }

        if ($active) {
            require_once(GDBBPRESSTOOLS_PATH.'code/mods/views.php');

            $this->mod['s'] = new gdbbMod_Views(
                    $views);
        }
    }

    public function init_modules() {
        do_action('bbtoolbox_init');
    }

    public function hook_modules() {
        do_action('bbtoolbox_core');
    }

    public function load_plugin() {
        if (!function_exists('bbp_version')) {
            return;
        }

        $this->l = get_locale();

        if(!empty($this->l)) {
            load_plugin_textdomain('gd-bbpress-tools', false, 'gd-bbpress-tools/languages');
        }

        if (is_admin()) {
            require_once(GDBBPRESSTOOLS_PATH.'code/admin.php');
        } else {
            require_once(GDBBPRESSTOOLS_PATH.'code/tools/front.php');
        }
    }
}

global $gdbbpress_tools;
$gdbbpress_tools = new gdbbPressTools();

?>