var angleStart = -360;

// jquery rotate animation
function rotate(li, d) {
    $({ d: angleStart }).animate({ d: d }, {
        step: function(now) {
            $(li)
                .css({ transform: 'rotate(' + now + 'deg)' })
                .find('label')
                .css({ transform: 'rotate(' + (-now) + 'deg)' });
        },
        duration: 0
    });
}

// show / hide the options
function toggleOptions(s) {
    $(s).toggleClass('open');
    var li = $(s).find('li');
    var deg = $(s).hasClass('half') ? 180 / (li.length - 1) : 360 / li.length;
    for (var i = 0; i < li.length; i++) {
        var d = $(s).hasClass('half') ? (i * deg) - 90 : i * deg;
        $(s).hasClass('open') ? rotate(li[i], d) : rotate(li[i], angleStart);
    }
}

$('.selector button').click(function(e) {
    toggleOptions($(this).parent());
});


$('#1').click(function(e) {
    window.location.href = document.getElementById("link1").value;
});
$('#2').click(function(e) {
    window.location.href = document.getElementById("link2").value;
});


setTimeout(function() { toggleOptions('.selector'); }, 100);