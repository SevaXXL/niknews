{{* Smarty *}}
<div class="clearfix">
    <div class="col-large">
      <div class="col-main">
  {{ foreach from=$newsline item=entry }}
      {{ if $entry.image }}
          <div class="thumb" style="width: 100px; height: 100px; background-image: url(/files/part{{ $entry.imagepart }}/{{ $entry.image }}-150x150.{{ $entry.ext }});"></div>
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


      <div class="fotorama">foto</div>


    </div>
    {{ rubrika }}
  </div>

    <div class="col-newsline">
      <div class="text-center"><div class="adv"><img src="http://placehold.it/300x250"></div></div>
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
      <h4>* * *</h4>

    </div>
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


