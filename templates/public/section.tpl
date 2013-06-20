<ul class="breadcrumb">
    <li class="active">Рубрика</li>
</ul>

<div class="page-header">
    <h1>
        <small>
{{ foreach from=$rubrika item=value name=thisforeach }}
    {{ if !$smarty.foreach.thisforeach.last }}
            <a href="{{ $value.link }}">{{ $value.word }}</a> &gt;
    {{ else }}
        </small>
        {{ $value.word }}
    {{ /if }}
{{ /foreach }}
    </h1>
</div>

<div class="row-fluid">
    <div class="span8">
{{ if $pagerTotal > $smarty.const.PER_PAGE }}
    {{ include file='pagers.tpl' }}
{{ /if }}

{{ foreach from=$data item=entry }}
        <h4><a href="{{ $entry.url }}">{{ $entry.title }}</a></h4>
    {{ if $entry.image }}
        <img src="/files/part{{ $entry.imagepart }}/{{ $entry.image }}-100x100.{{ $entry.ext }}" class="pull-left" style="margin-right: 1em;">
    {{ /if }}
        <p>{{ $entry.lead|strip_tags:false }}</p>
        <div class="biser clearfix">
            {{ $entry.intime|date_format:"%e" }} {{ $entry.intime|date_format:"%m"|month }} {{ $entry.intime|date_format:"%Y г." }}
            {{ if $entry.authors }}
            Автор:
                {{ foreach from=$entry.authors item=value name=thisforeach }}
                    {{ $value.word }}{{ if !$smarty.foreach.thisforeach.last }},{{ /if }}
                {{ /foreach }}
            {{ /if }}
        </div>
        <hr>
{{ /foreach }}


{{ if $pagerTotal > $smarty.const.PER_PAGE }}
    {{ include file='pagers.tpl' }}
{{ /if }}

    </div>
    <div class="span4">
        {{ include file='sidebar.tpl' }}
    </div>
</div>

