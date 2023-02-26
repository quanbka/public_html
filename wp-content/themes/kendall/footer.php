<div id="custom_html-2" class="widget_text widget eltd-footer-column-4 widget_custom_html">
    <div class="textwidget custom-html-widget">
        <div>
            <div class="ppocta-ft-fix">
                <a id="messengerButton" href="https://www.facebook.com/101860728184920/"
                    onclick="gtag_report_conversion()" target="_blank" rel="noopener">
                </a><a id="calltrap-btn" onclick="gtag_report_conversion()"
                    class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet" href="tel:0935311111">
                </a><a id="zaloButton" onclick="gtag_report_conversion()" href="https://zalo.me/935311111">
                </a>
            </div>
        </div>
        <style type="text/css" media="all">
            .ppocta-ft-fix {
                display: inline-grid;
                position: fixed;
                bottom: 40%;
                right: 0;
                min-width: 60px;
                text-align: center;
                z-index: 99999;
            }

            .ppocta-ft-fix a:nth-child(1) {
                border-radius: 16px 0 0 0;
            }

            .ppocta-ft-fix a:last-child {
                border-radius: 0 0 0 16px;
            }

            #messengerButton {
                display: inline-block;
                position: relative;
                width: 60px;
                height: 60px;
                background: #696969 url("https://shop.shopbay.vn/wp-content/plugins/mk-contact/images/m-fb.png") center center no-repeat;
                box-shadow: 0 4px 8px 0 rgba(129, 129, 129, 0.2);
            }

            @media (max-width: 767px) {
                a#messengerButton:hover span {
                    display: none;
                }
            }

            #zaloButton {
                display: inline-block;
                position: relative;
                width: 60px;
                height: 60px;
                background: #696969 url("https://shop.shopbay.vn/wp-content/plugins/mk-contact/images/zalo.png") center center no-repeat;
            }

            @media (max-width: 767px) {
                a#zaloButton:hover span {
                    display: none;
                }
            }

            #registerNowButton {
                display: inline-block;
                position: relative;
                height: 60px;
                width: 60px;
                box-shadow: 0px 0px 10px -2px rgba(0, 0, 0, 0.7);
                background: #696969 url("https://shop.shopbay.vn/wp-content/plugins/mk-contact/images/mail.png") center center no-repeat;
            }

            #calltrap-btn {
                display: block;
                height: 60px;
                line-height: 100px;
                text-align: center;
                width: 60px;
                z-index: 9999;
                position: relative;
                background: #181818 url("https://shop.shopbay.vn/wp-content/plugins/mk-contact/images/phone-call.png") no-repeat center center;
            }

            .ppocta-ft-fix a span {
                font-size: 13px;
                color: #fff;
                text-align: center;
                line-height: 1.3;
                margin-top: 54px;
                display: block;
            }

            .ppocta-ft-fix a#zaloButton span {
                margin-top: 45px;
            }

            .ppocta-ft-fix a {
                background-position-y: 18px !important;
            }

            .ppocta-ft-fix a:hover {
                text-decoration: none;
            }

            @media (max-width: 767px) {
                .ppocta-ft-fix {
                    bottom: 5%;
                }

                a#calltrap-btn:hover span {
                    display: none;
                }

                a#registerNowButton:hover span {
                    display: none;
                }

                .ppocta-ft-fix {
                    min-width: unset;
                }

                .ppocta-ft-fix a {
                    width: 50px !important;
                    height: 50px !important;
                }

                .ppocta-ft-fix a span {
                    display: none !important;
                }
            }
        </style>

        <div id="fb-root"></div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    xfbml: true,
                    version: 'v10.0'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <div class="fb-customerchat" attribution="page_inbox" page_id="101860728184920">
        </div>
    </div>
</div>


<?php 

do_action('kendall_elated_get_footer_template');