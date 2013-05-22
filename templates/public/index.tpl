<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $data.lead|strip_tags:false|escape:'UTF-8' }}">
    <meta name="robots" content="{{ if $template == 'entry.tpl' || $template == 'main.tpl' }}index{{ else }}noindex, follow{{ /if }}">

    <title>{{ $data.title|escape:'UTF-8'|default:"Николаевские новости" }}</title>
    <!-- <link rel="stylesheet" href="/templates/public/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="/templates/public/css/bootstrap-responsive.min.css" /> -->


    <link rel="stylesheet/less" href="/templates/public/less/bootstrap.less?ver=10" media="screen">
    <link rel="stylesheet/less" href="/templates/public/less/responsive.less" media="screen">

    <link rel="stylesheet" media="all" href="/templates/public/css/header.css">
    <link rel="stylesheet" media="all" href="/templates/public/css/idangerous.swiper.css">
    <link rel="stylesheet" media="all" href="/templates/public/css/idangerous.swiper.scrollbar.css">
    <link rel="stylesheet" media="all" href="/templates/public/css/idangerous.swiper.scrollbar.css">


<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700&amp;subset=cyrillic,latin' rel='stylesheet'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,800,400,700&amp;subset=latin,cyrillic' rel='stylesheet'>

    <script src="/templates/public/js/less-1.3.3.min.js"></script>


    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

{{ dynamic }}
    <!-- Static: {{ if $CACHE }}Yes{{ else }}No{{ /if }} | Time: {{ $TIME }} s | Queries: {{ $TOTALDBQUERIES }} | Memory: {{ $MEMORY }} MB -->
  {{ if $smarty.session.admin }}

    <ul class="admin-menu">
      <li><a href="/logout/" class="exit"></a></li>
      <li><a href="/clearcache/" class="clearcache"></a></li>
      <li><a href="/add/" class="add"></a></li>
    {{ if $template == 'entry.tpl' }}
      <li><a href="edit/" class="edit"></a></li>
      <li><a href="#" class="media"></a></li>
    {{ /if }}
    </ul>
  {{ /if }}
{{ /dynamic }}



    <div class="container-fluid">
      <div class="wrapper">
        <div class="row-fluid">
          <ul class="nav nav-pills pull-right">
            <li>

            </li>
          </ul>
          <ul class="inline"> 
            <li><a href="/">Главная</a></li>
            <li><a href="#">Media Gallery</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                Dropdown
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><a href="/sitemap/">Sitemap</a></li>
                <li><a href="/archives/">Archives</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div id="header">
          <form action="/search/" class="pull-right">
            <input type="search" placeholder="Поиск" name="q">
          </form>
            <h1><a href="/">Николаевские новости</a></h1>
        </div><!-- #header -->

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <ul class="nav">
              <li><a href="/">Главная</a></li>
              <li class="divider-vertical"></li>
              <li><a href="#">Link</a></li>
              <li class="divider-vertical"></li>
              <li><a href="#">Link</a></li>
              <li class="divider-vertical"></li>
              <li>
                <a href="#">Рубрики <span class="down">&#9662;</span></a>
                <ul>
                  <li><a href="#">Меню 1</a></li>
                  <li><a href="#">Меню 2</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        {{ include file=$template }}

        <div class="copyright">
          <p>
            {{ $smarty.now|date_format:"%Y" }} &copy; Использование материалов и новостей сайта разрешается при условии ссылки на издание. Для новостных и интернет-изданий обязательной является прямая, открытая для поисковых систем гиперссылка в первом абзаце на цитируемую статью или новость.
          </p>
        </div>

      </div><!-- /.wrapper -->

      <footer>
          <ul class="inline">
            <li><a href="/">Главная</a></li>
            <li><a href="#">Авторы</a></li>
            <li><a href="/{{ $smarty.now|date_format:"%Y" }}/">Архив</a></li>
            <li><a href="#">Статистика</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">RSS</a></li>
          </ul>      
      </footer>


    </div><!-- /.container -->


    <script src="/templates/public/js/bootstrap-dropdown.js"></script>
    <script src="/templates/public/js/jquery.scrollUp.min.js"></script>
    <script src="/templates/public/js/jquery.timeago.js"></script>
    <script src="/templates/public/js/jquery.timeago.ru.js"></script>
    <script src="/templates/public/js/share42.js"></script>
    <script src="/templates/public/js/bootstrap-tooltip.js"></script>
    <script src="/templates/public/js/idangerous.swiper-1.9.1.min.js"></script>
    <script src="/templates/public/js/idangerous.swiper.scrollbar-1.3.js"></script>
    <!-- Для хранения размера шрифта статьи -->
    <script src="/templates/public/js/jquery.storage.js"></script>



    <script>
      $(document).ready(function () {

        // Панель прокрутки вверх
        $.scrollUp({
          animation: 'none',
          scrollImg: true
        });


        $('#share42 > a').tooltip();

        // Предупреждение при копировании
        $(document).bind('copy', function(e) {
          alert('Использование материалов сайта Николаевских новостей разрешается при условии ссылки на издание. Для новостных и интернет-изданий обязательной является прямая, открытая для поисковых систем гиперссылка в первом абзаце на цитируемую статью или новость.');
        });

      });
    </script>



  </body>
</html>

