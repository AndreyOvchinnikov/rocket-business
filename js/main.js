$(document).ready(function () {
    var isIE = window.navigator.msPointerEnabled;
    if(isIE){
        $(".categories_menu ul li a").css("padding", "0 16.7px");
    }


    $(function () {
        $('.menuToggle').on('click', function () {
            $('.categories_menu').slideToggle(300, function () {
                if ($(this).css('display') === "none") {
                    $(this).removeAttr('style');
                }
            });

        });
    });
});

