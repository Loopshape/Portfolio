/**
 * Object for handling event and their actions
 *
 * @type {Object} Media
 */
window.Media = {

	parameterPrefix: 'tx_media_user_mediam1',

	/**
	 * Fetch the form and handle its action
	 *
	 * @param {string} url where to send the form data
	 * @return void
	 */
	handleForm: function (url) {
		Vidi.Panel.showForm();
		$.ajax({
			url: url,
			success: function (data) {
				Media.setContent(data);
			}
		});
	},

	/**
	 * Update the content on the GUI.
	 *
	 * @param {string} data
	 * @return void
	 */
	setContent: function (data) {

		// replace content
		var content;
		$.each(['header', 'body', 'footer'], function (index, value) {
			// @bug filter() only find the first element after tag body...
			//var content = $(data).filter('#content-middle');

			// find method will remove the outer tag
			content = $(data).find('#content-' + value).html();

			if (content.length > 0) {
				$('.ajax-response-' + value).html(content);
			}
		});
	}
};
