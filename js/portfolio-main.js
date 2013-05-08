// Generated by CoffeeScript 1.6.2
(function() {
  $(function() {
    var get_proper_body_top_margin;

    get_proper_body_top_margin = function() {
      var body_height, margin_top, window_height;

      window_height = window.innerHeight;
      body_height = $('body').outerHeight();
      margin_top = 0;
      if (body_height < window_height) {
        margin_top = 3 * (window_height - body_height) / 7;
      }
      return margin_top;
    };
    if (portfolio.conf.is_home) {
      $('body').animate({
        marginTop: get_proper_body_top_margin(),
        opacity: 1.0
      }, 'slow');
    }
    if (portfolio.conf.is_singular) {
      $('#projects-trigger').toggle(function() {
        return $('#projects').slideDown('fast');
      }, function() {
        return $('#projects').slideUp('fast');
      });
    }
    return $('#main').on('click', '.projects .project-load-trigger', function() {
      return ($.get($(this).data('href'))).done(function(html) {
        $('.projects').hide();
        $('body').animate({
          marginTop: 0
        });
        $('#main').append(html);
        return $('.slide').fancybox();
      });
    }).on('click', '.back-to-projects', function() {
      $(this).closest('.single-project').remove();
      $('body').animate({
        marginTop: get_proper_body_top_margin()
      });
      return $('.projects').show();
    });
  });

}).call(this);
