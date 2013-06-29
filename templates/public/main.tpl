{{* Smarty *}}

  <div class="col-main">
    <div class="col-main-left">
      <form action="/search/">
          <input type="search" placeholder="Поиск" name="q" class="" x-webkit-speech>
      </form>
      <div class="gradient">
  {{ foreach from=$newsline item=entry }}
      <div>{{ $entry.intime|date_format:'%R' }}</div>
      <p><a href="{{ $entry.url }}/">{{ $entry.title }}</a></p>
  {{ /foreach }}
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
{{ foreach from=$kriminal item=entry }}
  <p><a href="{{ $entry.intime|date_format:'/%Y/%m/%d/' }}{{ $entry.urlcache }}/">{{ $entry.title }}</a></p>
{{ /foreach }}
  </div>
  <div class="col-right">
    <div class="gradient-line"></div>
    <div class="sport-live">Спорт-live</div>
    <div class="gradient-line"></div>
    <img src="/templates/public/img/table.png" style="margin: 1em 0;">
    <div class="gradient-line"></div>
    <div class="header-line">Спорт</div>
    <div class="gradient-line"></div>
  {{ foreach from=$sport item=entry }}
      <div class="time-area">{{ $entry.intime|date_format:'%R' }}</div>
      <div class="head-area"><a href="{{ $entry.intime|date_format:'/%Y/%m/%d/' }}{{ $entry.urlcache }}/">{{ $entry.title }}</a></div>
  {{ /foreach }}
  </div>
  <div class="clearfix"></div>
  test







<div class="clearfix">

</div>

<script>

  $(document).ready(function () {

    // Относительное представление дат
    $('.timeago').timeago();

/*
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


