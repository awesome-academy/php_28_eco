$("div.alert").delay(4000).slideUp();

function accessDelete(message)
{
	if (window.confirm(message)) {
		return true;
	}
	return false;
}

$(document).ready(function() {
	$('a#del_img').on('click', function() {
		var url = "http://localhost:8000/admin/product/del-image/";
		var _token = $("form[name='formEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find('img').attr('idHinh');
		var img = $(this).parent().find('img').attr('src');
		var key = $(this).parent().find('img').attr('id');
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			case: false,
			data: {"_token":_token, "idHinh":idHinh, "urlHinh":img},
			success: function(data) {
				if (data == "Oke") {
					$("#"+key).remove();
				} else {
					alert('Error !');
				}
			}
		});
	});
});

$(document).ready(function() {
	$('#cate_parent').change(function() {
		var cate_parent = $(this).val();
		$.get("admin/product/create/"+cate_parent, function(data) {
			$("#category_id").html(data);
		});
	});
});

$('#upload_file').click(function() {
	$('#file').trigger('click');
});

$('#upload_file_detail').click(function() {
	$('#file_detail').trigger('click');
});
