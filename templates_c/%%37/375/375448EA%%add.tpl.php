<?php /* Smarty version 2.6.27, created on 2013-06-29 02:43:44
         compiled from add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'add.tpl', 64, false),array('modifier', 'adds', 'add.tpl', 134, false),array('function', 'html_options', 'add.tpl', 105, false),)), $this); ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if ($this->_tpl_vars['data']['entryid']): ?>Правка<?php else: ?>Новый текст<?php endif; ?></title>
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
                        <input type="text" name="date" class="input-small" id="datepicker" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
" required>
                        <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
                    <div class="input-append">
                        <span class="bootstrap-timepicker"><input name="time" id="timepicker" type="text" class="input-mini" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%R") : smarty_modifier_date_format($_tmp, "%R")); ?>
" required></span>
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
                <p><input type="text" name="title" class="input-block-level" value="<?php echo $this->_tpl_vars['data']['title']; ?>
" required x-webkit-speech></p>
            </div>
        </div>

        <div class="row-fluid">
            <!-- main col -->
            <div class="span8 after-space">
                <p><input type="text" name="subtitle" placeholder="Подзаголовок" class="input-block-level" value="<?php echo $this->_tpl_vars['data']['subtitle']; ?>
"></p>
                <textarea id="text" name="content"><?php echo $this->_tpl_vars['data']['lead']; ?>
<?php echo $this->_tpl_vars['data']['content']; ?>
</textarea>
           </div>
            <!-- /main col -->

            <!-- sidebar -->
            <div class="span4">
                <div class="after-space">
                    <input type="number" name="number" min="0" class="span2" value="<?php if ($this->_tpl_vars['data']['number']): ?><?php echo $this->_tpl_vars['data']['number']; ?>
<?php endif; ?>" placeholder="№" data-toggle="tooltip" data-title="Номер газеты">
                    <select name="region" class="span6">
                        <option label="Область не указана" value="0">Область не указана</option>
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['region'],'selected' => $this->_tpl_vars['data']['region']), $this);?>

                    </select>
                    <select name="catid" class="span4">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['category'],'selected' => $this->_tpl_vars['data']['catid']), $this);?>

                        <option label="Черновик" value="0"<?php if ($this->_tpl_vars['data']['catid'] == '0'): ?> selected<?php endif; ?>>Черновик</option>
                    </select>
                </div>

                <div id="press-type" class="after-space hide">
                    <label class="radio">
                        <input type="radio" name="sport" value="true"<?php if ($this->_tpl_vars['data']['sport']): ?> checked<?php endif; ?>> Спортивный
                    </label>
                    <label class="radio">
                        <input type="radio" name="sport" value="false"<?php if (! $this->_tpl_vars['data']['sport']): ?> checked<?php endif; ?>> Общественно-политический
                    </label>
                </div>

                <div class="well">
                    <label>Рубрика</label>
                    <input type="text" name="rubrika" class="input-block-level after-space" value="<?php echo $this->_tpl_vars['data']['rubrika']; ?>
" data-placeholder="Сгруппировать с другими по теме">
                    <label class="checkbox">
                        <input type="checkbox"> Фотоальбом на всю ширину страницы
                    </label>
                    <input type="text" name="photoalbum" value="<?php echo $this->_tpl_vars['data']['photoalbum']; ?>
" placeholder="Номер фотогалереи Flickr" autocomplete="off" class="input-block-level">
                    <label class="checkbox">
                        <input type="checkbox" name="videofull"<?php if ($this->_tpl_vars['data']['videofull']): ?> checked<?php endif; ?>> Видео на всю ширину страницы
                    </label>
                    <input type="text" name="video" value="<?php echo $this->_tpl_vars['data']['video']; ?>
" placeholder="Адрес видео на Youtube" autocomplete="off" class="input-block-level">
                    <label>Автор</label>
                    <input type="text" name="author" class="input-block-level after-space" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['author'])) ? $this->_run_mod_handler('adds', true, $_tmp) : smarty_modifier_adds($_tmp)); ?>
" data-placeholder="Фамилия Имя">
                </div><!-- /.well -->


                <label>Развитие сюжета<?php if ($this->_tpl_vars['data']['entryid']): ?>, номер данной статьи: <?php echo $this->_tpl_vars['data']['entryid']; ?>
<?php endif; ?></label>
                <input type="text" name="related" value="<?php echo $this->_tpl_vars['data']['related']; ?>
" class="input-block-level" placeholder="Номер любой статьи в связке" autocomplete="off">
                <label>Ключевые слова</label>
                <input type="text" name="keyword" class="input-block-level after-space" value="<?php echo $this->_tpl_vars['data']['keyword']; ?>
" data-placeholder="События, юридические и физические лица">

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
                                    <input type="text" name="url" value="<?php echo $this->_tpl_vars['data']['urlcache']; ?>
" class="input-block-level" placeholder="Если не указан, создается автоматически" autocomplete="off">
                                </div>
                                <div class="after-space">
                                    <label class="checkbox">
                                        <input name="comments" type="checkbox"<?php if ($this->_tpl_vars['data']['comments']): ?> checked<?php endif; ?>> Комментарии включены
                                    </label>
                                </div>
                                <div class="after-space">
                                    <label class="checkbox">
                                        <input name="format" type="checkbox"<?php if ($this->_tpl_vars['data']['format']): ?> checked<?php endif; ?>> На главную страницу
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.accordion -->

            </div><!-- /sidebar -->
        </div><!-- /.row -->
<?php if ($this->_tpl_vars['data']['entryid']): ?>
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['data']['entryid']; ?>
">
<?php endif; ?>
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
    <?php echo ''; ?><?php $_from = $this->_tpl_vars['author']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entry']):
        $this->_foreach['thisforeach']['iteration']++;
?><?php echo '\''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['entry'])) ? $this->_run_mod_handler('adds', true, $_tmp) : smarty_modifier_adds($_tmp)); ?><?php echo '\''; ?><?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?><?php echo ','; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>

        ]
    });

    // Выбор рубрики
    $('input[name="rubrika"]').select2({
        tags: [<?php echo ''; ?><?php $_from = $this->_tpl_vars['rubrika']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entry']):
        $this->_foreach['thisforeach']['iteration']++;
?><?php echo '\''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['entry'])) ? $this->_run_mod_handler('adds', true, $_tmp) : smarty_modifier_adds($_tmp)); ?><?php echo '\''; ?><?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?><?php echo ','; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
], 
        maximumSelectionSize: 1
    });

    // Ключевые слова
    $('input[name="keyword"]').select2({
        tags:[
    <?php echo ''; ?><?php $_from = $this->_tpl_vars['keyword']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entry']):
        $this->_foreach['thisforeach']['iteration']++;
?><?php echo '\''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['entry'])) ? $this->_run_mod_handler('adds', true, $_tmp) : smarty_modifier_adds($_tmp)); ?><?php echo '\''; ?><?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?><?php echo ','; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>

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