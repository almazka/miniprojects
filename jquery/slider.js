$(document).ready(function() {
	var imglength = $(".view").find("img").length;
	var current = 1;
	var imgW = 400;
	var totalImgsW = imgW * imglength;
	var onul = $(".view").css("overflow","hidden").children("ul");
	$("#show").show();
	$("#show button").on("click",function() {
		var id = $(this).attr("id");
		var pos = imgW;
		(id == "next") ? ++current : --current;
		if (current == 0) {
			current = imglength;
			id = "next";
			position = totalImgsW - imgW;
		} else if (current-1 == imglength) {
			current = 1;
			pos = 0;
		}
		doIt(onul,pos,id);
		});
	function doIt(elem,pos,id) {
			var sign;
			if (id && pos != 0) {
				sign = (id == "next") ? "-=" : "+=";
			}
			var shift = {"margin-left": sign ? (sign+pos) : pos};
			var duration = {};
			if (pos == 0 || pos == imgW*(imglength-1)) {
				duration = {duration:0};
			}
			elem.animate(shift, duration);
		}

});