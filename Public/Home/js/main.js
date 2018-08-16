$(document).ready(function () {
    $('.nav-wrap a').each(function () {
        if ($($(this))[0].href == String(window.location)){

            $(this).addClass('active')
        }else{
            $(this).removeClass('active')
        }
    })
})