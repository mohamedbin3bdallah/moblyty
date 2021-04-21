$(document).ready(function(){
	$(".del").click(function() {
		var id = $(this).attr('id');
		$("#del-"+id).modal('show');
		showorders(id);
	});
});

function showorders(id)
{
	$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'id': id,
		},
		url:'ajaxs/showuserorders.php',
		success: function (response) { document.getElementById("modal-body-"+id).innerHTML = response; }
	});
}