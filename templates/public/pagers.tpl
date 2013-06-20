{{ if $section }}
    {{ assign var=sectionLink value="`$section.unixword`/" }}
{{ /if }}

<ul class="pager">
{{* Первая страница, нет skip в адресе *}}
{{ if !$smarty.get.skip }}
    <li class="next"><a href="/{{ $sectionLink }}skip/{{ $smarty.const.PER_PAGE }}/">Следущая &rarr;</a></li>
{{ else }}
    {{* figure out where back and forward lead to *}}
    {{ math equation="x + y" x=$smarty.get.skip y=$smarty.const.PER_PAGE assign=skipBack }}
    {{ math equation="x - y" x=$smarty.get.skip y=$smarty.const.PER_PAGE assign=skipForward }}

    {{ if $skipForward lt 1 }}
        {{ assign var=skipForward value="`$sectionLink`" }}
    {{ else }}
        {{ assign var=skipForward value="`$sectionLink`skip/`$skipForward`/" }}
    {{ /if }}

    {{* now figure out if to show both links or just a foreward link *}}
    {{ if $smarty.get.skip + $smarty.const.PER_PAGE lt $pagerTotal }}
        <li class="previous"><a href="/{{ $skipForward }}">&larr; Предыдущая</a></li>
        <li class="next"><a href="/{{ $sectionLink }}skip/{{ $skipBack }}/">Следущая &rarr;</a></li>
    {{ else }}
        <li class="previous"><a href="/{{ $skipForward }}">&larr; Предыдущая</a></li>
    {{ /if }}
{{ /if }}
</ul>