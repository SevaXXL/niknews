{{* Отображаем рубрики в два уровня вложенности *}}
<ul>
{{ foreach from=$nav_rubrika item=value }}
	<li><a href="/{{ $value.unixword }}/">{{ $value.word }}</a>{{ if $value.child }}
		<ul>
	{{ foreach from=$value.child key=key item=rubrika_name }}
			<li><a href="/{{ $value.unixword }}_{{ $key }}/">{{ $rubrika_name }}</a></li>
	{{ /foreach}}
		</ul>{{ /if }}
	</li>
{{ /foreach }}
</ul>
