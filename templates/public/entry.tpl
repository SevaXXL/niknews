{{* Smarty *}}

{{ if $data.rubrika }}
  <ul class="breadcrumb">
  {{ foreach from=$data.rubrika item=value name=thisforeach }}
    <li><a href="{{ $value.link }}">{{ $value.word }}</a>{{ if not $smarty.foreach.thisforeach.last }}<span class="divider"> &gt; </span>{{ /if }}</li>
  {{ /foreach }}
  </ul>
{{ /if }}

<article>

  <div class="page-header">
    <h1>{{ $data.title }}</h1>
    <h2>{{ $data.subtitle }}</h2>
  </div>

<div class="page-header">
<!--   <a href="#" class="share-vkontakte"></a>
  <a href="#" class="share-facebook"></a>
  <a href="#" class="share-odnoklassniki"></a>
  <a href="#" class="share-twitter"></a>
  <a href="#" class="share-email"></a>
 -->
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

  <time datetime="{{ $data.intime|date_format:'%Y-%m-%dT%T' }}" class="biser">{{ $data.intime|date_format:"%e" }} {{ $data.intime|date_format:"%m"|month }} {{ $data.intime|date_format:"%Y года, %R" }}</time>

{{ if $data.authors }}
  <p>
    <small class="muted">Автор:</small>
  {{ foreach from=$data.authors item=keyword name=thisforeach }}
    <a href="/author/{{ $keyword.link }}/">{{ $keyword.word }}</a>{{ if not $smarty.foreach.thisforeach.last }}, {{ /if }}
  {{ /foreach }}
  </p>
{{ /if }}

  <div class="clearfix"></div>
</div>

{{ if $data.video and $data.videofull }}
<!-- :TODO: добавить изменение размера при ресайзе -->
<iframe width="990" height="586" src="http://www.youtube.com/embed/{{ $data.video }}" frameborder="0" allowfullscreen></iframe>
{{ /if }}


<div class="row-fluid">
  <div class="span8">

{{ if $data.top_photo }}
  <img src="/files/part{{ $data.top_photo.part }}/{{ $data.top_photo.id }}-640x640.{{ $data.top_photo.ext }}">
  <div class="credit">{{ $data.top_photo.credit }}</div>
  <div class="caption">{{ $data.top_photo.caption }}</div>
{{ /if}}

    <div class="lead">
      <div id="article-lead">{{ $data.lead }}</div>
    </div>

    <div class="media-sidebar pull-left" style="margin: 0 1em 1em 0; width: 220px;">
    {{ foreach from=$images item=value }}
      <div class="lightbox-css">
        <img src="/files/part{{ $value.part }}/{{ $value.imgid }}-220x200.{{ $value.ext }}" data-src="/files/part{{ $value.part }}/{{ $value.imgid }}-640x640.{{ $value.ext }}" alt="">
        <div class="credit">{{ $value.credit }}</div>
        <div class="caption">{{ $value.caption }}</div>
      </div>
    {{ /foreach }}

      {{ if $data.video and !$data.videofull }}
      <iframe width="220" height="140" src="http://www.youtube.com/embed/{{ $data.video }}" frameborder="0" allowfullscreen></iframe>
      {{ /if }}

    </div>

    <div id="article-body">
      {{ $data.content }}
    </div>

{{ if $data.keywords }}
    <p>
      <small class="muted">Ключевые слова:</small>
  {{ foreach from=$data.keywords item=keyword name=myKeys }}
      <a href="/keyword/{{ $keyword.link }}/">{{ $keyword.word }}</a>{{ if not $smarty.foreach.myKeys.last }}, {{ /if }}
  {{ /foreach }}
    </p>
{{ /if }}

    <div class="clearfix"></div>

{{ if !$data.comments }}
    <div id="hypercomments_widget"></div>
    <p class="biser"><a href="http://hypercomments.com/" class="hc-link" title="comments widget">comments powered by HyperComments</a></p>
{{ /if }}

  </div>
  <div class="span4">
  {{ include file='sidebar.tpl' }}
  </div>
</div>
</article>


<script>
$(document).ready(function () {

{{ if !$data.comments }}
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
{{ /if }}




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


{{ if !$data.photoalbum }}
  var userid = '111720744204085188373', albumid = '5714486801380640769';//{{ $data.photoalbum }}';
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
{{ /if }}


});

</script>
