<p class="comment-date">
    {{ str_replace(
        ['hours', 'hour', 'days', 'day', 'minutes', 'minute', 'weeks', 'week', 'years', 'year', 'ago'],
        ['soat', 'soat', 'kun', 'kun', 'daqiqa', 'daqiqa', 'hafta', 'hafta', 'yil', 'yil', 'oldin'],
    $timestamp
    ) }}
</p>
