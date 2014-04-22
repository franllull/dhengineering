jQuery(function($){

	var postType = $('#post-formats-select').children('input:checked').val();
	$( 'label[for*="' + postType + '"]' ).closest('.rwmb-field').fadeIn();

	$('#post-formats-select').children('input').change( function() {
		var postType = $(this).val();
		if ( postType == 0 ) {
			$('#post_format_options .rwmb-field').fadeOut();
		}
		$( 'label[for*="' + postType + '"]' ).closest('.rwmb-field').siblings('.rwmb-field').hide();
		$( 'label[for*="' + postType + '"]' ).closest('.rwmb-field').fadeIn();
	});

	$('#title').on("change keyup paste", function(){
		$('#ss_page_title').val( $(this).val() );
	});

	$('#rs-validation-wrapper').parent().remove();
	$('#benefitsbutton').parent().remove();

});