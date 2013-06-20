{{* Ссылки следующего и предыдущего дней *}}
{{ math equation="x + y" x=$ts y=86400 assign=skipForward }}
{{ math equation="x - y" x=$ts y=86400 assign=skipBack }}

<div class="page-header">
    <a class="btn pull-right" href="/{{ $skipForward|date_format:"%Y/%m/%d/" }}">&raquo;</a>
    <a class="btn pull-right" href="/{{ $skipBack|date_format:"%Y/%m/%d/" }}">&laquo;</a>
    <h1>
        {{ $day }} {{ $month|month }} {{ $year }} года
    </h1>
</div>

<div class="row-fluid">
    <div class="span9">
{{ foreach from=$data item=entry }}
        <h4><a href="{{ $entry.url }}"><small>{{ $entry.intime|date_format:'%R' }}</small> {{ $entry.title }}</a></h4>
    {{ if $entry.rubrika }}
        <div class="biser">
      {{ foreach from=$entry.rubrika item=value name=thisforeach }}
            <a href="{{ $value.link }}">{{ $value.word }}</a>{{ if not $smarty.foreach.thisforeach.last }} &gt; {{ /if }}
      {{ /foreach }}
        </div>
    {{ /if }}
        <p>{{ $entry.lead|strip_tags }}</p>
{{ foreachelse }}
            <p>Нет записей в этот день</p>
{{ /foreach }}
    </div>
    <div class="span3">
        {{ calendar year=$year month=$month day=$day }}
    </div>
</div>