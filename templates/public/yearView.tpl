<ul class="nav nav-pills">
    <li><a href="/archiv/arc.shtml">2004-2006</a></li>
{{ foreach from=$years item=myYear }}
    <li{{ if $myYear == $thisYear }} class="active"{{ /if }}><a href="/{{ $myYear }}/">{{ $myYear }}</a></li>
{{ /foreach }}
</ul>
<div class="row-fluid">
{{ foreach from=$months item=myMonth }}
    <div class="span3">
        {{ calendar year=$thisYear month=$myMonth ignoreNav=true }}
    </div>
{{ /foreach }}
</div>