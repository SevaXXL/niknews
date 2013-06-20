<ul class="breadcrumb">
    <li><a href="/author/">Все авторы</a> <span class="divider">&gt;</span></li>
    <li class="active">Автор</li>
</ul>
<div class="page-header">
    <h1>{{ $author }}</h1>
</div>
<div class="row-fluid">
    <div class="span8">
        <ol>
        {{ foreach from=$data item=entry }}
            <li><span class="biser">{{ $entry.intime|date_format:'%d.%m.%Y' }}</span> <a href="{{ $entry.intime|date_format:'/%Y/%m/%d/' }}{{ $entry.urlcache }}/">{{ $entry.title }}</a></li>
        {{ /foreach }}
        </ol>
    </div>
    <div class="span4">
        <div class="well">
            Об авторе
        </div>
    </div>
</div>

