jQuery(document).ready(function ($) {

    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .not('.no-scroll')
        .click(function (event) {
            // On-page links
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 10
                    }, 600, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                    });
                }
            }
        });
    $(".open-menu").on("click", function () {
        $(".menu-push-right").toggleClass("is-active");
        $("body").toggleClass("menu-open");
    });
    $(".menu-push-right-close").on("click", function () {
        $(".menu-push-right").removeClass("is-active");
        $("body").removeClass("menu-open");
    });
});

$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 1) {
        $("header").addClass("fixed");
    } else {
        $("header").removeClass("fixed");
    }
});

// STICKY ELEMENT
$(function () {
    // name your elements here
    var stickyElement = '.sticky-element',   // the element you want to make sticky
        bottomElement = '.fake-footer'; // the bottom element where you want the sticky element to stop (usually the footer)
    // make sure the element exists on the page before trying to initalize
    if ($(stickyElement).length) {
        $(stickyElement).each(function () {

            // let's save some messy code in clean variables
            // when should we start affixing? (the amount of pixels to the top from the element)
            var fromTop = $(this).offset().top - 140,
                // where is the bottom of the element?
                fromBottom = $(document).height() - ($(this).offset().top + $(this).outerHeight()),
                // where should we stop? (the amount of pixels from the top where the bottom element is)
                // also add the outer height mismatch to the height of the element to account for padding and borders
                stopOn = $(document).height() - ($(bottomElement).offset().top) + ($(this).outerHeight() - $(this).height());
            // if the element doesn't need to get sticky, then skip it so it won't mess up your layout
            if ((fromBottom - stopOn) > 200) {
                // let's put a sticky width on the element and assign it to the top
                $(this).css('width', $(this).width()).css('top', 0).css('position', '');
                // assign the affix to the element
                $(this).affix({
                    offset: {
                        // make it stick where the top pixel of the element is
                        top: fromTop,
                        // make it stop where the top pixel of the bottom element is
                        bottom: stopOn
                    }
                    // when the affix get's called then make sure the position is the default (fixed) and it's at the top
                }).on('affix.bs.affix', function () {
                    $(this).css('top', 140).css('position', '');
                });
            }
            // trigger the scroll event so it always activates 
            $(window).trigger('scroll');
        });
    }
});