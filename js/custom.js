(function ($, Drupal, window, document, undefined) {

    Drupal.behaviors.fwbc = {
        attach: function (context, settings) {
            $(document).ready(function () {
                $('#newsletterContent .newsletterStories .box').append('<span class="corner" />');
                $('#pager ul li:last').addClass('last');
                $('#footer .footer-menu:first').addClass('first');
                $('#mainMenu li:last').parents('li').addClass('last');

                $('.addthis_button_compact').live('focus', function () {
                    setTimeout(function () {
                        var n = 1;
                        $('#at15s a').each(function () {
                            $(this).attr('tabindex', n++);
                        });
                    }, 500)
                })

                $('#mainMenu > li').each(function () {
                    var first = $(this).find('a:first');
                    var last = $(this).find('a:last');
                    first.live('focus', function () {
                        $(this).parents('li').addClass('focus');
                    })
                    last.live('focusout', function () {
                        $(this).parents('li').removeClass('focus');
                    })
                })

                // Subnav
                $('#subNav ul.secondLevel,#subNav ul.thirdLevel,#subNav ul.fourthLevel,#subNav ul.fifthLevel').parent('li').children('a').addClass('closed');
                $('#subNav a.active').parent('li').parent('ul').show();
                $("#subNav li.selected").children("a").addClass("active");
                $("#subNav li.selected").parents("ul").siblings("a").addClass("open");
                $("#subNav li.selected").children('a').addClass("open");
                $("#subNav li").children("ul").hide();
                $("#subNav li.selected").children("ul").show();
                $("#subNav li.selected").parents("ul").show();
                $("#subNav li.selected a:last-child").children('span').hide();

                // Resize Text
                $('#pageTools a').click(function () {
                    if (this.id == 'bigTextIcon') {
                        $(this).addClass('selected');
                        $("#smallTextIcon").removeClass('selected');
                        $("#mediumTextIcon").removeClass('selected');
                        $('.contentBox, .contentBox input, .contentBox select, .contentBox textarea').css('font-size', '16px');
                        $('.contentBox p').css('line-height', '25px');
                        $('.contentBox p').css('font-size', '16px');
                        $('.contentBox h1').css('font-size', '26px');
                        $('.contentBox h2').css('font-size', '20px');
                        $('.contentBox h3').css('font-size', '20px');
                        $('.contentBox h4').css('font-size', '16px');
                        return false;
                    }
                    else if (this.id == 'mediumTextIcon') {
                        $(this).addClass('selected');
                        $("#smallTextIcon").removeClass('selected');
                        $("#bigTextIcon").removeClass('selected');
                        $('.contentBox, .contentBox input, .contentBox select, .contentBox textarea').css('font-size', '14px');
                        $('.contentBox p').css('line-height', '22px');
                        $('.contentBox p').css('font-size', '14px');
                        $('.contentBox h1').css('font-size', '24px');
                        $('.contentBox h2').css('font-size', '18px');
                        $('.contentBox h3').css('font-size', '18px');
                        $('.contentBox h4').css('font-size', '15px');
                        return false;
                    }
                    else if (this.id == 'smallTextIcon') {
                        $(this).addClass('selected');
                        $("#mediumTextIcon").removeClass('selected');
                        $("#bigTextIcon").removeClass('selected');
                        $('.contentBox, .contentBox input, .contentBox select, .contentBox textarea').css('font-size', '12px');
                        $('.contentBox p').css('line-height', '18px');
                        $('.contentBox p').css('font-size', '12px');
                        $('.contentBox h1').css('font-size', '22px');
                        $('.contentBox h2').css('font-size', '15px');
                        $('.contentBox h3').css('font-size', '15px');
                        $('.contentBox h4').css('font-size', '14px');
                        return false;
                    }
                });


                // Tabs
                if ($('#pager').size() > 0) {
                    var tabs = new ddtabcontent("pager");
                    tabs.setpersist(false);
                    tabs.setselectedClassTarget("link"); //"link" or "linkparent"
                    tabs.init(5000);
                }

                $('a#pauseBtn').toggle(
                    function () {
                        $(this).addClass('paused');
                        tabs.cancelautorun();
                    },
                    function () {
                        $(this).removeClass('paused');
                        tabs.autorun();
                        tabs.init(5000);
                    }
                );

                if ($('#tabs').size() > 0) {
                    var tabs2 = new ddtabcontent("tabs");
                    tabs2.setpersist(true);
                    tabs2.setselectedClassTarget("link"); //"link" or "linkparent"
                    tabs2.init();
                }

                // Contact Form
                $('.webform-client-form select').each(function () {
                    if ($(this).find('option').eq(0).val() == '-' || $(this).find('option').eq(0).val() == '-- Please Select --') {
                        $(this).find('option').eq(0).val('');
                    }
                });

                // Legal Cases
                $('.filter-item').click(function () {
                    var allrel = $(this).attr('class').split(' ');
                    $('input[rel=\'' + allrel[1] + '\']').removeAttr('checked');
                });
                $('.filter-all').click(function () {
                    $('.' + $(this).attr('rel')).removeAttr('checked');
                });
                $('#update-results').click(function () {
                    $('#' + $(this).attr('rel')).submit();
                    return false;
                });
                $('#reset-selection').click(function () {
                    $('#' + $(this).attr('rel') + ' input[type=\'text\']').val('');
                    $('#' + $(this).attr('rel') + ' input[type=\'radio\']').removeAttr('checked');
                    $('#' + $(this).attr('rel') + ' input[type=\'checkbox\']').removeAttr('checked');
                    $('#' + $(this).attr('rel') + ' input.filter-all').attr('checked', 'checked');
                    return false;
                });
                $('#newsletter-signup-box form').attr('action', '');
            });

            // Header main serch
            function search_presubmit() {
                var kv = $('#searchBox').val();
                if (kv == 'Search this site...') {
                    $('#searchBox').val('');
                }
            }

            // Search sort
            function search_sort_by() {
                var fval = $('#search-filter-sortby').val();
                var sorder = 'DESC';
                if (fval == 'title') {
                    sorder = 'ASC';
                }
                $('#search-filter-sortorder').val(sorder);
            }
        }
    };


})(jQuery, Drupal, this, this.document);
