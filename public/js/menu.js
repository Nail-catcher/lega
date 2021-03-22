


$('.butclose').click(function() {
 $('.custom-menu-left').css('display', 'none');
 $('.close-menu-left').css('display', 'block');
});


$('.close-menu-left').click(function() {
 $('.custom-menu-left').css('display', 'block');
 $('.close-menu-left').css('display', 'none');
});

$('.cat').click(function() {
 $('.patheatmenuitems').css('display', 'none');
 $('.categorymenu').css('display', 'block');
 $('.eatpathmenu a').css('color', '#FFFAFA');
 $('.cat a').css('color', '#ED2828');
});


$('.eatpathmenu').click(function() {
 $('.patheatmenuitems').css('display', 'block');
 $('.eatpathmenu a').css('color', '#ED2828');
 $('.categorymenu').css('display', 'none');
 $('.cat a').css('color', '#FFFAFA');
});

