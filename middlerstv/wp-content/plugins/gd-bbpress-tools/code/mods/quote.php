<?php

// проверка существования константы ABSPATH. Если нет ее, то выход сразу. Ее существование зависит от существования корня сайта. Константа WordPress, в которой находится путь к той же директории, где у вас лежит файл wp-config.php, обычно это корень сайта.
if (!defined('ABSPATH')) exit;

class gdbbMod_Quote {
    private $header = false; // переменная, которая или тру или фолс

    private $location = 'header';
    private $method = 'quote';

    function __construct($location, $method) { // подставляем переданные параметры в переменные локэйшн и метод
        $this->location = $location;
        $this->method = $method;

        $this->add_content_filters(); // вызов функции, которая объявляет фильтры
    }

    private function _quote() {
        $id = bbp_get_reply_id(); // объявляем id, в который возвращается результат функции bbp_get_reply_id, которая описана в плагине bbpress и возвращает id поста, число

        $is_reply = true; // проверка на существование поста, по умолчанию тру
        if ($id == 0) { // если функция вернет 0, то 
            $is_reply = false;
            $id = bbp_get_topic_id(); // тогда id принимает значение номера топика, который возвращает функция bbp_get_topic_id
        }
/*
Как выглядит функция bbp_get_topic_id
function bbp_get_topic_id( $topic_id = 0 ) { // по-умолчанию топик айли = 0
        global $wp_query; // объявляем глобальную wp_query

        $bbp = bbpress(); // в переменную кладется результат функции bbpress, которая возвращает результат функции instance, которая возвращает экземпляр запущенного класса bbPress, который, как я поняла, имеет там много чего

        // Easy empty checking
        if ( !empty( $topic_id ) && is_numeric( $topic_id ) ) { // если topic_id не пустой и это цифра, то присваиваем этот номер переменной $bbp_topic_id
            $bbp_topic_id = $topic_id;

        // Currently inside a topic loop
        } elseif ( !empty( $bbp->topic_query->in_the_loop ) && isset( $bbp->topic_query->post->ID ) ) { // иначе, ищем это значение в  том большом методе bbpress и если есть, выдираем это значение из него
            $bbp_topic_id = $bbp->topic_query->post->ID;

        // иначе если там его нет, ищем его там же, но в другом месте и берем
        } elseif ( !empty( $bbp->search_query->in_the_loop ) && isset( $bbp->search_query->post->ID ) && bbp_is_topic( $bbp->search_query->post->ID ) ) {
            $bbp_topic_id = $bbp->search_query->post->ID;

        // иначе если (кажется) речь о том, что разрешено редактировать топик и если он не пустой, то выдираем из него айди
        } elseif ( ( bbp_is_single_topic() || bbp_is_topic_edit() ) && !empty( $bbp->current_topic_id ) ) {
            $bbp_topic_id = $bbp->current_topic_id;

        // иначе этот айди выдираетс из $wp_query->post->ID
        } elseif ( ( bbp_is_single_topic() || bbp_is_topic_edit() ) && isset( $wp_query->post->ID ) ) {
            $bbp_topic_id = $wp_query->post->ID;

        // иначе, если просто (кажется) речь о том, что разрешено редактировать топик или он единственный, то выдираем его из возвр функции bbp_get_reply_topic_id
        } elseif ( bbp_is_single_reply() || bbp_is_reply_edit() ) {
            $bbp_topic_id = bbp_get_reply_topic_id();

        // Fallback
        } else {
            $bbp_topic_id = 0; // ну и если уж совсем ничего подобного топику не существует, то его айди будет 0
        }

        return (int) apply_filters( 'bbp_get_topic_id', (int) $bbp_topic_id, $topic_id ); // берем принятое значение $bbp_topic_id и пропускаем через фильтр с названием bbp_get_topic_id, а в функцию фильтра передается значение $topic_id и возвращает (int) $bbp_topic_id
    }
*/
    // если в настройках выбрано html теги, то
        if (d4p_bbt_o('quote_method', 'tools') == 'html') {
            $url = ''; $ath = ''; // принимаем пустые переменные url и ath

            if ($is_reply) { // если пост существует, то в $url записываем (кажется) адрес этого топика, а в $ath - имя автора этого поста
                $url = bbp_get_reply_url($id);
                $ath = bbp_get_reply_author_display_name($id);
            } else { // иначе в $url идет абсолютный адрес поста с этим айди, а в $ath автор топика с этим айди
                $url = get_permalink($id);
                $ath = bbp_get_topic_author_display_name($id);
            }

            // возвращаем строку html кода, где присутствуют самодельные атрибуты bbp-url, bbp-author, а между тегами a слово, которое теоретически может быть автоматически переведено с помощью функции __(), если перевод не получен, то оригинальный текст - Quote
            return '<a href="#'.$id.'" bbp-url="'.$url.'" bbp-author="'.$ath.'" class="d4p-bbt-quote-link">'.__("Ответить с цитатой", "gd-bbpress-tools").'</a>'; 
        } else { // иначе, то бишь если bb-код выбрали, то возвращаем код без атрибутов bbp-url, bbp-author
            return '<a href="#'.$id.'" class="d4p-bbt-quote-link">'.__("Ответить с цитатой", "gd-bbpress-tools").'</a>';
        }
    }

