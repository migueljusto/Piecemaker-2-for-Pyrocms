(function($) {

			$(function(){
				// generate a slug when the user types a title in
				pyro.generate_slug('input[name="title"]', 'input[id="slug"]');		
			});
})(jQuery);	
			
jQuery(document).ready(function() {		
	
$('.colorpickerField').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	},
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#colorSelector div').css('backgroundColor', '#' + hex);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});

})(jQuery);	
		
	

