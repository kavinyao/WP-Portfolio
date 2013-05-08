$ ()->
    if portfolio.conf.is_singular
        # show/hide project list
        $('#projects-trigger').toggle ()->
            $('#projects').slideDown 'fast'
        , ()->
            $('#projects').slideUp 'fast'

        # enable fancybox on single page
        $('.slide').fancybox()
