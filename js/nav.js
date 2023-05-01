$(document).ready(function() {
  $(window).scroll(function() {
    var navbar = $('.navbar');
    var navbarOffset = navbar.offset().top;
    var navbarHeight = navbar.outerHeight(true);
    var scrollTop = $(this).scrollTop();

    $('.section').each(function() {
      var section = $(this);
      var sectionOffset = section.offset().top;
      var sectionHeight = section.outerHeight(true);

      if (scrollTop >= sectionOffset - navbarHeight && scrollTop < sectionOffset + sectionHeight) {
        if (section.css('background-color') == navbar.css('color')) {
          navbar.addClass('inverted');
        } else {
          navbar.removeClass('inverted');
        }
      }
    });
  });
});
