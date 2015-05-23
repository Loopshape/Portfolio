$(document).on('ready', function () {
	var $table = $('table');
	var $btn_export = $('#btn-export');
	$btn_export.on('click', function () {
		$table.tableExport({type:'excel',escape:'false'});
	});
});