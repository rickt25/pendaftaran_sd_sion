$(function () {
    $(document).scroll(function () {
        var $nav = $(".page-navbar");
        $nav.toggleClass("scrolled", $(this).scrollTop() >= $nav.height() / 4);
    })
})