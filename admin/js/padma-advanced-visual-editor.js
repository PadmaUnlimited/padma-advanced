(function( $ ) {
	$( document ).on( 'click', 'pre.language-php', function(params) {
		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
		} else {
			$(this).addClass('active');
		}
	});

})( jQuery );
