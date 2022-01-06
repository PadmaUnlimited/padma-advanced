(function( $ ) {
	'use strict';
	/**	
	 * Tabs control
	 */
	$(document).on('click', '#padma-settings-tabs-wrapper a', function () {

		$('#padma-settings-tabs-wrapper a').removeClass('active');
		$(this).addClass('active');

		var target = $(this).data('target');
		$('.padma-settings-wrap .tab-content').removeClass('active');
		$('.padma-settings-wrap .tab-content.target-' + target).addClass('active');
		localStorage['padma-advanced-active-tab'] = target;

	})

	/**	
	 * Open or close at start
	*/
	$(document).ready(function(){
		for (var i = 0; i < localStorage.length; i++) {
			var key = localStorage.key(i);
			if (key.indexOf('padma-advanced') !== -1 ){
				
				var cls = localStorage.getItem(localStorage.key(i));
				var item = $('#' + key.replace('padma-advanced-', ''));

				if(cls == 'closed'){
					item.removeClass('open');
					item.addClass('closed');
				}else{
					item.addClass('open');
					item.removeClass('closed');
				}

				// Tabs
				if (key == 'padma-advanced-active-tab'){
					
					var target = localStorage.getItem(localStorage.key(i));

					$('#padma-settings-tabs-wrapper a').removeClass('active');
					$('#padma-settings-tab-' + target ).addClass('active');
					
					$('.padma-settings-wrap .tab-content').removeClass('active');
					$('.padma-settings-wrap .tab-content.target-' + target).addClass('active');
				}
			}
			
		}
	})

	/*
		Toggle admin fields
	*/
	$(document).on('click', 'button.handlediv, .padma-box .title', function () {
		
		var box = $(this).closest('.padma-box');
		var box_id = box.attr('id')

		if( box.hasClass('closed') ){
			box.removeClass('closed');
			localStorage['padma-advanced-' + box_id] = 'open';
		}else{
			box.addClass('closed');
			localStorage['padma-advanced-' + box_id] = 'closed';

		}

	})


	/*
		Toggle block description
	*/
	$(document).on('click', '.padma-advanced-list-item', function () {

		var box = $(this);

		if( box.hasClass('active') ){
			box.removeClass('active');			
		}else{
			box.addClass('active');
		}
	})


	/**
	 *
	 * Filter per categorie
	 *
	 */
	 $(document).on('click','.block-type-selector-filter-categories li a',function(){
		
		var categorie = $(this).data('filter');
		
		$('.block-type-selector-filter-categories li a').removeClass('active');
		
		if(categorie == 'all'){			
			$('.block-type-selector-filter-categories li:first-child a').addClass('active');			
			$('.padma-advanced-list-item').show();
		}else{			
			$(this).addClass('active');
			$('.padma-advanced-list-item').hide();
			$('.padma-advanced-list-item.filter-' + categorie).show();			
		}
		
		
	});


})( jQuery );
