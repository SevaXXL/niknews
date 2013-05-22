<div id="cse"></div>
<script src="//www.google.com/jsapi"></script>
<script type='text/javascript'>
google.load('search', '1', {
    //nocss: true,
    nooldnames: true,
    language: 'ru'
});
google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl('001087546461165951744:4cnyfoyc2dw',
    {
        'enableImageSearch': true
    });
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.enableSearchResultsOnly();
    customSearchControl.draw('cse', options);
    if ($.url().param('q')) {
        customSearchControl.execute($.url().param('q'));
    }
}, true);
</script>
