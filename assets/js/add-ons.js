(function ($) {
  $(document.body).on("click", ".events-posts-filter", function () {
    let menu = $(this).find("ul");
    let icon = $(this).find("svg");
    menu.toggleClass("active");
    icon.toggleClass("active");
  });
  //AJAX

  let eventRequest;

  $(document.body).on("date_event_ajax_request", function (e) {
    let $formMadness = $("#form-date");
    url = $formMadness.attr("action") + "?" + $formMadness.serialize();
    $(document.body).trigger("event_filter_ajax_request", url);
    console.log(url);
  });
  $(document.body).on("madness_ajax_request", function (e) {
    let $formMadness = $("#form-events_madness");
    url = $formMadness.attr("action") + "?" + $formMadness.serialize();
    $(document.body).trigger("event_filter_ajax_request", url);
    console.log(url);
  });

  $(document.body).on(
    "click",
    ".event_filter_block a, .events-posts-filter a",
    function (e) {
      e.preventDefault();
      url = $(this).attr("href");

      $(document.body).trigger("event_filter_ajax_request", url);
    }
  );
  $(document.body).on("event_filter_ajax_request", function (e, url, element) {
    console.log(url);
    let $content = $("#content-wrap");

    //
    let sortingFilter = $(".events-posts-filter");
    let contentBlock = $("#content");
    let sidebarContainer = $("#right-sidebar-inner");
    $("#content").addClass("ajax-on");
    if (url.slice(-1) == "?") {
      url = url.slice(0, -1);
    }
    url = url.replace(/%2C/, ",");
    if (eventRequest) {
      eventRequest.abort();
    }
    history.pushState(null, null, url);
    $.get(
      url,
      function (res) {
        console.log(res);
        // $content.replaceWith($(res).find("#content-wrap"));
        sortingFilter.replaceWith($(res).find(".events-posts-filter"));
        contentBlock.replaceWith($(res).find("#content"));
        sidebarContainer.replaceWith($(res).find("#right-sidebar-inner"));
        $("#content").removeClass("ajax-on");
      },
      "html"
    );
  });
  //gmaps
  $("#form-gmap-search").on("submit", function (e) {
    e.preventDefault();
    url = $(this).attr("action") + "?" + $(this).serialize();
    $(document.body).trigger("event_filter_ajax_request", url);
  });
})(jQuery);
