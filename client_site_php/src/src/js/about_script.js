$('.eboard_description').hide();

$('.eboard-photo').hover(function() {
    $(this).css('cursor', 'pointer');
});

$('.eboard-photo').click(function() {
    var index = $('.eboard-photo').index(this);
    var description = $('.eboard_description').eq(index);
    if (description.is(':visible')) {
        description.slideUp(500);
    } else {
        $('.eboard_description').slideUp(500);
        description.slideDown(500);
    }
});
