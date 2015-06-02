			      jQuery(window).load(function() {
			      				     jQuery("#status").fadeOut();
			      				     jQuery("#preloader").delay(1000).fadeOut("slow");
							     })$(document).on('replace', 'img', function() {jQuery(document).foundation('equalizer', 'reflow');});
$('.orbit-slider').on('replace.fndtn.interchange', 'img', function(e, new_path, original_path) {
	var self = $(this);
	self.foundation('orbit').trigger('resize');
	if(self.height() > 30) {
		self.off(e);
	}
});
$(document).foundation();