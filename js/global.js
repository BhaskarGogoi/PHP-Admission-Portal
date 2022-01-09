

let viewPassword = false;
function changePwdView() {
	let getPwdView =  document.getElementById("passwordView");

	if (viewPassword === false) {
		getPwdView.setAttribute("type", "text");
		viewPassword = true;
	} 
	else if (viewPassword === true) {
		getPwdView.setAttribute("type", "password");
		viewPassword = false;
	} 
}

//scrollToTop
jQuery("#backtotop").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }
});
