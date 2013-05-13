$ ()->
    get_proper_body_top_margin = ()->
        window_height = window.innerHeight
        body_height = $('body').outerHeight()
        margin_top = 0
        if body_height < window_height
            margin_top = 3 * (window_height - body_height) / 7

        return margin_top

    if portfolio.conf.is_singular
        # show/hide project list
        $('#projects-trigger').toggle ()->
            $('#projects').slideDown 'fast'
        , ()->
            $('#projects').slideUp 'fast'

    $('#main').on 'click', '.projects .project-load-trigger', (e)->
        e.preventDefault()

        url = $(this).attr 'href'
        slug = $(this).data 'slug'

        ($.get url).done (html)->
            # change hash for readability
            location.hash = "#!/#{slug}"

            $('.projects').hide()
            $('body').animate
                marginTop: 0

            $('#main').append html
            # enable fancybox
            $('.slide').fancybox()
    .on 'click', '.back-to-projects', ()->
        # revert hash
        location.hash = '#'

        $(this).closest('.single-project').remove()
        $('body').animate
            marginTop: get_proper_body_top_margin()
        $('.projects').show()

    if portfolio.conf.is_home
        # handle hash on initial load
        hash = location.hash.trim()
        if hash.substring(0, 3) == '#!/'
            slug = hash.substring(3)
            $the_post = $(".projects .project-load-trigger[data-slug=#{slug}]")
            if $the_post.length
                $the_post.click()

    if portfolio.conf.is_singular
        # enable fancybox on single page
        $('.slide').fancybox()
