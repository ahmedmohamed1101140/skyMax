$('#meter02').tooltip();

$('.unionPencil').on('click', function() {

	var getMeterValue = $(this).attr("data-edit-target");
	if ($('#' + getMeterValue).attr("contenteditable") === 'false') {
		$('#' + getMeterValue).attr("contenteditable", "true").addClass("meterEditable");
		$(this).children().addClass("fa-save text-success");
		$(this).children().removeClass('fa-pencil');

	} 
	else {
		if (isNaN($('#' + getMeterValue).text())){
			$("#validationText").removeClass('displayNone');
			$("#validationText").addClass("fadeIn");
		}
		else if ($('#' + getMeterValue).text() == null){
			$("#validationText").removeClass('displayNone');
			$("#validationText").addClass("fadeIn");
			$("#validationText").text("Your entry is blank!")
		}
		else {
			/*
				Insert before meterValue
			*/
			//$('#' + getMeterValue).parent().html("<span class=\"saved\">Saved!</span>");
			
			$("#validationText").addClass('displayNone');
			$('#' + getMeterValue).attr("contenteditable", "false").removeClass("meterEditable");
			$(this).children().addClass("fa-pencil");
			$(this).children().removeClass('fa-save text-success');
			}
	}

});

var maxLength = 20;

$('span').keydown(function(event) {
	if ($(this).text().length === maxLength && event.keyCode !== 8 && event.keyCode !== 39 && event.keyCode !== 37 && event.keyCode !== 16 && event.keyCode !== 65){
		event.preventDefault();
		//$(this).trim(8);
	}
	
	else if (event.keyCode === 190){
		/*debugger;
		console.log($(this).text().count('.'));
		if ($(this).text().count('.') > 2){
			event.preventDefault();
		}*/
	}
	
	else if (event.keyCode === 13){
		//automatic save soon
		event.preventDefault(); //prevent newline from breaking textbox
	}
});

//prevent pasting
$('span').bind("paste",function(e) {
		//2
		//e.preventDefault();
});
