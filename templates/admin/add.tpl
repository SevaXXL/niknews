<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ if $data.entryid }}Правка{{ else }}Новый текст{{ /if }}</title>
    <link rel="stylesheet" href="/templates/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/admin/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/templates/admin/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/templates/admin/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/templates/admin/css/redactor.css">
    <link rel="stylesheet" href="/templates/admin/css/select2.css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
    .navbar-inner {
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        margin-bottom: 5em;
    }
    .container-fluid {
        max-width: 1200px;
        margin: 0 auto;
    }
    input[name="title"] {
        font-size: 2em;
        height: auto;
    }
    .after-space {
        margin-bottom: 1em;
    }
    .select2-results li {
        border-top: 1px dotted #dedede;
    }
    </style>
  </head>

<body>

<form action="/add/" method="post">
    <!-- .navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <!-- Убираем меню на узких экранах -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="/">Николаевские новости</a>
                <ul class="nav nav-collapse collapse">
                    <li class="divider-vertical"></li>
                    <li><a href="../"><i class="icon-backward icon-white"></i> Вернуться</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#snippet" data-toggle="modal"><i class="icon-briefcase icon-white"></i> Сниппеты</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#help" data-toggle="modal"><i class="icon-info-sign icon-white"></i> Справка</a></li>
                </ul>
                <div class="navbar-form pull-right">
                    <div class="input-append">
                        <input type="text" name="date" class="input-small" id="datepicker" value="{{ $data.intime|date_format:"%Y-%m-%d" }}" required>
                        <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
                    <div class="input-append">
                        <span class="bootstrap-timepicker"><input name="time" id="timepicker" type="text" class="input-mini" value="{{ $data.intime|date_format:"%R" }}" required></span>
                        <span class="add-on"><i class="icon-time"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.navbar -->

    <!-- .container -->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <noscript>
                    <div class="alert alert-error">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <h4>Внимание!</h4>
                      Для дальнейшей работы подключите Javascript.
                    </div>
                </noscript>
                <p><input type="text" name="title" class="input-block-level" value="{{ $data.title }}" required x-webkit-speech></p>
            </div>
        </div>

        <div class="row-fluid">
            <!-- main col -->
            <div class="span8 after-space">
                <p><input type="text" name="subtitle" placeholder="Подзаголовок" class="input-block-level" value="{{ $data.subtitle }}"></p>
                <textarea id="text" name="content">{{ $data.lead }}{{ $data.content }}</textarea>
           </div>
            <!-- /main col -->

            <!-- sidebar -->
            <div class="span4">
                <div class="after-space">
                    <input type="number" name="number" min="0" class="span2" value="{{ if $data.number }}{{ $data.number }}{{ /if }}" placeholder="№" data-toggle="tooltip" data-title="Номер газеты">
                    <select name="region" class="span6">
                        <option label="Область не указана" value="0">Область не указана</option>
                        {{ html_options options=$region selected=$data.region }}
                    </select>
                    <select name="catid" class="span4">
                        {{ html_options options=$category selected=$data.catid }}
                        <option label="Черновик" value="0"{{ if $data.catid == '0' }} selected{{ /if }}>Черновик</option>
                    </select>
                </div>

                <div id="press-type" class="after-space hide">
                    <label class="radio">
                        <input type="radio" name="sport" value="true"{{ if $data.sport }} checked{{ /if }}> Спортивный
                    </label>
                    <label class="radio">
                        <input type="radio" name="sport" value="false"{{ if !$data.sport }} checked{{ /if }}> Общественно-политический
                    </label>
                </div>

                <div class="well">
                    <label>Рубрика</label>
                    <input type="text" name="rubrika" class="input-block-level after-space" value="{{ $data.rubrika }}" data-placeholder="Сгруппировать с другими по теме">
                    <label class="checkbox">
                        <input type="checkbox"> Фотоальбом на всю ширину страницы
                    </label>
                    <input type="text" name="photoalbum" value="{{ $data.photoalbum }}" placeholder="Номер фотогалереи Flickr" autocomplete="off" class="input-block-level">
                    <label class="checkbox">
                        <input type="checkbox" name="videofull"{{ if $data.videofull }} checked{{ /if }}> Видео на всю ширину страницы
                    </label>
                    <input type="text" name="video" value="{{ $data.video }}" placeholder="Адрес видео на Youtube" autocomplete="off" class="input-block-level">
                    <label>Автор</label>
                    <input type="text" name="author" class="input-block-level after-space" value="{{ $data.author|adds }}" data-placeholder="Фамилия Имя">
                </div><!-- /.well -->


                <label>Развитие сюжета{{ if $data.entryid }}, номер данной статьи: {{ $data.entryid }}{{ /if }}</label>
                <input type="text" name="related" value="{{ $data.related }}" class="input-block-level" placeholder="Номер любой статьи в связке" autocomplete="off">
                <label>Ключевые слова</label>
                <input type="text" name="keyword" class="input-block-level after-space" value="{{ $data.keyword }}" data-placeholder="События, юридические и физические лица">

                <div class="accordion" id="accordion">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse">
                                Дополнительно
                            </a>
                        </div>
                        <div id="collapse" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="after-space">
                                    <label>URL</label>
                                    <input type="text" name="url" value="{{ $data.urlcache }}" class="input-block-level" placeholder="Если не указан, создается автоматически" autocomplete="off">
                                </div>
                                <div class="after-space">
                                    <label class="checkbox">
                                        <input name="comments" type="checkbox"{{ if $data.comments }} checked{{ /if }}> Комментарии включены
                                    </label>
                                </div>
                                <div class="after-space">
                                    <label class="checkbox">
                                        <input name="format" type="checkbox"{{ if $data.format }} checked{{ /if }}> На главную страницу
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.accordion -->

            </div><!-- /sidebar -->
        </div><!-- /.row -->
{{ if $data.entryid }}
        <input type="hidden" name="id" value="{{ $data.entryid }}">
{{ /if }}
        <div class="form-actions text-center">
            <button type="submit" class="btn btn-primary btn-large">Отправить</button>
       </div>
    </div><!-- /.container -->
