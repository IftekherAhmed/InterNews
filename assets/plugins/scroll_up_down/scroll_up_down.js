$(function() {
	$("#scrollup").click(function () {
		$("body,html").animate({
			scrollTop: 0
		}, 600);
	});
	
	$("#scrolldown").click(function () {
		$("body,html").animate({
			scrollTop: $(document).height()
		}, 600);
	});

	$(window).scroll(function () {
		if ($(window).scrollTop() > 300) {
			$("#scrollup").addClass("visible");
			$("#scrolldown").addClass("visible");
		} else {
			$("#scrollup").removeClass("visible");
			$("#scrolldown").removeClass("visible");
		}
	});
	
});