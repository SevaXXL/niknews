
<h1>Авторы</h1>
<table class="table">
	{{ foreach from=$authors item=entry name=thisforeach }}
	<tr>
		<td>{{ $smarty.foreach.thisforeach.iteration }}</td>
		<td><a href="/author/{{ $entry.unixword }}/">{{ $entry.word }}</a></td>
		<td>{{ $entry.total }}</td>
	</tr>
	{{ /foreach }}
</table>
