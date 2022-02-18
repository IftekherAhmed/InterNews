$(function() {
	
	//Menu toggler
	$("#menu_toggler").on('click', function() {
		$("#NavBar").slideToggle(300);
		$(this).find(".fa-bars").toggleClass("fa-times");
	});
	
	//Menu toggler on list
	$("#menu_list_hide").on('click', function() {
		$("#NavBar").slideToggle(300);
		$("#menu_toggler").find(".fa-bars").toggleClass("fa-times");
	});
	
	//Dropdown menu toggler
	$("#sub_menu_toggler").on('click', function() {
		$(".fa-angle-down").toggleClass("fa-angle-up");
		$(".dropdown-menu").slideToggle();
	});
	
	//add post box toggler
	$("#add_data_btn, #close_data_btn, #close_data").on('click', function() {
		$("#add_data_box").toggle(300);
		$("#data_list_box").toggle(300);
		$("#add_data_btn").fadeToggle(300);
		$("#close_data_btn").fadeToggle(300);
	});
	
	//tooltip
	$('.top-tooltip').tooltip({
		placement: 'top'
	});
	$('.bottom-tooltip').tooltip({
		placement: 'bottom'
	});
	$('.left-tooltip').tooltip({
		placement: 'left'
	});
	$('.right-tooltip').tooltip({
		placement: 'right'
	});
	
	//popover
	$('[data-toggle="popover"]').popover({
		//trigger: 'focus',
		trigger: 'hover',
		html: true,
		content: function() {
			return '<h4 class="news-popover-header">' + $(this).data('header') + '</h4>' + '<img class="img-fluid my-2" src="' + $(this).data('img') + '" />' + '<p class="news-popover-text">' + $(this).data('desc') + '</p>';
		}
	})
		
	// Preview Before Image upload 
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
	
	// One click checked all checkbox
	$("#check_all_checkbox").on('click', function() {
		$('.checkbox_check_uncheck').not(this).prop('checked', this.checked);
	});
});