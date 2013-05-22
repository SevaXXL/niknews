<div class="page-header">
    <h1><a href="/{{ $year }}/">{{ $year }}</a><small>/{{ $month }}</small></h1>
</div>
<div class="row-fluid">
    <div class="span9">
{{ foreach from=$data item=entry name=myData }}
    {{ if $myDay != $entry.intime|date_format:"%d" }}
        {{ if !$smarty.foreach.myData.first }}
        </ol>
        {{ /if }}
        {{ assign var="myDay" value=$entry.intime|date_format:"%d" }}
        {{ assign var="myDayFull" value=$entry.intime|date_format:"%e %B" }}
        <h2><a href="/{{ $year }}/{{ $month }}/{{ $myDay }}/">{{ $myDayFull }}</a></h2>
        <ol>
    {{ /if }}
            <li>
                <a href="{{ $entry.intime|date_format:'/%Y/%m/%d/' }}{{ $entry.urlcache }}/">{{ $entry.title }}</a>
            </li>
    {{ if $smarty.foreach.myData.last }}
        </ol>
    {{ /if }}
{{ /foreach }}
    </div>
    <div class="span3">
        {{ calendar year=$year month=$month }}
    </div>
</div>