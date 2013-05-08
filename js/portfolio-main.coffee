$ ()->
    get_proper_body_top_margin = ()->
        window_height = window.innerHeight
        body_height = $('body').outerHeight()
        margin_top = 0
        if body_height < window_height
            margin_top = 3 * (window_height - body_height) / 7

        return margin_top

    if portfolio.conf.is_home
        $('body').animate
            marginTop: get_proper_body_top_margin(),
            opacity: 1.0
        , 'slow'

    if portfolio.conf.is_singular
        # show/hide project list
        $('#projects-trigger').toggle ()->
            $('#projects').slideDown 'fast'
        , ()->
            $('#projects').slideUp 'fast'

    $('#main').on 'click', '.projects .project-load-trigger', ()->
        ($.get $(this).data 'href').done (html)->
            $('.projects').hide()
            $('body').animate
                marginTop: 0

            $('#main').append html
            # enable fancybox
            $('.slide').fancybox()
    .on 'click', '.back-to-projects', ()->
        $(this).closest('.single-project').remove()
        $('body').animate
            marginTop: get_proper_body_top_margin()
        $('.projects').show()
