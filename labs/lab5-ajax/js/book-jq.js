$("#don-quixote-img").on("click", function() {
    $("img").fadeTo(500, 0.5);
    $("#don-quixote-img").fadeTo(500, 1);
    $("#details").load("data/cervantes-data.html").hide().fadeIn(750);
});

$("#two-cities-img").on("click", function() {
    $("img").fadeTo(500, 0.5);
    $("#two-cities-img").fadeTo(500, 1);
    $("#details").load("data/dickens-data.html").hide().fadeIn(750);
});

$("#lotr-img").on("click", function() {
    $("img").fadeTo(500, 0.5);
    $("#lotr-img").fadeTo(500, 1);
    $("#details").load("data/tolkien-data.html").hide().fadeIn(750);
});
