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

    <!-- <link rel="stylesheet" href="http://fotorama.s3.amazonaws.com/4.1.5/fotorama.css"> -->
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

  <body class="body">
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

    <div class="container">

      <div class="adv-top"><img src="http://placehold.it/728x90"></div>



      <header>
        <nav>
          <a href="/">Редакция</a>|
          <a href="/">Рекламодателю</a>|
          <a href="/">Архив</a>|
          <a href="/">В закладки</a>|
          <a href="/">Сделать стартовой</a>
        </nav>


        <h1>
          <a class="brand" href="/">Николаевские новости</a>
        </h1>
        <div class="tema">
          <strong>Темы:</strong>
          <a href="#">Стрельба у Корнацкого</a>
          <a href="#">Увольнение забранского</a>
          <a href="#">Отравление в детском саду</a>
          <a href="#">Коблево</a>
          <a href="#">Выборы николаевского мэра</a>
        </div>

      </header>



      <div id="navbar-wrapper">
        <div class="navbar">
          <div class="navbar-inner">
            <ul class="nav menu">
              <li><a href="/">Главная</a></li>
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
          </div>
        </div>
      </div>

<div class="fon">


      <div class="wrapper"><!-- Пустой стиль -->
        {{ include file=$template }}
        <div class="copyright">
          <p>{{ $smarty.now|date_format:"%Y" }} &copy; Использование материалов и новостей сайта разрешается при условии ссылки на издание. Для новостных и интернет-изданий обязательной является прямая, открытая для поисковых систем гиперссылка в первом абзаце на цитируемую статью или новость.</p>
        </div>
      </div><!-- /.wrapper -->
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

        var $window = $(window)
          , $navbar = $('.navbar');

        $window.scroll(function() {
          if (!$navbar.hasClass('fixed') && ($window.scrollTop() > $navbar.offset().top)) {
            $navbar.addClass('fixed').data('top', $navbar.offset().top);
          } else if ($navbar.hasClass('fixed') && ($window.scrollTop() < $navbar.data('top'))) {
            $navbar.removeClass('fixed');
          }
        });


      });
    </script>

  </body>
</html>

