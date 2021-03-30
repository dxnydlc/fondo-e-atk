
function disableScroll() {
    document.body.style.overflow = 'hidden';
}
function enableScrolled() {
    document.body.style.overflow = null;
}
disableScroll();
$(document).ready(function () {
    disableScroll();
    var section = 0;
    var scrollStatus = false;
    var scrollStatusEnabled = false;
    var scrollStatusEnabledBack = false;
    var calcul = 0;
    var calculSetted = false;
    var sections = $('.section');
    $("html, body").animate({ scrollTop: $('#banner').offset().top }, 100);
    $("html, body").animate({ scrollTop: $('#banner').offset().top }, 6000);
    setTimeout(function () {
        $list = $("body").find(".section_scroll");
        scrollStatus = true;
    }, 5000);

    var touchscroll = null;

    document.addEventListener("touchstart", startTouch, false);
    document.addEventListener("touchmove", moveTouch, false);
    var initialY = null;
    function startTouch(e) {
        if (scrollStatus == true) {
            initialY = e.touches[0].clientY;
            // alert(initialY);
        }
    };

    function moveTouch(e) {

        if (scrollStatus == true) {
            if (initialY === null) {
                return;
            }
            var currentY = e.touches[0].clientY;
            // alert(currentY);
            var diffY = initialY - currentY;
            if (diffY > 0) {
                touchscroll = 1
            } else {
                touchscroll = 0
            }
            initialY = null;
        }
    };
    $(document).on('wheel touchmove', function (e) {
        // if (e.type == 'wheel' || e.target.tagName == 'HTML' || e.type == 'pointerdown' || e.type == 'pointerup' ||
        //     (e.type == 'keydown' && ((e.ctrlKey && (e.keyCode == 36 || e.which == 35)) ||
        //         (!e.ctrlKey && (e.keyCode == 33 || e.which == 34 || e.which == 38 || e.which == 40))))
        // ) {
            // console.log('scrollStatusEnabled:'+scrollStatusEnabled)
            // console.log('scrollStatus:'+scrollStatus)
            if (scrollStatus == true) {
                if (scrollStatusEnabled == false) {
                    if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                        if (section > 0) {
                            if (scrollStatusEnabledBack == false) {
                                calcul = 0;
                                section = section - 1;
                            }
                        }
                    }
                    else {
                        calcul = 0;
                        section = section + 1;
                    }
                }
                scrollStatus = false;
                $scroll = $("html, body").scrollTop();
                $height = $(window).height();
                console.log(e.type + ' event');
                console.log('section: ' + section);
                if (section == 0) {
                    $("html, body").animate({ scrollTop: $('#banner').offset().top }, 3000);
                    setTimeout(function () {
                        scrollStatus = true;
                    }, 3000);
                } else if (section == 1) {
                    if ($('#dedicatoria').innerHeight() < ($height-90)) {
                        console.log('-height');
                        $("html, body").animate({ scrollTop: $('#dedicatoria').offset().top - (($height- 90 - $('#dedicatoria').innerHeight()) / 2) }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    } else {
                        console.log('+height');
                        if (scrollStatusEnabled == false) {
                            scrollStatusEnabled = true;
                            $("html, body").animate({ scrollTop: $('#dedicatoria').offset().top - 65 }, 3000);
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 3000);
                        } else {
                            if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                                if ($scroll < $('#dedicatoria').offset().top) {
                                    calcul = 0;
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }else{scrollStatus=true}
                            } else {
                                $heightSection = $('#dedicatoria').innerHeight() + $('#dedicatoria').offset().top - $height;
                                if ($('#dedicatoria').innerHeight() + $('#dedicatoria').offset().top - $scroll > ($height * .8)) {
                                    if (calculSetted == false) {
                                        calculSetted = true;
                                        calcul = ($('#dedicatoria').innerHeight() / ($height * .8)).toFixed(0);
                                    }
                                    if (calcul >= 0) {
                                        $("html, body").animate({ scrollTop: $scroll + ($height * .8) - ($height / 10) }, 3000);
                                        calcul = calcul - 1;
                                        setTimeout(function () {
                                            scrollStatus = true;
                                            scrollStatusEnabled = true;
                                        }, 3000);
                                    } else {
                                        scrollStatus = true;
                                        scrollStatusEnabled = false;
                                        calculSetted == false;
                                    }
                                } else {
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }
                            }
                        }
                    }
                } else if (section == 2) {
                    if ($('#presentacion-1').innerHeight() < ($height-90)) {
                        $("html, body").animate({ scrollTop: $('#presentacion-1').offset().top - (($height + 90 - $('#presentacion-1').innerHeight()) / 2) }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    } else {
                        if (scrollStatusEnabled == false) {
                            scrollStatusEnabled = true;
                            $("html, body").animate({ scrollTop: $('#presentacion-1').offset().top - 65 }, 3000);
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 3000);
                        } else {
                            if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                                if ($scroll < $('#presentacion-1').offset().top) {
                                    calcul = 0;
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }else{scrollStatus=true}
                            } else {
                                $heightSection = $('#presentacion-1').innerHeight() + $('#presentacion-1').offset().top - $height;
                                if ($('#presentacion-1').innerHeight() + $('#presentacion-1').offset().top - $scroll > ($height * .8)) {
                                    if (calculSetted == false) {
                                        calculSetted = true;
                                        calcul = ($('#presentacion-1').innerHeight() / ($height * .8)).toFixed(0);
                                    }
                                    if (calcul >= 0) {
                                        $("html, body").animate({ scrollTop: $scroll + ($height * .8) - ($height / 10) }, 3000);
                                        calcul = calcul - 1;
                                        setTimeout(function () {
                                            scrollStatus = true;
                                            scrollStatusEnabled = true;
                                        }, 3000);
                                    } else {
                                        scrollStatus = true;
                                        scrollStatusEnabled = false;
                                        calculSetted == false;
                                    }
                                } else {
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }
                            }
                        }
                    }
                } else if (section == 3) {
                    if ($('#presentacion-2').innerHeight() < ($height-90)) {
                        $("html, body").animate({ scrollTop: $('#presentacion-2').offset().top - (($height + 90 - $('#presentacion-2').innerHeight()) / 2) }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    } else {
                        if (scrollStatusEnabled == false) {
                            scrollStatusEnabled = true;
                            $("html, body").animate({ scrollTop: $('#presentacion-2').offset().top - 65 }, 3000);
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 3000);
                        } else {
                            if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                                if ($scroll < $('#presentacion-2').offset().top) {
                                    calcul = 0;
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }else{scrollStatus=true}
                            } else {
                                $heightSection = $('#presentacion-2').innerHeight() + $('#presentacion-2').offset().top - $height;
                                if ($('#presentacion-2').innerHeight() + $('#presentacion-2').offset().top - $scroll > ($height * .8)) {
                                    if (calculSetted == false) {
                                        calculSetted = true;
                                        calcul = ($('#presentacion-2').innerHeight() / ($height * .8)).toFixed(0);
                                    }
                                    if (calcul >= 0) {
                                        $("html, body").animate({ scrollTop: $scroll + ($height * .8) - ($height / 10) }, 3000);
                                        calcul = calcul - 1;
                                        setTimeout(function () {
                                            scrollStatus = true;
                                            scrollStatusEnabled = true;
                                        }, 3000);
                                    } else {
                                        scrollStatus = true;
                                        scrollStatusEnabled = false;
                                        calculSetted == false;
                                    }
                                } else {
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }
                            }
                        }
                    }
                } else if (section == 4) {
                    // if ($('#preambulo .slider').innerHeight() < ($height-90)) {
                        $("html, body").animate({ scrollTop: $('#preambulo .slider').offset().top - ($height / 2) }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    // } else {
                    //     if (scrollStatusEnabled == false) {
                    //         scrollStatusEnabled = true;
                    //         $("html, body").animate({ scrollTop: $('#preambulo .slider').offset().top - 65 }, 3000);
                    //         setTimeout(function () {
                    //             scrollStatus = true;
                    //         }, 3000);
                    //     } else {
                    //         if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                    //             if ($scroll < $('#preambulo .slider').offset().top) {
                    //                 calcul = 0;
                    //                 scrollStatus = true;
                    //                 scrollStatusEnabled = false;
                    //                 calculSetted == false;
                    //             }
                    //         } else {
                    //             $heightSection = $('#preambulo .slider').innerHeight() + $('#preambulo .slider').offset().top - $height;
                    //             if ($('#preambulo .slider').innerHeight() + $('#preambulo .slider').offset().top - $scroll > ($height * .8)) {
                    //                 if (calculSetted == false) {
                    //                     calculSetted = true;
                    //                     calcul = ($('#preambulo .slider').innerHeight() / ($height * .8)).toFixed(0);
                    //                 }
                    //                 if (calcul >= 0) {
                    //                     $("html, body").animate({ scrollTop: $scroll + ($height * .8) - ($height / 10) }, 3000);
                    //                     calcul = calcul - 1;
                    //                     setTimeout(function () {
                    //                         scrollStatus = true;
                    //                         scrollStatusEnabled = true;
                    //                     }, 3000);
                    //                 } else {
                    //                     scrollStatus = true;
                    //                     scrollStatusEnabled = false;
                    //                     calculSetted == false;
                    //                 }
                    //             } else {
                    //                 scrollStatus = true;
                    //                 scrollStatusEnabled = false;
                    //                 calculSetted == false;
                    //             }
                    //         }
                    //     }
                    // }
                } else if (section == 5) {
                    if ($('#preambulo .parafo').innerHeight() < ($height-90)) {
                        $("html, body").animate({ scrollTop: $('#preambulo .parafo').offset().top - (($height + 90 - $('#preambulo .parafo').innerHeight()) / 2) }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    } else {
                        if (scrollStatusEnabled == false) {
                            scrollStatusEnabled = true;
                            $("html, body").animate({ scrollTop: $('#preambulo .parafo').offset().top - 65 }, 3000);
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 3000);
                        } else {
                            if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                                if ($scroll < $('#preambulo .parafo').offset().top) {
                                    calcul = 0;
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }else{scrollStatus=true}
                            } else {
                                $heightSection = $('#preambulo .parafo').innerHeight() + $('#preambulo .parafo').offset().top - $height;
                                if ($('#preambulo .parafo').innerHeight() + $('#preambulo .parafo').offset().top - $scroll > ($height * .8)) {
                                    if (calculSetted == false) {
                                        calculSetted = true;
                                        calcul = ($('#preambulo .parafo').innerHeight() / ($height * .8)).toFixed(0);
                                    }
                                    if (calcul >= 0) {
                                        $("html, body").animate({ scrollTop: $scroll + ($height * .8) }, 3000);
                                        calcul = calcul - 1;
                                        setTimeout(function () {
                                            scrollStatus = true;
                                            scrollStatusEnabled = true;
                                        }, 3000);
                                    } else {
                                        scrollStatus = true;
                                        scrollStatusEnabled = false;
                                        calculSetted == false;
                                    }
                                } else {
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }
                            }
                        }
                    }
                } else if (section == 6) {
                    if ($('#capitulos-1').innerHeight() < ($height-90)) {
                        $("html, body").animate({ scrollTop: $('#capitulos-1').offset().top }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    } else {
                        if (scrollStatusEnabled == false) {
                            scrollStatusEnabled = true;
                            $("html, body").animate({ scrollTop: $('#capitulos-1').offset().top - 65 }, 3000);
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 3000);
                        } else {
                            if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                                if ($scroll < $('#capitulos-1').offset().top) {
                                    calcul = 0;
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }else{scrollStatus=true}
                            } else {
                                $heightSection = $('#capitulos-1').innerHeight() + $('#capitulos-1').offset().top - $height;
                                if ($('#capitulos-1').innerHeight() + $('#capitulos-1').offset().top - $scroll > ($height * .8)) {
                                    if (calculSetted == false) {
                                        calculSetted = true;
                                        calcul = ($('#capitulos-1').innerHeight() / ($height * .8)).toFixed(0);
                                    }
                                    if (calcul >= 0) {
                                        $("html, body").animate({ scrollTop: $scroll + ($height * .8) - ($height / 10) }, 3000);
                                        calcul = calcul - 1;
                                        setTimeout(function () {
                                            scrollStatus = true;
                                            scrollStatusEnabled = true;
                                        }, 3000);
                                    } else {
                                        scrollStatus = true;
                                        scrollStatusEnabled = false;
                                        calculSetted == false;
                                    }
                                } else {
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }
                            }
                        }
                    }
                } else if (section == 7) {
                    var width = $('.section').width() + 30;
                    var array = $('.section');
                    if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                        scrollStatusEnabledBack = false;
                        if (scrollStatusEnabled == false) {
                            scrollStatusEnabled = true;
                            $("html, body").animate({ scrollTop: $('#capitulos-2').offset().top }, 3000);
                            $('.sections').addClass('passed');
                            $('.sections').css("transform", 'translateX(0)');
                            scrollStatusEnabled = true;
                            calcul = 0;
                            setTimeout(function () {
                                for (let index = 0; index < array.length; index++) {
                                    setTimeout(function () {
                                        $(`.section:nth-of-type(${index + 1})`).addClass('active');
                                    }, 300 * index);
                                }
                            }, 1000);
                            setTimeout(function () {
                                $('.sections').removeClass('passed');
                                scrollStatus = true;
                            }, 3000);
                        } else {
                            if (calcul != 0) {
                                calcul = calcul - 1;
                                if (calcul == 0) {
                                    $('.sections').css("transform", `translateX(0px)`);
                                    scrollStatusEnabled = true;
                                    setTimeout(function () {
                                        scrollStatus = true;
                                    }, 1000);
                                } else if (calcul < sections.length) {
                                    $('.sections').css("transform", `translateX(-${(calcul) * width}px)`);
                                    scrollStatusEnabled = true;
                                    setTimeout(function () {
                                        scrollStatus = true;
                                    }, 1000);
                                } else if (calcul == sections.length) {
                                    $('.sections').css("transform", `translateX(-${(calcul) * width}px)`);
                                    scrollStatusEnabled = true;
                                    setTimeout(function () {
                                        scrollStatus = true;
                                        calcul = 0;
                                    }, 1000);
                                }
                            } else {
                                $("html, body").animate({ scrollTop: $('#capitulos-1').offset().top }, 3000);
                                section = section - 1;
                                scrollStatusEnabled = false;
                                calculSetted == false;
                                setTimeout(function () {
                                    scrollStatus = true;
                                }, 3000);
                            }
                        }
                    } else {
                        calcul = calcul + 1;
                        if (calcul == 1) {
                            $("html, body").animate({ scrollTop: $('#capitulos-2').offset().top }, 3000);
                            scrollStatusEnabled = true;
                            setTimeout(function () {
                                for (let index = 0; index < array.length; index++) {
                                    setTimeout(function () {
                                        $(`.section:nth-of-type(${index + 1})`).addClass('active');
                                    }, 300 * index);
                                }
                            }, 1000);
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 3000);
                        } else if (calcul < sections.length) {
                            $('.sections').css("transform", `translateX(-${(calcul - 1) * width}px)`);
                            scrollStatusEnabled = true;
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 1000);
                        } else if (calcul == sections.length) {
                            $('.sections').css("transform", `translateX(-${(calcul - 1) * width}px)`);
                            scrollStatusEnabled = false;
                            calculSetted == false;
                            scrollStatusEnabledBack = true;
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 1000);
                        }
                    }
                } else if (section == 8) {
                    scrollStatusEnabledBack = false;
                    if ($('#capitulos-3').innerHeight() < ($height-90)) {
                        $("html, body").animate({ scrollTop: $('#capitulos-3 p').offset().top - (($height + 90 - $('#capitulos-3 p').innerHeight()) / 2) }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    } else {
                        if (scrollStatusEnabled == false) {
                            scrollStatusEnabled = true;
                            $("html, body").animate({ scrollTop: $('#capitulos-3').offset().top - 65 }, 3000);
                            setTimeout(function () {
                                scrollStatus = true;
                            }, 3000);
                        } else {
                            if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                                if ($scroll < $('#capitulos-3').offset().top) {
                                    calcul = 0;
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }else{scrollStatus=true}
                            } else {
                                $heightSection = $('#capitulos-3').innerHeight() + $('#capitulos-3').offset().top - $height;
                                if ($('#capitulos-3').innerHeight() + $('#capitulos-3').offset().top - $scroll > ($height * .8)) {
                                    if (calculSetted == false) {
                                        calculSetted = true;
                                        calcul = ($('#capitulos-3').innerHeight() / ($height * .8)).toFixed(0);
                                    }
                                    if (calcul >= 0) {
                                        $("html, body").animate({ scrollTop: $scroll + ($height * .8) - ($height / 10) }, 3000);
                                        calcul = calcul - 1;
                                        setTimeout(function () {
                                            scrollStatus = true;
                                            scrollStatusEnabled = true;
                                        }, 3000);
                                    } else {
                                        scrollStatus = true;
                                        scrollStatusEnabled = false;
                                        calculSetted == false;
                                    }
                                } else {
                                    scrollStatus = true;
                                    scrollStatusEnabled = false;
                                    calculSetted == false;
                                }
                            }
                        }
                    }
                } else if (section == 9) {
                    // if ($('#galeria').innerHeight() < ($height-90)) {
                        $("html, body").animate({ scrollTop: $('#galeria').offset().top - (($height + 90 - $('#galeria').innerHeight()) / 2) }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    // } else {
                    //     if (scrollStatusEnabled == false) {
                    //         scrollStatusEnabled = true;
                    //         $("html, body").animate({ scrollTop: $('#galeria').offset().top - 65 }, 3000);
                    //         setTimeout(function () {
                    //             scrollStatus = true;
                    //         }, 3000);
                    //     } else {
                    //         if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                    //             if ($scroll < $('#galeria').offset().top) {
                    //                 calcul = 0;
                    //                 scrollStatus = true;
                    //                 scrollStatusEnabled = false;
                    //                 calculSetted == false;
                    //             }
                    //         } else {
                    //             $heightSection = $('#galeria').innerHeight() + $('#galeria').offset().top - $height;
                    //             if ($('#galeria').innerHeight() + $('#galeria').offset().top - $scroll > ($height * .8)) {
                    //                 if (calculSetted == false) {
                    //                     calculSetted = true;
                    //                     calcul = ($('#galeria').innerHeight() / ($height * .8)).toFixed(0);
                    //                 }
                    //                 if (calcul >= 0) {
                    //                     $("html, body").animate({ scrollTop: $scroll + ($height * .8) - ($height / 10) }, 3000);
                    //                     calcul = calcul - 1;
                    //                     setTimeout(function () {
                    //                         scrollStatus = true;
                    //                         scrollStatusEnabled = true;
                    //                     }, 3000);
                    //                 } else {
                    //                     scrollStatus = true;
                    //                     scrollStatusEnabled = false;
                    //                     calculSetted == false;
                    //                 }
                    //             } else {
                    //                 scrollStatus = true;
                    //                 scrollStatusEnabled = false;
                    //                 calculSetted == false;
                    //             }
                    //         }
                    //     }
                    // }
                } else if (section == 10) {
                    // if ($('#autores').innerHeight() < ($height-90)) {
                        $("html, body").animate({ scrollTop: $('#autores').offset().top - (($height + 90 - $('#autores').innerHeight()) / 2) }, 3000);
                        setTimeout(function () {
                            scrollStatus = true;
                            scrollStatusEnabled = false;
                        }, 3000);
                    // } else {
                    //     if (scrollStatusEnabled == false) {
                    //         scrollStatusEnabled = true;
                    //         $("html, body").animate({ scrollTop: $('#autores').offset().top - 65 }, 3000);
                    //         setTimeout(function () {
                    //             scrollStatus = true;
                    //         }, 3000);
                    //     } else {
                    //         if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                    //             if ($scroll < $('#autores').offset().top) {
                    //                 calcul = 0;
                    //                 scrollStatus = true;
                    //                 scrollStatusEnabled = false;
                    //                 calculSetted == false;
                    //             }
                    //         } else {
                    //             $heightSection = $('#autores').innerHeight() + $('#autores').offset().top - $height;
                    //             if ($('#autores').innerHeight() + $('#autores').offset().top - $scroll > ($height * .8)) {
                    //                 if (calculSetted == false) {
                    //                     calculSetted = true;
                    //                     calcul = ($('#autores').innerHeight() / ($height * .8)).toFixed(0);
                    //                 }
                    //                 if (calcul >= 0) {
                    //                     $("html, body").animate({ scrollTop: $scroll + ($height * .8) - ($height / 10) }, 3000);
                    //                     calcul = calcul - 1;
                    //                     setTimeout(function () {
                    //                         scrollStatus = true;
                    //                         scrollStatusEnabled = true;
                    //                     }, 3000);
                    //                 } else {
                    //                     scrollStatus = true;
                    //                     scrollStatusEnabled = false;
                    //                     calculSetted == false;
                    //                 }
                    //             } else {
                    //                 scrollStatus = true;
                    //                 scrollStatusEnabled = false;
                    //                 calculSetted == false;
                    //             }
                    //         }
                    //     }
                    // }
                } else if (section == 11) {
                    if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0 || touchscroll == 0) {
                        disableScroll();
                        calcul = 0;
                        scrollStatusEnabled = false;
                        calculSetted == false;
                        scrollStatus = true;

                    } else {
                        if (scrollStatusEnabled == false) {
                            scrollStatusEnabled = true;
                            $("html, body").animate({ scrollTop: $('#obra').offset().top }, 3000);
                            setTimeout(function () {
                                if (scrollStatusEnabled == true) {
                                    scrollStatus = true;
                                    enableScrolled();
                                }
                            }, 3000);
                        }else{
                            scrollStatus = true;
                        }
                    }
                }
            }
        // }
    });


    $('.page-down').on('click', function () {
        $("html, body").animate({ scrollTop: $('.dedicatoria').offset().top }, 3000);
        section = section + 1;
    })
    $('.menu li').on('click', function () {
        var id = $(this).attr('data-id');
        if (id) {
            var scrollStatus = false;
            var scrollStatusEnabled = false;
            $('.menu li.active').removeClass('active');
            $(this).addClass('active');
            $('.hamburger').removeClass('is-active');
            $('.modal-menu').removeClass('active');
            $('.sections').removeClass('passed');
            $('.sections').css("transform", `translateX(0px)`);            
            $("html, body").animate({ scrollTop: $('#' + id).offset().top }, 3000);
            setTimeout(function () {
                scrollStatus = true;
                scrollStatusEnabled = false;
            }, 3000);
            // $('body').css('overflow','auto');
            
            section = parseInt($(this).attr('data-section'));
        }

    })
});