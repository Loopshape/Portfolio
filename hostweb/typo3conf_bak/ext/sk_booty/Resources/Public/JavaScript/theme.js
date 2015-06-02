$(document).ready(function() {
    // The maximum number of options
    var MAX_OPTIONS = 5;
	var i = 0;
    $('#registerForm')
        // Add button click handler
        .on('click', '.addButton', function() {
			if (i < 5) {
            var $template = $('#optionTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template),
                $option   = $clone; //.find('[name="option[]"]');

            // Add new field
			
				i++;
            	$('#registerForm').bootstrapValidator('addField', $option);
				
			} else {
				$('.addButton').addClass('hide');
			}
        })

        // Remove button click handler
       .on('click', '.removeButton', function() {
            var $row    = $(this).parents('.form-group'),
                $option = $row.find('[name="option[]"]');

            // Remove element containing the option
            $row.remove();

            // Remove field
            $('#registerForm').bootstrapValidator('removeField', $option);
        })

        // Called after adding new field
        .on('added.field.bv', function(e, data) {
            // data.field   --> The field name
            // data.element --> The new field element
            // data.options --> The new field options

            if (data.field === 'option[]') {
                if ($('#registerForm').find(':visible[name="option[]"]').length >= MAX_OPTIONS) {
                    $('#registerForm').find('.addButton').attr('disabled', 'disabled');
                }
            }
        })

        // Called after removing the field
        .on('removed.field.bv', function(e, data) {
           if (data.field === 'option[]') {
                if ($('#registerForm').find(':visible[name="option[]"]').length < MAX_OPTIONS) {
                    $('#registerForm').find('.addButton').removeAttr('disabled');
                }
            }
        });
		
		$.fn.datepicker.dates['de'] = {
			days: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag"],
			daysShort: ["Son", "Mon", "Die", "Mit", "Don", "Fre", "Sam", "Son"],
			daysMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"],
			months: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
			monthsShort: ["Jan.", "Feb.", "März", "April", "Mai", "Juni", "Juli", "Aug.", "Sep.", "Okt.", "Nov.", "Dez."],
			today: "Heute",
			clear: "Löschen"
		};

        $.fn.datepicker.dates['fr'] = {
            days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
            daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"],
            daysMin: ["Di", "Mo", "Ma", "Me", "Je", "Ve", "Sa", "Di"],
            months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juni", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
            monthsShort: ["Jan.", "Fev.", "Mars", "Avril", "Mai", "Juni", "Jui.", "Août", "Sep.", "Oct.", "Nov.", "Déc."],
            today: "Aujourd'hui",
            clear: "Effacer"
        };

        $.fn.datepicker.dates['it'] = {
            days: ["Domenica", "Lunedi", "Martedì", "Mercoledì", "Giovedi", "Venerdì", "Sabato", "Domenica"],
            daysShort: ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab", "Dom"],
            daysMin: ["Do", "Lu", "Ma", "Me", "Gi", "Ve", "Sa", "Do"],
            months: ["Gennaio", "Febbraio", "Mars", "Aprile", "Maggio", "Juni", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "December"],
            monthsShort: ["Gen.", "Feb.", "Mars", "Aprile", "Maggio", "Juni", "Lug.", "Agosto", "Set.", "Ott.", "Nov.", "Dec."],
            today: "Oggi",
            clear: "Cancellare"
        };

        var theLanguage = $('html').attr('lang');
        if (theLanguage != "fr" && theLanguage != "it") {
            theLanguage = "de";
        }
		$('.datepicker input').datepicker({
			format: "dd.mm.yyyy",
			language: theLanguage,
			multidate: false,
			autoclose: true,
			weekStart: 1
		});


        $('.country').change(
            function() {
                var selValue = $('.country option:selected').val();
                //alert(selValue);
                if (selValue == "Schweiz" || selValue == "Suisse" || selValue == "Svizzera" || selValue == "Switzerland") {
                    $(".countryUnhide").removeClass("hidden");
                    $('.state').val("");
                    $('.state option[value="-"]').remove();
                    $('.state option:first').attr('selected','selected');
                } else {
                    $(".state option:last").after($('<option value="-">-</option>'));
                    $('.state option').removeAttr('selected');
                    $('.state option[value="-"]').attr('selected','selected');
                    $(".countryUnhide").addClass("hidden");
                }
            }
        );

		$('.htcountry').change(
			function() {
				var selValue = $('.htcountry option:selected').val();
				//alert(selValue);
				if (selValue == "Schweiz" || selValue == "Suisse" || selValue == "Svizzera" || selValue == "Switzerland") {
                    $(".htcountryUnhide").removeClass("hidden");
					$('.htstate').val("");
					$('#htzip').val("");
					$('#htcity').val("");
                    $('.htstate option[value="-"]').remove();
                    $('.htstate option:first').attr('selected','selected');
				} else {
					$('#htzip').val("0000");
					$('#htcity').val("-");
                    $(".htstate option:last").after($('<option value="-">-</option>'));
                    $('.htstate option').removeAttr('selected');
                    $('.htstate option[value="-"]').attr('selected','selected');
                    $(".htcountryUnhide").addClass("hidden");
				}
			}
		);

    // SET STARTVALUES FOR COUNTRY
    var selValue = $('.country option:selected').val();
    if (selValue == "Schweiz" || selValue == "Suisse" || selValue == "Svizzera" || selValue == "Switzerland") {
        $(".countryUnhide").removeClass("hidden");
        $('.state option[value="-"]').remove();
    } else if (selValue != '') {
        $(".state option:last").after($('<option value="-">-</option>'));
        $('.state option').removeAttr('selected');
        $('.state option[value="-"]').attr('selected','selected');
        $(".countryUnhide").addClass("hidden");
    }
    var selValue = $('.htcountry option:selected').val();
    if (selValue == "Schweiz" || selValue == "Suisse" || selValue == "Svizzera" || selValue == "Switzerland") {
        $(".htcountryUnhide").removeClass("hidden");
        $('.htstate option[value="-"]').remove();
    } else if (selValue != '') {
        $(".htstate option:last").after($('<option value="-">-</option>'));
        $('.htstate option').removeAttr('selected');
        $('.htstate option[value="-"]').attr('selected','selected');
        $(".htcountryUnhide").addClass("hidden");
    }

    $('#centername').blur(function() {
			if ($('#centername2').val() == '') {
			  $('#centername2').val($('#centername').val());
			}
		});

});