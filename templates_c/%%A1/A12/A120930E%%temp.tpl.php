<?php /* Smarty version 2.6.27, created on 2013-06-29 03:47:10
         compiled from temp.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'temp.tpl', 6, false),array('modifier', 'escape', 'temp.tpl', 6, false),array('modifier', 'default', 'temp.tpl', 9, false),array('modifier', 'date_format', 'temp.tpl', 95, false),array('modifier', 'mb_truncate', 'temp.tpl', 109, false),array('block', 'dynamic', 'temp.tpl', 37, false),)), $this); ?>
<?php $this->_cache_serials['templates_c/%%A1/A12/A120930E%%temp.tpl.inc'] = '58ea5f4f5dac14abfe8647721c9dc386'; ?><!DOCTYPE html>
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

    <link rel="stylesheet" href="http://fotorama.s3.amazonaws.com/4.1.5/fotorama.css">
    <link rel="stylesheet" href="/templates/public/css/idangerous.swiper.css">
    <link rel="stylesheet" href="/templates/public/css/idangerous.swiper.scrollbar.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,800,400,700&amp;subset=latin,cyrillic">
    <style>

    </style>

    <script src="/templates/public/js/less-1.3.3.min.js"></script>

    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body class="temp">

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:58ea5f4f5dac14abfe8647721c9dc386#0}'; endif;$this->_tag_stack[] = array('dynamic', array()); $_block_repeat=true;smarty_block_dynamic($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
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
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_dynamic($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); if ($this->caching && !$this->_cache_including): echo '{/nocache:58ea5f4f5dac14abfe8647721c9dc386#0}'; endif;?>

    <div class="temp-container">

      <div class="adv-top"><img src="http://placehold.it/728x90"></div>

      <header>
        <form action="/search/" class="form-search pull-right">
          <input type="search" placeholder="Поиск" name="q" class="search-query" x-webkit-speech>
        </form>
        <a href="/" class="clearfix"><img src="/templates/public/img/nn.png"></a>
      </header>

      <nav>
        <ul>
          <li><a href="/"><i class="icon-home icon-white"></i><!--  Главная --></a></li>
          <li class="divider-vertical"></li>
          <li><a href="/sport/">Спорт</a></li>
          <li class="divider-vertical"></li>
          <li><a href="/">Политика</a></li>
          <li class="divider-vertical"></li>
          <li><a href="/">Общество</a></li>
          <li class="divider-vertical"></li>
          <li><a href="/">Криминал</a></li>
          <li class="divider-vertical"></li>
          <li><a href="/">Бизнес</a></li>
          <li class="divider-vertical"></li>
          <li><a href="/">Автосалон</a></li>
          <li class="divider-vertical"></li>
          <li><a href="/">Гламур</a></li>
          <li class="divider-vertical"></li>
          <li><a href="/">Пресс-релизы</a></li>
        </ul>
      </nav>

      <div class="col-624">
        <div class="col-304 light-blue" style="margin-right: 16px;">
          <div class="thumb" style="width: 100%; height: 280px; margin: 0; float: none; background-image: url(/files/part<?php echo $this->_tpl_vars['hitnews']['part']; ?>
/<?php echo $this->_tpl_vars['hitnews']['image']; ?>
-624x624.jpg);"></div>
          <div class="hitnews"><?php echo $this->_tpl_vars['hitnews']['title']; ?>
</div>
        </div>
        <div class="col-304">
          <ul class="newsline">
    <?php $_from = $this->_tpl_vars['topnews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
            <li><a href="<?php echo $this->_tpl_vars['entry']['urlcache']; ?>
/"><?php echo $this->_tpl_vars['entry']['title']; ?>
 <span class="timeago" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%dT%T') : smarty_modifier_date_format($_tmp, '%Y-%m-%dT%T')); ?>
"></span></a></li>
    <?php endforeach; endif; unset($_from); ?>
          </ul>
        </div>
        <div class="clearfix"></div>
        <div class="adv-468">
          <img src="http://placehold.it/468x60">
        </div>

  <?php $_from = $this->_tpl_vars['newsline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
      <?php if ($this->_tpl_vars['entry']['image']): ?>
          <div class="thumb" style="width: 192px; height: 100px; background-image: url(/files/part<?php echo $this->_tpl_vars['entry']['imagepart']; ?>
/<?php echo $this->_tpl_vars['entry']['image']; ?>
-150x150.<?php echo $this->_tpl_vars['entry']['ext']; ?>
);"></div>
      <?php endif; ?>
      <h4><a href="<?php echo $this->_tpl_vars['entry']['url']; ?>
"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></h4>
      <p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['entry']['lead'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 300) : smarty_modifier_mb_truncate($_tmp, 300)); ?>
</p>
      <ul class="breadcrumb clearfix">
 
    <?php if ($this->_tpl_vars['entry']['rubrika']): ?>
      <?php $_from = $this->_tpl_vars['entry']['rubrika']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['thisforeach']['iteration']++;
?>
        <li><a href="<?php echo $this->_tpl_vars['value']['link']; ?>
"><?php echo $this->_tpl_vars['value']['word']; ?>
</a><?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?><span class="divider"> &gt; </span><?php endif; ?></li>
      <?php endforeach; endif; unset($_from); ?>
      <li><span class="divider"> | </span></li>
    <?php endif; ?>
        <li><span class="timeago" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%dT%T') : smarty_modifier_date_format($_tmp, '%Y-%m-%dT%T')); ?>
">&nbsp;</span></li>
      </ul>
      <hr>
  <?php endforeach; endif; unset($_from); ?>


        <div class="fotorama" data-width="100%">
          <img src="http://www.niknews.mk.ua//gal/uploads/original/853d74e6a752b75a61511685bc3ee9c3.jpg">
          <img src="http://www.niknews.mk.ua/gal/uploads/original/bc43115ea1c76c36db8986f72c6263ae.jpg">
          <img src="http://www.niknews.mk.ua/gal/uploads/original/9512c1db9a091e351980f71be131afba.jpg">
        </div>



      </div>
      <div class="col-336">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Популярные</a>
          </li>
          <li><a href="#">Комментируемые</a></li>
        </ul>
        <div class="tab-container">
          <p><a href="#">Николаевские самбисты Ярослав Рытко и Иван Васильчук выиграли спартакиаду МВД Украины</a></p>
          <p><a href="#">Николаевский гроссмейстер Зубов в рейтинге ФИДЕ на 207-й позиции</a></p>
          <p><a href="#">Николаевские самбисты Ярослав Рытко и Иван Васильчук выиграли спартакиаду МВД Украины</a></p>
        </div>
        <div class="adv-300">
          <img src="http://placehold.it/300x250">
        </div>
        <img src="/templates/public/img/table.png" style="margin: 1em 0;">

        <div class="col-newsline">
          <h4>Лента новостей</h4>
          <ul class="item">
    <?php $_from = $this->_tpl_vars['newsline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
            <li>
              <a href="<?php echo $this->_tpl_vars['entry']['url']; ?>
">
                <?php if ($this->_tpl_vars['entry']['videofull']): ?>
                <div id="<?php echo $this->_tpl_vars['entry']['video']; ?>
" class="thumb-video"><img src="/templates/public/img/button-play.png" alt="Видео"></div>
                <script>
                $(document).ready(function () {
                  $.getJSON('http://gdata.youtube.com/feeds/api/videos/<?php echo $this->_tpl_vars['entry']['video']; ?>
?callback=?', {
                    'alt': 'json-in-script'
                  }).done(function(data){
                    $('#<?php echo $this->_tpl_vars['entry']['video']; ?>
').css('background-image', 'url(' + data.entry.media$group.media$thumbnail[0].url + ')');
                  });
                });
                </script>
                <?php elseif ($this->_tpl_vars['entry']['image']): ?><div class="thumb" style="width: 60px; height: 60px; background-image: url(/files/part<?php echo $this->_tpl_vars['entry']['imagepart']; ?>
/<?php echo $this->_tpl_vars['entry']['image']; ?>
-150x150.<?php echo $this->_tpl_vars['entry']['ext']; ?>
);"></div><?php endif; ?>
                <div>
                  <span class="timeago" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%dT%T') : smarty_modifier_date_format($_tmp, '%Y-%m-%dT%T')); ?>
">&nbsp;</span>
                  <?php if ($this->_tpl_vars['entry']['rubrika']): ?><span class="divider">|</span><em><?php echo $this->_tpl_vars['entry']['rubrika'][0]['word']; ?>
</em><?php endif; ?>
                </div>
                  <?php echo $this->_tpl_vars['entry']['title']; ?>

              </a>
            </li>
    <?php endforeach; endif; unset($_from); ?>
          </ul>
        </div>



      </div>
      <div class="clearfix"></div>








        <div class="copyright">
          <p><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 &copy; Использование материалов и новостей сайта разрешается при условии ссылки на издание. Для новостных и интернет-изданий обязательной является прямая, открытая для поисковых систем гиперссылка в первом абзаце на цитируемую статью или новость.</p>
        </div>


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
    <script src="/templates/public/js/jquery.timeago.js"></script>
    <script src="/templates/public/js/jquery.timeago.ru.js"></script>
    <script src="/templates/public/js/share42.js"></script>
    <script src="/templates/public/js/bootstrap-tooltip.js"></script>
    <script src="/templates/public/js/jquery.storage.js"></script>
    // <script src="http://fotorama.s3.amazonaws.com/4.1.5/fotorama.js"></script>
    <script defer src="/templates/public/js/idangerous.swiper-2.0.min.js"></script>
    <script defer src="/templates/public/js/idangerous.swiper.scrollbar-2.0.js"></script>

    <script>
      $(document).ready(function () {
        $('.timeago').timeago();
        $('.fotorama').fotorama();
      });
    </script>

  </body>
</html>
