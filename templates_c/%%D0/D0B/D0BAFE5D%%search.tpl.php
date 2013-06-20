<?php /* Smarty version 2.6.27, created on 2013-05-29 23:54:37
         compiled from search.tpl */ ?>

<div class="page-header">
    <h1>Поиск по сайту <small></small></h1>
    Система пользовательского поиска <a href="http://www.google.com/coop/cse/?hl=ru" rel="external"><img src="/templates/public/img/google.gif" alt="Google"></a>
</div>

<div class="row-fluid">
    <div class="span8">
        <div id="search-result"></div>
    </div>
    <div class="span4">
        <p class="lead">Как это работает</p>
        <ul>
            <li>Введите ключевые слова для поиска, например, <span class="text-success">Иван Федорович Крузенштерн</span></li>
            <li>Чтобы найти страницы со словосочетанием, заключите его в кавычки: <span class="text-success">&quot;книга Иван Крузенштерн&quot;</span></li>
            <li>С любым из слов — вставьте оператор <code>OR</code> между словами: <span class="text-success">человек OR пароход</span></li>
            <li>Без слов — поставьте знак минуса перед словами: <span class="text-success">-пароход, -&quot;книга о пароходе&quot;</span></li>
            <li>Чтобы найти страницы с диапазоном чисел, вставьте две точки между числами и укажите единицу измерения: <span class="text-success">300..1000 гривен, 1812..1846</span></li>
        </ul>
    </div>
</div>

<script src="/templates/public/js/purl.js"></script>

<script>


/**
 * :TODO: Оптимизировать работу с DOM
 */
$(document).ready(function() {
    var search_query = $.url().param('q');
    var start_index = $.url().param('start') || 0;
    $('input[name="q"]').val(search_query);

    $.ajax({
        url: 'https://ajax.googleapis.com/ajax/services/search/web?v=1.0&callback=?',
        dataType: 'json',
        cache: false,
        type: 'get',
        data: {
            'q'    : search_query,
            'rsz'  : '10',
            'start': start_index,
            'hl'   : 'ru',
            'cx'   : '001087546461165951744:4cnyfoyc2dw'
        },
        success: function (data, textStatus) {
            console.log('AJAX result: ' + textStatus);
            console.log(data);
            if (data.responseStatus == 200) {
                // $('h1 > small').append('Время: ' + data.responseData.cursor.searchResultTime + ' сек.');
                if (data.responseData.results.length > 0) {
                    $('h1 > small').append(' Результатов поиска: ' + data.responseData.cursor.resultCount);
                    
                    $.each(data.responseData.results, function(index, value) {
                        var thumb = '';
                        if (value.richSnippet) {
                            if (value.richSnippet.cseThumbnail) {
                                thumb = '<a class="pull-left" href="' + value.url + '"><img class="media-object" src="' +  value.richSnippet.cseThumbnail.src + '" alt="" style="height: 64px; width: 64px;"></a>';
                            }
                        }
                        var content = '<div class="media">' + thumb + '<div class="media-body"><h4 class="media-heading"><a href="' + value.url + '">' + value.title + '</a></h4>' + value.content + '<div class="muted hide">' + value.url + '</div></div></div>';
                        $('#search-result').append(content);
                    });
                    $('#search-result').append('<div class="pagination pagination-centered"><ul></ul></div>');
                    var page = data.responseData.cursor.currentPageIndex + 1;
                    var active_class = '';
                    $.each(data.responseData.cursor.pages, function(index, value) {
                        if (page == value.label) active_class = ' class="active"';
                        $('#search-result ul').append('<li' + active_class + '><a href="/search/?q=' + encodeURI(search_query) + '&amp;start=' + value.start + '">' + value.label + '</a></li>');
                        active_class = '';
                    });

                } else {
                    $('#search-result').append('<h4>По запросу <em style="color: red;">' + search_query + '</em> ничего не найдено...</h4>');
                }
            }
        },
        error: function (e, textError) {
          alert(textError);
        }
    });
});
</script>



