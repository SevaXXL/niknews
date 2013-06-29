<?php /* Smarty version 2.6.27, created on 2013-06-29 03:30:21
         compiled from main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'main.tpl', 10, false),array('modifier', 'strip_tags', 'main.tpl', 89, false),array('modifier', 'mb_truncate', 'main.tpl', 89, false),array('function', 'rubrika', 'main.tpl', 108, false),)), $this); ?>

  <div class="col-main">
    <div class="col-main-left">
      <form action="/search/">
          <input type="search" placeholder="Поиск" name="q" class="" x-webkit-speech>
      </form>
      <div class="gradient">
  <?php $_from = $this->_tpl_vars['newsline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
      <div><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%R') : smarty_modifier_date_format($_tmp, '%R')); ?>
</div>
      <p><a href="<?php echo $this->_tpl_vars['entry']['url']; ?>
/"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></p>
  <?php endforeach; endif; unset($_from); ?>
      </div>
    </div>
    <div class="col-main-center">
      <div class="adv-main">
        <img src="http://placehold.it/468x60">
      </div>
      <div class="photo">
        <img src="http://placehold.it/102x60">
        Бейсбол в Америке. Гринжакетс (Огаста) - Реведокс (Чарльстон)
      </div>
      <div class="photo">
        <img src="http://placehold.it/102x60">
        Футбол. Украина - Камерун - 0:0. Товарищесткий матч
      </div>
      <div class="photo">
        <img src="http://placehold.it/102x60">
        Ливень в Николаеве
      </div>
      <div class="photo-last">
        <img src="http://placehold.it/102x60">
        Суперлига «Будевельник» - «Азовмаш» - 89:75
      </div>
      <div class="clearfix"></div>
      <div class="header-text"><a href="#">Все галереи</a></div>
      <div class="gradient-line"></div>
      <div class="header-line">Сегодня в Украине</div>
      <div class="gradient-line"></div>

        <div class="item-block">
          <div class="top-photo">
            <img src="http://placehold.it/180x120">
            <p>«Покращення» продолжается: промышленность упала почти на 10%</p>
          </div>
          <div class="">
            <p><a href="#">Сотрудники уголовного розыска Корабельного райотдела милиции задержали грабителей, которые в конце мая обчистили ювелирный магазин «Сапфир»</a></p>
            <p><a href="#">Николаевец Роман Замбалюк стал главным ревизором в</a></p>
          </div>
        </div>
    </div>
  <div class="clearfix"></div>
  <div class="line"></div>
  <div class="header-text"><a href="#">Все галереи</a></div>
<?php $_from = $this->_tpl_vars['kriminal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
  <p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '/%Y/%m/%d/') : smarty_modifier_date_format($_tmp, '/%Y/%m/%d/')); ?>
<?php echo $this->_tpl_vars['entry']['urlcache']; ?>
/"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></p>
<?php endforeach; endif; unset($_from); ?>
  </div>
  <div class="col-right">
    <div class="gradient-line"></div>
    <div class="sport-live">Спорт-live</div>
    <div class="gradient-line"></div>
    <img src="/templates/public/img/table.png" style="margin: 1em 0;">
    <div class="gradient-line"></div>
    <div class="header-line">Спорт</div>
    <div class="gradient-line"></div>
  <?php $_from = $this->_tpl_vars['sport']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
      <div class="time-area"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%R') : smarty_modifier_date_format($_tmp, '%R')); ?>
</div>
      <div class="head-area"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '/%Y/%m/%d/') : smarty_modifier_date_format($_tmp, '/%Y/%m/%d/')); ?>
<?php echo $this->_tpl_vars['entry']['urlcache']; ?>
/"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></div>
  <?php endforeach; endif; unset($_from); ?>
  </div>
  <div class="clearfix"></div>
  test







<div class="clearfix">
    <div class="col-large">
      <div class="col-main">
  <?php $_from = $this->_tpl_vars['newsline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
      <?php if ($this->_tpl_vars['entry']['image']): ?>
          <div class="thumb" style="width: 100px; height: 100px; background-image: url(/files/part<?php echo $this->_tpl_vars['entry']['imagepart']; ?>
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


      <div class="fotorama">foto</div>


    </div>
    <?php echo smarty_function_rubrika(array(), $this);?>

  </div>

    <div class="col-newsline">
      <div class="text-center"><div class="adv"><img src="http://placehold.it/300x250"></div></div>
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
      <h4>* * *</h4>

    </div>
</div>

<script>

  $(document).ready(function () {

    // Относительное представление дат
    $('.timeago').timeago();

/*
  var userid = '111720744204085188373', albumid = '5714486801380640769';//<?php echo $this->_tpl_vars['data']['photoalbum']; ?>
';
  var picasaAPI = 'https://picasaweb.google.com/data/feed/api/user/' + userid + '/albumid/' + albumid + '?callback=?';

  $.getJSON(picasaAPI, {
    'kind': 'photo',
    'access': 'public',
    'max-results': 50,
    'thumbsize': '72c,640u',
    'alt': 'json-in-script'
  })
  .done(function(data) {
    var slides = '';
    $.each(data.feed.entry, function(i, item) {
      slides += '<a href="' + item.media$group.media$thumbnail[1].url + '" data-caption="' + item.media$group.media$description.$t + '"><img src="' + item.media$group.media$thumbnail[0].url + '"></a>';
    });
    $('.fotorama').html(slides);
    $('.fotorama').fotorama({
      width: '100%',
      ratio: '800/600',
      allowFullScreen: true
    });
  });
*/




  });
</script>

