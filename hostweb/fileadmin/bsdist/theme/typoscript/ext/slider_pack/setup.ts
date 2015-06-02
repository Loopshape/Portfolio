
plugin.tx_sliderpack {
	#view {
	#    partialRootPaths.110 = fileadmin/bsdist/theme/tmpl/sliderpack/Partials/
	#}
	settings {

        sliderPresets {

            # --- FlexSlider2 ---
            #
            flexslider2 {
                #maxWidth = 1140
                config {
                    animation = slide
                }
            }


            # --- RefineSlide ---
            #
            refineslide {
                config {
                    #maxWidth = 600
                }
            }


            # --- CarouFredSel ---
            #
            caroufredsel {
                config {
                    items {
                        #width = 233
                        #height = 155
                        #visible = 4
                    }
                }
            }
            caroufredsel-slider {
                config {
                    #items.width = 600
                    #items.height = 400
                }
            }
        }
	}
}