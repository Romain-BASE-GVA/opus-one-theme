$(document).ready(function() {
    var navIsClosed = true;
    var pageNav = $('.topbar--page-nav');
    var openNavTl = gsap.timeline({paused: true, 
        onComplete: function(){
            navIsClosed = false;
            // $('body').addClass('nav-is-open');
            // $('.burger').addClass('burger--close');
            closeNavTl.restart().pause();
        }
    });
    var closeNavTl = gsap.timeline({paused: true, 
        onComplete: function(){
            navIsClosed = true;
            // $('body').removeClass('nav-is-open');
            // $('.burger').removeClass('burger--close');
            openNavTl.restart().pause();
        }
    });
    let logoTopbarAnim = gsap.timeline({paused:true});
    let logoFooterAnim = gsap.timeline({paused:true});
    let scrollVelocity = 0;

    openNavTl	.fromTo('.nav--main', 
                        {'clip-path': 'circle(0% at calc(100% - 73px) calc(0% + 58px))'}, 
                        {'clip-path': 'circle(135% at calc(100% - 73px) calc(0% + 58px))', 
                duration: .75, ease: Power3.easeInOut}, 'opening')
                .fromTo('.nav--main__bg', 
                        {'clip-path': 'circle(0% at calc(100% - 73px) calc(0% + 58px))'}, 
                        {'clip-path': 'circle(135% at calc(100% - 73px) calc(0% + 58px))', 
                stagger: .1, duration: .75, ease: Power3.easeInOut}, 'opening');

    closeNavTl	.to('.nav--main', {'clip-path': 'circle(0% at calc(100% - 73px) calc(0% + 58px))', duration: 1, ease: Power4.easeOut});

    logoTopbarAnim  .to('.logo--topbar .logo__letter', {'--wght': 100, '--wdth': 45, '--ital': 10, autoAlpha: .5, stagger: .05, duration: .4, ease: Power2.easeIn}, 'first')
			        .to('.logo--topbar .logo__letter', {'--wght': 950, '--wdth': 10, '--ital': 0, autoAlpha: 1, stagger: .05, duration: .4, ease: Power2.easeOut}, 'first+=.45');

    logoFooterAnim  .to('.logo--footer .logo__letter', {'--wght': 100, '--wdth': 45, '--ital': 10, autoAlpha: .5, stagger: .05, duration: .4, ease: Power2.easeIn}, 'first')
			        .to('.logo--footer .logo__letter', {'--wght': 950, '--wdth': 10, '--ital': 0, autoAlpha: 1, stagger: .05, duration: .4, ease: Power2.easeOut}, 'first+=.45');


    $('.logo--topbar a').on('mouseenter', function(){
        logoTopbarAnim.play();
    });

    $('.logo--topbar a').on('mouseleave', function(){
        if(!logoTopbarAnim.isActive()){
            logoTopbarAnim.restart().pause();
        } else {
            let animRest = logoTopbarAnim.duration() - logoTopbarAnim.progress();
            setTimeout(function(){logoTopbarAnim.restart().pause();}, animRest * 1000);
        }
    });

    $('.nav-trigger').on('click', function(){
        if(navIsClosed){
            openNavTl.play();
        } else {
            closeNavTl.play();
        }
    })

    $('.logo--footer a').on('mouseenter', function(){
        logoFooterAnim.play();
    });

    $('.logo--footer a').on('mouseleave', function(){
        if(!logoFooterAnim.isActive()){
            logoFooterAnim.restart().pause();
        } else {
            let animRest = logoFooterAnim.duration() - logoFooterAnim.progress();
            setTimeout(function(){logoFooterAnim.restart().pause();}, animRest * 1000);
        }
    });

    preventSamePageReload();
    init();

    barba.init({
        preventRunning: true,
        transitions: [{
            name: 'switch',
            once({current, next, trigger}) {

                // var animLogo = gsap.timeline({paused: true, delay: .5});
                // animLogo.fromTo('.curtain .hor-line', 1, {scaleX: 0, x: '10%'}, {scaleX: 1, x: '0%', ease: Expo.easeInOut}, 'first-line')
                //         .fromTo('.curtain .hor-line', .75, {autoAlpha: 0}, {autoAlpha: 1, ease: Expo.easeInOut}, 'first-line')
                //         .set('.curtain .hor-line', {autoAlpha: 0})
                //         .set('.curtain .t-logo', {autoAlpha: 1})
                //         .set('.curtain .t-vertical-line', {transformOrigin: 'top center'})
                //         .fromTo('.curtain .t-top-bar', .75, {y: '200%'},{y: '0%', delay: -.1, ease: Expo.easeInOut}, 'l-first-step')
                //         .fromTo('.curtain .t-vertical-line', .75, {scaleY: 0, y: '50%'}, {scaleY: 1, y: '-1%', delay: -.1, ease: Expo.easeInOut}, 'l-first-step')
                //         .to('.curtain', .7, {'clip-path': 'polygon(0% 50%, 100% 20%, 100% 100%, 0% 100%)', delay: .75, ease: Expo.easeIn}, 'curtain')
                //         .to('.curtain', .8, {'clip-path': 'polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)', delay: -.1, ease: Expo.easeOut})
                //         .to('.curtain .t-ing-logo', 3, {scale: .8, delay: -.1, ease: Expo.easeOut}, 'curtain')
                //         .to('.bottom-bar', 1.3, {y: ()=>{ return - $('.bottom-bar > a').outerHeight(true) + 'px'}, ease: Expo.easeInOut}, 'curtain+=.8')
                //         .fromTo('#cookie-law-info-bar', .5, {autoAlpha: 0}, {autoAlpha: 1}, 'curtain+=2.1')
                //         .from('#cookie-law-info-bar', .5, {yPercent: 100}, 'curtain+=2.1')
                //         .set('.curtain', {autoAlpha: 0, display: 'none'});
                
                // animLogo.timeScale(0.8);
                // animLogo.play();
                isOnce = true;

                var pageColor = $(next.container).data('bg');
                var nextPageTitle = $(next.container).data('logo-title');
                gsap.set($('body'), {backgroundColor: pageColor});
                $('.topbar__page-name span').html(nextPageTitle);

                // var nextPageTitle = $(next.html).find('.page-top-bar-info').html();
                // $('.page-name').empty().html(nextPageTitle);
                
            },
            leave({current, next, trigger}) {

                // if(next.namespace == 'single-project'){
                //     //console.log(next.html);
                //     var images = $(next.html).find('img');
                //     //console.log(images);
                //     if(images.length){
                //         images.each(function(){
                //             var url = $(this).attr('src');
                //             var img = new Image();
                //             img.src = url;
                //         });
                //     }
                // };

                return new Promise(resolve => {
                    const leavingAnim = gsap.timeline({
                        onComplete(){
                            resolve();
                        }
                    });

                    leavingAnim .set('.page-transition', {autoAlpha: 1})
                                .to('.page-transition__line', .5, {scaleY: 1, ease: Expo.easeInOut, stagger: .05})
                                //.to('.page-name', 1, {y: '10px', autoAlpha: 0, ease: Expo.easeOut}, 'leaving')
                                .to(current.container, .1, {autoAlpha: 0, display: 'none', ease: Expo.easeInOut});
                });
            },
            beforeLeave({current, next, trigger}){},
            beforeEnter({current, next, trigger}) {
                console.log('BEFORE ENTER GLOBAL');
                window.scrollTo(0, 0);

                gsap.to($('.topbar--page-nav'), {autoAlpha: 0});
                pageNav.empty();

                killAllScrollTrigger();

                isOnce = false;
                //ScrollTrigger.getById('footer-anim').kill(true);
                init();
            },
            enter({current, next, trigger}) {
                var pageColor = $(next.container).data('bg');
                var nextPageTitle = $(next.container).data('logo-title');
                // $('.page-name').empty().html(nextPageTitle);
                // console.log($(next.container).data('bg'));
                gsap.set($('body'), {backgroundColor: pageColor});
                $('.topbar__page-name span').html(nextPageTitle);

                preventSamePageReload();

                return new Promise(resolve => {
                    
                    const enterAnim = gsap.timeline({
                        onComplete(){
                            resolve();
                            navIsOpen = false;
                            openNav.restart().pause();
                        }
                    });

                    enterAnim   .fromTo(next.container, .1, {autoAlpha: 0}, {autoAlpha: 1, ease: Expo.easeInOut})
                                .to('.page-transition__line', .5, {scaleY: 0, ease: Expo.easeInOut, stagger: .05})
                                //.fromTo('.page-name', 1, {y: '-10px', autoAlpha: 0}, {y: 0, autoAlpha: 1, ease: Expo.easeOut}, 'entering')
                                .set('.page-transition', {autoAlpha: 0});
                });
            }
        }],
        views: [{
            namespace: 'home',
            afterEnter({current, next, trigger}) {
                
                var categories = $(next.html).find('.category');
                var catArray = [];

                categories.each(function(e){
                    catArray.push($(this).attr('id'))
                });

                var pageNavTemplate = `
                <ul class="page-nav">
                    ${
                        catArray.map((item, i) => {
                            return `<li class="page-nav__item"><a href="#${item}" class="page-nav__link" title="${item}">${item}</a></li>`
                            
                        }).join('')
                    }
                </ul>
                `;
                
                pageNav.prepend(pageNavTemplate);
                
                gsap.to($('.topbar--page-nav'), {autoAlpha: 1});
                
            }
            // afterEnter(data) {
            //     home();
            // }
          }, 
          {
            namespace: 'agenda',
            afterEnter({current, next, trigger}){
                var months = $(next.html).find('.event-month');
                var monthsArray = [];


                months.each(function(e){
                    monthsArray.push($(this).attr('id'))
                });

                

                var pageNavTemplate = `
                <ul class="page-nav">
                    ${
                        monthsArray.map((item, i) => {
                            return `<li class="page-nav__item"><a href="#${item}" class="page-nav__link" title="${item}">${item}</a></li>`
                            
                        }).join('')
                    }
                </ul>
                `;
                
                pageNav.prepend(pageNavTemplate);
                
                gsap.to($('.topbar--page-nav'), {autoAlpha: 1});

            },
            // afterEnter(data) {
            //      projects();
            // },
          }, 
          {
            namespace: 'single-event',
            afterEnter({current, next, trigger}) {
                var eventTitle = $(next.container).data('event-title');
                    eventTitle = $('<span>'+ eventTitle +'</span>');

                pageNav.prepend(eventTitle);
                
                gsap.to($('.topbar--page-nav'), {autoAlpha: 1});

                setTimeout(reInitMarquee, 100)

                function reInitMarquee() {
                    Marquee3k.init();
                    Marquee3k.pauseAll();
                    $('.one-ticket__marquee').each(function(e){
    
                        var thisIsPlaying = false;
                        var thisA = $(this).parents('.one-ticket').find('a');
                        
    
                        thisA.on('mouseover', function(){
                            Marquee3k.play(e);
                        });
            
                        thisA.on('mouseleave', function(){
                            Marquee3k.pause(e);
                        });
                    });
                };

            },
        }
        //     afterEnter(data) {
        //         singleProject();
        //     },
        //   },
        //   {
        //     namespace: 'news',
        //     beforeEnter(data) {
        //         news();
        //     },
        //     // afterEnter(data) {
        //     //     news();
        //     // },
        //   },
        //   {
        //     namespace: 'single-news',
        //     beforeEnter(data) {
        //         singleNews();
        //     },
        //     // afterEnter(data) {
        //     //     singleNews();
        //     // },
        //   }, 
        //   {
        //     namespace: 'regular-page',
        //     beforeEnter(data) {
        //         regularPage();
        //     },
        //     // afterEnter(data) {
        //     //     regularPage();
        //     // }
        //   }, 
        //   {
        //     namespace: 'atelier',
        //     beforeEnter(data) {
        //         atelierPage();
        //     },
        //     // afterEnter(data) {
        //     //     atelierPage();
        //     // }
        //   }
          
        ]
    },
    
    );

    function init(){

        // $('.nav--footer--shortcuts a').on('mouseenter', function(e){
        //     $(this)
        // });

        $('.topbar--page-nav').on('click', '.page-nav__link', function(e){
            e.preventDefault();
            gsap.to(window, {duration: .75, scrollTo: $(this).attr('href')});
        });

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
        
        ScrollTrigger.create({
            start: 0,
            end: () => ScrollTrigger.maxScroll('html'),
            onUpdate: function(self) {
                scrollVelocity = self.getVelocity();
                // console.log(scrollVelocity);
                //gsap.from('.event__title > *', {rotate:  - scrollVelocity / 1000});
                // gsap.from('.event__title > *', {scaleX: 1 / (scrollVelocity / 750), duration: .2});
            }
        });
    
        ScrollTrigger.addEventListener("scrollEnd", function() {
            // gsap.from('.event__title > *', {rotate:  0});
        });
    
        $('.event-month').each(function(e){
            var $this = $(this);
            var word = $this.find('.event-month__word');
            var letters = $this.find('.event-month__letter');
    
            gsap.from(letters, {
                scrollTrigger: {
                    trigger: word,
                    start: 'top center',
                }, // start the animation when ".box" enters the viewport (once)
                autoAlpha: 0,
                //color: '#1f006a', 
                //letterSpacing: '.5em',
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
        });
    
        $('.event-list .event').each(function(){
            var $this = $(this);
            var thisTitleIn = $this.find('.event__title > *');
    
            gsap.from(thisTitleIn, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'center bottom',
                }, // start the animation when ".box" enters the viewport (once)
                autoAlpha: 0,
                //color: '#1f006a', 
                //letterSpacing: '.5em',
                //'--wght': 250,
                //'--wdth': 50,
                yPercent: '50',
                //rotate: 10,
                // scale: .5,
                stagger: {
                    each: .05,
                    from: 'center'
                },
                duration: 1.75,
                ease: Elastic.easeOut.config(1, .5)
            });
    
        });

        $('.category').each(function(){
            var $this = $(this);
            var thisbg = $this.find('.category__bg');
            var thisTitleLetters = $this.find('.category__letter');
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

            gsap.from(thisSeeMore, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'bottom bottom',
                    toggleActions:'play none none reverse'
                },
                //duration: 1,
                rotate: 10,
                yPercent: 50,
                autoAlpha: 0, 
                //ease: Power3.easeOut
            });

            gsap.from(thisShortly, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'bottom bottom',
                    toggleActions:'play none none reverse'
                },
                //duration: 1,
                yPercent: 100,
                autoAlpha: 0,
                delay: .2
                //ease: Power3.easeOut
            });

            gsap.from(thisMarquee, {
                scrollTrigger: {
                    trigger: $this,
                    start: 'bottom bottom',
                    toggleActions:'play none none reverse'
                },
                //duration: 1,
                yPercent: 100,
                autoAlpha: 0,
                //delay: .4
                //ease: Power3.easeOut
            });
        });

        let footerAnim = gsap.timeline({
            // yes, we can add it to an entire timeline!
            id: 'footer-anim',
            scrollTrigger: {
                trigger: '.footer',
                start: 'top bottom', // when the top of the trigger hits the top of the viewport
                toggleActions:'play none none reset'
            }
        });

        footerAnim  .from('.nav--footer--shortcuts a', {yPercent: '50', autoAlpha: 0, stagger: .2, ease: Power3.easeOut}, 'footerAnim')
                    .from('.socials__item span', {duration: 1.5, yPercent: 20, rotation: '45deg', autoAlpha: 0, stagger: .2, ease: Power3.easeOut}, 'footerAnim+=.2')
                    .from('.socials_item__title', {duration: 1.5, yPercent: 100, autoAlpha: 0, stagger: .2, ease: Power3.easeOut}, 'footerAnim+=.4');

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
    };

    function killAllScrollTrigger(){
        // let Alltrigger = ScrollTrigger.getAll();

        // for (let i = 0; i < Alltrigger.length; i++) {
        //     Alltrigger[i].kill(true)
        // };
        ScrollTrigger.getAll().forEach(t => t.kill(false));
        ScrollTrigger.refresh();
        //window.dispatchEvent(new Event("resize"));
    };
    
    function preventSamePageReload(){
        var links = document.querySelectorAll('a[href]');
        var cbk = function(e) {
            if(e.currentTarget.href === window.location.href) {
                e.preventDefault();
                e.stopPropagation();
            }
        };

        for(var i = 0; i < links.length; i++) {
            links[i].addEventListener('click', cbk);
        }
    };

    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
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