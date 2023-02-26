(function($) {
    'use strict';

    var woocommerce = {};
    eltd.modules.woocommerce = woocommerce;

    woocommerce.eltdInitQuantityButtons = eltdInitQuantityButtons;
    woocommerce.eltdInitSelect2 = eltdInitSelect2;

    woocommerce.eltdOnDocumentReady = eltdOnDocumentReady;
    woocommerce.eltdOnWindowLoad = eltdOnWindowLoad;
    woocommerce.eltdOnWindowResize = eltdOnWindowResize;
    woocommerce.eltdOnWindowScroll = eltdOnWindowScroll;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    $(window).scroll(eltdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
        eltdInitQuantityButtons();
        eltdInitSelect2();
        eltdInitDropdownCartPosition();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdOnWindowLoad() {
        eltdfInitButtonLoading();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdOnWindowResize() {
        eltdInitDropdownCartPosition();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdOnWindowScroll() {

    }
    

    function eltdInitQuantityButtons() {

        $(document).on( 'click', '.eltd-quantity-minus, .eltd-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.parent().siblings('.eltd-quantity-input'),
                step = parseFloat(inputField.attr('step')),
                max = parseFloat(inputField.attr('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('eltd-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(1);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }
            inputField.trigger( 'change' );
        });

    }

    function eltdInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length ||  $('#calc_shipping_country').length ) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });

            $('#calc_shipping_country').select2();

        }

        if($('.variations_form select').length){
            $('.variations_form select').select2({
                minimumResultsForSearch: Infinity
            });
        }

    }

    function eltdInitDropdownCartPosition() {

        var dropdownOpeners = $('.widget_eltd_woocommerce_dropdown_cart:not(.eltd-right-from-main-menu-widget-dual) .eltd-shopping-cart-widget');
        if ( dropdownOpeners.length ) {
            dropdownOpeners.each(function () {
                var dropdownOpener = $(this),
                    dropdown = dropdownOpener.children('.eltd-shopping-cart-dropdown'),
                    distance = $(window).width() - dropdownOpener.offset().left - dropdownOpener.width() - 33;  //33 px is for padding on vertical align containers
                dropdown.css({
                    '-webkit-transform':'translateX('+distance+'px)',
                    '-moz-transform':'translateX('+distance+'px)',
                    'transform':'translateX('+distance+'px)'
                });
            });
        }

        var dropdownOpenersDual = $('.widget_eltd_woocommerce_dropdown_cart.eltd-right-from-main-menu-widget-dual .eltd-shopping-cart-widget');
        if ( dropdownOpenersDual.length ) {
            dropdownOpenersDual.each(function () {
                var dropdownOpenerDual = $(this),
                    dropdown2 = dropdownOpenerDual.children('.eltd-shopping-cart-dropdown'),
                    distance2 = dropdown2.width() - 33;  //33 px is for padding on vertical align containers
                dropdown2.css({
                    '-webkit-transform':'translateX('+distance2+'px)',
                    '-moz-transform':'translateX('+distance2+'px)',
                    'transform':'translateX('+distance2+'px)'
                });
            });
        }

    }

    function eltdfInitButtonLoading() {
        $('.add_to_cart_button').click(function(){
            $(this).addClass("adding-to-cart");

            $(document).on('DOMNodeInserted', function(e) {
                setTimeout(function(){
                    $('.added_to_cart').addClass("eltd-appear");
                }, 10);
            });

        });
    }


})(jQuery);