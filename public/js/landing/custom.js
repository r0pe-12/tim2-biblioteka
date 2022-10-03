jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() < 50) {
        jQuery('#rocketmeluncur').slideUp(500);
    } else {
        jQuery('#rocketmeluncur').slideDown(500);
    }
    var ftrocketmeluncur = jQuery("#ft")[0] ? jQuery("#ft")[0] : jQuery(document.body)[0];
    var scrolltoprocketmeluncur = $('rocketmeluncur');
    var viewPortHeightrocketmeluncur = parseInt(document.documentElement.clientHeight);
    var scrollHeightrocketmeluncur = parseInt(document.body.getBoundingClientRect().top);
    var basewrocketmeluncur = parseInt(ftrocketmeluncur.clientWidth);
    var swrocketmeluncur = scrolltoprocketmeluncur.clientWidth;
    if (basewrocketmeluncur < 1000) {
        var leftrocketmeluncur = parseInt(ftrocketmeluncur.offsetLeft);
        leftrocketmeluncur = leftrocketmeluncur < swrocketmeluncur ? leftrocketmeluncur * 2 - swrocketmeluncur : leftrocketmeluncur;
        scrolltoprocketmeluncur.css('left', (basewrocketmeluncur + leftrocketmeluncur + "px"));
    } else {
        scrolltoprocketmeluncur.css('left', 'auto');
        scrolltoprocketmeluncur.css('right', '10px');
    }
});

jQuery('#rocketmeluncur').click(function() {
    jQuery("html, body").animate({
        scrollTop: '0px',
        display: 'none'
    }, {
        duration: 600,
        easing: 'linear'
    });

    var self = this;
    this.className += ' ' + "launchrocket";
    setTimeout(function() {
        self.className = 'showrocket';
    }, 800);
});

$('.nolink').on('click', function(e) {
    e.preventDefault();
});

function flashMsg(msg, type) {
    Swal.fire({
        "title": msg,
        // "text":msg,
        "timer":5000,
        "width":"40rem",
        "padding":"1.2rem",
        "showConfirmButton":false,
        "showCloseButton":true,
        "timerProgressBar":false,
        "customClass":{"container":'z-x',"popup":null,"header":null,"title":null,"closeButton":null,"icon":null,"image":null,"content":null,"input":null,"actions":null,"confirmButton":null,"cancelButton":null,"footer":null},
        "toast":true,
        "icon":type,
        "position":"top-end"});
}

function changeImg(photo) {
    $('#main_product_image').attr('src', photo.src);
}
