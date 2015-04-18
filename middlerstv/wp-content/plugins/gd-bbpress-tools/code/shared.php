<?php

// проверка существования корня сайта, если нет - то выход
if (!defined('ABSPATH')) exit;

// описание класса gdbbp_Error для записи ошибок в массив
if (!class_exists('gdbbp_Error')) {
    class gdbbp_Error {
        var $errors = array();

        function __construct() { }

        function add($code, $message, $data) {
            $this->errors[$code][] = array($message, $data);
        }
    }
}

// описание класса, который возвращает роли пользователей d4p_bbpress_get_user_roles если его нет
if (!function_exists('d4p_bbpress_get_user_roles')) {
    /**
     * Get valid roles for forums based on bbPress version
     *
     * @return array list of roles возвращает список ролей массивом
    */
    function d4p_bbpress_get_user_roles() {
        $roles = array();

        if (d4p_bbpress_version() < 22) {
            global $wp_roles;

            foreach ($wp_roles->role_names as $role => $title) {
                $roles[$role] = $title;
            }
        } else {
            $dynamic_roles = bbp_get_dynamic_roles();

            foreach ($dynamic_roles as $role => $obj) {
                $roles[$role] = $obj['name'];
            }
        }

        return $roles;
    }
}
// описание класса d4p_has_bbpress если его нет. Тут версия возвращается или фолс
if (!function_exists('d4p_has_bbpress')) {
    function d4p_has_bbpress() {
        if (function_exists('bbp_version')) {
            $version = bbp_get_version();
            $version = intval(substr(str_replace('.', '', $version), 0, 2));

            return $version > 22;
        } else {
            return false;
        }
    }
}
// 
if (!function_exists('d4p_bbpress_version')) {
    /**
     * Get version of the bbPress.
     *
     * @param string $ret what version format to return: code or version
     * @return mixed version value
    */
    function d4p_bbpress_version($ret = 'code') { // вернуть нулл, если предыдущая функция d4p_has_bbpress возвращает фолс
        if (!d4p_has_bbpress()) {
            return null;
        }

        $version = bbp_get_version(); // иначе просто вернуть версию из функции bbp_get_version

        if (isset($version)) {
            if ($ret == 'code') {
                return substr(str_replace('.', '', $version), 0, 2);
            } else {
                return $version;
            }
        }

        return null;
    }
}
// объявляем функцию d4p_is_bbpress 
if (!function_exists('d4p_is_bbpress')) {
    /**
    * Check if the current page is forum, topic or other bbPress page.
    *
    * @return bool true if the current page is the forum related
    */
    function d4p_is_bbpress() {
        $is = d4p_has_bbpress() ? is_bbpress() : false; // если d4p_has_bbpress тру (которая версию возвращает), то вызываем is_bbpress и присваиваем что она вернет переменной ис, если фолс, то присваиваем переменной ис фолс

        return apply_filters('d4p_is_bbpress', $is); // пропустить через фильтр d4p_is_bbpress и передаем значение переменной $is
    }
}
// функция d4p_is_user_moderator возвращает тру лил фолс - модератор ли пользователь или нет
if (!function_exists('d4p_is_user_moderator')) {
    /**
    * Checks to see if the currently logged user is moderator.
    *
    * @return bool is user moderator or not
    */
    function d4p_is_user_moderator() {
        global $current_user; // обращаемся к глобальной переменной

        if (is_array($current_user->roles)) {
            return in_array('bbp_moderator', $current_user->roles);
        } else {
            return false;
        }
    }
}
// по аналогии с предыдущей функцией, админ ли пользователь
if (!function_exists('d4p_is_user_admin')) {
    /**
    * Checks to see if the currently logged user is administrator.
    *
    * @return bool is user administrator or not
    */
    function d4p_is_user_admin() {
        global $current_user;

        if (is_array($current_user->roles)) {
            return in_array('administrator', $current_user->roles);
        } else {
            return false;
        }
    }
}
// объявляем функцию, которая вроде как роль возвращает
if (!function_exists('d4p_bbp_is_role')) {
    function d4p_bbp_is_role($setting_name) {
        global $gdbbpress_tools; // объявили глобальную переменную gdbbpress_tools
        $allowed = false; // алловед, который вначале фолс

        if (current_user_can('d4p_bbpt_'.$setting_name)) { // проверка, есть ли право у юзера на то, что в setting_name делать
            $allowed = true; // тогда тру
        } else if (is_super_admin()) {
            $allowed = $gdbbpress_tools->o[$setting_name.'_super_admin'] == 1;
        } else if (is_user_logged_in()) {
            $roles = isset($gdbbpress_tools->o[$setting_name.'_roles']) ? $gdbbpress_tools->o[$setting_name.'_roles'] : null;

            if (is_null($roles)) {
                $allowed = true;
            } else if (is_array($roles)) {
                global $current_user;

                if (is_array($current_user->roles)) {
                    $matched = array_intersect($current_user->roles, $roles);
                    $allowed = !empty($matched);
                }
            }
        }

        return $allowed;
    }
}

function d4p_bbt_o($name) {
    global $gdbbpress_tools;
    return $gdbbpress_tools->o[$name];
}

?>