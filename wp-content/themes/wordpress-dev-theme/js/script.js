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
    * */
    function anchorLinkHandler(e) {
        const distanceToTop = el => Math.floor(el.getBoundingClientRect().top);

        e.preventDefault();

        const targetID = this.getAttribute("href");
        const targetAnchor = document.querySelector(targetID);
        if (!targetAnchor) return;
        const originalTop = distanceToTop(targetAnchor);

        window.scrollBy({top: originalTop, left: 0, behavior: "smooth"});

        body.classList.remove('menu-open');

    }

    const linksToAnchors = document.querySelectorAll('.scroll-link');
    linksToAnchors.forEach(each => (each.onclick = anchorLinkHandler));


    /*
    * header fixed class
    * */
    window.addEventListener("scroll",function(){
        var target = document.getElementsByTagName('header');
        if(window.pageYOffset > 500){
            target[0].classList.add('fixed');
        }
        else if(window.pageYOffset < 500){
            target[0].classList.remove('fixed');
        }
    },false);
});

