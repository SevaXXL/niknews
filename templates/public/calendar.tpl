<table class="table table-bordered table-condensed">
    <thead>
        <tr> 
            <th colspan="7">
                <div class="text-center">
    {{ if $calendar.showNav }}
                    <a href="/{{ $calendar.prevMonth }}">&laquo;</a>
    {{ /if }}
                    <a href="/{{ $calendar.thisMonth }}">{{ $calendar.timeStamp|date_format:'%b. %Y' }}</a>
    {{ if $calendar.showNav }}
                    <a href="/{{ $calendar.nextMonth }}">&raquo;</a>
    {{ /if }}
                </div>
            </th>
        </tr>
    </thead>
    <tr class="info">
        <td width="14%">Пн</td>
        <td width="14%">Вт</td>
        <td width="14%">Ср</td>
        <td width="14%">Чт</td>
        <td width="14%">Пт</td>
        <td width="14%">Сб</td>
        <td width="14%">Вс</td>
    </tr>
    <tr>
{{ section name=numloop loop=$calendar.days }}
        <td class="{{ if !$calendar.days[numloop] }}s20{{ else }}s2{{ if $calendar.days[numloop].selected }}1{{ /if }}{{ /if }}{{ if $calendar.days[numloop].today }} today{{ /if }}">
    {{ if $calendar.days[numloop].selected }}
            <a href="/{{ $calendar.thisMonth }}{{ $calendar.days[numloop].link }}/">{{ $calendar.days[numloop].number }}</a>
    {{ else }}
            {{ $calendar.days[numloop].number|default:"&nbsp;" }}
    {{ /if }}
        </td>

    {{* see if we should go to the next row *}}
    {{ if not ($smarty.section.numloop.rownum mod 7) }}
        {{ if not $smarty.section.numloop.last }}
    </tr>
    <tr>
        {{ /if }}
    {{ /if }}

    {{ if $smarty.section.numloop.last }}
        {{* pad the cells not yet created *}}
        {{ math equation = "n - a % n" n=7 a=$calendar.days|@count assign="cells" }}
        {{ if $cells ne 7 }}
            {{ section name=pad loop=$cells }}
        <td class="s20">&nbsp;</td>
            {{ /section }}
        {{ /if }}
    </tr>
    {{ /if }}
{{ /section }}
</table>
