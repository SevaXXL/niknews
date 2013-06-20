<?php




// :TODO: ия -> ia
class Translit
{
    var $cyr = array(
        'щ', 'ш', 'ч', 'ц','ю', 'я', 'ж', 'а','б','в','г','д','е','ё','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х', 'ы','э','є','ї', '№');
    var $lat = array(
        'sch','sh','ch','ts','ju','ja','zh','a','b','v','g','d','e','e','z','i','j','k','l','m','n','o','p','r','s','t','u','f','h','y','e','e','i', 'n');

    function UrlTranslit($str) {
        // Понижаем регистр
        $str = mb_strtolower($str, 'utf-8');

        $str = preg_replace('/[_\s\.,?!\[\](){}]+/u', '-', $str);
        $str = preg_replace('/-{2,}/u', '--', $str);
        $str = preg_replace('/_-+_/u', '--', $str);
        $str = preg_replace('/[_\-]+$/u', '', $str);

        // Значимые ЬЪ заменяем на j, незначимые удаляем
        $str = preg_replace('/(ь|ъ)(а|е|ё|и|о|у|ы|э|ю|я)/u', 'j\\2', $str);
        $str = preg_replace('/(ь|ъ)/u', '', $str);

        for ($i=0; $i < count($this->cyr); $i++) {
            $c_cyr = $this->cyr[$i];
            $c_lat = $this->lat[$i];
            $str = str_replace($c_cyr, $c_lat, $str);
        }
        // Удаляем повторения с j
        $str = preg_replace('/j{2,}/u', 'j', $str);
        // Удаляем иные символы
        $str = preg_replace('/[^0-9a-z_\-]+/u', '', $str);

        return $str;
    }
}
?>
