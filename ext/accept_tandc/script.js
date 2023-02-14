document.addEventListener('DOMContentLoaded', () => {
	if(Cookies.get("ui-tac-agreed") !== "true" && window.location.href.indexOf("/wiki/") == -1) {
		$("BODY").addClass("censored");
		$("BODY").append("<div class='tac_bg'></div>");
		$("BODY").append(""+
			"<div class='tac'>"+
			"<p>Cookies may be used. Please read our <a href='/wiki/pp'>privacy policy</a> for more information."+
			"<p>By accepting to enter you agree to our <a href='/wiki/rules'>rules</a> and <a href='/wiki/tos'>terms of service</a>."+
			"<p><a onclick='tac_agree();'>Agree</a> / <a href='https://reddit.com'>Disagree</a>"+
			"</div>"+
		"");
	}
});

function tac_agree() {
	Cookies.set("ui-tac-agreed", "true", {path: '/', expires: 365});
	$("BODY").removeClass("censored");
	$(".tac_bg").hide();
	$(".tac").hide();
}