</form>
 
<!-- Окно справки -->
<div id="help" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="helpLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="helpLabel">Справка</h3>
    </div>
    <div class="modal-body">
        <p>Справичная информация и правила здесь</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
    </div>
</div>

<!-- Окно сниппетов -->
<div id="snippet" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="snippetLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="snippetLabel">Сниппеты</h3>
    </div>
    <div class="modal-body">
        <p>Комментарий</p>
        <pre>&lt;!-- comment --&gt;
&lt;p&gt;Sample text here...&lt;/p&gt;</pre>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
    </div>
</div>

<script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script src="/templates/public/js/bootstrap.min.js"></script>
<script src="/templates/admin/js/redactor.min.js"></script>
<script src="/templates/admin/js/redactor.ru.js"></script>
<script src="/templates/admin/js/bootstrap-timepicker.min.js"></script>
<script src="/templates/admin/js/bootstrap-datepicker.js"></script>
<script src="/templates/admin/js/bootstrap-datepicker.ru.js"></script>
<script src="/templates/admin/js/select2.min.js"></script>
<script src="/templates/admin/js/select2_locale_ru.js"></script>

<script>
$(function()
{

    // WYSIWYG-редактор
    $('#text').redactor({
        lang: 'ru',
        wym: true
    });

    // Дата
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        weekStart: 1,
        language: 'ru'
    });

    // Время
    $('#timepicker').timepicker({
        // template: false,
        showInputs: false,
        minuteStep: 5,
        showMeridian: false
    });

    // Выбор типа происходит только при указании номера газеты
    var $press_type = $('#press-type');
    var $number_form = $('input[name="number"]');
    if ($number_form.val() > 0 ) {
        $press_type.show();
    }
    $number_form.change(function() {
        if ($(this).val() > 0) {
            $press_type.show();
        } else {
            $press_type.hide();
        }
    });

    // Выбор автора
    /**
     * :TODO: Временный smarty-модификатор TRIM
     * времменная замена , -> _
     */
    $('input[name="author"]').select2({
        tags:[
    {{ strip }}
        {{ foreach from=$author item=entry name=thisforeach }}
            '{{ $entry|adds }}'{{ if not $smarty.foreach.thisforeach.last }},{{ /if }}
        {{ /foreach }}
    {{ /strip }}
        ]
    });

    // Выбор рубрики
    $('input[name="rubrika"]').select2({
        tags: [{{ strip }}
        {{ foreach from=$rubrika item=entry name=thisforeach }}
            '{{ $entry|adds }}'{{ if not $smarty.foreach.thisforeach.last }},{{ /if }}
        {{ /foreach }}
        {{ /strip }}], 
        maximumSelectionSize: 1
    });

    // Ключевые слова
    $('input[name="keyword"]').select2({
        tags:[
    {{ strip }}
        {{ foreach from=$keyword item=entry name=thisforeach }}
            '{{ $entry|adds }}'{{ if not $smarty.foreach.thisforeach.last }},{{ /if }}
        {{ /foreach }}
    {{ /strip }}
        ]
    });

    // Всплывающие подсказки
    $('input[data-toggle="tooltip"]').tooltip({
        delay: {show: 1000, hide: 0}
    });

});
</script>

</body>
</html>
