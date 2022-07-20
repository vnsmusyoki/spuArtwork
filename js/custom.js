$(function() {

    window.mobilecheck = function() {
        var check = false;
        (function(a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }

    if (!window.mobilecheck()) {
        $.stellar({
            responsive: true,
            horizontalScrolling: false
        });
    }

    // Sticky navbar	
    $('.navigation').waypoint('sticky');

    // Highlight active nav
    $('.waypoint')
        .waypoint(function(direction) {
            $('a[href="#' + this.id + '"]').parent().toggleClass('active', direction === 'down');
        }, {
            offset: '100%'
        })
        .waypoint(function(direction) {
            $('a[href="#' + this.id + '"]').parent().toggleClass('active', direction === 'up');
        }, {
            offset: function() {
                return -$(this).height();
            }
        });

    // Map
    if ($("#map").length > 0) {
        $('#map').gmap3({
                map: {
                    options: {
                        zoom: 16,
                        center: [51.733472, 0.678792],
                        mapTypeId: google.maps.MapTypeId.MAP,
                        mapTypeControl: false,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                        },
                        navigationControl: false,
                        scrollwheel: false,
                        streetViewControl: false,
                        disableDefaultUI: true
                    }
                },
                marker: {
                    latLng: [51.733472, 0.678792],
                    options: {
                        icon: new google.maps.MarkerImage(
                            "images/map-pin.png", new google.maps.Size(273, 85, "px", "px")
                        )
                    }
                }
            }

        );
    }

    // Content modal window
    $('.open-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        enableEscapeKey: true,
        fixedContentPos: true,
        mainClass: 'mfp-fade',
        removalDelay: 400
    });

    // Grouped image modal window
    $('.gallery').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        mainClass: 'mfp-fade',
        removalDelay: 400
    });

    // Time/Date picker
    $('.timedate').datetimepicker({
        dateFormat: 'dd.mm.yy'
    });

    if (jQuery.browser.msie && jQuery.browser.version.substring(0, 1) >= 7) {

    } else {
        // Page loading
        $("body").queryLoader2({
            barColor: "#ffc801",
            backgroundColor: "#1c2222",
            percentage: true,
            barHeight: 1,
            completeAnimation: "grow",
            minimumTime: 100
        });
    }

    // Smooth scrolling
    /* from http://imakewebthings.com/jquery-waypoints/ Wicked credit to http://www.zachstronaut.com/posts/2009/01/18/jquery-smooth-scroll-bugs.html */
    var scrollElement = 'html, body';
    $('html, body').each(function() {
        var initScrollTop = $(this).attr('scrollTop');
        $(this).attr('scrollTop', initScrollTop + 1);
        if ($(this).attr('scrollTop') == initScrollTop + 1) {
            scrollElement = this.nodeName.toLowerCase();
            $(this).attr('scrollTop', initScrollTop);
            return false;
        }
    });

    // Smooth scrolling for internal links
    $("a[href^='#']").click(function(event) {
        event.preventDefault();

        var $this = $(this),
            target = this.hash,
            $target = $(target);

        $(scrollElement).stop().animate({
            'scrollTop': $target.offset().top
        }, 1500, 'swing', function() {
            window.location.hash = target;
        });

    });

});