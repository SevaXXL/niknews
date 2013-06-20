{{* Smarty *}}

<div class="row-fluid">
	<div class="span8">
{{ foreach from=$newsline item=entry }}
  {{ if $entry.rubrika }}
    <ul class="breadcrumb">
    {{ foreach from=$entry.rubrika item=value name=thisforeach }}
      <li><a href="{{ $value.link }}">{{ $value.word }}</a>{{ if not $smarty.foreach.thisforeach.last }}<span class="divider"> &gt; </span>{{ /if }}</li>
    {{ /foreach }}
    </ul>
  {{ /if }}


		<h4><a href="{{ $entry.url }}">{{ $entry.title }}</a></h4>
    {{ if $entry.image }}
        <img src="/files/part{{ $entry.imagepart }}/{{ $entry.image }}-150x75.{{ $entry.ext }}" class="pull-left" style="margin-right: 1em;">
    {{ /if }}
		<p>{{ $entry.lead|strip_tags:false|mb_truncate:300  }}</p>
    <div class="biser clearfix">
      <span class="timeago" title="{{ $entry.intime|date_format:'%Y-%m-%dT%T' }}">&nbsp;</span>
    </div>

    <hr>
{{ /foreach }}
	</div>
	<div class="span4">
    <h4>Сообщения</h4>
{{ foreach from=$list item=entry }}
    <h5><a href="{{ $entry.url }}">{{ $entry.title }}</a></h5>
{{ /foreach }}
    <div class="well">
      <h4>Пресс-релиз</h4>
{{ foreach from=$press_reliz item=entry }}
      <h5><a href="{{ $entry.url }}">{{ $entry.title }}</a></h5>
{{ /foreach }}
    </div>
    {{ include file='sidebar.tpl' }}
  </div>
</div>

<script>
  $(document).ready(function () {
    // Относительное представление дат
    $('.timeago').timeago();
  });
</script>


