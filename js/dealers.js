$(document).ready(function(){
	$(".del").click(function() {
		var id = $(this).attr('id');
		$("#del-"+id).modal('show');
		showproducts(id);
	});
});

function showproducts(id)
{
	$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'id': id,
		},
		url:'ajaxs/showuserproducts.php',
		success: function (response) { document.getElementById("modal-body-"+id).innerHTML = response; }
	});
}