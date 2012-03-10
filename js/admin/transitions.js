(function($)
{
	$(function() {

		$('table tbody').sortable({
			handle: 'td',
			helper: 'clone',
			start: function(event, ui) {
				$('tr').removeClass('alt');
			},
			update: function() {
				order = new Array();
				$('tr', this).each(function(){
					order.push( $(this).find('input[name="id_trans"]').val() );
				});
				order = order.join(',');
				
				$.post(SITE_URL + 'piecemaker/ajax/ajax_update_transitions_order', { order: order ,id_piece : $('input[name="id_piecemaker"]').val() }, function(data) {					
					$('tr').removeClass('alt');
					$('tr:even').addClass('alt');
				});
			},
			stop: function(event, ui) {
				$("tbody tr:nth-child(even)").livequery(function () {
					$(this).addClass("alt");
				});
			}
			
		}).disableSelection();
		
	});
	
	
	
})(jQuery);	

