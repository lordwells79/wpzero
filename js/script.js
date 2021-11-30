/*
 * jQuery theme functions file
 * https://github.com/lordwells79/wpzero
 *
 * Copyright 2021, RCL
 * Licensed under MIT license
 * https://opensource.org/licenses/mit-license.php
 */
jQuery.noConflict()(function ($) {
  "use strict";
  $(document).ready(function () {
    $(".wpzero-carousel").owlCarousel({
      nav: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 3,
        },
      },
    });
  });
});
