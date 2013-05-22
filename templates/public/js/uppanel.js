/**
 * Панель прокрутки к началу страницы
 * ver. 1.0 - 30.04.2013
 */
(function($) {
    $.fn.upPanel = function()
    {
        var window_width = $(window).width();
        var min_window_width = 1200;
        var window_height = $(window).height();
        var min_window_height = window_height * 1.1;
        if (window_width > min_window_width && $(document).height() > min_window_height) {
            var $panel = this;
            $panel.width(window_width / 10);
            $panel.height(window_height);
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $panel.css({'opacity': 1, 'cursor': 'n-resize'});
                } else {
                    $panel.css({'opacity': 0, 'cursor': 'default'});
                }
            });
        }
        // чтобы #top не добавлялся в адресную строку и не влиял на историю переходов
        $('a[href="#top"]').click(function() {
          $('body, html').animate({scrollTop: 0}, 200);
          return false;
        });
    }
})(jQuery);
