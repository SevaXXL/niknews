{{* Smarty *}}

<div class="row-fluid">
	<div class="span8">
{{ foreach from=$newsline item=entry }}
    <div class="timeago" title="{{ $entry.intime|date_format:'%Y-%m-%dT%T' }}">&nbsp;</div>
		<h4>{{ $entry.title }}</h4>
		<p>{{ $entry.lead|strip_tags:false|mb_truncate:300  }}</p>{{* *}}
		<p><a href="{{ $entry.intime|date_format:'/%Y/%m/%d/' }}{{ $entry.urlcache }}/">link</a></p>
{{ /foreach }}
	</div>
	<div class="span4">right col</div>
</div>


<script>
  $(document).ready(function () {
    // Относительное представление дат
    $('div.timeago').timeago();
  });
</script>


