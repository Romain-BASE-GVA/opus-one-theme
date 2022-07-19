$(document).ready(function () {
    var currentPageType = 'home';
    var isTouch = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0);
    var navIsClosed = true;
    var pageNav = $('.topbar--page-nav');
    var openNavTl = gsap.timeline({
        paused: true,
        onStart: function () {
            //$('body').addClass('nav-is-open');
        },
        onComplete: function () {
            navIsClosed = false;
            // $('body').addClass('nav-is-open');
            // $('.burger').addClass('burger--close');
            closeNavTl.restart().pause();
        }
    });
    var closeNavTl = gsap.timeline({
        paused: true,
        onStart: function () {
            //$('body').removeClass('nav-is-open');
        },
        onComplete: function () {
            navIsClosed = true;
            // $('body').removeClass('nav-is-open');
            // $('.burger').removeClass('burger--close');
            openNavTl.restart().pause();
        }
    });
    let logoTopbarAnim = gsap.timeline({ paused: true });
    let logoFooterAnim = gsap.timeline({ paused: true });
    let scrollVelocity = 0;

    openNavTl.fromTo('.nav--main',
        { 'clip-path': 'circle(0% at calc(100% - 73px) calc(0% + 58px))' },
        {
            'clip-path': 'circle(135% at calc(100% - 73px) calc(0% + 58px))',
            duration: .75, ease: Power3.easeInOut
        }, 'opening')
        .fromTo('.nav--main__bg',
            { 'clip-path': 'circle(0% at calc(100% - 73px) calc(0% + 58px))' },
            {
                'clip-path': 'circle(135% at calc(100% - 73px) calc(0% + 58px))',
                stagger: .1, duration: .75, ease: Power3.easeInOut
            }, 'opening');

    closeNavTl.to('.nav--main', { 'clip-path': 'circle(0% at calc(100% - 73px) calc(0% + 58px))', duration: 1, ease: Power4.easeOut });

    logoTopbarAnim.to('.logo--topbar .logo__letter', { '--wght': 100, '--wdth': 45, '--ital': 10, autoAlpha: .5, stagger: .05, duration: .4, ease: Power2.easeIn }, 'first')
        .to('.logo--topbar .logo__letter', { '--wght': 950, '--wdth': 10, '--ital': 0, autoAlpha: 1, stagger: .05, duration: .4, ease: Power2.easeOut }, 'first+=.45');

    logoFooterAnim.to('.logo--footer .logo__letter', { '--wght': 100, '--wdth': 45, '--ital': 10, autoAlpha: .5, stagger: .05, duration: .4, ease: Power2.easeIn }, 'first')
        .to('.logo--footer .logo__letter', { '--wght': 950, '--wdth': 10, '--ital': 0, autoAlpha: 1, stagger: .05, duration: .4, ease: Power2.easeOut }, 'first+=.45');


    $('.logo--topbar a').on('mouseenter', function () {
        logoTopbarAnim.play();
    });

    $('.logo--topbar a').on('mouseleave', function () {
        if (!logoTopbarAnim.isActive()) {
            logoTopbarAnim.restart().pause();
        } else {
            let animRest = logoTopbarAnim.duration() - logoTopbarAnim.progress();
            setTimeout(function () { logoTopbarAnim.restart().pause(); }, animRest * 1000);
        }
    });

    $('.nav-trigger').on('click', function () {
        if (navIsClosed) {
            openNavTl.play();
        } else {
            closeNavTl.play();
        }
    });

    $('.close-nav').on('click', function () {
        closeNavTl.play();
    });

    $('.logo--footer a').on('mouseenter', function () {
        logoFooterAnim.play();
    });

    $('.logo--footer a').on('mouseleave', function () {
        if (!logoFooterAnim.isActive()) {
            logoFooterAnim.restart().pause();
        } else {
            let animRest = logoFooterAnim.duration() - logoFooterAnim.progress();
            setTimeout(function () { logoFooterAnim.restart().pause(); }, animRest * 1000);
        }
    });

    $('.nav--main__list a[href="#"]').on('click', function (e) {
        e.preventDefault();
    });

    preventSamePageReload();
    init();

    barba.init({
        timeout: 10000,
        //debug: true,
        preventRunning: true,
        transitions: [{
            name: 'switch',
            once({ current, next, trigger }) {

                isOnce = true;

                var pageColor = $(next.container).data('bg');
                var textColor = $(next.container).data('text-color');
                var nextPageTitle = $(next.container).data('logo-title');

                gsap.set($('body'), { backgroundColor: pageColor, '--current-bg-color': pageColor, color: textColor, '--current-txt-color': textColor });
                gsap.to(document.querySelector('meta[name="theme-color"]'), { duration: .5, attr: { content: pageColor }, ease: Expo.easeInOut });


                $('.topbar__page-name span').html(nextPageTitle);

                // currentPageType = next.namespace;
                $('body').addClass(next.namespace);
                console.log('resize ONCE');
                setTimeout(function(){
                    $(window).trigger('resize');
                    ScrollTrigger.refresh();
                }, 500);
                

            },
            leave({ current, next, trigger }) {

                return new Promise(resolve => {
                    const leavingAnim = gsap.timeline({
                        onComplete() {
                            resolve();
                        }
                    });

                    leavingAnim.set('.page-transition', { autoAlpha: 1 })
                        .to('.page-transition__line', .5, { scaleY: 1, ease: Expo.easeInOut, stagger: .05 })
                        //.to('.page-name', 1, {y: '10px', autoAlpha: 0, ease: Expo.easeOut}, 'leaving')
                        .to(current.container, .1, { autoAlpha: 0, display: 'none', ease: Expo.easeInOut });
                });
            },
            beforeLeave({ current, next, trigger }) { },
            beforeEnter({ current, next, trigger }) {
                console.log('BEFORE ENTER GLOBAL');
                window.scrollTo(0, 0);

                gsap.to($('.topbar--page-nav'), { autoAlpha: 0 });
                pageNav.empty();

                if (!navIsClosed) {
                    closeNavTl.play();
                }

                killAllScrollTrigger();

                isOnce = false;

                //ScrollTrigger.getById('footer-anim').kill(true);
                init();
            },
            enter({ current, next, trigger }) {

                var pageColor = $(next.container).data('bg');
                var textColor = $(next.container).data('text-color');
                var nextPageTitle = $(next.container).data('logo-title');

                gsap.set($('body'), { backgroundColor: pageColor, '--current-bg-color': pageColor, color: textColor, '--current-txt-color': textColor });
                gsap.to(document.querySelector('meta[name="theme-color"]'), { duration: .5, attr: { content: pageColor }, ease: Expo.easeInOut });

                $('.topbar__page-name span').html(nextPageTitle);

                if(next.url.hash != undefined){
                    var isSpecialPage = next.url.hash == 'page-special';

                    var offset = isSpecialPage ? $('.topbar').outerHeight() + 40 : 0;
                    gsap.to(window, { duration: 1, scrollTo: { y: '#' + next.url.hash, offsetY: offset }, ease: Power4.easeInOut });
                };

                

                // currentPageType = next.namespace;
                // console.log(currentPageType);
                $('body').addClass(next.namespace);



                preventSamePageReload();

                return new Promise(resolve => {

                    const enterAnim = gsap.timeline({
                        onComplete() {
                            resolve();
                            navIsOpen = false;
                            openNavTl.restart().pause();
                        }
                    });

                    enterAnim.fromTo(next.container, .1, { autoAlpha: 0 }, { autoAlpha: 1, ease: Expo.easeInOut })
                        .to('.page-transition__line', .5, { scaleY: 0, ease: Expo.easeInOut, stagger: .05 })
                        .set('.page-transition', { autoAlpha: 0 });
                });
            },
            afterEnter(){
                
                $(window).trigger('resize');
            }
        }],
        views: [{
            namespace: 'home',
            afterEnter({ current, next, trigger }) {

                var categories = $(next.html).find('.category');
                var catArray = [];

                categories.each(function (e) {
                    catArray.push($(this).attr('id'))
                });

                var pageNavTemplate = `
                <ul class="page-nav">
                    ${catArray.map((item, i) => {
                    return `<li class="page-nav__item"><a href="#${item}" class="page-nav__link" title="${item}">${item}</a></li>`

                }).join('')
                    }
                </ul>
                `;

                pageNav.prepend(pageNavTemplate);

                gsap.to($('.topbar--page-nav'), {
                    autoAlpha: 1, onComplete: function () {
                        Draggable.create($(pageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(pageNav) });
                        // Draggable.create($(mobilePageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(mobilePageNav) });
                    }
                });

            }
        },
        {
            namespace: 'agenda',
            afterEnter({ current, next, trigger }) {

                // var mobilePageNav = $('.mobile-page-nav');
                // var months = $(next.html).find('.event-month');
                // var monthsArray = [];


                // months.each(function (e) {
                //     var month = {
                //         'name': $(this).data('month-name'),
                //         'hash': $(this).attr('id')
                //     }
                //     monthsArray.push(month);
                // });



                // var pageNavTemplate = `
                // <ul class="page-nav">
                //     ${monthsArray.map((item, i) => {
                //     return `<li class="page-nav__item"><a href="#${item.hash}" class="page-nav__link" title="${item.name}">${item.name}</a></li>`

                // }).join('')
                //     }
                // </ul>
                // `;

                // pageNav.prepend(pageNavTemplate);
                // mobilePageNav.prepend(pageNavTemplate);

                // // gsap.to($('.topbar--page-nav'), { autoAlpha: 1 });
                // gsap.to($('.topbar--page-nav'), {
                //     autoAlpha: 1, onComplete: function () {
                //         Draggable.create($(pageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(pageNav) });
                //         // Draggable.create($(mobilePageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(mobilePageNav) });
                //     }
                // });

            },
        },
        {
            namespace: 'archive',
            afterEnter({ current, next, trigger }) {
                var mobilePageNav = $('.mobile-page-nav');
                var months = $(next.html).find('.event-month');
                var monthsArray = [];


                months.each(function (e) {
                    var month = {
                        'name': $(this).data('year'),
                        'hash': $(this).attr('id')
                    }
                    monthsArray.push(month);
                });



                var pageNavTemplate = `
                <ul class="page-nav">
                    ${monthsArray.map((item, i) => {
                    return `<li class="page-nav__item"><a href="#${item.hash}" class="page-nav__link" title="${item.name}">${item.name}</a></li>`

                }).join('')
                    }
                </ul>
                `;

                pageNav.prepend(pageNavTemplate);
                mobilePageNav.prepend(pageNavTemplate);

                gsap.to($('.topbar--page-nav'), {
                    autoAlpha: 1, onComplete: function () {
                        Draggable.create($(pageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(pageNav) });
                        // Draggable.create($(mobilePageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(mobilePageNav) });
                    }
                });

            },
        },
        {
            namespace: 'representation',
            afterEnter({ current, next, trigger }) {
                var eventTitle = $(next.container).data('event-title');
                eventTitle = $('<span>' + eventTitle + '</span>');

                pageNav.prepend(eventTitle);

                gsap.to($('.topbar--page-nav'), { autoAlpha: 1 });

                setTimeout(reInitMarquee, 100)

                function reInitMarquee() {
                    Marquee3k.init();
                    Marquee3k.pauseAll();
                    $('.one-ticket__marquee').each(function (e) {

                        var thisIsPlaying = false;
                        var thisA = $(this).parents('.one-ticket').find('a');


                        thisA.on('mouseover', function () {
                            Marquee3k.play(e);
                        });

                        thisA.on('mouseleave', function () {
                            Marquee3k.pause(e);
                        });
                    });
                };

            }

        },
        {
            namespace: 'page-special',
            afterEnter({ current, next, trigger }) {

                var anchors = $(next.html).find('.section--two-sides');
                var anchorsArray = [];

                anchors.each(function (e) {
                    var anchor = {
                        'name': $(this).find('.two-sides__title').html(),
                        'hash': $(this).attr('id')
                    }
                    anchorsArray.push(anchor)
                });

                var pageNavTemplate = `
                <ul class="page-nav">
                    ${anchorsArray.map((item, i) => {
                    return `<li class="page-nav__item"><a href="#${item.hash}" class="page-nav__link" title="${item.name}">${item.name}</a></li>`

                }).join('')
                    }
                </ul>
                `;

                pageNav.prepend(pageNavTemplate);

                gsap.to($('.topbar--page-nav'), {
                    autoAlpha: 1, onComplete: function () {
                        Draggable.create($(pageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(pageNav) });
                        // Draggable.create($(mobilePageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(mobilePageNav) });
                    }
                });

            }
        },
        {
            namespace: 'manifesto',
            afterEnter({ current, next, trigger }) {
                var mobilePageNav = $('.mobile-page-nav');
                var manifestoItems = $(next.html).find('.manifesto-item');
                var manifestoArray = [];


                manifestoItems.each(function (e) {
                    var item = {
                        'index': $(this).data('index'),
                        'hash': $(this).attr('id')
                    }
                    manifestoArray.push(item);
                });



                var pageNavTemplate = `
                <ul class="page-nav">
                    ${manifestoArray.map((item, i) => {
                    return `<li class="page-nav__item"><a href="#${item.hash}" class="page-nav__link" title="${item.index}">${item.index}</a></li>`

                }).join('')
                    }
                </ul>
                `;

                pageNav.prepend(pageNavTemplate);
                mobilePageNav.prepend(pageNavTemplate);

                // gsap.to($('.topbar--page-nav'), { autoAlpha: 1 });
                gsap.to($('.topbar--page-nav'), {
                    autoAlpha: 1, onComplete: function () {
                        Draggable.create($(pageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(pageNav) });
                        // Draggable.create($(mobilePageNav).find('.page-nav'), { type: 'x', edgeResistance: 0.65, bounds: $(mobilePageNav) });
                    }
                });

            },
        },

        ]
    },

    );

    function init() {
        // SCROLL POSITION LINE

        ScrollTrigger.create({
            trigger: 'body',
            start: 'top top',
            endTrigger: '.footer',
            end: 'top bottom',
            //markers: true,
            //onToggle: self => console.log("toggled, isActive:", self.isActive),
            onUpdate: self => {
                var progress = self.progress.toFixed(3);
                gsap.to('.page-position', { '--position': progress });
            }
        });

        //// SCROLL POSITION LINE

        // HEADER SCROLL CLASS

        ScrollTrigger.create({
            // trigger: 'body',
            // start: '200px top',
            start: 'top -10%',
            //markers: true,
            onEnter: self => {
                //console.log('ENTER');
                $('.topbar').addClass('topbar--is-scrolled');
            },
            onLeaveBack: self => {
                $('.topbar').removeClass('topbar--is-scrolled');
            }
        });

        //// HEADER SCROLL CLASS

        // FOOTER

        // let footerAnim = gsap.timeline({
        //     id: 'footer-anim',
        //     onComplete: function () { $('.logo--footer a').trigger('mouseenter') },
        //     scrollTrigger: {
        //         //markers: true,
        //         trigger: '.footer',
        //         start: 'top bottom'
        //     }
        // });

        // footerAnim.from('.nav--footer--shortcuts a', { yPercent: '50', autoAlpha: 0, stagger: .2, ease: Power3.easeOut }, 'footerAnim')
        //     .from('.socials__item span', { duration: 1.5, yPercent: 20, rotation: '45deg', autoAlpha: 0, stagger: .2, ease: Power3.easeOut }, 'footerAnim+=.2')
        //     .from('.socials_item__title', { duration: 1.5, yPercent: 100, autoAlpha: 0, stagger: .2, ease: Power3.easeOut }, 'footerAnim+=.4');


        $('.btn').on('mousemove', function (e) {
            const target = e.target;
            const rect = target.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            gsap.to($(this), { '--left': x + 'px', '--top': y + 'px' });
        });

        ////BTN

        $('.topbar--page-nav, .mobile-page-nav').on('click', '.page-nav__link', function (e) {
            e.preventDefault();

            var isSpecialPage = $('body').hasClass('page-special');

            var offset = isSpecialPage ? $('.topbar').outerHeight() + 40 : 0;
            // var offset = $('.topbar').outerHeight() + 42;
            gsap.to(window, { duration: 1, scrollTo: { y: $(this).attr('href'), offsetY: offset }, ease: Power4.easeInOut });
        });

        if ($('.header-carousel').length) {
            var headerCarousel = $('.header-carousel').flickity({
                // options
                cellAlign: 'left',
                contain: true,
                prevNextButtons: false
            });

            gsap.to($('.header-carousel__img'), {
                scrollTrigger: {
                    trigger: $('.header--single-event'),
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 0
                }, // start the animation when ".box" enters the viewport (once)
                y: '20vh',
                autoAlpha: .6,
                scale: 1
            });

        };


        ScrollTrigger.create({
            start: 0,
            end: () => ScrollTrigger.maxScroll('html'),
            onUpdate: function (self) {
                scrollVelocity = self.getVelocity();
                // console.log(scrollVelocity);
                //gsap.from('.event__title > *', {rotate:  - scrollVelocity / 1000});
                // gsap.from('.event__title > *', {scaleX: 1 / (scrollVelocity / 750), duration: .2});
            }
        });

        ScrollTrigger.addEventListener("scrollEnd", function () {
            // gsap.from('.event__title > *', {rotate:  0});
        });

        $('.event-month').each(function (e) {
            var $this = $(this);
            var word = $this.find('.event-month__word--desktop');
            var letters = $this.find('.event-month__letter');
            //var mobileWord = $this.find('.event-month__word--mobile');

            gsap.from(letters, {
                scrollTrigger: {
                    trigger: word,
                    start: 'top center',
                },
                autoAlpha: 0,
                '--wght': 0,
                '--wdth': 50,
                yPercent: '20',
                // scale: .5,
                stagger: {
                    each: .05,
                    from: 'center'
                },
                duration: 1.75,
                ease: Elastic.easeOut.config(1, .5)
            });

            // gsap.from(mobileWord, {
            //     scrollTrigger: {
            //         trigger: mobileWord,
            //         start: 'top 75%',
            //     },
            //     autoAlpha: 0,
            //     '--wght': 0,
            //     '--wdth': 50,
            //     yPercent: '20',
            //     duration: 1.75,
            //     ease: Elastic.easeOut.config(1, .5)
            // });

        });

        $('.event-list .event').each(function () {
            var $this = $(this);
            var thisTitleIn = $this.find('.event__title > *');

            gsap.from(thisTitleIn, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'center bottom',
                },
                autoAlpha: 0,
                yPercent: '50',
                stagger: {
                    each: .05,
                    from: 'center'
                },
                duration: 1.75,
                ease: Elastic.easeOut.config(1, .5)
            });

        });

        $('.category').each(function () {
            var $this = $(this);
            var thisbg = $this.find('.category__bg');
            var thisTitleLetters = $this.find('.category__letter');
            //var mobileWord = $this.find('.category__word--mobile');
            var thisMarquee = $this.find('.shortly__marquee');
            var thisSeeMore = $this.find('.see-more');
            var thisShortly = $this.find('.shortly__title');

            gsap.from(thisbg, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: .5
                },
                top: '-20vh'
            });

            gsap.from(thisTitleLetters, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'top center',
                },
                autoAlpha: 0,
                '--wght': 0,
                '--wdth': 50,
                yPercent: '20',
                stagger: {
                    each: .05,
                    from: 'center'
                },
                duration: 1.75,
                ease: Elastic.easeOut.config(1, .5)
            });

            // gsap.from(mobileWord, {
            //     scrollTrigger: {
            //         trigger: mobileWord,
            //         start: 'top 75%',
            //     },
            //     autoAlpha: 0,
            //     '--wght': 0,
            //     '--wdth': 50,
            //     yPercent: '20',
            //     duration: 1.75,
            //     ease: Elastic.easeOut.config(1, .5)
            // });

            gsap.from(thisSeeMore, {
                scrollTrigger: {
                    trigger: $this,
                    //start: 'bottom bottom',
                    start: () => { return window.innerWidth > 992 ? 'bottom bottom' : '25% center' },
                    toggleActions: 'play none none reverse'
                },
                rotate: 10,
                yPercent: 50,
                autoAlpha: 0,
            });

            gsap.from(thisShortly, {
                scrollTrigger: {
                    trigger: $this,
                    // start: 'bottom bottom',
                    start: () => { return window.innerWidth > 992 ? 'bottom bottom' : '25% center' },
                    toggleActions: 'play none none reverse'
                },
                yPercent: 100,
                autoAlpha: 0,
                delay: .2
            });

            gsap.from(thisMarquee, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'bottom bottom',
                    toggleActions: 'play none none reverse'
                },
                yPercent: 100,
                autoAlpha: 0,
            });
        });

        // SCROLL TRIGGER IMG

        $('.block--one-img').each(function () {
            var $this = $(this);
            var thisImg = $this.find('img');

            gsap.from(thisImg, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: .5
                },
                top: '-20vh'
            });
        });

        $('.card__img').each(function () {
            var $this = $(this);
            var thisImg = $this.find('img');

            gsap.from(thisImg, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: .5
                },
                top: '-10vh'
            });
        });

        //// SCROLL TRIGGER IMG

        // DROPDOWNS
        $('.dropdown__trigger').on('click', function () {
            var thisDropdown = $(this).parents('.dropdown');
            var isClosed = thisDropdown.hasClass('dropdown--is-closed');
            var thisDropdownContent = thisDropdown.find('.dropdown__content');
            var dropDownH = thisDropdownContent.find('>div').outerHeight(true);

            if (isClosed) {
                $('.dropdown').removeClass('dropdown--is-open').addClass('dropdown--is-closed');
                gsap.to($('.dropdown__content'), 1, { height: 0, ease: Expo.easeInOut });
                gsap.to(thisDropdownContent, { autoAlpha: 1, duration: .5, delay: .5 });
                gsap.to(thisDropdownContent, 1, {
                    height: dropDownH + 'px', ease: Expo.easeInOut, onComplete: function () {
                        gsap.set(thisDropdownContent, { height: 'auto' });
                        ScrollTrigger.refresh();
                    }
                });


                $(this).parents('.dropdown').removeClass('dropdown--is-closed').addClass('dropdown--is-open');

            } else {
                gsap.to(thisDropdownContent, 1, {
                    height: 0, autoAlpha: 0, ease: Expo.easeInOut, onComplete: function () {
                        ScrollTrigger.refresh();
                    }
                });
                $(this).parents('.dropdown').removeClass('dropdown--is-open').addClass('dropdown--is-closed');
            };
        });
        //// DROPDOWNS

        // SLIDER

        $('.slider').each(function (e) {

            $(this).on('ready.flickity', function () {
                setSliderHeightToMax();
            });

            var slider = $(this).flickity({
                // options
                cellAlign: 'left',
                contain: true,
                prevNextButtons: false,
                pageDots: false,
                //setGallerySize: false
            });

            window.addEventListener('resize', function () {
                setSliderHeightToMax();
            });

        });

        function setSliderHeightToMax() {

            $('.slider').find('.slide').css('height', '');

            setTimeout(function () {
                $('.slider').find('.slide').css('height', '100%');
            }, 1000);

        }




        //// SLIDER



        Marquee3k.init();

        // if($('.one-ticket__marquee').length){
        //     Marquee3k.pauseAll();
        //     console.log('PAUSE ALL');
        // } else {
        //     Marquee3k.playAll();
        //     console.log('PLAY ALL');
        // }

        // $('.one-ticket__marquee').each(function(e){
        //     //Marquee3k.pause(e);
        //     var thisIsPlaying = false;
        //     var thisA = $(this).parents('.one-ticket').find('a');

        //     thisA.on('mouseover', function(){
        //         Marquee3k.play(e);
        //     });

        //     thisA.on('mouseleave', function(){
        //         Marquee3k.pause(e);
        //     });
        // });

        if (!isTouch) {

            $('.event--artist a, .event--artist span').on('mouseenter, mousemove', function (e) {
                // var xPos = e.pageX;
                // var yPos = e.pageY;
                let transform = gsap.utils.pipe(
                    gsap.utils.clamp(0, -50),
                    gsap.utils.mapRange(0, -50, -5, 5)
                );
                // Get the bounding rectangle of target
                const rect = e.target.getBoundingClientRect();

                // Mouse position
                const xPos = ((e.clientX / window.innerWidth) * 100) - 50;
                const yPos = ((e.clientY / window.innerHeight) * 100) - 50;

                var xRange = xPos / -10;
                var yRange = yPos / -10;

                $('.represented-artist-img').addClass('represented-artist-img--is-visible');
                var thisImgUrl = $(this).parents('.event--artist').find('img').attr('src');

                gsap.to('.represented-artist-img img', { x: xRange + 'vh', y: yRange + 'vh', duration: .5, ease: Power2.easeOut });
                //gsap.to('.represented-artist-img img', {'--scale': 1, ease: Power2.easeOut});
                gsap.to('.represented-artist-img__img', { x: xRange / 2 + 'vh', y: yRange / 2 + 'vh', duration: 1, ease: Power2.easeOut });
                $('.represented-artist-img img').attr('src', thisImgUrl);

                console.log(xRange);
            });

            $('.event--artist a, .event--artist span').on('mouseleave', function (e) {
                $('.represented-artist-img').removeClass('represented-artist-img--is-visible');
                //gsap.to('.represented-artist-img img', {'--scale': 1.2, ease: Power2.easeOut});
            });
        };

        // FILTER AND SEARCH EVENTS

        var filterCatIsOpen = false;

        $('.search-events__input').on('focus', function (e) {
            $(this).parents('.search-events__input-wrapper').addClass('is-focused');
        });

        $('.search-events__input').on('blur', function (e) {
            $(this).parents('.search-events__input-wrapper').removeClass('is-focused');
        });

        $('.event-cat-trigger').on('click', function (e) {
            e.preventDefault();
            var thisList = $(this).parents('.filter-events').find('.event-cat-list'),
                thisListUl = thisList.find('ul'),
                listH = thisListUl.outerHeight(true);

            if (!filterCatIsOpen) {
                $(this).addClass('event-cat-trigger--is-open');

                gsap.to(thisList, {
                    height: listH, duration: 1, ease: Power4.easeOut,
                    onStart: function () {
                        filterCatIsOpen = true;
                        thisList.addClass('event-cat-list--is-open');
                    },
                    onComplete: function () {
                        console.log('cool');
                        gsap.set(thisList, { height: 'auto' })

                    }
                });

                gsap.to(thisListUl, { autoAlpha: 1, duration: 1, ease: Power4.easeOut });

            } else {
                $(this).removeClass('event-cat-trigger--is-open');

                gsap.to(thisList, {
                    height: 0, duration: .5, ease: Power4.easeOut,
                    onStart: function () {
                        thisList.removeClass('event-cat-list--is-open');
                    },
                    onComplete: function () {
                        filterCatIsOpen = false;

                    }
                });

                gsap.to(thisListUl, { autoAlpha: 0, duration: .5, ease: Power4.easeOut });
            }
        });

        if ($('.filter-bar').length) {
            ScrollTrigger.create({
                start: 'top -10%',
                end: 99999,
                onUpdate: (self) => {
                    if (!filterCatIsOpen) {
                        if (self.direction === -1) {
                            $('.filter-bar').removeClass('filter-bar--is-scrolled')
                        } else {
                            $('.filter-bar').addClass('filter-bar--is-scrolled')
                        }
                    }

                }
            });
        };



        //// FILTER AND SEARCH EVENTS

        // HEADER TICKETS

        var headerTicketIsOpen = false;

        $('.header-tickets__trigger').on('click', function (e) {
            e.preventDefault();
            var thisList = $(this).parents('.header-tickets').find('.header-tickets__list'),
                thisListUl = thisList.find('ul'),
                listH = thisListUl.outerHeight(true);

            if (!headerTicketIsOpen) {
                gsap.to(thisList, {
                    height: listH, duration: 1, ease: Power4.easeOut,
                    onStart: function () {
                        headerTicketIsOpen = true;
                    },
                    onComplete: function () {
                        // console.log('cool');
                        gsap.set(thisList, { height: 'auto' })
                    }
                });

                gsap.to(thisListUl, { autoAlpha: 1, duration: 1, ease: Power4.easeOut });

            } else {
                gsap.to(thisList, {
                    height: 0, duration: .5, ease: Power4.easeOut, onComplete: function () {
                        headerTicketIsOpen = false;
                    }
                });

                gsap.to(thisListUl, { autoAlpha: 0, duration: .5, ease: Power4.easeOut });
            }
        });

        if ($('.header-tickets').length) {
            ScrollTrigger.create({
                start: 'top -10%',
                end: 99999,
                onUpdate: (self) => {
                    if (!headerTicketIsOpen) {
                        if (self.direction === -1) {
                            $('.header-tickets').removeClass('header-tickets--is-scrolled')
                        } else {
                            $('.header-tickets').addClass('header-tickets--is-scrolled')
                        }
                    }

                }
            });
        };

        //// HEADER TICKETS

        //SPLIT MANIFESTO

        if ($('.manifesto-item').length) {


            $('.manifesto-item h2').each(function (e) {
                var splitType = $(this).data('split');

                console.log(splitType);

                const text = new SplitType($(this), { types: splitType });
            });

            // var manifestoAnim1 = gsap.timeline({repeat: -1, paused: true});

            // manifestoAnim1  .to('.manifesto-item h2>div', {yPercent: -50, duration: .2, stagger: .025})
            //                 .to('.manifesto-item h2>div', {yPercent: 0, duration: .2, stagger: .025, delay: -1.75});
            // manifestoAnim1.play();
        }



        ////SPLIT MANIFESTO

        // DRAGGABLE PAGE NAV

        // Draggable.create('.page-nav', {type: 'x', edgeResistance: 0.65, bounds: '.topbar--page-nav'});
        if ($('.page-nav').length) {
            $('.page-nav').each(function (e) {
                Draggable.create($(this), { type: 'x', edgeResistance: 0.65, bounds: $(this).parent() });
            });
        };
        //Draggable.create('.page-nav', {type: 'x', edgeResistance: 0.65, bounds: $('.page-nav').parent()});

        // NEWSLETTER

        const endpoint = "https://hooks.delight-data.com/v1/contacts";
        const apiKey = "NMOXmTH99L9p3JNgR2ChH9nl9YjMJDDx8cWbThQL";
        const listname = "newsletter";

        $('#newsletter-subscribe').on('submit', function (e) {
            e.preventDefault();

            const subscriptionForm = $(this);
            const misc = { "optin_nl": 1 }
            const email = subscriptionForm[0].elements["input_1"].value;
            const firstname = subscriptionForm[0].elements["input_15.3"].value;
            const lastname = subscriptionForm[0].elements["input_15.6"].value;
            const postcode = subscriptionForm[0].elements["input_16.5"].value;
            const country = subscriptionForm[0].elements["input_16.6"].value;
            pop = subscriptionForm[0].elements["input_33"].value;
            reggae = subscriptionForm[0].elements["input_34"].value;
            rock = subscriptionForm[0].elements["input_17"].value;
            hiphop = subscriptionForm[0].elements["input_19"].value;
            chanson = subscriptionForm[0].elements["input_20"].value;
            jazz = subscriptionForm[0].elements["input_21"].value;
            electro = subscriptionForm[0].elements["input_31"].value;
            folk = subscriptionForm[0].elements["input_40"].value;
            cine = subscriptionForm[0].elements["input_39"].value;
            commusicale = subscriptionForm[0].elements["input_42"].value;
            enfant = subscriptionForm[0].elements["input_25"].value;
            humour = subscriptionForm[0].elements["input_24"].value;
            expo = subscriptionForm[0].elements["input_26"].value;
            spectacle = subscriptionForm[0].elements["input_22"].value;
            sr = subscriptionForm[0].elements["input_47"].value;
            sa = subscriptionForm[0].elements["input_49"].value;
            const interest = [pop, reggae, rock, hiphop, chanson, jazz, electro, folk, cine, commusicale, enfant, humour, expo, spectacle, sr, sa];
            const xhr = new XMLHttpRequest();
            xhr.open("POST", endpoint);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("x-api-key", apiKey);
            xhr.send(JSON.stringify([{ email, listname, firstname, lastname, postcode, country, interest, misc }]));
            console.log({ email, listname, firstname, lastname, postcode, country, interest, misc });
            subscriptionForm[0].reset();
            //subscriptionForm.remove();
            $('<p>Inscription Ok</p>').insertAfter($('.form__main-list'));
            return false;
        });

        //// NEWSLETTER

    };

    function killAllScrollTrigger() {
        // ScrollTrigger.getAll().forEach(t => t.kill(false));
        // ScrollTrigger.refresh();
        gsap.set('.nav--footer--shortcuts a, .socials__item span, .socials_item__title', { clearProps: 'all' });
        gsap.set('.page-position', { '--position': 0 });
        $('.topbar').removeClass('topbar--is-scrolled');

        let triggers = ScrollTrigger.getAll();
        triggers.forEach(trigger => {
            trigger.kill();
        });

    };

    function preventSamePageReload() {
        var links = document.querySelectorAll('a[href]');
        var cbk = function (e) {
            if (e.currentTarget.href === window.location.href) {
                e.preventDefault();
                e.stopPropagation();

                if (!navIsClosed) {
                    closeNavTl.play();
                }
            }
        };

        for (var i = 0; i < links.length; i++) {
            links[i].addEventListener('click', cbk);
        }
    };

    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };





});