    public function add_content_filters() {
        add_filter('bbp_get_reply_content', array(&$this, 'quote_reply_content'), 9); // объявление фильтра по имени bbp_get_reply_content, для него будет срабатывать функция $this->quote_reply_content, с приоритетом 9 работает фильтр)
        add_filter('bbp_get_topic_content', array(&$this, 'quote_topic_content'), 9); // объявление фильтра по имени bbp_get_topic_content, для него будет срабатывать функция $this->quote_topic_content, с приоритетом 9 работает фильтр)

        // если в настройках выбрано располагать кнопку в заголовке поста или после контента или и до, и после, и после текста поста, то прогоняем через соответствующие фильтры
        if ($this->location == 'content' || $this->location == 'both') {
            add_filter('bbp_get_reply_content', array(&$this, 'reply_content'));
            add_filter('bbp_get_topic_content', array(&$this, 'reply_content'));
        }
        // если в настройках выбрано располагать кнопку в заголовке поста или и в заголовке, и после текста поста, то прогоняем через соответствующие фильтры
        if ($this->location == 'header' || $this->location == 'both') {
            add_filter('bbp_get_topic_admin_links', array(&$this, 'reply_links'), 10, 2);
            add_filter('bbp_get_reply_admin_links', array(&$this, 'reply_links'), 10, 2);
            add_action('bbp_theme_after_topic_admin_links', array(&$this, 'after_reply_links'));
            add_action('bbp_theme_after_reply_admin_links', array(&$this, 'after_reply_links'));
        }
    }
// удаление ранее озвученных фильтров и экшенов
    public function remove_content_filters() {
        remove_filter('bbp_get_reply_content', array(&$this, 'quote_reply_content'), 9);
        remove_filter('bbp_get_topic_content', array(&$this, 'quote_topic_content'), 9);

        remove_filter('bbp_get_reply_content', array(&$this, 'reply_content'));
        remove_filter('bbp_get_topic_content', array(&$this, 'reply_content'));

        remove_filter('bbp_get_topic_admin_links', array(&$this, 'reply_links'), 10, 2);
        remove_filter('bbp_get_reply_admin_links', array(&$this, 'reply_links'), 10, 2);
        remove_action('bbp_theme_after_topic_admin_links', array(&$this, 'after_reply_links'));
        remove_action('bbp_theme_after_reply_admin_links', array(&$this, 'after_reply_links'));
    }
// функция лепит код дива c айдишником поста, куда вставляет переданный $content
    public function quote_reply_content($content) {
        return '<div id="d4p-bbp-quote-'.bbp_get_reply_id().'">'.$content.'</div>';
    }
// функция лепит код дива c айдишником темы - топика, куда вставляет переданный $content
    public function quote_topic_content($content) {
        return '<div id="d4p-bbp-quote-'.bbp_get_topic_id().'">'.$content.'</div>';
    }
// функция прописывает начальный тег, конечный и разделитель и возвращает это все слепленное, и вместе с адресом, к которому прилеплен айди от поста или топика
    public function reply_links($content, $args) {
        $this->header = true;

        $before = isset($args['before']) ? $args['before'] : '<span class="bbp-admin-links">';
        $after = isset($args['after']) ? $args['after'] : '</span>';
        $sep = isset($args['sep']) ? $args['sep'] : ' | ';

        $old_links = trim(substr($content, strlen($before), strlen($content) - strlen($before) - strlen($after)));

        return $before.$old_links.($old_links == '' ? '' : $sep).$this->_quote().$after;
    }
// Функция возвращает спан, в котором номер айди поста или топика, если нет поста и возвращает фолс в $header
    public function after_reply_links() {
        if (!$this->header) {
            echo '<span class="bbp-admin-links">'.$this->_quote().'</span>';
        }

        $this->header = false;
    }
// Функция возвращает переданный content и к ней прилепленный див с содержимым - 
    public function reply_content($content) {
        return $content.'<div class="d4p-bbt-quote-block">'.$this->_quote().'</div>';
    }
}

?>