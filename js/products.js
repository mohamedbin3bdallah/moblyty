$(document).ready(function(){
	$("#cityid").change(function() {
		var table = $(this).attr('table');
		var field = $(this).attr('field');
		var val = $(this).val();
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {
				'table': table,
				'field': field,
				'val': val,
			},
			url:'ajaxs/getselectoptions.php',
			success: function (response) { document.getElementById("showid").innerHTML = response; document.getElementById("departmentid").innerHTML = '<option value="">اختر</option>'; }
		});		
	});
});

$(document).ready(function(){
	$("#showid").change(function() {
		var table = $(this).attr('table');
		var field = $(this).attr('field');
		var val = $(this).val();
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {
				'table': table,
				'field': field,
				'val': val,
			},
			url:'ajaxs/getselectoptions.php',
			success: function (response) { document.getElementById("departmentid").innerHTML = response; }
		});		
	});
});

$(document).ready(function(){
	$(".productimgdel").click(function() {
		var id = $(this).attr('id');
		var path = $(this).attr('path');

		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'path': path,
			},
			url:'ajaxs/deleteproductimage.php',
			success: function (response) { $("#productimgdel-"+id).hide(); }
		});		
	});
});

$(document).ready(function(){
	$(".message").show(function() {
		$("#"+$(this).attr('type')).modal('show');
		setTimeout(function() { $("#"+$(this).attr('type')).modal('hide'); }, 3000);		
	});
});

$(document).ready(function(){
	$(".del").click(function() {
		var id = $(this).attr('id');
		$("#del-"+id).modal('show');
		
	});
});

function mydelete(id,field,currenttable,childtable)
{
	$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'id': id,
		'field': field,
		'currenttable': currenttable,
		'childtable': childtable,
		},
		url:'ajaxs/delete.php',
		success: function (response) {
			if(response == 1)
			{
				$("#tr-"+id).hide();
				$("#success").modal('show');
				setTimeout(function() { $("#success").modal('hide'); }, 3000);
			}
			else
			{
				$("#cantdelete").modal('show');
				setTimeout(function() { $("#cantdelete").modal('hide'); }, 3000);
			}
		}
	});
}