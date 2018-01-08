var toasts = [];
var toastid = 0;
function toast( message, options ) {
	
	toastid++;
	toasts.push(toastid);
	setTimeout(function() {
		var id = toasts.shift();
		$("#"+id).animate({
			opacity: "0"
		}, 400, function() {
			$(this).remove();
		});
	}, 3000);
	
	var clas = "";
	if ( options.color ) {
		clas = options.color;
	}
	
	var t = '<div id="'+toastid+'" class="toast '+clas+'"><span class="text">'+message+'</span></div>';
	$("#toast").append(t);
	
}