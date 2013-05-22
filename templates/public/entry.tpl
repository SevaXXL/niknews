{{* Smarty *}}

<article>
<div class="page-header">
    <div class="timeago" title="{{ $data.intime|date_format:'%Y-%m-%dT%T' }}">&nbsp;</div>

  <h1>{{ $data.title }}</h1>
  <h2>{{ $data.subtitle }}</h2>
</div>

<div class="page-header">
  <a href="#" class="share-vkontakte"></a>
  <a href="#" class="share-facebook"></a>
  <a href="#" class="share-odnoklassniki"></a>
  <a href="#" class="share-twitter"></a>
  <a href="#" class="share-email"></a>
  <div class="share42init________ pull-right" data-path="/templates/public/img/"></div>


  <div class="btn-group pull-right">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
      <i class="icon-text-height"></i>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#" data-font-size="decrease">Уменьшить</a></li>
      <li><a href="#" data-font-size="increase">Увеличить</a></li>
    </ul>
  </div>


  <time datetime="{{ $data.intime|date_format:'%Y-%m-%dT%T' }}" class="biser">{{ $data.intime|date_format:"%e %B %Y года, %R" }}</time>


{{ if $data.authorName }}
  <p><em class="biser muted">Автор:</em> <a href="/author/{{ $data.authorName }}/">{{ $data.authorFullName }}</a></p>
{{ /if }}
  <div class="clearfix"></div>
</div>




<div class="row-fluid">
  <div class="span8">


    <div class="lead"><div id="article-lead">{{ $data.lead }}</div></div>

    <div class="media-sidebar pull-left" style="margin: 0 1em 1em 0; width: 220px;">
      <div class="lightbox-css">
        <img src="http://placehold.it/220x100" data-src="http://placehold.it/640x500" alt="">
        <div class="caption">caption подпись в несколько строчек</div>
      </div>
    </div>

    <div id="article-body">
      {{ $data.content }}
    </div>

{{ if $data.keywords }}
    <p>
      <b>Keys:</b>
  {{ foreach from=$data.keywords item=keyword name=myKeys }}
      <a href="/keyword/{{ $keyword.link }}/">{{ $keyword.word }}</a>{{ if not $smarty.foreach.myKeys.last }}, {{ /if }}
  {{ /foreach }}
    </p>
{{ /if }}

{{ if $data.comments }}
<div id="hypercomments_widget"></div>
<script>
_hcwp = window._hcwp || [];
_hcwp.push({widget:"Stream", widget_id:7277});
(function() {
if("HC_LOAD_INIT" in window)return;
HC_LOAD_INIT = true;
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/7277/"+lang+"/widget.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>
{{ /if }}


  </div>
  <div class="span4">
  {{ include file='sidebar.tpl' }}
  </div>
</div>
</article>


<script>
$(document).ready(function () {

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


  // Относительное представление дат
  $('.timeago').timeago();



  $('.lightbox-css').each(function() {
    var src = $(this).find('img').data('src'),
        caption = $(this).find('.caption').html();
    $(this).prepend('<div class="full-review"><img src="' + src + '"><div class="caption">' + caption + '</div></div>');
  });



  $('.lightbox-css').click(function() {
    $('.full-review').toggle();
  });


{{ if $data.photoalbum }}
  $('.lead').prepend('<div id="swiper-thumb" class="swiper-container"><div class="swiper-wrapper"></div></div><div id="swiper-img" class="swiper-container"><div class="swiper-wrapper"></div></div><div id="swiper-caption"></div><div id="swiper-pagination"></div>');
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
    var mySwiper = $('#swiper-img').swiper({
      pagination: '#swiper-pagination'
      //autoPlay: 5000,
      //onSlideChangeEnd: function(e) { showCaption(e.activeSlide) },
      //speed: 300
    });
    var mySwiperThumb = $('#swiper-thumb').swiper({
      freeMode: true,
      freeModeFluid: true,
      slidesPerSlide: 8
      //speed: 0
    });
    var showCaption = function(slide) {
      $('#swiper-caption').text(caption[slide]);
      mySwiperThumb.swipeTo(slide);
      $('#swiper-thumb .active').removeClass('active');
      $('#swiper-thumb .swiper-slide').eq(slide).addClass('active');

    };
    var caption = [];
    $.each(data.feed.entry, function(i, item) {
      mySwiperThumb.appendSlide('<img src="' + item.media$group.media$thumbnail[0].url + '" alt="">');

      mySwiper.appendSlide('<figure><img src="' + item.media$group.media$thumbnail[1].url + '" alt="' + item.media$group.media$description.$t + '"><figcaption>caption ' + i + '</figcaption></figure>');
      caption[i] = item.media$group.media$description.$t;
    });
    $('#swiper-pagination .swiper-pagination-switch').click(function() {
      mySwiper.swipeTo($(this).index());
      mySwiperThumb.swipeTo($(this).index());
      mySwiper.stopAutoPlay();
    });
    showCaption(0);
  });
{{ /if }}
});

</script>
