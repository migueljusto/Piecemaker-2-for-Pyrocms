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
					order.push( $(this).find('input[name="id_file"]').val() );
				});
				order = order.join(',');
				
			   $.post(SITE_URL + 'piecemaker/ajax/ajax_update_files_order', {order: order ,id_piece: $('input[name="id_piecemaker"]').val() }, function(data) {					
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
	
	
	
 

// Pick a rule file type, and show filds remove others
$('input[name="file_type"]').live('change', function(){		
	jQuery.ajax({
		dataType: "text",
		type: "POST",
		data:  { data : $(this).val() , id_piece : $('input[name="id_piecemaker"]').val() },
		url:  SITE_URL + 'piecemaker/ajax/build_form',
		success: function(returned_html){
			jQuery('.fild_input').remove();
			jQuery('.form_inputs > ul').append(returned_html);
			pyro.chosen();
		}
	});
// Trigger default checked
}).filter(':checked').change();





	
})(jQuery);



