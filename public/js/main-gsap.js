
$( document ).ready(function() {
    var width = $(window).width();
    gsap.registerPlugin(ScrollTrigger, SplitText, ScrollToPlugin, ScrollMagic);
    var b = new TimelineMax({});
    b.fromTo(".group-contour-item.left", 60, {
        xPercent: 0
    }, {
        xPercent: -40,
        ease: Linear.easeNone,
        repeat: -1
    }), b.fromTo(".group-contour-item.right", 60, {
        xPercent: 0
    }, {
        xPercent: 40,
        ease: Linear.easeNone,
        repeat: -1
    }, 0);

    // Icon Banner
    // setTimeout(function(){ $('.page-down').css('opacity', 1) }, 2000);

    // Tituo Banner
    splitTextTimeline = gsap.timeline();

    const bannerTitle = new SplitText(".banner .title");
    bannerTitle.split({
        type: "chars, words"
    })
    splitTextTimeline.from(bannerTitle.chars, {
            delay: 3,
            duration: 0.5,
            autoAlpha: 0,
            scale: 4,
            force3D: true,
            stagger: 0.01
        }, 0.5)
        .to(bannerTitle.words, {
            duration: 0.5,
            color: "white",
            scale: 1,
            stagger: 0.1
        }, "words+=0.1")

    const bannerText = new SplitText(".banner .text");
    bannerText.split({
        type: "chars, words"
    })
    splitTextTimeline.from(bannerText.chars, {
            delay: 3.5,
            duration: 0.5,
            autoAlpha: 0,
            scale: 4,
            force3D: true,
            stagger: 0.01
        }, 0.5)
        .to(bannerText.words, {
            duration: 0.5,
            color: "white",
            scale: 1,
            stagger: 0.1
        }, "words+=0.1")

    // Execute Timeline
    // splitTextTimeline.play();
    // Background Banner
    if (width < 992) {
        gsap.from(".bg-1", {
            scrollTrigger: ".banner",
            backgroundSize: "240%",
            duration: 20
        });
    } else {
        gsap.from(".bg-1", {
            scrollTrigger: ".banner",
            backgroundSize: "120%",
            duration: 20
        });
    }

    // Libro Banner
    gsap.from(".libro", {
        scrollTrigger: ".banner",
        x: -width,
        duration: 1,
        delay: 2
    });
    

    gsap.to(".page-down", {
        opacity: 1,
        delay: 4,
        duration: .5
    });
    setTimeout(function(){ 
        // Presentación
        const splitTimelinePresentación = gsap.timeline({
            scrollTrigger: {
                trigger: ".presentacion .parafo",
                start: "top 80%",
                end: "top 40%",
                scrub: true
            }
        });

        const presentacion = new SplitText(".presentacion .parafo p", {
            type: "chars"
        });
        splitTimelinePresentación.from(presentacion.chars, {
            duration: 1,
            opacity: 0,
            y: "random(0, 1500)"
        });
        const revaelTimeline = gsap.timeline({
            scrollTrigger: {
                trigger: ".presentacion .parafo",
                start: "top 80%",
                end: "top 40%",
                scrub: true,
                onEnter: function () {}
            }
        });
        revaelTimeline.from(".presentacion img", {
            duration: 1,
            opacity: 0,
            y: 500
        });

        const legendTimeline = gsap.timeline({
            scrollTrigger: {
                trigger: ".presentacion .parafo",
                start: "top 40%",
                end: "top 30%",
                opacity: 0,
                scrub: true
            }
        });

        const legend = new SplitText(".presentacion .legend p", {
            type: "chars"
        });
        legendTimeline.from(legend.chars, {
            duration: 0.6,
            scale: 4,
            autoAlpha: 0,
            rotationX: -180,
            transformOrigin: "100% 50%",
            ease: "back.out",
            opacity: 0,
            stagger: 0.02
        });

        //Preambulo

        gsap.to(".preambulo .slider", {
            opacity: 1,
            scrollTrigger: {
                trigger: ".preambulo .slider",
                start: "top 90%",
                end: "top 70%",
                scrub: true
            }
        });
        var p = $('.preambulo .parafo').innerHeight();
        var ph = "+=" + p;
        const splitTimelinePreambulo = gsap.timeline({
            opacity: 1,
            scrollTrigger: {
                trigger: ".preambulo .parafo",
                start: "top 75%",
                end: ph,
                scrub: true
            }
        });
        const preambulo = new SplitText(".preambulo .parafo p", {
            type: "chars, words, lines"
        });
        splitTimelinePreambulo.from(preambulo.lines, {
            duration: 0.5,
            rotationX: -90,
            force3D: true,
            stagger: 0.1
        });
        gsap.utils.toArray(".preambulo").forEach(function (elem) {
            ScrollTrigger.create({
                trigger: elem,
                onEnter: function () {
                    gsap.fromTo(elem, {
                        backgroundSize: 200
                    }, {
                        duration: 20,
                        scrub: true,
                        backgroundSize: 100,
                        overwrite: "auto"
                    });
                }
            });
        });

        //Capitulos


        const splitTimelineCapitulosTitulo = gsap.timeline({
            opacity: 1,
            scrollTrigger: {
                trigger: ".capitulos h2",
                start: "top 70%",
                end: "top 60%",
                scrub: true
            }
        });
        const capitulosTitulo = new SplitText(".capitulos h2", {
            type: "chars"
        });
        var numChars = capitulosTitulo.chars.length;
        for(var i = 0; i < numChars; i++){
            splitTimelineCapitulosTitulo.from(capitulosTitulo.chars[i], {
                duration: 1,
                opacity: 0,
                translateX: -50
            });
        }

        const splitTimelineCapitulosSubTitulo = gsap.timeline({
            opacity: 1,
            scrollTrigger: {
                trigger: ".capitulos h3",
                start: "top 60%",
                end: "top 50%",
                scrub: true
            }
        });
        const capitulosSubTitulo = new SplitText(".capitulos h3", {
            type: "chars"
        });
        var numChars = capitulosSubTitulo.chars.length;
        for(var i = 0; i < numChars; i++){
            splitTimelineCapitulosSubTitulo.from(capitulosSubTitulo.chars[i], {
                duration: 1,
                opacity: 0
            });
        }
        const capitulosParafo = gsap.timeline({
            scrollTrigger: {
                trigger: ".capitulos p",
                start: "top 55%",
                end: "top 45%",
                scrub: true
            }
            
        });
        capitulosParafo.from(".capitulos p", {
            duration: 1,
            opacity: 0,
            y: 100
        });


        var c = $('.capitulos .parafo p').innerHeight();
        var ch = "+=" + c;
        const splitTimelineCapitulos = gsap.timeline({
            opacity: 1,
            scrollTrigger: {
                trigger: ".capitulos .parafo",
                start: "top 70%",
                end: ch,
                scrub: true
            }
        });
        const capitulos = new SplitText(".capitulos .parafo p", {
            type: "chars, words, lines"
        });
        splitTimelineCapitulos.from(capitulos.lines, {
            duration: .5,
            rotationX: -90,
            force3D: true,
            stagger: 1
        });

        
        
        // Dedicatoria Titulo
        
        const revaelCapitulo = gsap.timeline({
            opacity: 1,
            scrollTrigger: {
                trigger: ".dedicatoria p",
                start: "top 40%",
                end: "top 60%",
                scrub: true
            }
            
        });
        revaelCapitulo.from(".dedicatoria p", {
            duration: 1,
            opacity: 0,
            x: -500
        });

        //OBRA COMPLETA
        const splitTimelineObra = gsap.timeline({
            opacity: 1,
            scrollTrigger: {
                trigger: ".obra h2",
                start: "top 70%",
                end: "top 50%",
                scrub: true
            }
        });
        const obra = new SplitText(".obra h2", {
            type: "chars"
        });
        var numChars = obra.chars.length;
        for(var i = 0; i < numChars; i++){
            splitTimelineObra.from(obra.chars[i], {
                duration: 1,
                opacity: 0,
                translateX: -50
            });
        }

        //Galeria
        const splitTimelineGaleria = gsap.timeline({
            opacity: 1,
            scrollTrigger: {
                trigger: ".galeria h2",
                start: "top 70%",
                end: "top 50%",
                scrub: true
            }
        });
        const Galeria = new SplitText(".galeria h2", {
            type: "chars"
        });
        var numChars = Galeria.chars.length;
        for(var i = 0; i < numChars; i++){
            splitTimelineGaleria.from(Galeria.chars[i], {
                duration: 1,
                opacity: 0,
                translateX: -50
            });
        }
        
        // Preambulo
        gsap.utils.toArray(".preambulo").forEach(function (elem) {
            ScrollTrigger.create({
                trigger: elem,
                onEnter: function () {
                    gsap.fromTo(elem, {
                        backgroundSize: 200
                    }, {
                        duration: 20,
                        scrub: true,
                        backgroundSize: 100,
                        overwrite: "auto"
                    });
                }
            });
        });
        
        //Autores
        const splitTimelineAutores = gsap.timeline({
            opacity: 1,
            scrollTrigger: {
                trigger: ".autores h2",
                start: "top 70%",
                end: "top 50%",
                scrub: true
            }
        });
        const Autores = new SplitText(".autores h2", {
            type: "chars"
        });
        var numChars = Autores.chars.length;
        for(var i = 0; i < numChars; i++){
            splitTimelineAutores.from(Autores.chars[i], {
                duration: 1,
                opacity: 0,
                translateX: -50
            });
        }

        // GS Reveal
        gsap.utils.toArray(".gs_reveal").forEach(function (elem) {
            hide(elem);

            ScrollTrigger.create({
                trigger: elem,
                onEnter: function () {
                    animateFrom(elem)
                },
                onEnterBack: function () {
                    animateFrom(elem, -1)
                },
                onLeave: function () {
                    hide(elem)
                }
            });
        });


        // REUSABLES
        function animateFrom(elem, direction) {
            direction = direction | 1;
            var x = 0,
                y = direction * 500;
            if (elem.classList.contains("gs_reveal_fromLeft")) {
                x = -500;
                y = 0;
            } else if (elem.classList.contains("gs_reveal_fromRight")) {
                x = 500;
                y = 0;
            }
            gsap.fromTo(elem, {
                x: x,
                y: y,
                opacity: 0,
                autoAlpha: 0
            }, {
                duration: 2,
                x: 0,
                y: 0,
                opacity: 1,
                autoAlpha: 1,
                scrub: true,
                ease: "expo",
                overwrite: "auto"
            });
        }

        function hide(elem) {
            gsap.set(elem, {
                autoAlpha: 0
            });
        }

        ScrollTrigger.create({
            trigger: "#banner",
            start: "top center",
            endTrigger: "#dedicatoria",
            end: "bottom center",
            onToggle: function () {
                $('.menu li.active').removeClass('active');
                $('li[data-id="banner"]').addClass('active');
            }
        });
        ScrollTrigger.create({
            trigger: "#dedicatoria",
            start: "top center",
            endTrigger: "#presentacion",
            end: "bottom center",
            onToggle: function () {
                $('.menu li.active').removeClass('active');
                $('li[data-id="dedicatoria"]').addClass('active');
            }
        });
        ScrollTrigger.create({
            trigger: "#presentacion",
            start: "top center",
            endTrigger: "#preambulo",
            end: "bottom center",
            onToggle: function () {
                $('.menu li.active').removeClass('active');
                $('li[data-id="presentacion"]').addClass('active');
            }
        });
        ScrollTrigger.create({
            trigger: "#preambulo",
            start: "top center",
            endTrigger: "#capitulos",
            end: "bottom center",
            onToggle: function () {
                $('.menu li.active').removeClass('active');
                $('li[data-id="preambulo"]').addClass('active');
            }
        });
        ScrollTrigger.create({
            trigger: "#capitulos",
            start: "top center",
            endTrigger: "#galeria",
            end: "bottom center",
            onToggle: function () {
                $('.menu li.active').removeClass('active');
                $('li[data-id="capitulos"]').addClass('active');
            }
        });
        ScrollTrigger.create({
            trigger: "#galeria",
            start: "top center",
            endTrigger: "#autores",
            end: "bottom center",
            onToggle: function () {
                $('.menu li.active').removeClass('active');
                $('li[data-id="galeria"]').addClass('active');
            }
        });
        ScrollTrigger.create({
            trigger: "#autores",
            start: "top center",
            endTrigger: "#obra",
            end: "bottom center",
            onToggle: function () {
                $('.menu li.active').removeClass('active');
                $('li[data-id="autores"]').addClass('active');
            }
        });
        ScrollTrigger.create({
            trigger: "#obra",
            start: "top center",
            endTrigger: "footer",
            end: "bottom center",
            onToggle: function () {
                $('.menu li.active').removeClass('active');
                $('li[data-id="obra"]').addClass('active');
            }
        });
        // var controller = new ScrollMagic.Controller();
        // var horizontalSlide = new TimelineMax()
        // // animate panels
        // .to(".sections", 1,   {x: "-25%"})	
        // .to(".sections", 1,   {x: "-50%"})
        // .to(".sections", 1,   {x: "-75%"})
        // // create scene to pin and link animation
        // new ScrollMagic.Scene({
        //     triggerElement: ".sections",
        //     triggerHook: "onLeave",
        //     duration: "400%",
        // })
        // .setPin(".sections")
        // .setTween(horizontalSlide)
        // //.addIndicators() // add indicators (requires plugin)
        // .addTo(controller);
    }, 1000);
});
