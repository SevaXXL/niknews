<?php /* Smarty version 2.6.27, created on 2013-06-25 11:18:57
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'index.tpl', 6, false),array('modifier', 'escape', 'index.tpl', 6, false),array('modifier', 'default', 'index.tpl', 9, false),array('modifier', 'date_format', 'index.tpl', 90, false),array('block', 'dynamic', 'index.tpl', 39, false),array('function', 'rubrika', 'index.tpl', 68, false),)), $this); ?>
<?php $this->_cache_serials['templates_c/%%45/45E/45E480CD%%index.tpl.inc'] = 'c35b02d7dcf3a5b9a7ff4b49d910af09'; ?><!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['lead'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'UTF-8') : smarty_modifier_escape($_tmp, 'UTF-8')); ?>
">
    <meta name="robots" content="<?php if ($this->_tpl_vars['template'] == 'entry.tpl' || $this->_tpl_vars['template'] == 'main.tpl'): ?>index<?php else: ?>noindex, follow<?php endif; ?>">

    <title><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'UTF-8') : smarty_modifier_escape($_tmp, 'UTF-8')))) ? $this->_run_mod_handler('default', true, $_tmp, "Николаевские новости") : smarty_modifier_default($_tmp, "Николаевские новости")); ?>
</title>

    <!-- <link rel="stylesheet" href="/templates/public/css/bootstrap.css"> -->
    <link rel="stylesheet/less" href="/templates/public/less/bootstrap.less?ver=10" media="screen">

    <!-- <link rel="stylesheet/less" href="/templates/public/less/responsive.less" media="screen"> -->
    <link rel="stylesheet" href="/templates/public/css/bootstrap-responsive.min.css">

    <!-- <link rel="stylesheet" href="http://fotorama.s3.amazonaws.com/4.1.5/fotorama.css"> -->
    <link rel="stylesheet" href="/templates/public/css/idangerous.swiper.css">
    <link rel="stylesheet" href="/templates/public/css/idangerous.swiper.scrollbar.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,800,400,700&amp;subset=latin,cyrillic">
    <style>
      body {
        padding-top: 60px;
      }
    </style>

    <script src="/templates/public/js/less-1.3.3.min.js"></script>

    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:c35b02d7dcf3a5b9a7ff4b49d910af09#0}'; endif;$this->_tag_stack[] = array('dynamic', array()); $_block_repeat=true;smarty_block_dynamic($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <!-- Static: <?php if ($this->_tpl_vars['CACHE']): ?>Yes<?php else: ?>No<?php endif; ?> | Time: <?php echo $this->_tpl_vars['TIME']; ?>
 s | Queries: <?php echo $this->_tpl_vars['TOTALDBQUERIES']; ?>
 | Memory: <?php echo $this->_tpl_vars['MEMORY']; ?>
 MB -->
  <?php if ($_SESSION['admin']): ?>
    <ul class="admin-menu">
      <li><a href="/logout/" class="exit"></a></li>
      <li><a href="/clearcache/" class="clearcache"></a></li>
      <li><a href="/add/" class="add"></a></li>
    <?php if ($this->_tpl_vars['template'] == 'entry.tpl'): ?>
      <li><a href="edit/" class="edit"></a></li>
      <li><a href="photo/" class="media"></a></li>
    <?php elseif ($this->_tpl_vars['template'] == 'author.tpl'): ?>
      <li><a href="edit/" class="edit"></a></li>
    <?php endif; ?>
    </ul>
  <?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_dynamic($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); if ($this->caching && !$this->_cache_including): echo '{/nocache:c35b02d7dcf3a5b9a7ff4b49d910af09#0}'; endif;?>


        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">

              <form action="/search/" class="navbar-search pull-right">
                <input type="search" placeholder="Поиск" name="q" class="search-query" x-webkit-speech>
              </form>
              <a class="brand" href="#">Николаевские новости</a>
              <ul class="nav menu">
                <li>
                  <a href="#">Рубрики <span class="down">&#9662;</span></a>
                  <?php echo smarty_function_rubrika(array(), $this);?>

                </li>
                <li class="divider-vertical"></li>
                <li><a href="#">Регион <span class="down">&#9662;</span></a>
                  <ul>
                    <li><a href="#">Николаев</a></li>
                    <li><a href="#">Николаевская область</a></li>
                    <li><a href="#">Украина</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>

    <div class="container">
      <div class="wrapper"><!-- Пустой стиль -->


        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <div class="copyright">
          <p><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 &copy; Использование материалов и новостей сайта разрешается при условии ссылки на издание. Для новостных и интернет-изданий обязательной является прямая, открытая для поисковых систем гиперссылка в первом абзаце на цитируемую статью или новость.</p>
        </div>

      </div><!-- /.wrapper -->

      <footer>
          <ul class="inline">
            <li><a href="/">Главная</a></li>
            <li><a href="/author/">Авторы</a></li>
            <li><a href="/<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
/">Архив</a></li>
            <li><a href="#">Статистика</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">RSS</a></li>
          </ul>      
      </footer>

    </div><!-- /.container -->

    <script src="/templates/public/js/bootstrap-dropdown.js"></script>
    <!-- // <script src="/templates/public/js/jquery.scrollUp.min.js"></script> -->
    <script src="/templates/public/js/jquery.timeago.js"></script>
    <script src="/templates/public/js/jquery.timeago.ru.js"></script>
    <script src="/templates/public/js/share42.js"></script>
    <script src="/templates/public/js/bootstrap-tooltip.js"></script>
    <script src="/templates/public/js/jquery.storage.js"></script>
    <!-- // <script src="http://fotorama.s3.amazonaws.com/4.1.5/fotorama.js"></script> -->
    <script defer src="/templates/public/js/idangerous.swiper-2.0.min.js"></script>
    <script defer src="/templates/public/js/idangerous.swiper.scrollbar-2.0.js"></script>

    <script>
      $(document).ready(function () {

        // Панель прокрутки вверх
        // $.scrollUp({
        //   animation: 'none',
        //   scrollImg: true
        // });

        // Предупреждение при копировании
        $(document).bind('copy', function(e) {
          alert('Использование материалов сайта Николаевских новостей разрешается при условии ссылки на издание. Для новостных и интернет-изданий обязательной является прямая, открытая для поисковых систем гиперссылка в первом абзаце на цитируемую статью или новость.');
        });

        // Отправка голосового поиска сразу после завершения фразы (для браузера Chrome)
        $('input[type="search"]').bind('webkitspeechchange', function() {
          $(this).parent('form').submit();
        });






      });
    </script>

  </body>
</html>
