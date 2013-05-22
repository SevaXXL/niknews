<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактор</title>
    <link rel="stylesheet" href="/templates/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/admin/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/templates/admin/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/templates/admin/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/templates/admin/css/redactor.css">
    <link rel="stylesheet" href="/templates/admin/css/bootstrap-switch.css">
    <!-- <link rel="stylesheet" href="/templates/admin/css/bootstrap-tagmanager.css"> -->
    <link rel="stylesheet" href="/templates/admin/css/magicsuggest-1.2.7.min.css">
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
    input[name="subject"] {
        font-size: 2em;
        height: auto;
    }
    input[name="url"] {
        color: #999;
    }
    .ms-ctn {
        margin-bottom: 1em;
    }
    .customSelection {
        color: #666 !important;
        background-color: #CDE69C !important;
    }
    </style>
  </head>

<body>

<form action="/printpost.php" method="post">
    <!-- .navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <a class="brand" href="/">Николаевские новости</a>
            <ul class="nav">
                <li class="divider-vertical"></li>
                <li><a href="../"><i class="icon-backward icon-white"></i> Вернуться</a></li>
                <li class="divider-vertical"></li>
                <li><a href="#help" data-toggle="modal"><i class="icon-briefcase icon-white"></i> Сниппеты</a></li>
                <li class="divider-vertical"></li>
                <li><a href="#help" data-toggle="modal"><i class="icon-info-sign icon-white"></i> Справка</a></li>
            </ul>
            <div class="navbar-form pull-right">

                <div class="input-append">
                    <input type="text" name="date" class="input-small" id="datepicker" value="{{ if $data.date }}{{ $data.date }}{{ else }}{{ $smarty.now|date_format:"%Y-%m-%d" }}{{ /if }}" required>
                    <span class="add-on"><i class="icon-calendar"></i></span>
                </div>

                <div class="input-append">
                    <span class="bootstrap-timepicker"><input name="time" id="timepicker" type="text" class="input-mini" value="" required></span>
                    <span class="add-on"><i class="icon-time"></i></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.navbar -->

    <!-- .container -->
    <div class="container-fluid">
        <div class="row-fluid">
            <!-- left col -->
            <div class="span4">
                <div class="well">
                    <div id="ms1"></div>

                    <!-- <input type="text" autocomplete="off" name="tags2" placeholder="Рубрики" class="tagManager input-block-level"> -->

                    <select class="span6">
                        <option>Новости</option>
                        <option>Черновик</option>
                        <option>Обложка</option>
                        <option>Сообщение</option>
                        <option>Фотолента</option>
                        <option>Гороскоп</option>
                        <option>Афиша</option>
                    </select>
                    <select class="span6">
                        <option>Город</option>
                        <option>Область</option>
                        <option>Страна</option>
                    </select>
                    <select class="span12">
                        <option>Спортивный</option>
                        <option>Общественно-политический</option>
                    </select>
                    <p>
                        <label class="checkbox">
                            <span class="switch" data-on="success">
                                <input name="comments" type="checkbox" checked>
                            </span>
                            Комментарии
                        </label>
                    </p>
                    <p>
                        <label class="checkbox">
                            <span class="switch" data-on="success">
                                <input name="main" type="checkbox" checked>
                            </span>
                            На&nbsp;главную
                        </label>
                    </p>
                    <div class="input-prepend">
                        <span class="add-on">Номер</span>
                        <input type="number" class="input-mini" value="15">
                    </div>
                    <p><input type="text" name="url" value="{{ $data.urlcache }}" class="input-block-level"></p>
                    <p><input type="text" name="photoalbum" value="{{ $data.photoalbum }}" placeholder="Номер фотогалереи" class="input-block-level"></p>
                </div>
            </div>
            <!-- /left col -->

            <!-- main col -->
            <div class="span8">
                <p><input type="text" name="subject" class="input-block-level" value="{{ $data.title|escape:'html':'UTF-8' }}" required></p>
                <p><input type="text" name="subject2" placeholder="Подзаголовок" class="input-block-level" value="{{ $data.subtitle|escape:'html':'UTF-8' }}"></p>
                <p><textarea id="text" name="text">{{ $data.lid|escape:'html':'UTF-8' }}{{ $data.content|escape:'html':'UTF-8' }}</textarea></p>
                <p class="text-center">
                    <button type="submit" class="btn btn-primary btn-large">Отправить</button>
                </p>
           </div>
            <!-- /main col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</form>
 
<!-- Окно справки -->
<div id="help" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">Справка</h3>
    </div>
    <div class="modal-body">
        <p>Время менять можно также стрелками на клавиатуре</p>
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
<!-- <script src="/templates/admin/js/bootstrap-tagmanager.js"></script> -->
<script src="/templates/admin/js/magicsuggest-1.2.7.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.3/bootstrapSwitch.min.js"></script>

<script>
    $(function()
    {
        // Текстовый редактор
        $('#text').redactor({
            lang: 'ru',
            wym: true
        });

        $('#timepicker').timepicker({
            template: false,
            showInputs: false,
            minuteStep: 5,
            showMeridian: false
        });

        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            weekStart: 1,
            language: 'ru'
        });

        // $('.tagManager:eq(0)').tagsManager({
        //     prefilled: ['Первый тэг', 'Второй тэг'],
        //     preventSubmitOnEnter: false,
        //     typeahead: true,
        //     typeaheadSource: ['Первый тэг', 'Второй тэг', 'Третий тэг', 'Четвертый тэг', 'Пятый тэг', 'Шестой тэг'],
        //     hiddenTagListName: 'hiddenTagListA',
        //     blinkBGColor_1: '#FFFF9C',
        //     blinkBGColor_2: '#CDE69C'
        // });

        $('#ms1').magicSuggest({
            name: 'colors',
            data: [
                {{ foreach from=$authors item=entry name=myKeys }}
                '{{ $entry }}'{{ if not $smarty.foreach.myKeys.last }},
                {{ /if }}
                {{ /foreach }}
            ],
            value: [],
            typeDelay: 0,
            noSuggestionText: 'Нет в списке',
            selectionCls: 'customSelection',
            emptyText: 'Ключевые слова'
        });
    });
</script>

</body>
</html>
