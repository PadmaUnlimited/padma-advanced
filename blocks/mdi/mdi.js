jQuery(function($){
	
	//Font Awesome icon search + filter

	$(document).on('click', '.mdi-icon-filter-reset',function(){
		$('.icon-filter-search #icon-filter').val('');
		$('.sub-tabs-content .radio-item').show();
	});
	
	$(document).on('keyup','.mdi-icon-filter-search #icon-filter',function(){

		var string  = $(this).val();
		var options = $(this).closest('.sub-tabs-content').find('.radio-item input');
		

		if(string.length == 0){
			$(this).closest('.sub-tabs-content').find('.radio-item').show();
			return;
		}
		
		options.each(function(index){
			

			var property_id = $(this).val().toString();
			var target 		= $(this).parent();					


			if( property_id == undefined ){
				//console.log(options[index]);

			}else{
				
				if ( property_id.indexOf(string) !== -1) {

					target.removeClass('hidden');
					target.show();

				}else{
					target.addClass('hidden');
					target.hide();
				}
			}

		});
	});
})