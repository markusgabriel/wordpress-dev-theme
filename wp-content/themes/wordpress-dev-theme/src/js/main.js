import '../sass/style.scss';
import '../css/swiper-bundle.min.css';
import 'lazysizes';
import Swiper from 'swiper';
import Headroom from "headroom.js";

document.addEventListener("DOMContentLoaded", function() {

    /*
    * mobile burger menu toggle
    * */
    const menuToggle = document.getElementById('menutoggle');
    const body = document.body;

    menuToggle.addEventListener('click', function(e) {
        body.classList.toggle('menu-open');

        e.preventDefault();

        return false;
    });


    /*
   * scroll to href
   */
    function anchorLinkHandler(e) {
        const distanceToTop = el => Math.floor(el.getBoundingClientRect().top);

        e.preventDefault();

        const url = this.getAttribute("href");
        const targetID = '#' + url.substring(url.indexOf('#')+1);

        console.log(targetID);

        const targetAnchor = document.querySelector(targetID);
        if (!targetAnchor) return;
        const originalTop = distanceToTop(targetAnchor);

        window.scrollBy({top: originalTop, left: 0, behavior: "smooth"});

        body.classList.remove('menu-open');

    }

    const linksToAnchors = document.querySelectorAll('.scroll-link a');
    linksToAnchors.forEach(each => (each.onclick = anchorLinkHandler));


    /*
    * header reveal
    * */
    const header = document.getElementById("header");
    const headroom = new Headroom(header, {
        offset: 100
    });
    headroom.init();



    /*
    * Slider
    * */
    var slider = new Swiper('.swiper-container', {
        slidesPerView: 1.2,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesOffsetAfter: 30,
        breakpoints: {
            575: {
                slidesPerView: 1.5,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2.3,
            },
            992: {
                slidesPerView: 3.3,
            }
        }
    });


});

