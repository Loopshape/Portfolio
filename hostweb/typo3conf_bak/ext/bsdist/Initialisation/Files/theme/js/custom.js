( function($) {
    $(document).ready(function() {

        /* ------------------------------------------
         * prettyPhoto
         * ------------------------------------------ */
        /* Add prettyPhoto rel attrib to links with class 'lightbox' */
        $('a[class=lightbox]').attr('rel', 'prettyPhoto');

        /* Activate prettyPhoto lightbox/slideshow */
        $("a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'fast',   /* fast/slow/normal */
            slideshow: 5000,           /* false OR interval in ms */
            autoplay_slideshow: false,
            opacity: 0.80,
            show_title: true,
            counter_separator_label: '/',
            theme: 'light_rounded',      /* pp_default, light_rounded, light_square, dark_rounded, dark_square, facebook */
            horizontal_padding: 20,
            hideflash: false,       /* Set to TRUE if flash appears over prettyPhoto. Hides all the flash object on a page.  */
            wmode: 'opaque',        /* Set the flash wmode attribute */
            autoplay: true,         /* Automatically start videos */
            modal: false,           /* Only the close button will close the window */
            overlay_gallery: false, /* A gallery will overlay the fullscreen image on mouse over */
            social_tools: false
        });

    });
} ) ( jQuery );
