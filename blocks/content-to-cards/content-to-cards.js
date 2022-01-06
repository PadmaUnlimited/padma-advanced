jQuery(document).ready(function(event){
	var projectsContainer = jQuery('.ve-card-posts-container'),		
		triggerNav = jQuery('.cd-nav-trigger'),
		logo = jQuery('.cd-logo');
	
	triggerNav.on('click', function(){
		if( triggerNav.hasClass('project-open') ) {
			//close project
			projectsContainer.removeClass('project-open').find('.selected').removeClass('selected').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				jQuery(this).children('.ve-card-post-info').scrollTop(0).removeClass('has-boxshadow');

			});
			triggerNav.add(logo).removeClass('project-open');
		}
	});

	projectsContainer.on('click', '.single-post', function(){
		var selectedProject = jQuery(this);		
		//open project
		selectedProject.addClass('selected');
		projectsContainer.add(triggerNav).add(logo).addClass('project-open');
	});

	projectsContainer.on('click', '.ve-card-scroll', function(){
		//scroll down when clicking on the .ve-card-scroll arrow
		var visibleProjectContent =  projectsContainer.find('.selected').children('.ve-card-post-info'),
			windowHeight = jQuery(window).height();

		visibleProjectContent.animate({'scrollTop': windowHeight}, 300); 
	});

	//add/remove the .has-boxshadow to the project content while scrolling 
	var scrolling = false;
	projectsContainer.find('.ve-card-post-info').on('scroll', function(){
		if( !scrolling ) {
		 	(!window.requestAnimationFrame) ? setTimeout(updateProjectContent, 300) : window.requestAnimationFrame(updateProjectContent);
		 	scrolling = true;
		}
	});

	function updateProjectContent() {
		var visibleProject = projectsContainer.find('.selected').children('.ve-card-post-info'),
			scrollTop = visibleProject.scrollTop();
		( scrollTop > 0 ) ? visibleProject.addClass('has-boxshadow') : visibleProject.removeClass('has-boxshadow');
		scrolling = false;
	}
});