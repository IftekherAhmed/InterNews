$(function() {
	$("#sidebarCollapse").click(function() {
		$('#sidebar').toggleClass('active');
		// On click sidebar toggler the toggler icon will be changed
		$(this).find(".fa-align-center").toggleClass("fa-align-left");
	});
});