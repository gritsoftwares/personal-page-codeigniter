var frontObject = {
    stickyNavbar : function(thisIdentity) {
        $(thisIdentity).sticky({topSpacing:0});
    },

    closeToggle : function(thisIdentity) {
        if ($(thisIdentity).width() <= 768) {
            $('.navbar-collapse a').on('click', function(){
                $('.navbar-collapse').collapse('hide');
            });
        }
        else {
            $('.navbar .navbar-default a').off('click');
        }
    },

    resizeCloseToggle : function(thisIdentity) {
        $(thisIdentity).on('resize', function() {
            frontObject.closeToggle(thisIdentity);
        });
    },

    smoothScroll : function(thisIdentity) {
        $(thisIdentity).on('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 50
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    },

    mixItUp : function(thisIdentity) {
        if ($(thisIdentity).length) {
            $(thisIdentity).mixitup();
        }
    },

    popOver : function(thisIdentity) {
        $(thisIdentity).popover();
    },

    toolTip : function(thisIdentity) {
        $(thisIdentity).tooltip();
    },

    wowAnime : function() {
        if (typeof WOW === 'function') {
            wow = new WOW(
                {
                    animateClass: 'animated',
                    offset:       100,
                    mobile:       true
                }
            );
            wow.init();
        }
    },

    parallaxScroll : function() {
        if (typeof stellar === 'function') {
            $.stellar({
                horizontalScrolling: false
            });
        }
    },

    niceScroll : function(thisIdentity) {
        jQuery(thisIdentity).niceScroll({
            scrollspeed: 50,
            mousescrollstep: 38,
            cursorwidth: 7,
            cursorborder: 0,
            cursorcolor: '#35bdf6',
            autohidemode: false,
            zindex: 9999999,
            horizrailenabled: false,
            cursorborderradius: 0
        });
    },

    owlCarousel : function(thisIdentity) {
        if ($(thisIdentity).length) {
            $(thisIdentity).owlCarousel({
                // Most important owl features
                items : 1,
                itemsCustom : false,
                itemsDesktop : [1199,1],
                itemsDesktopSmall : [980,1],
                itemsTablet: [768,1],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                singleItem : false,
                startDragging : true
            });
        }
    },

    ajaxEmail : function(thisIdentity) {
        $(document).on('submit', thisIdentity, function(e) {
            e.preventDefault();

            var thisForm = $(this);
            var thisUrl = thisForm.attr('action');
            var thisData = thisForm.serialize();

            $.post(thisUrl, thisData, function(data) {
                $('div.alert').remove();
                if (data.errors === false) {
                    divSuccess = $('<div class="alert alert-success">' + data.mes + '</div>');
                    divSuccess.hide().insertBefore(thisIdentity).fadeIn(1000);
                    setTimeout(function(){
                        divSuccess.fadeOut(1000);
                        thisForm.find('.form-control').each(function(index) {
                            $(this).val('');
                        });
                        $('input#captcha').attr('placeholder',data.captcha);
                    }, 2000);
                } else {
                    $('<div class="alert alert-danger">' + data.errors + '</div>').hide().insertBefore(thisIdentity).fadeIn(1000);
                    $('input#captcha').attr('placeholder',data.captcha).val('');
                }
            }, "json");
        });
    },

    searchForm : function(thisIdentity) {
        $(thisIdentity).on('keypress', function(e){
            if (e.which == 13) {
                e.preventDefault();
                query = $(this).val();
                query = encodeURIComponent(query);
                uri = window.location.protocol + '//' + window.location.hostname + '/search/' + query;
                window.location.href=uri;
            }
        });
    },

    blogPagination : function(thisIdentity) {
        $(thisIdentity).on('click', function(e) {
            e.preventDefault();
        });
    },

    coursesTable : function(thisIdentity) {
        if ($(thisIdentity). length) {
            $(thisIdentity).dataTable({
                'sPaginationType': 'full_numbers',
                'order': []
            });
        }
    }
};
