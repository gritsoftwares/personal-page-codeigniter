$(function() {
    "use strict";
    frontObject.stickyNavbar('.navbar');
    frontObject.closeToggle(window);
    frontObject.resizeCloseToggle(window);
    frontObject.smoothScroll('.navbar a,.btn-scroll');
    frontObject.mixItUp('#grid');
    frontObject.popOver("[data-toggle=popover]");
    frontObject.toolTip("[data-toggle=tooltip]");
    frontObject.wowAnime();
    frontObject.parallaxScroll();
    frontObject.niceScroll('html');
    frontObject.owlCarousel("#testi-carousel");
    frontObject.ajaxEmail('form.feedback');
    frontObject.searchForm('#s');
    frontObject.blogPagination(".pagination li.active-page a");
    frontObject.coursesTable('#courses');
});