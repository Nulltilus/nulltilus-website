'use strict';

jQuery(function ($) {
    var header = $('header.header'),
        postInfo = $('.post-info');

    $(window).on('scroll', function() {
        if($('body').scrollTop() >= 75) {
            header.addClass('small');
            postInfo.hide('fast');
        }
        else {
            header.removeClass('small');
            postInfo.show('fast');
        }
    });

    $('#mobile-menu-open, #mobile-menu-close').on('click', showMobileMenu);

    function showMobileMenu(event) {
        event.preventDefault();

        $('.mobile-menu-background, .mobile-menu-tab').toggleClass('hidden');
        $('html, body').toggleClass('no-scroll');
    }
});