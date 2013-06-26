<?php /* Smarty version 2.6.27, created on 2013-06-24 21:46:31
         compiled from entry.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'entry.tpl', 32, false),array('modifier', 'month', 'entry.tpl', 32, false),)), $this); ?>

<?php if ($this->_tpl_vars['data']['rubrika']): ?>
  <ul class="breadcrumb">
  <?php $_from = $this->_tpl_vars['data']['rubrika']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['thisforeach']['iteration']++;
?>
    <li><a href="<?php echo $this->_tpl_vars['value']['link']; ?>
"><?php echo $this->_tpl_vars['value']['word']; ?>
</a><?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?><span class="divider"> &gt; </span><?php endif; ?></li>
  <?php endforeach; endif; unset($_from); ?>
  </ul>
<?php endif; ?>

<article>

  <div class="page-header">
    <h1><?php echo $this->_tpl_vars['data']['title']; ?>
</h1>
    <h2><?php echo $this->_tpl_vars['data']['subtitle']; ?>
</h2>
  </div>

<div class="page-header">

  <div class="share42init pull-right" data-path="/templates/public/img/"></div>

  <div class="btn-group pull-right">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
      <i class="icon-text-height"></i>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#" data-font-size="decrease">Уменьшить</a></li>
      <li><a href="#" data-font-size="increase">Увеличить</a></li>
    </ul>
  </div>

  <time datetime="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%dT%T') : smarty_modifier_date_format($_tmp, '%Y-%m-%dT%T')); ?>
" class="biser"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e") : smarty_modifier_date_format($_tmp, "%e")); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")))) ? $this->_run_mod_handler('month', true, $_tmp) : smarty_modifier_month($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y года, %R") : smarty_modifier_date_format($_tmp, "%Y года, %R")); ?>
</time>

<?php if ($this->_tpl_vars['data']['authors']): ?>
  <p>
    <small class="muted">Автор:</small>
  <?php $_from = $this->_tpl_vars['data']['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['keyword']):
        $this->_foreach['thisforeach']['iteration']++;
?>
    <a href="/author/<?php echo $this->_tpl_vars['keyword']['link']; ?>
/"><?php echo $this->_tpl_vars['keyword']['word']; ?>
</a><?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?>, <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  </p>
<?php endif; ?>

  <div class="clearfix"></div>
</div>

<?php if ($this->_tpl_vars['data']['video'] && $this->_tpl_vars['data']['videofull']): ?>
<!-- :TODO: добавить изменение размера при ресайзе -->
<iframe width="990" height="586" src="http://www.youtube.com/embed/<?php echo $this->_tpl_vars['data']['video']; ?>
" frameborder="0" allowfullscreen></iframe>
<?php endif; ?>


<div class="row-fluid">
  <div class="span8">

<?php if ($this->_tpl_vars['data']['top_photo']): ?>
  <img src="/files/part<?php echo $this->_tpl_vars['data']['top_photo']['part']; ?>
/<?php echo $this->_tpl_vars['data']['top_photo']['id']; ?>
-640x640.<?php echo $this->_tpl_vars['data']['top_photo']['ext']; ?>
">
  <div class="credit"><?php echo $this->_tpl_vars['data']['top_photo']['credit']; ?>
</div>
  <div class="caption"><?php echo $this->_tpl_vars['data']['top_photo']['caption']; ?>
</div>
<?php endif; ?>

    <div class="lead">
      <div id="article-lead"><?php echo $this->_tpl_vars['data']['lead']; ?>
</div>
    </div>

    <div class="media-sidebar pull-left" style="margin: 0 1em 1em 0; width: 220px;">
    <?php $_from = $this->_tpl_vars['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
      <div class="lightbox-css">
        <img src="/files/part<?php echo $this->_tpl_vars['value']['part']; ?>
/<?php echo $this->_tpl_vars['value']['imgid']; ?>
-220x200.<?php echo $this->_tpl_vars['value']['ext']; ?>
" data-src="/files/part<?php echo $this->_tpl_vars['value']['part']; ?>
/<?php echo $this->_tpl_vars['value']['imgid']; ?>
-640x640.<?php echo $this->_tpl_vars['value']['ext']; ?>
" alt="">
        <div class="credit"><?php echo $this->_tpl_vars['value']['credit']; ?>
</div>
        <div class="caption"><?php echo $this->_tpl_vars['value']['caption']; ?>
</div>
      </div>
    <?php endforeach; endif; unset($_from); ?>

      <?php if ($this->_tpl_vars['data']['video'] && ! $this->_tpl_vars['data']['videofull']): ?>
      <iframe width="220" height="140" src="http://www.youtube.com/embed/<?php echo $this->_tpl_vars['data']['video']; ?>
" frameborder="0" allowfullscreen></iframe>
      <?php endif; ?>

    </div>

    <div id="article-body">
      <?php echo $this->_tpl_vars['data']['content']; ?>

    </div>

<?php if ($this->_tpl_vars['data']['keywords']): ?>
    <p>
      <small class="muted">Ключевые слова:</small>
  <?php $_from = $this->_tpl_vars['data']['keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myKeys'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myKeys']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['keyword']):
        $this->_foreach['myKeys']['iteration']++;
?>
      <a href="/keyword/<?php echo $this->_tpl_vars['keyword']['link']; ?>
/"><?php echo $this->_tpl_vars['keyword']['word']; ?>
</a><?php if (! ($this->_foreach['myKeys']['iteration'] == $this->_foreach['myKeys']['total'])): ?>, <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
    </p>
<?php endif; ?>

    <div class="clearfix"></div>

<?php if (! $this->_tpl_vars['data']['comments']): ?>
    <div id="hypercomments_widget"></div>
    <p class="biser"><a href="http://hypercomments.com/" class="hc-link" title="comments widget">comments powered by HyperComments</a></p>
<?php endif; ?>

  </div>
  <div class="span4">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
</div>
</article>


<script>
$(document).ready(function () {

<?php if (! $this->_tpl_vars['data']['comments']): ?>
  _hcwp = window._hcwp || [];
  _hcwp.push({widget:"Stream", widget_id:7277});
  (function() {
  if ("HC_LOAD_INIT" in window) return;
  HC_LOAD_INIT = true;
  var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
  var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
  hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/7277/"+lang+"/widget.js";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hcc, s.nextSibling);
  })();
<?php endif; ?>




 /**
  * Изменение размера шрифта статьи
  * @jquery.storage.js
  */
  var storage_font_size = 'article-font-size';
  var fontSize = $.localStorage(storage_font_size) || 100;
  $('#article-lead, #article-body').css('fontSize', fontSize + '%');

  // Изменяем размер шрифта
  $('a[data-font-size]').click(function(e) {
    e.preventDefault();
    fontSize = parseInt(fontSize);
    ($(this).data('font-size') == 'increase') ? fontSize += 5 : fontSize -= 5;
    if (fontSize < 90) {
      fontSize = 90;
    } else if (fontSize > 150) {
      fontSize = 150;
    }
    $.localStorage(storage_font_size, fontSize);
    $('#article-lead, #article-body').css('fontSize', fontSize + '%');
  });

  $('#share42 > a').tooltip();


  // :TODO: вставить эту функцию только при клике
  $('.lightbox-css').each(function() {
    var src = $(this).find('img').data('src');
    var caption = $(this).find('.caption').html() + ' <span class="credit">' + $(this).find('.credit').html() + '</span>';
    $(this).prepend('<div class="full-review"><img src="' + src + '"><div class="caption">' + caption + '</div></div>');
  });

  $('.lightbox-css').click(function() {
    $('.full-review').toggle();
  });


<?php if (! $this->_tpl_vars['data']['photoalbum']): ?>
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
    $('<div class="fotorama"></div>').html(slides).appendTo('.media-sidebar');
    $('.fotorama').fotorama({
      width: '100%',
      ratio: '800/600',
      allowFullScreen: true
    });
  });
<?php endif; ?>


});

</script>