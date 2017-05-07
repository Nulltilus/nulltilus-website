'use strict';

jQuery(function ($) {
    var menu = $('#top-menu'),
        mobileMenu = $('#mobile-menu-ul');

    menu.find('a').on('click', {mobile: false}, moveTo);
    mobileMenu.find('a').on('click', {mobile: true}, moveTo);
    $('.home-header-bottom').find('a').on('click', {mobile: false}, moveTo);

    function moveTo(event) {
        event.preventDefault();

        var dest = 0;

        if ($(this.hash).offset().top > $(document).height() - $(window).height())
            dest = $(document).height() - $(window).height();
        else
            dest = $(this.hash).offset().top;

        $('html, body').stop().animate({scrollTop: dest}, 700, 'swing');

        if (event.data.mobile) {
            mobileMenu.find('.selected').removeClass('selected');
            $(this).addClass('selected');

            showMobileMenu(event);
        }
    }

    $('#mobile-menu-open, #mobile-menu-close').on('click', showMobileMenu);

    function showMobileMenu(event) {
        event.preventDefault();

        $('.mobile-menu-background, .mobile-menu-tab').toggleClass('hidden');
        $('html, body').toggleClass('no-scroll');
    }

    $(window).on('scroll', function () {
        if ($('body').scrollTop() >= $(window).height())
            menu.css('position', 'fixed');
        else
            menu.css('position', 'absolute');


        if ($('body').scrollTop() <= $('#about').offset().top) {
            mobileMenu.find('.selected').removeClass('selected');
            mobileMenu.find('.mobile-menu-link-home').addClass('selected');
        }

        if ($('body').scrollTop() >= $('#about').offset().top &&
            $('body').scrollTop() <= $('#projects').offset().top) {
            mobileMenu.find('.selected').removeClass('selected');
            mobileMenu.find('.mobile-menu-link-about').addClass('selected');
        }

        if ($('body').scrollTop() >= $('#projects').offset().top &&
            $('body').scrollTop() <= $('#blog').offset().top) {
            mobileMenu.find('.selected').removeClass('selected');
            mobileMenu.find('.mobile-menu-link-projects').addClass('selected');
        }

        if ($('body').scrollTop() >= $('#blog').offset().top &&
            $('body').scrollTop() <= $('#contact').offset().top) {
            mobileMenu.find('.selected').removeClass('selected');
            mobileMenu.find('.mobile-menu-link-blog').addClass('selected');
        }

        if ($('body').scrollTop() >= $('#contact').offset().top) {
            mobileMenu.find('.selected').removeClass('selected');
            mobileMenu.find('.mobile-menu-link-contact').addClass('selected');
        }
    });

    $('.project-selector').find('a').on('click', function (event) {
        event.preventDefault();

        if (this.hash.split('#')[1] === 'all')
            $('.project').fadeIn('fast');

        else {
            $('.project').not('.project-' + this.hash.split('#')[1]).fadeOut('fast');
            $('.project-' + this.hash.split('#')[1]).fadeIn('fast');
        }
    });

    $('.contact-input')
        .on('focus', function () {
            $(this).parents('.form-control').addClass('focused');
        })
        .on('blur', function () {
            $(this).parents('.form-control').removeClass('focused');
        });

    $('.email-sent-close-button').on('click', function() {
        $('.email-sent-container').fadeOut('fast');
    });

    console.log("No hace falta que te dejes los ojos aquí. Todo el código está en github :D.\nhttps://github.com/Nulltilus/nulltilus-website");
});

var contactCaptchaSolved = false;

function validateForm() {
    var form = $("#contact-form");

    if(!contactCaptchaSolved) {
        alert("El captcha tiene que estar relleno.");
        return false;
    }

    if (form.find("#contact-email").val() == "") {
        alert("El email no puede estar vacío.");
        return false;
    }

    if (form.find("#contact-subject").val() == "") {
        alert("El asunto no puede estar vacío.");
        return false;
    }

    if (form.find("#contact-message").val() == "") {
        alert("El mensaje no puede estar vacío.");
        return false;
    }

    return true;
}

function contactRecaptchaFilled() {
    contactCaptchaSolved = true;
}

function recaptchaLoad() {
    grecaptcha.render('recaptcha-contact', {
        sitekey: '6LdgZwgUAAAAAJ_2CSW2wFY05GcaCsfjkt5te42I',
        callback: contactRecaptchaFilled,
        theme: 'dark'
    });
}