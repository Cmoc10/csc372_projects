$('h1').html('<em>My jQuery Example</em>');

$('h1').after('<p>' + "jQuery is a JavaScript Library. jQuery greatly simplifies JavaScript programming. jQuery is easy to learn." + '</p>');

$('p').after('<ul></ul>');

$('ul').append('<li>HTML/DOM manipulation</li> <li>CSS manipulation</li> <li>HTML event methods</li> <li>Effects and animations</li>');
$('li').hide();

$('ul').before('<p> The jQuery library contains the following features: </p>');

$('body').css('background-color', 'lightblue');

$('h1').css('color', 'red');
$('h1').css('text-align', 'center');

$('li').css('color', 'green');
$('li').css('font-size', '20px');

$('li').on('mouseover', function() {
    $(this).css('background-color', 'red');
});

$('li').on('mouseout', function() {
    $(this).css('background-color', 'lightblue');
});

$('p').eq(1).append('<button>Show jQuery Features</button>');

$('button').on('click', function() {
    $(this).hide(1000);
    $('li').slideDown(1000);
});