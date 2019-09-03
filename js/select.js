$(document).ready(function() {
	$.viewMap = {
		'transmitters' : $('#transmitters'),
		'layer2' : $('#layer2'),
		'layer3' : $('#layer3'),
		'printers' : $('#printers'),
	};
	
	$('#viewSelector').change(function() {
		$.each($.viewMap, function() { this.hide(); });
		
		$.viewMap[$(this).val()].show();
		
	});
	
});