<?
/**
 * Очистка текста
 */


/**
 * :TODO: Оставить кавычки в БД, заменять их только при выводе в форму
 * менять лишь < >
 */


class Clear {
    var $only_text = false;

    function clearing($string) {
    	$string = trim($string);
        //$string = preg_replace('/\s+/u',' ', $string);

        if ($this->only_text) {
            $string = htmlspecialchars($string, ENT_NOQUOTES, 'UTF-8');
        }
        return $string;
    }
}
?>