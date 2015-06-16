$(document).ready(function() {

    setTimeout(function() {
        $('.news-list-view').masonry({
            itemSelector : '.article'
        });
    }, 500);

    if ($('.tx-indexedsearch-searchbox-sword').length) {
        $('.tx-indexedsearch-searchbox-sword').attr('placeholder', 'SuchText eingeben...').focus();
    }

    $('div.news > div > div > div.header > h3 > a').each(function() {
        var $articleLink = $(this).closest('div.header > h3 > a').prop('href');
        $(this).closest('.article').append('<a class="blockLink external" href="' + $articleLink + '" target="_blank" title=""></a>');
    });

    $('a.internal,a.external').on('click', function(e) {
        e.preventDefault();
        var isExternal = $(this).hasClass('external');
        if (!isExternal)
            $('#main').animate({
                'opacity' : '-=1'
            }, pageSpeed);
        var $href = $(this).prop('href');
        setTimeout(function() {
            window.open($href, '_blank');
        }, 100);
    });

});