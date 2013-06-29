<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $data.lead|strip_tags:false|escape:'UTF-8' }}">
    <meta name="robots" content="{{ if $template == 'entry.tpl' || $template == 'main.tpl' }}index{{ else }}noindex, follow{{ /if }}">

    <title>{{ $title|escape:'UTF-8'|default:"Николаевские новости" }}</title>

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

{{ dynamic }}
    <!-- Static: {{ if $CACHE }}Yes{{ else }}No{{ /if }} | Time: {{ $TIME }} s | Queries: {{ $TOTALDBQUERIES }} | Memory: {{ $MEMORY }} MB -->
  {{ if $smarty.session.admin }}
    <ul class="admin-menu">
      <li><a href="/logout/" class="exit"></a></li>
      <li><a href="/clearcache/" class="clearcache"></a></li>
      <li><a href="/add/" class="add"></a></li>
    {{ if $template == 'entry.tpl' }}
      <li><a href="edit/" class="edit"></a></li>
      <li><a href="photo/" class="media"></a></li>
    {{ elseif $template == 'author.tpl' }}
      <li><a href="edit/" class="edit"></a></li>
    {{ /if }}
    </ul>
  {{ /if }}
{{ /dynamic }}

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
          <div class="thumb" style="width: 100%; height: 280px; margin: 0; float: none; background-image: url(/files/part{{ $hitnews.part }}/{{ $hitnews.image }}-624x624.jpg);"></div>
          <div class="hitnews">{{ $hitnews.title }}</div>
        </div>
        <div class="col-304">
          <ul class="newsline">
    {{ foreach from=$topnews item=entry }}
            <li><a href="{{ $entry.urlcache }}/">{{ $entry.title }} <span class="timeago" title="{{ $entry.intime|date_format:'%Y-%m-%dT%T' }}"></span></a></li>
    {{ /foreach }}
          </ul>
        </div>
        <div class="clearfix"></div>
        <div class="adv-468">
          <img src="http://placehold.it/468x60">
        </div>

  {{ foreach from=$newsline item=entry }}
      {{ if $entry.image }}
          <div class="thumb" style="width: 192px; height: 100px; background-image: url(/files/part{{ $entry.imagepart }}/{{ $entry.image }}-150x150.{{ $entry.ext }});"></div>
      {{ /if }}
      <h4><a href="{{ $entry.url }}">{{ $entry.title }}</a></h4>
      <p>{{ $entry.lead|strip_tags:false|mb_truncate:300  }}</p>
      <ul class="breadcrumb clearfix">
 
    {{ if $entry.rubrika }}
      {{ foreach from=$entry.rubrika item=value name=thisforeach }}
        <li><a href="{{ $value.link }}">{{ $value.word }}</a>{{ if not $smarty.foreach.thisforeach.last }}<span class="divider"> &gt; </span>{{ /if }}</li>
      {{ /foreach }}
      <li><span class="divider"> | </span></li>
    {{ /if }}
        <li><span class="timeago" title="{{ $entry.intime|date_format:'%Y-%m-%dT%T' }}">&nbsp;</span></li>
      </ul>
      <hr>
  {{ /foreach }}


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
    {{ foreach from=$newsline item=entry }}
            <li>
              <a href="{{ $entry.url }}">
                {{ if $entry.videofull }}
                <div id="{{ $entry.video }}" class="thumb-video"><img src="/templates/public/img/button-play.png" alt="Видео"></div>
                <script>
                $(document).ready(function () {
                  $.getJSON('http://gdata.youtube.com/feeds/api/videos/{{ $entry.video }}?callback=?', {
                    'alt': 'json-in-script'
                  }).done(function(data){
                    $('#{{ $entry.video }}').css('background-image', 'url(' + data.entry.media$group.media$thumbnail[0].url + ')');
                  });
                });
                </script>
                {{ elseif $entry.image }}<div class="thumb" style="width: 60px; height: 60px; background-image: url(/files/part{{ $entry.imagepart }}/{{ $entry.image }}-150x150.{{ $entry.ext }});"></div>{{ /if }}
                <div>
                  <span class="timeago" title="{{ $entry.intime|date_format:'%Y-%m-%dT%T' }}">&nbsp;</span>
                  {{ if $entry.rubrika }}<span class="divider">|</span><em>{{ $entry.rubrika[0].word }}</em>{{ /if }}
                </div>
                  {{ $entry.title }}
              </a>
            </li>
    {{ /foreach }}
          </ul>
        </div>



      </div>
      <div class="clearfix"></div>








        <div class="copyright">
          <p>{{ $smarty.now|date_format:"%Y" }} &copy; Использование материалов и новостей сайта разрешается при условии ссылки на издание. Для новостных и интернет-изданий обязательной является прямая, открытая для поисковых систем гиперссылка в первом абзаце на цитируемую статью или новость.</p>
        </div>


      <footer>
        <ul class="inline">
          <li><a href="/">Главная</a></li>
          <li><a href="/author/">Авторы</a></li>
          <li><a href="/{{ $smarty.now|date_format:"%Y" }}/">Архив</a></li>
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

