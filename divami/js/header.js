(function ($) {
    var bg_menu_height = function () {
        var navmenu_height = $('#overlay').height();
        var sidemenu_height = $('.menu_block').height();
        if (navmenu_height > sidemenu_height) {
            $('.header-common__menu-bar-bg').css('height', navmenu_height);
        }
        else {
            $('.header-common__menu-bar-bg').css('height', sidemenu_height);
        }
    };
    setInterval(bg_menu_height, 10);

    $(document).ready(function () {
        var isMenuOpen = false;
        $('.header__menu-btn').click(function () {
            toggleSideMenu();

        });

        function toggleSideMenu() {
            var $headerContainer = $('.header-common');
            var showClass = 'show-mobile-menu';
            var menubar = $('.header__nav-block');
            $('.header__close-button').removeClass('show');

            $headerContainer.toggleClass(showClass);
            if ($headerContainer.hasClass(showClass)) {
                isMenuOpen = true;
                $('html').css('overflow-y', 'hidden');
                menubar.addClass('d-show');
                $('.header__close-button').addClass('show');
            } else {
                isMenuOpen = false;
                $('html').css('overflow-y', 'auto');
                menubar.removeClass('d-show');
            }
        }

        // navigation text color's functionality start
        $(document).ready(function () {
            $('.header__menu-dropdown-list a').on('click', function () {
                var menuOption = "Selected" + $(this).text();
                $(this).parent().addClass('active').siblings().removeClass('active');
                var pagename = location.pathname.split('/')[1].split('.')[0] + "page Header Menu";
                if (pagename == "page Header Menu") {
                    pagename = "home page Header Menu";
                }
                google_analytics_tracking(pagename, menuOption, '');

            });
            setActiveMenuItem();

            //change the footer icon
            $('.footer__icon').attr("src", "assets/images/people_page.svg")

            $('.close-button').click(function (e) {
                event.stopPropagation();
                toggleSideMenu();
            });
        });

        function setActiveMenuItem() {
            var url = $(location).attr('href');
            var urlParts = url.split('/');
            var pageFound = false;

            $('.header__menu-dropdown-list').each(function () {
                var attr = $(this).find('a').attr('pagename');
                if (urlParts[3] == attr) {
                    //-2 because in the end it has / or /index.html for sure, if any change in urls need to change here
                    pageFound = true;
                    $(this).addClass('active').siblings().removeClass('active');
                }
            });
            if (!pageFound) {
                $('.header__menu-dropdown-list').first().addClass('active');
            }
        }


        $(document).ready(function () {
            var c, currentScrollTop = 0;
            var $header = $('.header-common');
            if ($(window).scrollTop() > 0) {
                $header.addClass('header-fixed');
            }

            $(window).scroll(function () {
                var a = $(window).scrollTop();
                var b = $header.height();

                currentScrollTop = a;

                if (a > 0) {
                    $('.scrollToTop').fadeIn();
                    $header.addClass('header-fixed');
                } else {
                    $('.scrollToTop').fadeOut();
                    $header.removeClass('header-fixed');
                }

                if (c < currentScrollTop && a > b + b) {
                    if (!isMenuOpen) {
                        $header.addClass("scrollUp");
                    }
                } else if (c > currentScrollTop && !(a <= b)) {
                    $header.removeClass("scrollUp");

                }
                c = currentScrollTop;
            });

            //tracking code in home page
            var pagename = location.pathname.split('/')[1].split('.')[0];
            var pagenameToAppend = pagename + "page Header Menu";
            $('.menu_footer_block').click(function () {
                var ClickElementtName = $(this).attr('title');
                google_analytics_tracking(pagenameToAppend, ClickElementtName, '');
            });
            //end  of tracking code
        });



        (function () {
            disableBackgroundScroll('overlay');
        }())
        function disableBackgroundScroll(id) {
            var _overlay;
            if (document.getElementById(id)) {
                _overlay = document.getElementById(id)
            }
            else {
                _overlay = null;
            }
            var _clientY = null; // remember Y position on touch start

            _overlay.addEventListener('touchstart', function (event) {
                if (event.targetTouches.length === 1) {
                    // detect single touch
                    _clientY = event.targetTouches[0].clientY;
                }
            }, false);

            _overlay.addEventListener('touchmove', function (event) {
                if (event.targetTouches.length === 1) {
                    // detect single touch
                    disableScroll(event);
                }
            }, false);

            function disableScroll(event) {
                var clientY = event.targetTouches[0].clientY - _clientY;

                if (_overlay.scrollTop === 0 && clientY > 0) {
                    // element is at the top of its scroll
                    event.preventDefault();
                }

                if (isOverlayTotallyScrolled() && clientY < 0) {
                    //element is at the top of its scroll
                    event.preventDefault();
                }
            }

            function isOverlayTotallyScrolled() {
                // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollHeight#Problems_and_solutions
                return _overlay.scrollHeight - _overlay.scrollTop <= _overlay.clientHeight;
            }
        }
    });


}(jQuery));