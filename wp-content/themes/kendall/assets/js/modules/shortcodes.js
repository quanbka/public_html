(function($) {
    'use strict';

    var shortcodes = {};

    eltd.modules.shortcodes = shortcodes;

    shortcodes.eltdInitCounter = eltdInitCounter;
    shortcodes.eltdInitProgressBars = eltdInitProgressBars;
    shortcodes.eltdInitCountdown = eltdInitCountdown;
    shortcodes.eltdInitMessages = eltdInitMessages;
    shortcodes.eltdInitMessageHeight = eltdInitMessageHeight;
    shortcodes.eltdInitTestimonials = eltdInitTestimonials;
    shortcodes.eltdInitCarousels = eltdInitCarousels;
    shortcodes.eltdInitPieChart = eltdInitPieChart;
    shortcodes.eltdInitPieChartDoughnut = eltdInitPieChartDoughnut;
    shortcodes.eltdInitTabs = eltdInitTabs;
    shortcodes.eltdInitTabIcons = eltdInitTabIcons;
    shortcodes.eltdInitBlogListMasonry = eltdInitBlogListMasonry;
    shortcodes.eltdCustomFontResize = eltdCustomFontResize;
    shortcodes.eltdInitImageGallery = eltdInitImageGallery;
    shortcodes.eltdInitAccordions = eltdInitAccordions;
    shortcodes.eltdShowGoogleMap = eltdShowGoogleMap;
    shortcodes.eltdInitPortfolioListMasonry = eltdInitPortfolioListMasonry;
    shortcodes.eltdInitPortfolioListPinterest = eltdInitPortfolioListPinterest;
    shortcodes.eltdInitPortfolio = eltdInitPortfolio;
    shortcodes.eltdPortfolioTiledGallery = eltdPortfolioTiledGallery;
    shortcodes.eltdInitPortfolioMasonryFilter = eltdInitPortfolioMasonryFilter;
    shortcodes.eltdInitPortfolioSlider = eltdInitPortfolioSlider;
    shortcodes.eltdInitPortfolioLoadMore = eltdInitPortfolioLoadMore;
    shortcodes.eltdInitPortfolioStandardPag = eltdInitPortfolioStandardPag;
    shortcodes.eltdCheckSliderForHeaderStyle = eltdCheckSliderForHeaderStyle;
    shortcodes.eltdInitBlogCarousel = eltdInitBlogCarousel;
    shortcodes.eltdInfoBox = eltdInfoBox;
    shortcodes.eltdProductListFilter = eltdProductListFilter;
    shortcodes.eltdPtfFilterAnimation = eltdPtfFilterAnimation;
    shortcodes.eltdIconWithTextHover = eltdIconWithTextHover;
    shortcodes.eltdInitPortfolioAppear = eltdInitPortfolioAppear;
    shortcodes.eltdInitElementsHolderResponsiveStyle = eltdInitElementsHolderResponsiveStyle;

    shortcodes.eltdOnDocumentReady = eltdOnDocumentReady;
    shortcodes.eltdOnWindowLoad = eltdOnWindowLoad;
    shortcodes.eltdOnWindowResize = eltdOnWindowResize;
    shortcodes.eltdOnWindowScroll = eltdOnWindowScroll;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    $(window).scroll(eltdOnWindowScroll);

    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
        eltdInitCounter();
        eltdInitProgressBars();        
        eltdInitCountdown();
        eltdIcon().init();       
        eltdInitMessages();
        eltdInitMessageHeight();
        eltdInitCarousels().init();
        eltdInitPieChart();
        eltdInitPieChartDoughnut();
        eltdInitTabs();
        eltdInitTabIcons();
        eltdButton().init();
        eltdInitBlogListMasonry();
        eltdCustomFontResize();
        eltdInitImageGallery();
        eltdInitAccordions();
        eltdShowGoogleMap();
        eltdInitPortfolioListMasonry();
        eltdInitPortfolioListPinterest();
        eltdInitPortfolio();
        eltdInitPortfolioMasonryFilter();    
        eltdInitPortfolioSlider();
        eltdInitPortfolioLoadMore();
        eltdInitPortfolioStandardPag();
        eltdInitBlogCarousel();
        eltdSlider().init();
        eltdSocialIconWidget().init();
        eltdInitIconList().init();
        eltdInitTestimonials();
        eltdProductListFilter();
        eltdInitVideoButton();
        eltdPtfFilterAnimation();
        eltdIconWithTextHover();
        eltdReservationFormDatePicker();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdOnWindowLoad() {
        eltdInfoBox();
        eltdPortfolioTiledGallery();
        eltdInitPortfolioAppear();
        eltdInitElementsHolderResponsiveStyle();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdOnWindowResize() {
        eltdInitBlogListMasonry();
        eltdCustomFontResize();
        eltdInitPortfolioListMasonry();
        eltdInitPortfolioListPinterest();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdOnWindowScroll() {
        
    }

    

    /**
     * Counter Shortcode
     */
    function eltdInitCounter() {

        var counters = $('.eltd-counter');

        if (counters.length) {
            counters.each(function() {
                var counter = $(this),
                    max = parseFloat(counter.text());

                counter.text('0'); //set counters to 0

                counter.appear(function() {
                    setTimeout(function(){
                        //Counter zero type
                        if (counter.hasClass('zero')) {
                            counter.countTo({
                                from: 0,
                                to: max,
                                speed: 2000,
                                refreshInterval: 78,
                            });
                        } else {
                            counter.absoluteCounter({
                                speed: 2000,
                                fadeInDelay: 1000
                            });
                        }
                    },150);
                },{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
            });
        }

    }
    
    /*
    **	Horizontal progress bars shortcode
    */
    function eltdInitProgressBars(){
        
        var progressBar = $('.eltd-progress-bar');
        
        if(progressBar.length){
            
            progressBar.each(function() {
                
                var thisBar = $(this);
                
                thisBar.appear(function() {
                    eltdInitToCounterProgressBar(thisBar);
                    if(thisBar.find('.eltd-floating.eltd-floating-inside') !== 0){
                        var floatingInsideMargin = thisBar.find('.eltd-progress-content').height();
                        floatingInsideMargin += parseFloat(thisBar.find('.eltd-progress-title-holder').css('padding-bottom'));
                        floatingInsideMargin += parseFloat(thisBar.find('.eltd-progress-title-holder').css('margin-bottom'));
                        thisBar.find('.eltd-floating-inside').css('margin-bottom',-(floatingInsideMargin)+'px');
                    }
                    var percentage = thisBar.find('.eltd-progress-content').data('percentage'),
                        progressContent = thisBar.find('.eltd-progress-content'),
                        progressNumber = thisBar.find('.eltd-progress-number');

                    progressContent.css('width', '0%');
                    progressContent.animate({'width': percentage+'%'}, 1500);
                    progressNumber.css('left', '0%');
                    progressNumber.animate({'left': percentage+'%'}, 1500);

                });
            });
        }
    }

    /*
    **	Counter for horizontal progress bars percent from zero to defined percent
    */
    function eltdInitToCounterProgressBar(progressBar){
        var percentage = parseFloat(progressBar.find('.eltd-progress-content').data('percentage'));
        var percent = progressBar.find('.eltd-progress-number .eltd-percent');
        if(percent.length) {
            percent.each(function() {
                var thisPercent = $(this);
                thisPercent.parents('.eltd-progress-number-wrapper').css('opacity', '1');
                thisPercent.countTo({
                    from: 0,
                    to: percentage,
                    speed: 1500,
                    refreshInterval: 50
                });
            });
        }
    }
    
    /*
    **	Function to close message shortcode
    */
    function eltdInitMessages(){
        var message = $('.eltd-message');
        if(message.length){
            message.each(function(){
                var thisMessage = $(this);
                thisMessage.find('.eltd-close').click(function(e){
                    e.preventDefault();
                    $(this).parent().parent().fadeOut(500);
                });
            });
        }
    }
    
    /*
    **	Init message height
    */
    function eltdInitMessageHeight(){
       var message = $('.eltd-message.eltd-with-icon');
       if(message.length){
           message.each(function(){
               var thisMessage = $(this);
               var textHolderHeight = thisMessage.find('.eltd-message-text-holder').height();
               var iconHolderHeight = thisMessage.find('.eltd-message-icon-holder').height();
               
               if(textHolderHeight > iconHolderHeight) {
                   thisMessage.find('.eltd-message-icon-holder').height(textHolderHeight);
               } else {
                   thisMessage.find('.eltd-message-text-holder').height(iconHolderHeight);
               }
           });
       }
    }

    /**
     * Countdown Shortcode
     */
    function eltdInitCountdown() {

        var countdowns = $('.eltd-countdown'),
            year,
            month,
            day,
            hour,
            minute,
            timezone,
            monthLabel,
            dayLabel,
            hourLabel,
            minuteLabel,
            secondLabel;

        if (countdowns.length) {

            countdowns.each(function(){

                //Find countdown elements by id-s
                var countdownId = $(this).attr('id'),
                    countdown = $('#'+countdownId),
                    digitFontSize,
                    labelFontSize;

                //Get data for countdown
                year = countdown.data('year');
                month = countdown.data('month');
                day = countdown.data('day');
                hour = countdown.data('hour');
                minute = countdown.data('minute');
                timezone = countdown.data('timezone');
                monthLabel = countdown.data('month-label');
                dayLabel = countdown.data('day-label');
                hourLabel = countdown.data('hour-label');
                minuteLabel = countdown.data('minute-label');
                secondLabel = countdown.data('second-label');
                digitFontSize = countdown.data('digit-size');
                labelFontSize = countdown.data('label-size');


                //Initialize countdown
                countdown.countdown({
                    until: new Date(year, month - 1, day, hour, minute, 44),
                    labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
                    format: 'ODHMS',
                    timezone: timezone,
                    padZeroes: true,
                    onTick: setCountdownStyle
                });

                function setCountdownStyle() {
                    countdown.find('.countdown-amount').css({
                        'font-size' : digitFontSize+'px',
                        'line-height' : digitFontSize+'px'
                    });
                    countdown.find('.countdown-period').css({
                        'font-size' : labelFontSize+'px'
                    });
                }

            });

        }

    }

    /**
     * Object that represents icon shortcode
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var eltdIcon = eltd.modules.shortcodes.eltdIcon = function() {
        //get all icons on page
        var icons = $('.eltd-icon-shortcode');

        /**
         * Function that triggers icon animation and icon animation delay
         */
        var iconAnimation = function(icon) {
            if(icon.hasClass('eltd-icon-animation')) {
                icon.appear(function() {
                    icon.parent('.eltd-icon-animation-holder').addClass('eltd-icon-animation-show');
                }, {accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
            }
        };

        /**
         * Function that triggers icon hover color functionality
         */
        var iconHoverColor = function(icon) {
            if(typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function(event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon.find('.eltd-icon-element');
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if(hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        /**
         * Function that triggers icon holder background color hover functionality
         */
        var iconHolderBackgroundHover = function(icon) {

            if(typeof icon.data('hover-background-color') !== 'undefined') {
                var originalStartColor = '#f6c478';
                var originalEndColor='#dda43d';

                if(typeof icon.data('start-background-color')!== 'undefined'){
                    originalStartColor = icon.data('start-background-color');
                }

                if(typeof icon.data('end-background-color')!== 'undefined'){
                    originalEndColor = icon.data('end-background-color');
                }

                var hoverBgColor = icon.data('hover-background-color');

                icon.hover(
                    function() {
                        icon.css('background',hoverBgColor);

                    }, function() {

                        var gradient='linear-gradient(to right, '+originalStartColor+' 0%, '+originalEndColor+' 100%)';
                        icon.css('background',gradient);
                    }
                );
            }

            if(typeof icon.data('start-background-color')!== 'undefined' && typeof icon.data('end-background-color')!== 'undefined' && typeof icon.data('hover-background-color')=== 'undefined'){

                var  originalStartBgColor='';
                var  originalEndBgColor='';

                if(typeof icon.data('start-background-color')!== 'undefined'){
                    originalStartBgColor = icon.data('start-background-color');
                }

                if(typeof icon.data('end-background-color')!== 'undefined'){
                    originalEndBgColor = icon.data('end-background-color');
                }
                icon.hover(
                    function() {
                        var gradient1='linear-gradient(to right, '+originalEndBgColor+' 0%, '+originalStartBgColor+' 100%)';
                        icon.css('background',gradient1);

                    }, function() {
                        var gradient='linear-gradient(to right, '+originalStartBgColor+' 0%, '+originalEndBgColor+' 100%)';
                        icon.css('background',gradient);
                    }
                );

            }
        };

        /**
         * Function that initializes icon holder border hover functionality
         */
        var iconHolderBorderHover = function(icon) {
            if(typeof icon.data('hover-border-color') !== 'undefined') {
                var changeIconBorder = function(event) {
                    event.data.icon.css('border-color', event.data.color);
                };

                var hoverBorderColor = icon.data('hover-border-color');
                var originalBorderColor = icon.css('border-color');

                if(hoverBorderColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
                    icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
                }
            }
        };

        return {
            init: function() {
                if(icons.length) {
                    icons.each(function() {
                        iconAnimation($(this));
                        iconHoverColor($(this));
                        iconHolderBackgroundHover($(this));
                        iconHolderBorderHover($(this));
                    });

                }
            }
        };
    };


    /**
     * Object that represents social icon widget
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var eltdSocialIconWidget = eltd.modules.shortcodes.eltdSocialIconWidget = function() {
        //get all social icons on page
        var icons = $('.eltd-social-icon-widget-holder');

        /**
         * Function that triggers icon hover color functionality
         */
        var socialIconHoverColor = function(icon) {
            if(typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function(event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon;
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if(hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        return {
            init: function() {
                if(icons.length) {
                    icons.each(function() {
                        socialIconHoverColor($(this));
                    });

                }
            }
        };
    };

    /*
    * Icon with text hover class
    */
    function eltdIconWithTextHover() {
        var iwts = $('.eltd-iwt');
        if(iwts.length) {
            iwts.each(function(){
                var iwt = $(this),
                    circleLink = iwt.find('.eltd-icon-shortcode.circle a');
                if (circleLink.length) {
                    circleLink.css('color', circleLink.parent().css('background-color'));
                    iwt.find('a').mouseenter(function(){
                        iwt.addClass('eltd-hovered');
                    });
                    iwt.find('a').mouseleave(function(){
                        iwt.removeClass('eltd-hovered');
                    });
                }
            });
        }
    }

    /**
     * Init testimonials shortcode
     */
    function eltdInitTestimonials(){

        var testimonial = $('.eltd-testimonials');
        if(testimonial.length){
            testimonial.each(function(){

                var thisTestimonial = $(this);

                thisTestimonial.waitForImages(function() {
                    thisTestimonial.css({
                        'visibility':'visible',
                        'opacity': 1
                    });
                });

                var  numberofItems = 3,
                     itemsMobile,
                     itemsMobileLandscape,
                     itemsTablet,
                     itemsTabletLandscape;

                if ( thisTestimonial.hasClass('eltd-with-icon') ) {
                    numberofItems = itemsMobile = itemsMobileLandscape = itemsTablet = itemsTabletLandscape = 1;
                } else {
                    numberofItems = thisTestimonial.data('items');
                    itemsMobile = 1;
                    itemsMobileLandscape = 2;
                    itemsTablet = 2;
                    itemsTabletLandscape = 3;
                }

                if ( thisTestimonial.hasClass('eltd-with-image') ) {
                    numberofItems = itemsMobile = itemsMobileLandscape = itemsTablet = itemsTabletLandscape = 1;
                } else {
                    numberofItems = thisTestimonial.data('items');
                    itemsMobile = 1;
                    itemsMobileLandscape = 2;
                    itemsTablet = 2;
                    itemsTabletLandscape = 2;
                }

                var controlNav = false;
                if (thisTestimonial.data('pagination') == 'yes')  {
                    controlNav = true;
                }

                var directionNav = false;
                if (thisTestimonial.data('navigation') == 'yes') {
                    directionNav  = true;
                }

                var autoplaySpeed,
                    autoplay = false;
                if(typeof thisTestimonial.data('autoplay-speed') !== 'undefined' && thisTestimonial.data('autoplay-speed') !== false) {
                    autoplaySpeed = thisTestimonial.data('autoplay-speed');
                    autoplay = true;
                }

                thisTestimonial.owlCarousel({
                    items: numberofItems,
                    responsive:{
                        0:{
                            items:itemsMobile,
                            nav: false
                        },
                        600:{
                            items:itemsMobileLandscape,
                            nav: false
                        },
                        768: {
                            items:itemsTablet
                        },
                        1024:{
                            items:itemsTabletLandscape
                        },
                        1280:{
                            items:numberofItems
                        }
                    },
                    smartSpeed: 800,
                    autoplay:autoplay,
                    autoplayTimeout:autoplaySpeed,
                    autoplayHoverPause:true,
                    loop:true,
                    nav: directionNav,
                    dots: controlNav,
                    navText: [
                        '<span class="eltd-prev-icon"><i class="fa fa-angle-left"></i></span>',
                        '<span class="eltd-next-icon"><i class="fa fa-angle-right"></i></span>'
                    ],
                    animateOut: 'fadeOutRight',
                    animateIn: 'fadeInLeft'
                });

            });

        }

    }

    /**
     * Init Carousel shortcode
     */
    function eltdInitCarousels() {

        var standardCarousel = function(){
            var carouselHolders = $('.eltd-carousel-holder.eltd-carousel-standard-type'),
                carousel,
                navigation;

            if (carouselHolders.length) {
                carouselHolders.each(function(){
                    var carousel = $(this).children('.eltd-carousel'),
                        numberOfItems = carousel.data('items'),
                        navigation = carousel.data('navigation') == 'yes',
                        pagination = carousel.data('pagination') == 'yes',
                        autoplayEnabled = carousel.data('autoplay') == 'yes',
                        duration = carousel.data('autoplay-duration');

                    carousel.waitForImages(function(){
                        carousel.css('visibility','visible');
                    });
                    if (autoplayEnabled) {
                        var autoplay = true;
                        var autoplaySpeed = duration;
                    } else {
                        var autoplay = false;
                        var autoplaySpeed = '';
                    }

                    carousel.owlCarousel({
                        items: numberOfItems,
                        responsive:{
                            600:{
                                items:2
                            },
                            768: {
                                items:3
                            },
                            1280:{
                                items:numberOfItems
                            }
                        },
                        smartSpeed: 400,
                        autoplay:autoplay,
                        autoplayTimeout:autoplaySpeed,
                        autoplayHoverPause:true,
                        loop: true,
                        dots: pagination,
                        nav: navigation,
                        navText: [
                            '<span class="eltd-prev-icon"><i class="fa fa-angle-left"></i></span>',
                            '<span class="eltd-next-icon"><i class="fa fa-angle-right"></i></span>'
                        ]
                    });

                });
            }
        }

        var varImgSizeCarousel = function(){
            var carouselHolders = $('.eltd-carousel-holder.eltd-carousel-var-image-size-type'),
                carousel,
                navigation;

            if (carouselHolders.length) {
                carouselHolders.each(function(){
                    var carousel = $(this).children('.eltd-carousel'),
                        numberOfItems = carousel.data('items'),
                        navigation = carousel.data('navigation') == 'yes',
                        pagination = carousel.data('pagination') == 'yes',
                        autoplayEnabled = carousel.data('autoplay') == 'yes',
                        duration = carousel.data('autoplay-duration');

                    carousel.waitForImages(function(){
                        carousel.css('visibility','visible');
                    });
                    if (autoplayEnabled) {
                        var autoplay = true;
                        var autoplaySpeed = duration;
                    } else {
                        var autoplay = false;
                        var autoplaySpeed = '';
                    }

                    carousel.slick({
                        dots: pagination,
                        infinite: true,
                        speed: 800,
                        slidesToShow: 1,
                        variableWidth: true,
                        centerMode: true,
                        arrows: navigation,
                        autoplay:autoplay,
                        autoplaySpeed: autoplaySpeed,
                        prevArrow: '<i class="eltd-icon-linea-icon icon-arrows-left left"></i>',
                        nextArrow: '<i class="eltd-icon-linea-icon icon-arrows-right right"></i>'
                    });
                });
            }

        }

        return{
            init: function(){
                standardCarousel();
                varImgSizeCarousel();
            }
        }


    }

    /**
     * Init Pie Chart and Pie Chart With Icon shortcode
     */
    function eltdInitPieChart() {

        var pieCharts = $('.eltd-pie-chart-holder, .eltd-pie-chart-with-icon-holder');

        if (pieCharts.length) {

            pieCharts.each(function () {

                var pieChart = $(this),
                    percentageHolder = pieChart.children('.eltd-percentage, .eltd-percentage-with-icon'),
                    barColor = '#cda964',
                    trackColor,
                    lineWidth = 4,
                    size = 165;

                if(typeof percentageHolder.data('bar-color') !== 'undefined' && percentageHolder.data('bar-color') !== '') {
                    barColor = percentageHolder.data('bar-color');
                }

                if(typeof percentageHolder.data('track-color') !== 'undefined' && percentageHolder.data('track-color') !== '') {
                    trackColor = percentageHolder.data('track-color');
                }

                if(typeof percentageHolder.data('size') !== 'undefined' && percentageHolder.data('size') !== '') {
                    size = percentageHolder.data('size');
                }

                percentageHolder.appear(function() {
                    initToCounterPieChart(pieChart);
                    percentageHolder.css('opacity', '1');

                    percentageHolder.easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: lineWidth,
                        animate: 1500,
                        size: size
                    });
                },{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});

            });

        }

    }

    /*
     **	Counter for pie chart number from zero to defined number
     */
    function initToCounterPieChart( pieChart ){

        pieChart.css('opacity', '1');
        var counter = pieChart.find('.eltd-to-counter'),
            max = parseFloat(counter.text());
        counter.countTo({
            from: 0,
            to: max,
            speed: 1500,
            refreshInterval: 50
        });

    }

    /**
     * Init Pie Chart shortcode
     */
    function eltdInitPieChartDoughnut() {

        var pieCharts = $('.eltd-pie-chart-doughnut-holder, .eltd-pie-chart-pie-holder');

        pieCharts.each(function(){

            var pieChart = $(this),
                canvas = pieChart.find('canvas'),
                chartID = canvas.attr('id'),
                chart = document.getElementById(chartID).getContext('2d'),
                data = [],
                jqChart = $(chart.canvas); //Convert canvas to JQuery object and get data parameters

            for (var i = 1; i<=10; i++) {

                var chartItem,
                    value = jqChart.data('value-' + i),
                    color = jqChart.data('color-' + i);
                
                if (typeof value !== 'undefined' && typeof color !== 'undefined' ) {
                    chartItem = {
                        value : value,
                        color : color
                    };
                    data.push(chartItem);
                }

            }

            if (canvas.hasClass('eltd-pie')) {
                new Chart(chart).Pie(data,
                    {segmentStrokeColor : 'transparent'}
                );
            } else {
                new Chart(chart).Doughnut(data,
                    {segmentStrokeColor : 'transparent'}
                );
            }

        });

    }

    /*
    **	Init tabs shortcode
    */
    function eltdInitTabs(){

       var tabs = $('.eltd-tabs');
        if(tabs.length){
            tabs.each(function(){
                var thisTabs = $(this);

                thisTabs.children('.eltd-tab-container').each(function(index){
                    index = index + 1;
                    var that = $(this),
                        link = that.attr('id'),
                        navItem = that.parent().find('.eltd-tabs-nav li:nth-child('+index+') a'),
                        navLink = navItem.attr('href');

                        link = '#'+link;

                        if(link.indexOf(navLink) > -1) {
                            navItem.attr('href',link);
                        }
                });

                if(thisTabs.hasClass('eltd-horizontal-tab')){
                    thisTabs.tabs();
                } else if(thisTabs.hasClass('eltd-vertical-tab')){
                    thisTabs.tabs().addClass( 'ui-tabs-vertical ui-helper-clearfix' );
                    thisTabs.find('.eltd-tabs-nav > ul >li').removeClass( 'ui-corner-top' ).addClass( 'ui-corner-left' );
                }

                //transparent tabs animation 
                if(thisTabs.hasClass('eltd-transparent-tabs')) {
                    //horizontal tabs
                    if(thisTabs.hasClass('eltd-horizontal-tab')){
                        var tab = thisTabs.find('li'),
                            tabLine = thisTabs.find('.eltd-tab-line');

                        if (tab.height() == tab.parent('ul').height()) { //tabs are in the same line, default layout

                            tabLine.css({width: tab.first().outerWidth()});
                            tabLine.css({left: 0});

                            tab.each(function(){
                                var thisTab = $(this);
                                thisTab.mouseenter(function(){
                                    tabLine.css({width: thisTab.outerWidth()});
                                    tabLine.css({left: thisTab.offset().left - thisTab.parent().offset().left});
                                });
                            });

                            thisTabs.find('> ul').mouseleave(function(){
                                tabLine.css({width: tab.filter('.ui-tabs-active').outerWidth()});
                                tabLine.css({left: tab.filter('.ui-tabs-active').offset().left - tab.filter('.ui-tabs-active').parent().offset().left});
                            });

                        } else { //tabs are on top of each other, responsive layout

                            tab.each(function(){
                                tabLine.css({width: '100%'});
                                tabLine.css({'transition': 'none'});
                                var thisTab = $(this);
                                thisTab.click(function(){
                                    tabLine.css({top: thisTab.offset().top - thisTab.parent().offset().top + thisTab.height()});
                                });
                            });
                            
                        }
                    }
                    //vertical tabs
                    if(thisTabs.hasClass('eltd-vertical-tab')){
                        var tab = thisTabs.find('li'),
                            tabLine = thisTabs.find('.eltd-tab-line');

                        tabLine.css({height: tab.first().outerHeight()});
                        tabLine.css({top: 0});

                        tab.each(function(){
                            var thisTab = $(this);
                            thisTab.mouseenter(function(){
                                tabLine.css({height: thisTab.outerHeight()});
                                tabLine.css({top: thisTab.offset().top - thisTab.parent().offset().top});
                            });
                        });

                        thisTabs.find('> ul').mouseleave(function(){
                            tabLine.css({height: tab.filter('.ui-tabs-active').outerHeight()});
                            tabLine.css({top: tab.filter('.ui-tabs-active').offset().top - tab.filter('.ui-tabs-active').parent().offset().top});
                        });
                    }
                }
            });
        }
    }

    /*
    **	Generate icons in tabs navigation
    */
    function eltdInitTabIcons(){

        var tabContent = $('.eltd-tab-container');
        if(tabContent.length){

            tabContent.each(function(){
                var thisTabContent = $(this);

                var id = thisTabContent.attr('id');
                var icon = '';
                if(typeof thisTabContent.data('icon-html') !== 'undefined' || thisTabContent.data('icon-html') !== 'false') {
                    icon = thisTabContent.data('icon-html');
                }

                var tabNav = thisTabContent.parents('.eltd-tabs').find('.eltd-tabs-nav > li > a[href="#'+id+'"]');

                if(typeof(tabNav) !== 'undefined') {
                    tabNav.children('.eltd-icon-frame').append(icon);
                }
            });
        }
    }

    /**
     * Button object that initializes whole button functionality
     * @type {Function}
     */
    var eltdButton = eltd.modules.shortcodes.eltdButton = function() {
        //all buttons on the page
        var buttons = $('.eltd-btn');

        /**
         * Initializes button hover color
         * @param button current button
         */
        var buttonHoverColor = function(button) {
            if(typeof button.data('hover-color') !== 'undefined') {
                var changeButtonColor = function(event) {
                    event.data.button.css('color', event.data.color);
                };

                var originalColor = button.css('color');
                var hoverColor = button.data('hover-color');

                button.on('mouseenter', { button: button, color: hoverColor }, changeButtonColor);
                button.on('mouseleave', { button: button, color: originalColor }, changeButtonColor);
            }
        };



        /**
         * Initializes button hover background color
         * @param button current button
         */
        var buttonOutlineHoverBgColor = function(button) {
            if(typeof button.data('hover-background-color') !== 'undefined' ) {
                var originalBgColor = 'transparent';

                var hoverBgColor = button.data('hover-background-color');

                button.hover(
                    function() {
                        button.css('background-color',hoverBgColor);
                    }, function() {
                        button.css('background-color',originalBgColor);
                    }
                );
            }
        };

        var buttonSolidHoverBgColor = function(button) {
            if(typeof button.data('solid-hover-background-color') !== 'undefined' ) {

                var originalStartBgColor = '#f6c478';
                var originalEndBgColor = '#dea43e';

                if(typeof button.data('solid-start-background-color') !== 'undefined' ){
                    originalStartBgColor = button.data('solid-start-background-color');
                }
                if(typeof button.data('solid-end-background-color') !== 'undefined' ){
                    originalEndBgColor = button.data('solid-end-background-color');
                }

                var hoverBgColor = button.data('solid-hover-background-color');

                button.hover(
                    function() {
                        button.css('background',hoverBgColor);

                    }, function() {

                         var gradient='linear-gradient(to right, '+originalStartBgColor+' 0%, '+originalEndBgColor+' 100%)';
                        button.css('background',gradient);
                    }
                );
            }
        };

        /**
         * Initializes button border color
         * @param button
         */
        var buttonHoverBorderColor = function(button) {
            if(typeof button.data('hover-border-color') !== 'undefined') {
                var changeBorderColor = function(event) {
                    event.data.button.css('border-color', event.data.color);
                };

                var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
                var hoverBorderColor = button.data('hover-border-color');

                button.on('mouseenter', { button: button, color: hoverBorderColor }, changeBorderColor);
                button.on('mouseleave', { button: button, color: originalBorderColor }, changeBorderColor);
            }
        };

        return {
            init: function() {
                if(buttons.length) {
                    buttons.each(function() {
                        buttonHoverColor($(this));
                        buttonOutlineHoverBgColor($(this));
                        buttonHoverBorderColor($(this));
                        buttonSolidHoverBgColor($(this));
                    });
                }
            }
        };
    };
    
    /*
    **	Init blog list masonry type
    */
    function eltdInitBlogListMasonry(){
        var blogList = $('.eltd-blog-list-holder.eltd-masonry .eltd-blog-list');
        if(blogList.length) {
            blogList.each(function() {
                var thisBlogList = $(this);
                blogList.waitForImages(function() {
                    thisBlogList.isotope({
                        itemSelector: '.eltd-blog-list-masonry-item',
                        masonry: {
                            columnWidth: '.eltd-blog-list-masonry-grid-sizer',
                            gutter: '.eltd-blog-list-masonry-grid-gutter'
                        }
                    });
                    thisBlogList.addClass('eltd-appeared');
                });
            });

        }
    }

	/*
	**	Custom Font resizing
	*/
	function eltdCustomFontResize(){
		var customFont = $('.eltd-custom-font-holder');
		if (customFont.length){
			customFont.each(function(){
				var thisCustomFont = $(this);
				var fontSize;
				var lineHeight;
				var coef1 = 1;
				var coef2 = 1;

				if (eltd.windowWidth < 1200){
					coef1 = 0.8;
				}

				if (eltd.windowWidth < 1025){
					coef1 = 0.7;
				}

				if (eltd.windowWidth < 768){
					coef1 = 0.6;
					coef2 = 0.7;
				}

				if (eltd.windowWidth < 600){
					coef1 = 0.5;
					coef2 = 0.6;
				}

				if (eltd.windowWidth < 480){
					coef1 = 0.4;
					coef2 = 0.5;
				}

				if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
					fontSize = parseInt(thisCustomFont.data('font-size'));

					if (fontSize > 70) {
						fontSize = Math.round(fontSize*coef1);
					}
					else if (fontSize > 35) {
						fontSize = Math.round(fontSize*coef2);
					}

					thisCustomFont.css('font-size',fontSize + 'px');
				}

				if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
					lineHeight = parseInt(thisCustomFont.data('line-height'));

					if (lineHeight > 70 && eltd.windowWidth < 1200) {
						lineHeight = '1.2em';
					}
					else if (lineHeight > 35 && eltd.windowWidth < 768) {
						lineHeight = '1.2em';
					}
					else{
						lineHeight += 'px';
					}

					thisCustomFont.css('line-height', lineHeight);
				}
			});
		}
	}

    /*
     **	Show Google Map
     */
    function eltdShowGoogleMap(){

        if($('.eltd-google-map').length){
            $('.eltd-google-map').each(function(){

                var element = $(this);

                var customMapStyle;
                if(typeof element.data('custom-map-style') !== 'undefined') {
                    customMapStyle = element.data('custom-map-style');
                }

                var colorOverlay;
                if(typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
                    colorOverlay = element.data('color-overlay');
                }

                var saturation;
                if(typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
                    saturation = element.data('saturation');
                }

                var lightness;
                if(typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
                    lightness = element.data('lightness');
                }

                var zoom;
                if(typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
                    zoom = element.data('zoom');
                }

                var pin;
                if(typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
                    pin = element.data('pin');
                }

                var mapHeight;
                if(typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
                    mapHeight = element.data('height');
                }

                var uniqueId;
                if(typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
                    uniqueId = element.data('unique-id');
                }

                var scrollWheel;
                if(typeof element.data('scroll-wheel') !== 'undefined') {
                    scrollWheel = element.data('scroll-wheel');
                }
                var addresses;
                if(typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
                    addresses = element.data('addresses');
                }

                var map = "map_"+ uniqueId;
                var geocoder = "geocoder_"+ uniqueId;
                var holderId = "eltd-map-"+ uniqueId;

                eltdInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin,  map, geocoder, addresses);
            });
        }

    }
    /*
     **	Init Google Map
     */
    function eltdInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin,  map, geocoder, data){

        var mapStyles = [
            {
                stylers: [
                    {hue: color },
                    {saturation: saturation},
                    {lightness: lightness},
                    {gamma: 1}
                ]
            }
        ];

        var googleMapStyleId;

        if(customMapStyle){
            googleMapStyleId = 'eltd-style';
        } else {
            googleMapStyleId = google.maps.MapTypeId.ROADMAP;
        }

        var qoogleMapType = new google.maps.StyledMapType(mapStyles,
            {name: "Elated Google Map"});

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);

        if (!isNaN(height)){
            height = height + 'px';
        }

        var myOptions = {

            zoom: zoom,
            scrollwheel: wheel,
            center: latlng,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'eltd-style'],
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeId: googleMapStyleId
        };

        map = new google.maps.Map(document.getElementById(holderId), myOptions);
        map.mapTypes.set('eltd-style', qoogleMapType);

        var index;

        for (index = 0; index < data.length; ++index) {
            eltdInitializeGoogleAddress(data[index], pin, map, geocoder);
        }

        var holderElement = document.getElementById(holderId);
        holderElement.style.height = height;
    }
    /*
     **	Init Google Map Addresses
     */
    function eltdInitializeGoogleAddress(data, pin,  map, geocoder){
        if (data === '')
            return;
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            '<p>'+data+'</p>'+
            '</div>'+
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        geocoder.geocode( { 'address': data}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon:  pin,
                    title: data['store_title']
                });
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });

                google.maps.event.addDomListener(window, 'resize', function() {
                    map.setCenter(results[0].geometry.location);
                });

            }
        });
    }

    function eltdInitAccordions(){
        var accordion = $('.eltd-accordion-holder');
        if(accordion.length){
            accordion.each(function(){

               var thisAccordion = $(this);

				if(thisAccordion.hasClass('eltd-accordion')){

					thisAccordion.accordion({
						animate: "swing",
						collapsible: true,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if(thisAccordion.hasClass('eltd-toggle')){

					var toggleAccordion = $(this);
					var toggleAccordionTitle = toggleAccordion.find('.eltd-title-holder');
					var toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function(){
						var thisTitle = $(this);
						thisTitle.hover(function(){
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click',function(){
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
            });
        }
    }

    function eltdInitImageGallery() {

        var galleries = $('.eltd-image-gallery');

        if (galleries.length) {
            galleries.each(function () {
                var galleryHolder = $(this);
                if(galleryHolder.hasClass('eltd-image-owl-slider')){
                    var gallery = $(this).children('.eltd-image-gallery-slides-holder');
                    gallery.waitForImages(function(){
                        gallery.css('visibility','visible');
                    });

                    var navigation = false;
                    if (gallery.data('navigation') == 'yes') {
                        navigation = true;
                    }

                    var pagination = false;
                    if (gallery.data('pagination') == 'yes') {
                        pagination = true;
                    }

                    var autoplay = false,
                        autoplaySpeed;

                    if ( gallery.data('autoplay') !== 'disable') {
                        autoplay = true;
                        autoplaySpeed = gallery.data('autoplay') * 1000;
                    }

                    var numberOfItems = 1;
                    if(gallery.hasClass('eltd-image-gallery-carousel') || gallery.hasClass('eltd-image-gallery-slider')){
                        //set default value
                        if (typeof gallery.data('images-shown') !== 'undefined' && gallery.data('images-shown') !== false) {
                            numberOfItems = gallery.data('images-shown');
                        }
                    }

                    gallery.owlCarousel({
                        items: numberOfItems,
                        responsive:{
                            0:{
                                items:1,
                                nav: false
                            },
                            600:{
                                items:2,
                                nav: false
                            },
                            768: {
                                items:3
                            },
                            1024:{
                                items:5
                            },
                            1200:{
                                items:numberOfItems
                            }
                        },
                        smartSpeed: 400,
                        autoplay:autoplay,
                        autoplayTimeout:autoplaySpeed,
                        autoplayHoverPause:true,
                        loop:true,
                        nav: navigation,
                        dots: pagination,
                        navText: [
                            '<span class="eltd-prev-icon"><span class="icon-arrows-left"></span></span>',
                            '<span class="eltd-next-icon"><span class="icon-arrows-right"></span></span>'
                        ]
                    });
                    gallery.css('opacity','1');
                }
                else if(galleryHolder.hasClass('eltd-image-slick-slider')){
                    var gallery = $(this).children('.eltd-image-gallery-carousel-var-img-size');
                    gallery.waitForImages(function(){
                        gallery.css('visibility','visible');
                    });

                    var navigation = false;
                    if (gallery.data('navigation') == 'yes') {
                        navigation = true;
                    }

                    var pagination = false;
                    if (gallery.data('pagination') == 'yes') {
                        pagination = true;
                    }

                    var autoplay = false,
                        autoplaySpeed;

                    if ( gallery.data('autoplay') !== 'disable') {
                        autoplay = true;
                        autoplaySpeed = gallery.data('autoplay') * 1000;
                    }

                    gallery.slick({
                        dots: pagination,
                        infinite: true,
                        speed: 800,
                        slidesToShow: 1,
                        variableWidth: true,
                        centerMode: true,
                        arrows: navigation,
                        autoplay:true,
                        autoplaySpeed: 2000,
                        prevArrow: '<i class="eltd-icon-linea-icon icon-arrows-left left"></i>',
                        nextArrow: '<i class="eltd-icon-linea-icon icon-arrows-right right"></i>'
                    });

                }
            });
        }

    }
    /**
     * Initializes portfolio list
     */
    function eltdInitPortfolio(){
        var portList = $('.eltd-portfolio-list-holder-outer.eltd-ptf-standard, .eltd-portfolio-list-holder-outer.eltd-ptf-gallery,' +
             '.eltd-portfolio-list-holder-outer.eltd-ptf-standard-no-space, .eltd-portfolio-list-holder-outer.eltd-ptf-gallery-no-space' );
        if(portList.length){            
            portList.each(function(){
                var thisPortList = $(this);
                eltdInitPortMixItUp(thisPortList);
            });
        }
    }
    /**
     * Initializes mixItUp function for specific container
     */
    function eltdInitPortMixItUp(container){

        var filterClass = '';
        if(container.hasClass('eltd-ptf-has-filter')){
            filterClass = container.find('.eltd-portfolio-filter-holder-inner ul li').data('class');
            filterClass = '.'+filterClass;
        }
        
        var holderInner = container.find('.eltd-portfolio-list-holder');
        holderInner.mixItUp({
            callbacks: {
                onMixLoad: function(){
                    holderInner.find('article').css('visibility','visible');
                },
                onMixStart: function(){
                    holderInner.find('article').css('visibility','visible');
                },
                onMixBusy: function(){
                    holderInner.find('article').css('visibility','visible');
                },
                onMixEnd: function(){
                    eltd.modules.common.eltdInitParallax();
                }
            },           
            selectors: {
                filter: filterClass
            },
            animation: {
                duration: 450,
                effects: 'fade stagger(100ms) scale(0.7)',
                easing: 'cubic-bezier(0.645, 0.045, 0.355, 1)'
            }
            
        });
        
    }

    function eltdPortfolioTiledGallery() {

        var portList = $('.eltd-portfolio-list-holder-outer.eltd-ptf-gallery-tiled');
        if(portList.length){
            portList.each(function() {
                var thisPortList = $(this);
                eltdInitPortfolioTiledGallery(thisPortList).init();
            })
        }

    }
    function eltdInitPortfolioTiledGallery(portList){

        var initGallery = function() {
            var gallery = portList.find('.eltd-portfolio-list-holder');

            var rowHeight = typeof portList.data('row-height') !== 'undefined' ? portList.data('row-height') : 200,
                spacing = typeof portList.data('spacing') !== 'undefined' ? portList.data('spacing') : 0,
                lastRow = typeof portList.data('last-row') !== 'undefined' ? portList.data('last-row') : 'nojustify',
                threshold = typeof portList.data('threshold') !== 'undefined' ? portList.data('threshold') : 0.75;

            setTimeout(function () {
                gallery.justifiedGallery({
                    rowHeight: rowHeight,
                    margins: spacing,
                    lastRow: lastRow,
                    justifyThreshold: threshold,
                    selector: '> article'
                }).on('jg.complete jg.rowflush', function() {
                    gallery.find('article').addClass('show');
                });
            }, 100);  //Timeout because of ajax page transitions

        };
        var initGalleryFilter = function(){
            if(portList.hasClass('eltd-ptf-has-filter')){

                var thisPortList = portList;
                var gallery = thisPortList.find('.eltd-portfolio-list-holder');
                var filterHolder = thisPortList.find('.eltd-portfolio-filter-holder');
                var filterItems = filterHolder.find('li');

                var currentItem;
                if(filterItems.length){
                    filterItems.each(function(){
                        if($(this).hasClass('active')){
                            currentItem = $(this);
                        }
                    })
                }

                if(typeof (currentItem) !== 'undefined'){
                    //filter items after ajax pagination call
                    eltdFilterPortfolioTiledGallery(currentItem);
                }else{
                    //filter items initially
                    filterItems.first().addClass('active');
                }

                //filter articles on click event
                filterHolder.find('li').on('click',function(){
                    eltdFilterPortfolioTiledGallery($(this));
                });

            }
            function eltdFilterPortfolioTiledGallery(filterItem){

                var selector = filterItem.attr('data-filter');
                var articles = gallery.find('article');
                var transitionDuration = 200;

                articles.css('transition','all '+transitionDuration+'ms ease');
                articles.not(selector).css({
                    'transform': 'scale(0)'
                });
                if(selector === '.all'){
                    articles.addClass('all');
                }
                setTimeout(function() {

                    articles.filter(selector).css({
                        'transform': ''
                    });

                    gallery.css('transition','height '+transitionDuration+'ms ease').justifiedGallery({selector: '>article'+(selector ? selector : '')});
                },  1.1*transitionDuration);
                setTimeout(function() {
                    articles.css('transition','');
                    gallery.css('transition','');
                }, 2.2*transitionDuration);

                filterItems.removeClass("active");
                filterItem.addClass("active");

                return false;

            }
        };

        return {

            init : function() {

                initGallery();
                initGalleryFilter();

            }

        };

    }
     /*
    **	Init portfolio list masonry type
    */
    function eltdInitPortfolioListMasonry(){
        var portList = $('.eltd-portfolio-list-holder-outer.eltd-ptf-masonry');
        if(portList.length) {
            portList.each(function() {
                var thisPortList = $(this).children('.eltd-portfolio-list-holder');
                var size = thisPortList.find('.eltd-portfolio-list-masonry-grid-sizer').width();               
                eltdResizeMasonry(size,thisPortList);
                
                eltdInitMasonry(thisPortList);
                $(window).resize(function(){
                    eltdResizeMasonry(size,thisPortList);
                    eltdInitMasonry(thisPortList);
                });
            });
        }
    }
    
    function eltdInitMasonry(container){
        container.waitForImages(function() {
            container.isotope({
                itemSelector: '.eltd-portfolio-item',
                masonry: {
                    columnWidth: '.eltd-portfolio-list-masonry-grid-sizer'
                }
            });
            container.addClass('eltd-appeared');
        });
    }
    
    function eltdResizeMasonry(size,container){
        
        var defaultMasonryItem = container.find('.eltd-default-masonry-item');
        var largeWidthMasonryItem = container.find('.eltd-large-width-masonry-item');
        var largeHeightMasonryItem = container.find('.eltd-large-height-masonry-item');
        var largeWidthHeightMasonryItem = container.find('.eltd-large-width-height-masonry-item');

        defaultMasonryItem.css('height', Math.round(size));
        largeWidthMasonryItem.css('height', Math.round(size));

        if(eltd.windowWidth > 600){
            largeWidthHeightMasonryItem.css('height', Math.round(2*size));
            largeHeightMasonryItem.css('height', Math.round(2*size));
        }else{
            largeWidthHeightMasonryItem.css('height', Math.round(2*size));
            largeHeightMasonryItem.css('height', Math.round(2*size));
            largeWidthMasonryItem.css('height', Math.round(size/2));
        }
    }
    /**
     * Initializes portfolio pinterest 
     */
    function eltdInitPortfolioListPinterest(){
        
        var portList = $('.eltd-portfolio-list-holder-outer.eltd-ptf-pinterest');
        if(portList.length) {
            portList.each(function() {
                var thisPortList = $(this).children('.eltd-portfolio-list-holder');
                eltdInitPinterest(thisPortList);
                $(window).resize(function(){
                     eltdInitPinterest(thisPortList);
                });
            });
            
        }
    }
    
    function eltdInitPinterest(container){
        container.waitForImages(function() {
            container.isotope({
                itemSelector: '.eltd-portfolio-item',
                masonry: {
                    columnWidth: '.eltd-portfolio-list-masonry-grid-sizer'
                }
            });
        });
        container.addClass('eltd-appeared');
        
    }
    /**
     * Initializes portfolio masonry filter
     */
    function eltdInitPortfolioMasonryFilter(){
        
        var filterHolder = $('.eltd-portfolio-filter-holder.eltd-masonry-filter');
        
        if(filterHolder.length){
            filterHolder.each(function(){
               
                var thisFilterHolder = $(this);
                
                var portfolioIsotopeAnimation = null;
                
                var filter = thisFilterHolder.find('ul li').data('class');
                
                thisFilterHolder.find('.filter:first').addClass('active');
                
                thisFilterHolder.find('.filter').click(function(){

                    var currentFilter = $(this);
                    clearTimeout(portfolioIsotopeAnimation);

                    $('.isotope, .isotope .isotope-item').css('transition-duration','0.8s');

                    portfolioIsotopeAnimation = setTimeout(function(){
                        $('.isotope, .isotope .isotope-item').css('transition-duration','0s'); 
                    },700);

                    var selector = $(this).attr('data-filter');
                    thisFilterHolder.siblings('.eltd-portfolio-list-holder-outer').find('.eltd-portfolio-list-holder').isotope({ filter: selector });

                    thisFilterHolder.find('.filter').removeClass('active');
                    currentFilter.addClass('active');

                    return false;

                });
                
            });
        }
    }
    /**
     * Initializes portfolio slider
     */
    
    function eltdInitPortfolioSlider(){
        var portSlider = $('.eltd-portfolio-list-holder-outer.eltd-portfolio-slider-holder');
        if(portSlider.length){
            portSlider.each(function(){
                var thisPortSlider = $(this);
                var sliderWrapper = thisPortSlider.children('.eltd-portfolio-list-holder');
                var numberOfItems = thisPortSlider.data('items');

               var navigation = false;
               if (thisPortSlider.data('navigation') == 'yes') {
                   navigation = true;
               }

               var pagination = false;
               if (thisPortSlider.data('pagination') == 'yes') {
                   pagination = true;
               }

                sliderWrapper.owlCarousel({
                    autoPlay: 3000,
                    items: numberOfItems,
                    responsive:{
                        0:{
                            items:1,
                            nav: false,
                            dots:true,
                        },
                        480:{
                            items:2,
                            nav: false,
                            dots:true,
                        },
                        768: {
                            items:3,
                            dots:false,
                        },
                        1024:{
                            items:numberOfItems,
                        }
                    },
                    smartSpeed: 600,
                    autoplay:true,
                    autoplayTimeout:3000,
                    autoplayHoverPause:true,
                    loop:true,
                    dots: pagination,
                    nav: navigation,
                    navText: [
                        '<span class="eltd-prev-icon"><span class="icon-arrows-left"></span></span>',
                        '<span class="eltd-next-icon"><span class="icon-arrows-right"></span></span>'
                    ]
                });
                //thisPortSlider.appear(function(){
                //    sliderWrapper.owlCarousel({
                //        autoPlay: 3000,
                //        items: numberOfItems,
                //        responsive:{
                //            0:{
                //                items:1,
                //                nav: false,
                //                dots:true,
                //            },
                //            480:{
                //                items:2,
                //                nav: false,
                //                dots:true,
                //            },
                //            768: {
                //                items:3,
                //                dots:false,
                //            },
                //            1024:{
                //                items:numberOfItems,
                //            }
                //        },
                //        smartSpeed: 600,
                //        autoplay:true,
                //        autoplayTimeout:3000,
                //        autoplayHoverPause:true,
                //        loop:false,
                //        dots: pagination,
                //        nav: navigation,
                //        navText: [
                //            '<span class="eltd-prev-icon"><span class="arrow_carrot-left"></span></span>',
                //            '<span class="eltd-next-icon"><span class="arrow_carrot-right"></span></span>'
                //        ]
                //    });
                //},{accX: 0, accY: 200});
            });
        }
    }
    /**
     * Initializes portfolio load more function
     */
    function eltdInitPortfolioLoadMore(){
        var portList = $('.eltd-portfolio-list-holder-outer.eltd-ptf-load-more');
        if(portList.length){
            portList.each(function(){
                
                var thisPortList = $(this);
                var nextPage; 
                var maxNumPages;
                var loadMoreButton = thisPortList.find('.eltd-ptf-list-load-more a');      
                
                if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {  
                    maxNumPages = thisPortList.data('max-num-pages');
                }
                
                loadMoreButton.on('click', function (e) {  
                    var loadMoreDatta = eltdGetPortfolioAjaxData(thisPortList);
                    nextPage = loadMoreDatta.nextPage;
                    e.preventDefault();
                    e.stopPropagation();
                    loadMoreButton.closest('.eltd-ptf-list-paging').removeClass('eltd-appeared'); //hide button on click
                    if(nextPage <= maxNumPages){
                        var ajaxData = eltdSetPortfolioAjaxData(loadMoreDatta);

                        //generate ajax response
                        eltdPtfGetAjaxResponse(thisPortList, ajaxData, nextPage, 'load-more');

                    }
                    if(nextPage === maxNumPages){
                        loadMoreButton.hide();
                    }
                });
                
            });
        }
    }

    function eltdInitPortfolioStandardPag(){

        var portList = $('.eltd-portfolio-list-holder-outer.eltd-ptf-standard-pagination');
        if(portList.length){
            portList.each(function(){

                var thisPortList = $(this);
                var pagHolder = $(this).find('.eltd-ptf-standard-pag-holder');
                var pagItem = pagHolder.find('ul li');
                var choosenPage;
                var maxNumPages;
                var previousPageId;
                if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
                    maxNumPages = thisPortList.data('max-num-pages');
                }

                //set first page to be active on init
                pagItem.eq(1).addClass('active');

                pagItem.on('click', function (e) {

                    e.preventDefault();
                    e.stopPropagation();
                    //this is for prev and next button
                    pagItem.removeClass('eltd-disabled-pag-item');

                    //get previous pagination page id.This is important because of next and prev buttons
                    if(pagItem.length){
                        pagItem.each(function(){

                            if($(this).hasClass('active')){
                                previousPageId = $(this).data('current-page');
                            }

                        });
                    }

                    var thisPagItem = $(this);

                    var loadMoreDatta = eltdGetPortfolioAjaxData(thisPortList);

                    //get id of selected pagination page
                    choosenPage = parseInt(thisPagItem.data('current-page'));


                    //define choosenPage if is prev button clicked
                    if(thisPagItem.hasClass('eltd-pagination-prev')){

                        if(previousPageId === 1){
                            choosenPage = false;
                        }else{
                            choosenPage = previousPageId - 1;
                        }

                    }
                    //define choosenPage if is next button clicked
                    if(thisPagItem.hasClass('eltd-pagination-next')){

                        if(previousPageId === maxNumPages){
                            choosenPage = false;
                        }else{
                            choosenPage = previousPageId + 1;
                        }
                    }

                    //set nextPage attr for ajax function
                    loadMoreDatta.nextPage = choosenPage;
                    var ajaxData = eltdSetPortfolioAjaxData(loadMoreDatta);

                    //generate ajax response
                    if(choosenPage){

                        //remove active class from current page and set active class for page which will be loaded
                        pagItem.removeClass('active');
                        if(pagItem.length){
                            pagItem.each(function(){

                                if(parseInt($(this).data('current-page')) === choosenPage){
                                    $(this).addClass('active');
                                }
                            });
                        }
                        //call ajax functionality
                        eltdPtfGetAjaxResponse(thisPortList, ajaxData, choosenPage, 'standard-pagination');
                    }
                    else{
                        //set class to disable prev/next button
                        thisPagItem.addClass('eltd-disabled-pag-item');
                    }
                });

            });
        }

    }


    /*
    * Portfolio appear effect
    */
    function eltdInitPortfolioAppear() {
        var ptfLists = $('.eltd-portfolio-list-holder-outer.eltd-appear-effect');
        if (ptfLists.length) {
            ptfLists.each(function(){
                var thisPortfolioList = $(this);
                    if (thisPortfolioList.hasClass('eltd-ptf-one-by-one')) {
                        var article = thisPortfolioList.find('article'),
                            loadMore = thisPortfolioList.find('.eltd-ptf-list-paging'),
                            articleCounter = 0,
                            animateCycle, // rewind delay initial
                            animateCycleCounter = 0;

                        article.each(function(){
                            var thisArticle = $(this);
                            if(thisArticle.offset().top == article.first().offset().top) {
                                articleCounter ++;
                            }
                        })
                        animateCycle = articleCounter + 1;


                        article.each(function(){
                            var thisArticle = $(this);
                            setTimeout(function(){
                                thisArticle.appear(function(){
                                    animateCycleCounter ++;
                                    if(animateCycleCounter == animateCycle) {
                                        animateCycleCounter = 0;
                                    }
                                    setTimeout(function(){
                                        thisArticle.addClass('eltd-appeared');
                                    },animateCycleCounter * 150);
                                },{accX: 0, accY: 0});
                            },30);
                        });

                        if(loadMore.length){
                            loadMore.addClass('eltd-appeared');
                        }
                    }
            });
        }
    }

    /*
    * Portfolio list filter hover animation
    */
    function eltdPtfFilterAnimation() {
        var ptfFilters = $('.eltd-portfolio-filter-holder')
        if (ptfFilters.length) {
            ptfFilters.each(function(){
                var ptfFilter = $(this),
                    filterItem = ptfFilter.find('li'),
                    filterLine = ptfFilter.find('.eltd-filter-line');

                filterLine.css({width: filterItem.first().outerWidth()});
                filterLine.css({left: 0});

                filterItem.each(function(){
                    var thisItem = $(this);
                    thisItem.mouseenter(function(){
                        filterLine.css({width: thisItem.outerWidth()});
                        filterLine.css({left: thisItem.offset().left - thisItem.parent().offset().left});
                    });
                });

                ptfFilters.mouseleave(function(){
                    if (filterItem.filter('.active').length) {
                        filterLine.css({width: filterItem.filter('.active').outerWidth()});
                        filterLine.css({left: filterItem.filter('.active').offset().left - filterItem.filter('.active').parent().offset().left});
                    } else {
                        filterLine.css({width: filterItem.first().outerWidth()});
                        filterLine.css({left: 0});
                    }
                });
            });
        }
    }

    function eltdPtfGetAjaxResponse(container, ajaxParams, nextPage, action){

        var containerInner = container.find('.eltd-portfolio-list-holder');

        $.ajax({
            type: 'POST',
            data: ajaxParams,
            url: eltdCoreAjaxUrl,
            success: function (data) {
                nextPage++;
                container.data('next-page', nextPage);
                var response = $.parseJSON(data);
                var responseHtml = eltdConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with


                container.waitForImages(function(){
                    if(action === 'standard-pagination'){
                        //remove previous articles
                        containerInner.find('article').remove();
                    }

                    if(container.hasClass('eltd-ptf-masonry') || container.hasClass('eltd-ptf-pinterest') ){
                        setTimeout(function(){
                            containerInner.isotope().append( responseHtml ).isotope( 'appended', responseHtml ).isotope('reloadItems');
                            eltdInitPortfolioAppear();
                        },300);
                    }else if(container.hasClass('eltd-ptf-gallery-tiled')){

                        containerInner.append(responseHtml);
                        container.waitForImages(function(){
                            setTimeout(function(){
                                eltdInitPortfolioTiledGallery(container).init();
                                eltdInitPortfolioAppear();
                            },300);
                        });

                    }
                    else {
                        containerInner.mixItUp('append' , responseHtml,function(){
                            eltdInitPortfolioAppear();
                        });
                    };
                });

            }
        });
    }
    
    function eltdConvertHTML ( html ) {
        var newHtml = $.trim( html ),
                $html = $(newHtml ),
                $empty = $();

        $html.each(function ( index, value ) {
            if ( value.nodeType === 1) {
                $empty = $empty.add ( this );
            }
        });

        return $empty;
    }

    /**
     * Initializes portfolio load more data params
     * @param portfolio list container with defined data params
     * return array
     */
    function eltdGetPortfolioAjaxData(container){
        var returnValue = {};
        
        returnValue.type = '';
        returnValue.columns = '';
        returnValue.gridSize = '';
        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.number = '';
        returnValue.imageSize = '';
        returnValue.filter = '';
        returnValue.filterOrderBy = '';
        returnValue.category = '';
        returnValue.selectedProjectes = '';
        returnValue.enablePagination = '';
        returnValue.paginationType = '';
        returnValue.titleTag = '';
        returnValue.nextPage = '';
        returnValue.maxNumPages = '';
        
        if (typeof container.data('type') !== 'undefined' && container.data('type') !== false) {
            returnValue.type = container.data('type');
        }
        if (typeof container.data('grid-size') !== 'undefined' && container.data('grid-size') !== false) {                    
            returnValue.gridSize = container.data('grid-size');
        }
        if (typeof container.data('columns') !== 'undefined' && container.data('columns') !== false) {                    
            returnValue.columns = container.data('columns');
        }
        if (typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {                    
            returnValue.orderBy = container.data('order-by');
        }
        if (typeof container.data('order') !== 'undefined' && container.data('order') !== false) {                    
            returnValue.order = container.data('order');
        }
        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {                    
            returnValue.number = container.data('number');
        }
        if (typeof container.data('image-size') !== 'undefined' && container.data('image-size') !== false) {                    
            returnValue.imageSize = container.data('image-size');
        }
        if (typeof container.data('filter') !== 'undefined' && container.data('filter') !== false) {                    
            returnValue.filter = container.data('filter');
        }
        if (typeof container.data('filter-order-by') !== 'undefined' && container.data('filter-order-by') !== false) {                    
            returnValue.filterOrderBy = container.data('filter-order-by');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {                    
            returnValue.category = container.data('category');
        }
        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {                    
            returnValue.selectedProjectes = container.data('selected-projects');
        }
        if (typeof container.data('enable-pagination') !== 'undefined' && container.data('enable-pagination') !== false) {
            returnValue.enablePagination = container.data('enable-pagination');
        }
        if (typeof container.data('pagination-type') !== 'undefined' && container.data('pagination-type') !== false) {
            returnValue.paginationType = container.data('pagination-type');
        }
        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {                    
            returnValue.titleTag = container.data('title-tag');
        }
        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {                    
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {                    
            returnValue.maxNumPages = container.data('max-num-pages');
        }
        return returnValue;
    }
     /**
     * Sets portfolio load more data params for ajax function
     * @param portfolio list container with defined data params
     * return array
     */
    function eltdSetPortfolioAjaxData(container){
        var returnValue = {
            action: 'eltd_core_portfolio_ajax_load_more',
            type: container.type,
            columns: container.columns,
            gridSize: container.gridSize,
            orderBy: container.orderBy,
            order: container.order,
            number: container.number,
            imageSize: container.imageSize,
            filter: container.filter,
            filterOrderBy: container.filterOrderBy,
            category: container.category,
            selectedProjectes: container.selectedProjectes,
            enablePagination: container.enablePagination,
            paginationType: container.paginationType,
            titleTag: container.titleTag,
            nextPage: container.nextPage
        };
        return returnValue;
    }
    
    /**
     * Slider object that initializes whole slider functionality
     * @type {Function}
     */
    var eltdSlider = eltd.modules.shortcodes.eltdSlider = function() {

        //all sliders on the page
        var sliders = $('.eltd-slider .carousel');
        //image regex used to extract img source
        var imageRegex = /url\(["']?([^'")]+)['"]?\)/;

        /*** Functionality for translating image in slide - START ***/

        var matrixArray = { zoom_center : '1.2, 0, 0, 1.2, 0, 0', zoom_top_left: '1.2, 0, 0, 1.2, -150, -150', zoom_top_right : '1.2, 0, 0, 1.2, 150, -150', zoom_bottom_left: '1.2, 0, 0, 1.2, -150, 150', zoom_bottom_right: '1.2, 0, 0, 1.2, 150, 150'};

        // regular expression for parsing out the matrix components from the matrix string
        var matrixRE = /\([0-9epx\.\, \t\-]+/gi;

        // parses a matrix string of the form "matrix(n1,n2,n3,n4,n5,n6)" and
        // returns an array with the matrix components
        var parseMatrix = function (val) {
            return val.match(matrixRE)[0].substr(1).
            split(",").map(function (s) {
                return parseFloat(s);
            });
        };

        // transform css property names with vendor prefixes;
        // the plugin will check for values in the order the names are listed here and return as soon as there
        // is a value; so listing the W3 std name for the transform results in that being used if its available
        var transformPropNames = [
            "transform",
            "-webkit-transform"
        ];

        var getTransformMatrix = function (el) {
            // iterate through the css3 identifiers till we hit one that yields a value
            var matrix = null;
            transformPropNames.some(function (prop) {
                matrix = el.css(prop);
                return (matrix !== null && matrix !== "");
            });

            // if "none" then we supplant it with an identity matrix so that our parsing code below doesn't break
            matrix = (!matrix || matrix === "none") ?
                "matrix(1,0,0,1,0,0)" : matrix;
            return parseMatrix(matrix);
        };

        // set the given matrix transform on the element; note that we apply the css transforms in reverse order of how its given
        // in "transformPropName" to ensure that the std compliant prop name shows up last
        var setTransformMatrix = function (el, matrix) {
            var m = "matrix(" + matrix.join(",") + ")";
            for (var i = transformPropNames.length - 1; i >= 0; --i) {
                el.css(transformPropNames[i], m + ' rotate(0.01deg)');
            }
        };

        // interpolates a value between a range given a percent
        var interpolate = function (from, to, percent) {
            return from + ((to - from) * (percent / 100));
        };

        $.fn.transformAnimate = function (opt) {
            // extend the options passed in by caller
            var options = {
                transform: "matrix(1,0,0,1,0,0)"
            };
            $.extend(options, opt);

            // initialize our custom property on the element to track animation progress
            this.css("percentAnim", 0);

            // supplant "options.step" if it exists with our own routine
            var sourceTransform = getTransformMatrix(this);
            var targetTransform = parseMatrix(options.transform);
            options.step = function (percentAnim, fx) {
                // compute the interpolated transform matrix for the current animation progress
                var $this = $(this);
                var matrix = sourceTransform.map(function (c, i) {
                    return interpolate(c, targetTransform[i],
                        percentAnim);
                });

                // apply the new matrix
                setTransformMatrix($this, matrix);

                // invoke caller's version of "step" if one was supplied;
                if (opt.step) {
                    opt.step.apply(this, [matrix, fx]);
                }
            };

            // animate!
            return this.stop().animate({ percentAnim: 100 }, options);
        };

        /*** Functionality for translating image in slide - END ***/


        /**
         * Calculate heights for slider holder and slide item, depending on window width, but only if slider is set to be responsive
         * @param slider, current slider
         * @param defaultHeight, default height of slider, set in shortcode
         * @param responsive_breakpoint_set, breakpoints set for slider responsiveness
         * @param reset, boolean for reseting heights
         */
        var setSliderHeight = function(slider, defaultHeight, responsive_breakpoint_set, reset) {
            var sliderHeight = defaultHeight;
            if(!reset) {
                if(eltd.windowWidth > responsive_breakpoint_set[0]) {
                    sliderHeight = defaultHeight;
                } else if(eltd.windowWidth > responsive_breakpoint_set[1]) {
                    sliderHeight = defaultHeight * 0.75;
                } else if(eltd.windowWidth > responsive_breakpoint_set[2]) {
                    sliderHeight = defaultHeight * 0.6;
                } else if(eltd.windowWidth > responsive_breakpoint_set[3]) {
                    sliderHeight = defaultHeight * 0.55;
                } else if(eltd.windowWidth <= responsive_breakpoint_set[3]) {
                    sliderHeight = defaultHeight * 0.45;
                }
            }

            slider.css({'height': (sliderHeight) + 'px'});
            slider.find('.eltd-slider-preloader').css({'height': (sliderHeight) + 'px'});
            slider.find('.eltd-slider-preloader .eltd-ajax-loader').css({'display': 'block'});
            slider.find('.item').css({'height': (sliderHeight) + 'px'});
            if(eltdPerPageVars.vars.eltdStickyScrollAmount === 0) {
                eltd.modules.header.stickyAppearAmount = sliderHeight; //set sticky header appear amount if slider there is no amount entered on page itself
            }
        };

        /**
         * Calculate heights for slider holder and slide item, depending on window size, but only if slider is set to be full height
         * @param slider, current slider
         */
        var setSliderFullHeight = function(slider) {
            var mobileHeaderHeight = eltd.windowWidth < 1025 ? eltdGlobalVars.vars.eltdMobileHeaderHeight + $('.eltd-top-bar').height() : 0;

            var topPaspartu = parseInt($('body.eltd-paspartu-enabled .eltd-wrapper').css('padding-top'));

            if(typeof topPaspartu === 'undefined' || topPaspartu === null || isNaN(topPaspartu)){
                topPaspartu = 0;
            }
            var bottomPaspartu = parseInt($('body.eltd-paspartu-enabled .eltd-wrapper').css('padding-bottom'));
            if(typeof bottomPaspartu === 'undefined' || bottomPaspartu === null || isNaN(bottomPaspartu)){
                bottomPaspartu = 0;
            }
            var paspartuSize = topPaspartu + bottomPaspartu;

            slider.css({'height': (eltd.windowHeight - mobileHeaderHeight - paspartuSize) + 'px'});
            slider.find('.eltd-slider-preloader').css({'height': (eltd.windowHeight - mobileHeaderHeight - paspartuSize) + 'px'});
            slider.find('.eltd-slider-preloader .eltd-ajax-loader').css({'display': 'block'});
            slider.find('.item').css({'height': (eltd.windowHeight - mobileHeaderHeight - paspartuSize) + 'px'});
            if(eltdPerPageVars.vars.eltdStickyScrollAmount === 0) {
                eltd.modules.header.stickyAppearAmount = eltd.windowHeight; //set sticky header appear amount if slider there is no amount entered on page itself
            }
        };

        var setElementsResponsiveness = function(slider) {
            // Basic text styles responsiveness
            slider
                .find('.eltd-slide-element-text-small, .eltd-slide-element-text-normal, .eltd-slide-element-text-large, .eltd-slide-element-text-extra-large')
                .each(function() {
                    var element = $(this);
                    if (typeof element.data('default-font-size') === 'undefined') { element.data('default-font-size', parseInt(element.css('font-size'),10)); }
                    if (typeof element.data('default-line-height') === 'undefined') { element.data('default-line-height', parseInt(element.css('line-height'),10)); }
                    if (typeof element.data('default-letter-spacing') === 'undefined') { element.data('default-letter-spacing', parseInt(element.css('letter-spacing'),10)); }
                });
            // Advanced text styles responsiveness
            slider.find('.eltd-slide-element-responsive-text').each(function() {
                if (typeof $(this).data('default-font-size') === 'undefined') { $(this).data('default-font-size', parseInt($(this).css('font-size'),10)); }
                if (typeof $(this).data('default-line-height') === 'undefined') { $(this).data('default-line-height', parseInt($(this).css('line-height'),10)); }
                if (typeof $(this).data('default-letter-spacing') === 'undefined') { $(this).data('default-letter-spacing', parseInt($(this).css('letter-spacing'),10)); }
            });
            // Button responsiveness
            slider.find('.eltd-slide-element-responsive-button').each(function() {
                if (typeof $(this).data('default-font-size') === 'undefined') { $(this).data('default-font-size', parseInt($(this).find('a').css('font-size'),10)); }
                if (typeof $(this).data('default-line-height') === 'undefined') { $(this).data('default-line-height', parseInt($(this).find('a').css('line-height'),10)); }
                if (typeof $(this).data('default-letter-spacing') === 'undefined') { $(this).data('default-letter-spacing', parseInt($(this).find('a').css('letter-spacing'),10)); }
                if (typeof $(this).data('default-ver-padding') === 'undefined') { $(this).data('default-ver-padding', parseInt($(this).find('a').css('padding-top'),10)); }
                if (typeof $(this).data('default-hor-padding') === 'undefined') { $(this).data('default-hor-padding', parseInt($(this).find('a').css('padding-left'),10)); }
            });
            // Margins for non-custom layouts
            slider.find('.eltd-slide-element').each(function() {
                var element = $(this);
                if (typeof element.data('default-margin-top') === 'undefined') { element.data('default-margin-top', parseInt(element.css('margin-top'),10)); }
                if (typeof element.data('default-margin-bottom') === 'undefined') { element.data('default-margin-bottom', parseInt(element.css('margin-bottom'),10)); }
                if (typeof element.data('default-margin-left') === 'undefined') { element.data('default-margin-left', parseInt(element.css('margin-left'),10)); }
                if (typeof element.data('default-margin-right') === 'undefined') { element.data('default-margin-right', parseInt(element.css('margin-right'),10)); }
            });
            adjustElementsSizes(slider);
        };

        var adjustElementsSizes = function(slider) {
            var boundaries = {
                // These values must match those in map.php (for slider), slider.php and eltd.layout.inc
                mobile: 600,
                tabletp: 800,
                tabletl: 1024,
                laptop: 1440
            };
            slider.find('.eltd-slider-elements-container').each(function() {
                var container = $(this);
                var target = container.filter('.eltd-custom-elements').add(container.not('.eltd-custom-elements').find('.eltd-slider-elements-holder-frame')).not('.eltd-grid');
                if (target.length) {
                    if (boundaries.mobile >= eltd.windowWidth && typeof container.attr('data-width-mobile') !== 'undefined') {
                        target.css('width', container.data('width-mobile') + '%');
                    }
                    else if (boundaries.tabletp >= eltd.windowWidth && typeof container.attr('data-width-tablet-p') !== 'undefined' ) {
                        target.css('width', container.data('width-tablet-p') + '%');
                    }
                    else if (boundaries.tabletl >= eltd.windowWidth && typeof container.attr('data-width-tablet-l') !== 'undefined' ) {
                        target.css('width', container.data('width-tablet-l') + '%');
                    }
                    else if (boundaries.laptop >= eltd.windowWidth && typeof container.attr('data-width-laptop') !== 'undefined' ) {
                        target.css('width', container.data('width-laptop') + '%');
                    }
                    else if ( typeof container.attr('data-width-desktop') !== 'undefined' ){
                        target.css('width', container.data('width-desktop') + '%');
                    }
                }
            });
            slider.find('.item').each(function() {
                var slide = $(this);
                var def_w = slide.find('.eltd-slider-elements-holder-frame').data('default-width');
                var elements = slide.find('.eltd-slide-element');

                // Adjusting margins for all elements
                elements.each(function() {
                    var element = $(this);
                    var def_m_top = element.data('default-margin-top'),
                        def_m_bot = element.data('default-margin-bottom'),
                        def_m_l = element.data('default-margin-left'),
                        def_m_r = element.data('default-margin-right');
                    var scale_data = (typeof element.data('resp-scale') !== 'undefined') ? element.data('resp-scale') : undefined;
                    var factor;

                    if (boundaries.mobile >= eltd.windowWidth) {
                        factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.mobile);
                    }
                    else if (boundaries.tabletp >= eltd.windowWidth) {
                        factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.tabletp);
                    }
                    else if (boundaries.tabletl >= eltd.windowWidth) {
                        factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.tabletl);
                    }
                    else if (boundaries.laptop >= eltd.windowWidth) {
                        factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.laptop);
                    }
                    else {
                        factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.desktop);
                    }

                    element.css({
                        'margin-top': Math.round(factor * def_m_top )+ 'px',
                        'margin-bottom': Math.round(factor * def_m_bot )+ 'px',
                        'margin-left': Math.round(factor * def_m_l )+ 'px',
                        'margin-right': Math.round(factor * def_m_r) + 'px'
                    });
                });

                // Adjusting responsiveness
                elements
                    .filter('.eltd-slide-element-responsive-text, .eltd-slide-element-responsive-button, .eltd-slide-element-responsive-image')
                    .add(elements.find('a.eltd-slide-element-responsive-text, span.eltd-slide-element-responsive-text'))
                    .each(function() {
                        var element = $(this);
                        var scale_data = (typeof element.data('resp-scale') !== 'undefined') ? element.data('resp-scale') : undefined,
                            left_data = (typeof element.data('resp-left') !== 'undefined') ? element.data('resp-left') : undefined,
                            top_data = (typeof element.data('resp-top') !== 'undefined') ? element.data('resp-top') : undefined;
                        var factor, new_left, new_top;

                        if (boundaries.mobile >= eltd.windowWidth) {
                            factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.mobile);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.mobile != '' ? left_data.mobile+'%' : element.data('left')+'%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.mobile != '' ? top_data.mobile+'%' : element.data('top')+'%');
                        }
                        else if (boundaries.tabletp >= eltd.windowWidth) {
                            factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.tabletp);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.tabletp != '' ? left_data.tabletp+'%' : element.data('left')+'%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.tabletp != '' ? top_data.tabletp+'%' : element.data('top')+'%');
                        }
                        else if (boundaries.tabletl >= eltd.windowWidth) {
                            factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.tabletl);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.tabletl != '' ? left_data.tabletl+'%' : element.data('left')+'%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.tabletl != '' ? top_data.tabletl+'%' : element.data('top')+'%');
                        }
                        else if (boundaries.laptop >= eltd.windowWidth) {
                            factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.laptop);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.laptop != '' ? left_data.laptop+'%' : element.data('left')+'%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.laptop != '' ? top_data.laptop+'%' : element.data('top')+'%');
                        }
                        else {
                            factor = (typeof scale_data === 'undefined') ? eltd.windowWidth / def_w : parseFloat(scale_data.desktop);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.desktop != '' ? left_data.desktop+'%' : element.data('left')+'%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.desktop != '' ? top_data.desktop+'%' : element.data('top')+'%');
                        }

                        if (!factor) {
                            element.hide();
                        }
                        else {
                            element.show();
                            var def_font_size,
                                def_line_h,
                                def_let_spac,
                                def_ver_pad,
                                def_hor_pad;

                            if (element.is('.eltd-slide-element-responsive-button')) {
                                def_font_size = element.data('default-font-size');
                                def_line_h = element.data('default-line-height');
                                def_let_spac = element.data('default-letter-spacing');
                                def_ver_pad = element.data('default-ver-padding');
                                def_hor_pad = element.data('default-hor-padding');

                                element.css({
                                        'left': new_left,
                                        'top': new_top
                                    })
                                    .find('.eltd-btn').css({
                                    'font-size': Math.round(factor * def_font_size) + 'px',
                                    'line-height': Math.round(factor * def_line_h) + 'px',
                                    'letter-spacing': Math.round(factor * def_let_spac) + 'px',
                                    'padding-left': Math.round(factor * def_hor_pad) + 'px',
                                    'padding-right': Math.round(factor * def_hor_pad) + 'px',
                                    'padding-top': Math.round(factor * def_ver_pad) + 'px',
                                    'padding-bottom': Math.round(factor * def_ver_pad) + 'px'
                                });
                            }
                            else if (element.is('.eltd-slide-element-responsive-image')) {
                                if (factor != eltd.windowWidth / def_w) { // if custom factor has been set for this screen width
                                    var up_w = element.data('upload-width'),
                                        up_h = element.data('upload-height');

                                    element.filter('.custom-image').css({
                                            'left': new_left,
                                            'top': new_top
                                        })
                                        .add(element.not('.custom-image').find('img'))
                                        .css({
                                            'width': Math.round(factor * up_w) + 'px',
                                            'height': Math.round(factor * up_h) + 'px'
                                        });
                                }
                                else {
                                    var w = element.data('width');

                                    element.filter('.custom-image').css({
                                            'left': new_left,
                                            'top': new_top
                                        })
                                        .add(element.not('.custom-image').find('img'))
                                        .css({
                                            'width': w + '%',
                                            'height': ''
                                        });
                                }
                            }
                            else {
                                def_font_size = element.data('default-font-size');
                                def_line_h = element.data('default-line-height');
                                def_let_spac = element.data('default-letter-spacing');

                                element.css({
                                    'left': new_left,
                                    'top': new_top,
                                    'font-size': Math.round(factor * def_font_size) + 'px',
                                    'line-height': Math.round(factor * def_line_h) + 'px',
                                    'letter-spacing': Math.round(factor * def_let_spac) + 'px'
                                });
                            }
                        }
                    });
            });
            var nav = slider.find('.carousel-indicators');
            slider.find('.eltd-slide-element-section-link').css('bottom', nav.length ? parseInt(nav.css('bottom'),10) + nav.outerHeight() + 10 + 'px' : '20px');
        };

        var checkButtonsAlignment = function(slider) {
            slider.find('.item').each(function() {
                var inline_buttons = $(this).find('.eltd-slide-element-button-inline');
                inline_buttons.css('display', 'inline-block').wrapAll('<div class="eltd-slide-elements-buttons-wrapper" style="text-align: ' + inline_buttons.eq(0).css('text-align') + ';"/>');
            });
        };

        /**
         * Set heights for slider and elemnts depending on slider settings (full height, responsive height od set height)
         * @param slider, current slider
         */
        var setHeights =  function(slider) {

            var responsiveBreakpointSet = [1600,1200,900,650,500,320];

            setElementsResponsiveness(slider);

            if(slider.hasClass('eltd-full-screen')){

                setSliderFullHeight(slider);

                $(window).resize(function() {
                    setSliderFullHeight(slider);
                    adjustElementsSizes(slider);
                });

            }else if(slider.hasClass('eltd-responsive-height')){

                var defaultHeight = slider.data('height');
                setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);

                $(window).resize(function() {
                    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
                    adjustElementsSizes(slider);
                });

            }else {
                var defaultHeight = slider.data('height');

                slider.find('.eltd-slider-preloader').css({'height': (slider.height()) + 'px'});
                slider.find('.eltd-slider-preloader .eltd-ajax-loader').css({'display': 'block'});

                eltd.windowWidth < 1025 ? setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false) : setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);

                $(window).resize(function() {
                    if(eltd.windowWidth < 1025){
                        setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
                    }else{
                        setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);
                    }
                    adjustElementsSizes(slider);
                });
            }
        };

        /**
         * Set prev/next numbers on navigation arrows
         * @param slider, current slider
         * @param currentItem, current slide item index
         * @param totalItemCount, total number of slide items
         */
        var setPrevNextNumbers = function(slider, currentItem, totalItemCount) {
            if(currentItem == 1){
                slider.find('.left.carousel-control .prev').html(totalItemCount);
                slider.find('.right.carousel-control .next').html(currentItem + 1);
            }else if(currentItem == totalItemCount){
                slider.find('.left.carousel-control .prev').html(currentItem - 1);
                slider.find('.right.carousel-control .next').html(1);
            }else{
                slider.find('.left.carousel-control .prev').html(currentItem - 1);
                slider.find('.right.carousel-control .next').html(currentItem + 1);
            }
        };

        /**
         * Set video background size
         * @param slider, current slider
         */
        var initVideoBackgroundSize = function(slider){
            var min_w = 1500; // minimum video width allowed
            var video_width_original = 1920;  // original video dimensions
            var video_height_original = 1080;
            var vid_ratio = 1920/1080;

            slider.find('.item .eltd-video .eltd-video-wrap').each(function(){

                var slideWidth = eltd.windowWidth;
                var slideHeight = $(this).closest('.carousel').height();

                $(this).width(slideWidth);

                min_w = vid_ratio * (slideHeight+20);
                $(this).height(slideHeight);

                var scale_h = slideWidth / video_width_original;
                var scale_v = (slideHeight - eltdGlobalVars.vars.eltdMenuAreaHeight) / video_height_original;
                var scale =  scale_v;
                if (scale_h > scale_v)
                    scale =  scale_h;
                if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}

                $(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
                $(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
                $(this).scrollLeft(($(this).find('video').width() - slideWidth) / 2);
                $(this).find('.mejs-overlay, .mejs-poster').scrollTop(($(this).find('video').height() - slideHeight) / 2);
                $(this).scrollTop(($(this).find('video').height() - slideHeight) / 2);
            });
        };

        /**
         * Init video background
         * @param slider, current slider
         */
        var initVideoBackground = function(slider) {
            $('.item .eltd-video-wrap .eltd-video-element').mediaelementplayer({
                enableKeyboard: false,
                iPadUseNativeControls: false,
                pauseOtherPlayers: false,
                // force iPhone's native controls
                iPhoneUseNativeControls: false,
                // force Android's native controls
                AndroidUseNativeControls: false
            });

            initVideoBackgroundSize(slider);
            $(window).resize(function() {
                initVideoBackgroundSize(slider);
            });

            //mobile check
            if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
                $('.eltd-slider .eltd-mobile-video-image').show();
                $('.eltd-slider .eltd-video-wrap').remove();
            }
        };

        var initPeek = function(slider) {
            if (slider.hasClass('eltd-slide-peek')) {

                var navArrowHover = function(arrow, entered) {
                    var dir = arrow.is('.left') ? 'left' : 'right';
                    var targ_peeker = peekers.filter('.'+dir);
                    if (entered) {
                        arrow.addClass('hovered');
                        var targ_item = (items.index(items.filter('.active')) + (dir=='left' ? -1 : 1) + items.length) % items.length;
                        targ_peeker.find('.eltd-slider-peeker-inner').css({
                            'background-image': items.eq(targ_item).find('.eltd-image, .eltd-mobile-video-image').css('background-image'),
                            'width': itemWidth + 'px'
                        });
                        targ_peeker.addClass('shown');
                    }
                    else {
                        arrow.removeClass('hovered');
                        peekers.removeClass('shown');
                    }
                };

                var navBulletHover = function(bullet, entered) {
                    if (entered) {
                        bullet.addClass('hovered');

                        var targ_item = bullet.data('slide-to');
                        var cur_item = items.index(items.filter('.active'));
                        if (cur_item != targ_item) {
                            var dir = (targ_item < cur_item) ? 'left' : 'right';
                            var targ_peeker = peekers.filter('.'+dir);
                            targ_peeker.find('.eltd-slider-peeker-inner').css({
                                'background-image': items.eq(targ_item).find('.eltd-image, .eltd-mobile-video-image').css('background-image'),
                                'width': itemWidth + 'px'
                            });
                            targ_peeker.addClass('shown');
                        }
                    }
                    else {
                        bullet.removeClass('hovered');
                        peekers.removeClass('shown');
                    }
                };

                var handleResize = function() {
                    itemWidth = items.filter('.active').width();
                    itemWidth += (itemWidth % 2) ? 1 : 0; // To make it even
                    items.children('.eltd-image, .eltd-video').css({
                        'position': 'absolute',
                        'width': itemWidth + 'px',
                        'height': '110%',
                        'left': '50%',
                        'transform': 'translateX(-50%)'
                    });
                };

                var items = slider.find('.item');
                var itemWidth;
                handleResize();
                $(window).resize(handleResize);

                slider.find('.carousel-inner').append('<div class="eltd-slider-peeker left"><div class="eltd-slider-peeker-inner"></div></div><div class="eltd-slider-peeker right"><div class="eltd-slider-peeker-inner"></div></div>');
                var peekers = slider.find('.eltd-slider-peeker');
                var nav_arrows = slider.find('.carousel-control');
                var nav_bullets = slider.find('.carousel-indicators > li');

                nav_arrows
                    .hover(
                        function() {
                            navArrowHover($(this), true);
                        },
                        function() {
                            navArrowHover($(this), false);
                        }
                    );

                nav_bullets
                    .hover(
                        function() {
                            navBulletHover($(this), true);
                        },
                        function() {
                            navBulletHover($(this), false);
                        }
                    );

                slider.on('slide.bs.carousel', function() {
                    setTimeout(function() {
                        peekers.addClass('eltd-slide-peek-in-progress').removeClass('shown');
                    }, 500);
                });

                slider.on('slid.bs.carousel', function() {
                    nav_arrows.filter('.hovered').each(function() {
                        navArrowHover($(this), true);
                    });
                    setTimeout(function() {
                        nav_bullets.filter('.hovered').each(function() {
                            navBulletHover($(this), true);
                        });
                    }, 200);
                    peekers.removeClass('eltd-slide-peek-in-progress');
                });
            }
        };

        var updateNavigationThumbs = function(slider) {
            if (slider.hasClass('eltd-slider-thumbs')) {
                var src, prev_image, next_image;
                var all_items_count = slider.find('.item').length;
                var curr_item = slider.find('.item').index($('.item.active')[0]) + 1;
                setPrevNextNumbers(slider, curr_item, all_items_count);

                // prev thumb
                if(slider.find('.item.active').prev('.item').length){
                    if(slider.find('.item.active').prev('div').find('.eltd-image').length){
                        src = imageRegex.exec(slider.find('.active').prev('div').find('.eltd-image').attr('style'));
                        prev_image = new Image();
                        prev_image.src = src[1];
                        //prev_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
                    }else{
                        prev_image = slider.find('.active').prev('div').find('> .eltd-video').clone();
                        prev_image.find('.eltd-video-overlay, .mejs-offscreen').remove();
                        prev_image.find('.eltd-video-wrap').width(150).height(84);
                        prev_image.find('.mejs-container').width(150).height(84);
                        prev_image.find('video').width(150).height(84);
                    }
                    slider.find('.left.carousel-control .img .old').fadeOut(300,function(){
                        $(this).remove();
                    });
                    slider.find('.left.carousel-control .img').append(prev_image).find('div.thumb-image, > img, div.eltd-video').fadeIn(300).addClass('old');

                }else{
                    if(slider.find('.carousel-inner .item:last-child .eltd-image').length){
                        src = imageRegex.exec(slider.find('.carousel-inner .item:last-child .eltd-image').attr('style'));
                        prev_image = new Image();
                        prev_image.src = src[1];
                        //prev_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
                    }else{
                        prev_image = slider.find('.carousel-inner .item:last-child > .eltd-video').clone();
                        prev_image.find('.eltd-video-overlay, .mejs-offscreen').remove();
                        prev_image.find('.eltd-video-wrap').width(150).height(84);
                        prev_image.find('.mejs-container').width(150).height(84);
                        prev_image.find('video').width(150).height(84);
                    }
                    slider.find('.left.carousel-control .img .old').fadeOut(300,function(){
                        $(this).remove();
                    });
                    slider.find('.left.carousel-control .img').append(prev_image).find('div.thumb-image, > img, div.eltd-video').fadeIn(300).addClass('old');
                }

                // next thumb
                if(slider.find('.active').next('div.item').length){
                    if(slider.find('.active').next('div').find('.eltd-image').length){
                        src = imageRegex.exec(slider.find('.active').next('div').find('.eltd-image').attr('style'));
                        next_image = new Image();
                        next_image.src = src[1];
                        //next_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
                    }else{
                        next_image = slider.find('.active').next('div').find('> .eltd-video').clone();
                        next_image.find('.eltd-video-overlay, .mejs-offscreen').remove();
                        next_image.find('.eltd-video-wrap').width(150).height(84);
                        next_image.find('.mejs-container').width(150).height(84);
                        next_image.find('video').width(150).height(84);
                    }

                    slider.find('.right.carousel-control .img .old').fadeOut(300,function(){
                        $(this).remove();
                    });
                    slider.find('.right.carousel-control .img').append(next_image).find('div.thumb-image, > img, div.eltd-video').fadeIn(300).addClass('old');

                }else{
                    if(slider.find('.carousel-inner .item:first-child .eltd-image').length){
                        src = imageRegex.exec(slider.find('.carousel-inner .item:first-child .eltd-image').attr('style'));
                        next_image = new Image();
                        next_image.src = src[1];
                        //next_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
                    }else{
                        next_image = slider.find('.carousel-inner .item:first-child > .eltd-video').clone();
                        next_image.find('.eltd-video-overlay, .mejs-offscreen').remove();
                        next_image.find('.eltd-video-wrap').width(150).height(84);
                        next_image.find('.mejs-container').width(150).height(84);
                        next_image.find('video').width(150).height(84);
                    }
                    slider.find('.right.carousel-control .img .old').fadeOut(300,function(){
                        $(this).remove();
                    });
                    slider.find('.right.carousel-control .img').append(next_image).find('div.thumb-image, > img, div.eltd-video').fadeIn(300).addClass('old');
                }
            }
        };

        /**
         * initiate slider
         * @param slider, current slider
         * @param currentItem, current slide item index
         * @param totalItemCount, total number of slide items
         * @param slideAnimationTimeout, timeout for slide change
         */
        var initiateSlider = function(slider, totalItemCount, slideAnimationTimeout) {

            //set active class on first item
            slider.find('.carousel-inner .item:first-child').addClass('active');
            //check for header style
            eltdCheckSliderForHeaderStyle($('.carousel .active'), slider.hasClass('eltd-header-effect'));
            // setting numbers on carousel controls
            if(slider.hasClass('eltd-slider-numbers')) {
                setPrevNextNumbers(slider, 1, totalItemCount);
            }
            // set video background if there is video slide
            if(slider.find('.item video').length){
                //initVideoBackgroundSize(slider);
                initVideoBackground(slider);
            }

            // update thumbs
            updateNavigationThumbs(slider);

            // initiate peek
            initPeek(slider);

            // enable link hover color for slide elements with links
            slider.find('.eltd-slide-element-wrapper-link')
                .mouseenter(function() {
                    $(this).removeClass('inheriting');
                })
                .mouseleave(function() {
                    $(this).addClass('inheriting');
                })
            ;

            //init slider
            if(slider.hasClass('eltd-auto-start')){
                slider.carousel({
                    interval: slideAnimationTimeout,
                    pause: false
                });

                //pause slider when hover slider button
                slider.find('.slide_buttons_holder .qbutton')
                    .mouseenter(function() {
                        slider.carousel('pause');
                    })
                    .mouseleave(function() {
                        slider.carousel('cycle');
                    });
            } else {
                slider.carousel({
                    interval: 0,
                    pause: false
                });
            }

            $(window).scroll(function() {
                if(slider.hasClass('eltd-full-screen') && eltd.scroll > eltd.windowHeight && eltd.windowWidth > 1024){
                    slider.carousel('pause');
                }else if(!slider.hasClass('eltd-full-screen') && eltd.scroll > slider.height() && eltd.windowWidth > 1024){
                    slider.carousel('pause');
                }else{
                    slider.carousel('cycle');
                }
            });


            //initiate image animation
            if($('.carousel-inner .item:first-child').hasClass('eltd-animate-image') && eltd.windowWidth > 1024){
                slider.find('.carousel-inner .item.eltd-animate-image:first-child .eltd-image').transformAnimate({
                    transform: "matrix("+matrixArray[$('.carousel-inner .item:first-child').data('eltd_animate_image')]+")",
                    duration: 30000
                });
            }
        };

        return {
            init: function() {
                if(sliders.length) {
                    sliders.each(function() {
                        var $this = $(this);
                        var slideAnimationTimeout = $this.data('slide_animation_timeout');
                        var totalItemCount = $this.find('.item').length;

                        checkButtonsAlignment($this);

                        setHeights($this);

                        /*** wait until first video or image is loaded and than initiate slider - start ***/
                        if(eltd.htmlEl.hasClass('touch')){
                            if($this.find('.item:first-child .eltd-mobile-video-image').length > 0){
                                var src = imageRegex.exec($this.find('.item:first-child .eltd-mobile-video-image').attr('style'));
                            }else{
                                var src = imageRegex.exec($this.find('.item:first-child .eltd-image').attr('style'));
                            }
                            if(src) {
                                var backImg = new Image();
                                backImg.src = src[1];
                                $(backImg).load(function(){
                                    $('.eltd-slider-preloader').fadeOut(500);
                                    initiateSlider($this,totalItemCount,slideAnimationTimeout);
                                });
                            }
                        } else {
                            if($this.find('.item:first-child video').length > 0){
                                $this.find('.item:first-child video').eq(0).one('loadeddata',function(){
                                    $('.eltd-slider-preloader').fadeOut(500);
                                    initiateSlider($this,totalItemCount,slideAnimationTimeout);
                                });
                            }else{
                                var src = imageRegex.exec($this.find('.item:first-child .eltd-image').attr('style'));
                                if (src) {
                                    var backImg = new Image();
                                    backImg.src = src[1];
                                    $(backImg).load(function(){
                                        $('.eltd-slider-preloader').fadeOut(500);
                                        initiateSlider($this,totalItemCount,slideAnimationTimeout);
                                    });
                                }
                            }
                        }
                        /*** wait until first video or image is loaded and than initiate slider - end ***/

                        /* before slide transition - start */
                        $this.on('slide.bs.carousel', function () {
                            $this.addClass('eltd-in-progress');
                            $this.find('.active .eltd-slider-elements-holder-frame, .active .eltd-slide-element-section-link').fadeTo(250,0);
                        });
                        /* before slide transition - end */

                        /* after slide transition - start */
                        $this.on('slid.bs.carousel', function () {
                            $this.removeClass('eltd-in-progress');
                            $this.find('.active .eltd-slider-elements-holder-frame, .active .eltd-slide-element-section-link').fadeTo(0,1);

                            // setting numbers on carousel controls
                            if($this.hasClass('eltd-slider-numbers')) {
                                var currentItem = $('.item').index($('.item.active')[0]) + 1;
                                setPrevNextNumbers($this, currentItem, totalItemCount);
                            }

                            // initiate image animation on active slide and reset all others
                            $('.item.eltd-animate-image .eltd-image').stop().css({'transform':'', '-webkit-transform':''});
                            if($('.item.active').hasClass('eltd-animate-image') && eltd.windowWidth > 1024){
                                $('.item.eltd-animate-image.active .eltd-image').transformAnimate({
                                    transform: "matrix("+matrixArray[$('.item.eltd-animate-image.active').data('eltd_animate_image')]+")",
                                    duration: 30000
                                });
                            }

                            // setting thumbnails on navigation controls
                            if($this.hasClass('eltd-slider-thumbs')) {
                                updateNavigationThumbs($this);
                            }
                        });
                        /* after slide transition - end */

                        /* swipe functionality - start */
                        $this.swipe( {
                            swipeLeft: function(){ $this.carousel('next'); },
                            swipeRight: function(){ $this.carousel('prev'); },
                            threshold:20
                        });
                        /* swipe functionality - end */

                    });

                    //adding parallax functionality on slider
                    if($('.no-touch .carousel').length){
                        var skrollr_slider = skrollr.init({
                            smoothScrolling: false,
                            forceHeight: false
                        });
                        skrollr_slider.refresh();
                    }

                    $(window).scroll(function(){
                        //set control class for slider in order to change header style
                        if($('.eltd-slider .carousel').height() < eltd.scroll){
                            $('.eltd-slider .carousel').addClass('eltd-disable-slider-header-style-changing');
                        }else{
                            $('.eltd-slider .carousel').removeClass('eltd-disable-slider-header-style-changing');
                            eltdCheckSliderForHeaderStyle($('.eltd-slider .carousel .active'),$('.eltd-slider .carousel').hasClass('eltd-header-effect'));
                        }

                        //hide slider when it is out of viewport
                        if($('.eltd-slider .carousel').hasClass('eltd-full-screen') && eltd.scroll > eltd.windowHeight && eltd.windowWidth > 1024){
                            $('.eltd-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
                        }else if(!$('.eltd-slider .carousel').hasClass('eltd-full-screen') && eltd.scroll > $('.eltd-slider .carousel').height() && eltd.windowWidth > 1024){
                            $('.eltd-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
                        }else{
                            $('.eltd-slider .carousel').find('.carousel-inner, .carousel-indicators').show();
                        }
                    });
                }
            }
        };
    };

    /**
     * Check if slide effect on header style changing
     * @param slide, current slide
     * @param headerEffect, flag if slide
     */

    function eltdCheckSliderForHeaderStyle(slide, headerEffect) {

        if($('.eltd-slider .carousel').not('.eltd-disable-slider-header-style-changing').length > 0) {

            var slideHeaderStyle = "";
            if (slide.hasClass('light')) { slideHeaderStyle = 'eltd-light-header'; }
            if (slide.hasClass('dark')) { slideHeaderStyle = 'eltd-dark-header'; }

            if (slideHeaderStyle !== "") {
                if (headerEffect) {
                    eltd.body.removeClass('eltd-dark-header eltd-light-header').addClass(slideHeaderStyle);
                }
            } else {
                if (headerEffect) {
                    eltd.body.removeClass('eltd-dark-header eltd-light-header').addClass(eltd.defaultHeaderStyle);
                }

            }
        }
    }

    /**
     * List object that initializes list with animation
     * @type {Function}
     */
    var eltdInitIconList = eltd.modules.shortcodes.eltdInitIconList = function() {
        var iconList = $('.eltd-animate-list');

        /**
         * Initializes icon list animation
         * @param list current list shortcode
         */
        var iconListInit = function(list) {
            setTimeout(function(){
                list.appear(function(){
                    list.addClass('eltd-appeared');
                },{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
            },30);
        };

        return {
            init: function() {
                if(iconList.length) {
                    iconList.each(function() {
                        iconListInit($(this));
                    });
                }
            }
        };
    };

    function eltdInitBlogCarousel(){

        var blogCarousel = $('.eltd-blog-carousel-holder');
        if(blogCarousel.length){
            blogCarousel.each(function(){

                var thisBlogCarousel = $(this).children();


                thisBlogCarousel.owlCarousel({
                    items: 1,
                    autoplay: true,
                    autoplayTimeout:3000,
                    autoplayHoverPause: true,
                    loop: true,
                    nav: false,
                    dots: true,
                    autoHeight: true,
                    smartSpeed: 800,
                    navText: [
                        '<span class="eltd-prev-icon"><i class="fa fa-angle-left"></i></span>',
                        '<span class="eltd-next-icon"><i class="fa fa-angle-right"></i></span>'
                    ],
                    onInitialized: function() {
                        thisBlogCarousel.css('visibility','visible');
                    }
                });

            });

        }

    }

    function eltdInfoBox() {
        var infoBoxes = $('.eltd-info-box-holder');

        var getBottomHeight = function(bottomHolder) {
            if(bottomHolder.length) {
                var bottomHolderHeight =  bottomHolder.find('.eltd-ib-text-holder').height() +  bottomHolder.find('.eltd-ib-button-holder').height();
                return bottomHolderHeight;
            }

            return false;
        }

        var infoBoxesHeight = function() {
            if(infoBoxes.length) {
                var maxHeight = 0;
                var heightestBox;

                infoBoxes.each(function() {
                    var infoBox = $(this),
                        bottomHolder = infoBox.find('.eltd-ib-bottom-holder'),
                        bottomHolderHeight = getBottomHeight(bottomHolder),
                        topHolder = infoBox.find('.eltd-ib-top-holder');

                    var currentHeight = bottomHolderHeight + topHolder.outerHeight();

                    maxHeight = Math.max(maxHeight, currentHeight);

                    if(maxHeight <= currentHeight) {
                        heightestBox = $(this);
                        maxHeight = currentHeight;
                    }

                    //hovers
                    if (infoBox.hasClass('eltd-interactive')) {
                        bottomHolder.css('height',0);
                        bottomHolder.css('opacity',0);

                        infoBox.mouseenter(function(){
                            bottomHolder.css('height',bottomHolderHeight);
                            bottomHolder.css('opacity',1);
                        });

                        infoBox.mouseleave(function(){
                            bottomHolder.css('height',0);
                            bottomHolder.css('opacity',0);
                        });
                    }

                });

                infoBoxes.height(maxHeight);
            }
        }

        if(infoBoxes.length) {
            infoBoxesHeight();
        }
    }

    function eltdProductListFilter(){

        var productList = $('.eltd-product-list-holder.eltd-product-list-with-filter');

        if(productList.length){
            productList.each(function(){
                eltdInitProductListMixItUp($(this));
            });
        }
    }
    
    function eltdInitProductListMixItUp(container){

        var filterItem = container.find('.eltd-product-list-filter li');

        var filterClass = filterItem.data('class');
        filterClass = '.'+filterClass;

        var holderInner = container.find('.eltd-product-list-items ');
        holderInner.mixItUp({
            callbacks: {
                onMixLoad: function(){
                    holderInner.find('li.product').css('visibility','visible');
                },
                onMixStart: function(){
                    holderInner.find('li.product').css('visibility','visible');
                },
                onMixBusy: function(){
                    holderInner.find('li.product').css('visibility','visible');
                },
                onMixEnd: function(){
                    eltd.modules.common.eltdInitParallax();
                }
            },
            selectors: {
                filter: filterClass
            }

        });
        filterItem.first().addClass('active');
    }
    
    function eltdInitVideoButton() {

        var videoButtons = $('.eltd-video-button-play');
        if ( videoButtons.length ) {
            videoButtons.each(function () {
                var videoButton = $(this);
                var changeButtonColor = function(event) {
                    event.data.button.css('color', event.data.color);
                    event.data.button.css('border-color', event.data.color);
                };

                var originalColor = videoButton.css('color');
                var hoverColor = videoButton.data('hover-color');

                videoButton.on('mouseenter', { button: videoButton, color: hoverColor }, changeButtonColor);
                videoButton.on('mouseleave', { button: videoButton, color: originalColor }, changeButtonColor);
            })
        }

    }

    /*
     **	Elements Holder responsive style
     */
    function eltdInitElementsHolderResponsiveStyle(){

        var elementsHolder = $('.eltd-elements-holder');

        if(elementsHolder.length){
            elementsHolder.each(function() {
                var thisElementsHolder = $(this),
                    elementsHolderItem = thisElementsHolder.children('.eltd-elements-holder-item'),
                    style = '',
                    responsiveStyle = '';

                elementsHolderItem.each(function() {
                    var thisItem = $(this),
                        itemClass = '',
                        largeLaptop = '',
                        smallLaptop = '',
                        ipadLandscape = '',
                        ipadPortrait = '',
                        mobileLandscape = '',
                        mobilePortrait = '';


                    if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
                        itemClass = thisItem.data('item-class');
                    }
                    if (typeof thisItem.data('1280-1600') !== 'undefined' && thisItem.data('1280-1600') !== false) {
                        largeLaptop = thisItem.data('1280-1600');
                    }
                    if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
                        smallLaptop = thisItem.data('1024-1280');
                    }
                    if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
                        ipadLandscape = thisItem.data('768-1024');
                    }
                    if (typeof thisItem.data('600-768') !== 'undefined' && thisItem.data('600-768') !== false) {
                        ipadPortrait = thisItem.data('600-768');
                    }
                    if (typeof thisItem.data('480-600') !== 'undefined' && thisItem.data('480-600') !== false) {
                        mobileLandscape = thisItem.data('480-600');
                    }
                    if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
                        mobilePortrait = thisItem.data('480');
                    }

                    if(largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

                        if(largeLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1281px) and (max-width: 1600px) {.eltd-elements-holder-item-content."+itemClass+" { padding: "+largeLaptop+" !important; } }";
                        }
                        if(smallLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1281px) {.eltd-elements-holder-item-content."+itemClass+" { padding: "+smallLaptop+" !important; } }";
                        }
                        if(ipadLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.eltd-elements-holder-item-content."+itemClass+" { padding: "+ipadLandscape+" !important; } }";
                        }
                        if(ipadPortrait.length) {
                            responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.eltd-elements-holder-item-content."+itemClass+" { padding: "+ipadPortrait+" !important; } }";
                        }
                        if(mobileLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.eltd-elements-holder-item-content."+itemClass+" { padding: "+mobileLandscape+" !important; } }";
                        }
                        if(mobilePortrait.length) {
                            responsiveStyle += "@media only screen and (max-width: 480px) {.eltd-elements-holder-item-content."+itemClass+" { padding: "+mobilePortrait+" !important; } }";
                        }
                    }
                });

                if(responsiveStyle.length) {
                    style = '<style type="text/css" data-type="kendall_elated_modules_shortcodes_eh_custom_css">'+responsiveStyle+'</style>';
                }

                if(style.length) {
                    $('head').append(style);
                }
            });
        }
    }

    var eltdReservationFormDatePicker = function() {
        var datepicker = $('.eltd-ot-date');

        if(datepicker.length) {
            datepicker.each(function() {
                $(this).datepicker({
                    prevText: '<span class="arrow_carrot-left"></span>',
                    nextText: '<span class="arrow_carrot-right"></span>'
                });
            });
        }
    };

})(jQuery);