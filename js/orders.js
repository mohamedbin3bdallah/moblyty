$(document).ready(function(){
	$(".checkdelivered").change(function() {
    if(this.checked) { 
		var delivered = 1;
		var id = $(this).attr('id');
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'id': id,
			'delivered': delivered,
			},
			url:'ajaxs/checkdelivered.php',
			success: function (response) {
				if(response == 1) { document.location.href = 'admin.php?c=orders'; }
				else $(".checkdelivered").removeAttr('checked');
			}
		});
	}
});
});