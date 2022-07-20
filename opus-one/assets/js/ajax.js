$(document).ready(function () {
    // /*
    // @TODO: AJAX à ranger
    //  */

    // // ScrollTop au chargement
    // $(window).scrollTop(0);

    // // Récupération de la window
    // window_width = $(window).width();

    // host = "https://"+window.location.hostname;

    // var processing = false;
    // if ($('[data-ajax-action="next_month"]').length > 0) {
    //     let isTaxo = false;
    //     let term_id = null;

    //     if($('[data-ajax-option="taxonomy"]').length > 0) {
    //         isTaxo = true;
    //         term_id = $('[data-ajax-option="taxonomy"]').data('ajax-term-id');
    //     }
    //     $(window).scroll(function () {
    //         if ($(window).scrollTop() >= $(document).height() - $(window).height() - $('footer').height() - 400) {
    //             scroll_position = $(document).scrollTop();
    //             if (processing)
    //                 return false;
    //             next_year = $(".next_request").last().attr("data-next-year");
    //             next_month = $(".next_request").last().attr("data-next-month");
    //             next_request = parseInt(next_year + next_month);
    //             last_request = parseInt($(".next_request").last().attr("data-last-date"));
    //             if (next_request <= last_request) {
    //                 processing = true;

    //                 /*  @TODO : Add loader */
    //                 $(".loader-agenda").addClass("loading");

    //                 $.ajax({
    //                     type: 'GET',
    //                     url: host + '/wp-content/themes/opus-one/ajax.php',
    //                     data: {action: 'next_months', month_to_show: next_month, year_to_show: next_year, isTaxo: isTaxo, term_id: term_id}
    //                 }).done(function (data) {
    //                     n = data.indexOf("one-month")
    //                     if (n >= 0) {
    //                         $(".next-dates").append(data);
    //                         filter = $(".dropdown-filters li.selected").attr("data-filter");
    //                         if (filter) {
    //                             $(".next-month .show").not("." + filter).addClass("hide");
    //                             $(".one-month").each(function () {
    //                                 nb_element = $(this).children("." + filter).length;
    //                                 if (nb_element == 0) {
    //                                     $(this).addClass("hide");
    //                                 } else {
    //                                     $(this).removeClass("hide");
    //                                 }
    //                             });
    //                         }
    //                         $('.agenda-item').matchHeight();
    //                         if (window_width >= 768) {
    //                             $('.match').matchHeight();
    //                         } else {
    //                             $('.match-xs').matchHeight();
    //                         }
    //                         $(document).scrollTop(scroll_position);
    //                         height_new_element = $(".next-dates .next-month").eq(0).height() + $(".next-dates .next-month").eq(1).height();
    //                         if (height_new_element > $(window).height()) {
    //                             var $root = $('html, body');
    //                             height_header_agenda = $("header").outerHeight() + $(".top-page-agenda").outerHeight();
    //                             $root.animate({
    //                                 scrollTop: $(".next-dates .next-month").eq(0).offset().top - height_header_agenda
    //                             }, 500);
    //                         }
    //                         $(".loader-agenda").removeClass("loading");
    //                         $(".next-month .show-all-btn").on("click", function () {
    //                             btn = $(this);
    //                             if ($(this).hasClass("open")) {
    //                                 $(this).closest('.show').children(".multidates-container").removeClass("open");
    //                                 setTimeout(function () {
    //                                     btn.removeClass("open");
    //                                 }, 500);
    //                             } else {
    //                                 $(this).closest('.show').children(".multidates-container").addClass("open");
    //                                 $(this).addClass("open");
    //                             }
    //                         });
    //                         if (window_width >= 768) {
    //                             position = 'left';
    //                         } else {
    //                             position = 'bottom-left';
    //                         }
    //                         $(".next-month").addClass("load").removeClass("next-month");
    //                         processing = false;
    //                     } else {
    //                         $(".next-dates").append(data);
    //                         $(".loader-agenda").removeClass("loading");
    //                         processing = false;
    //                     }
    //                 });
    //             }
    //         }
    //     });
    // }
})