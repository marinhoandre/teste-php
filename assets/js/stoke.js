function aumentar_estoque(id, url)
{
	url_up = url+'product/up';

	$.ajax({
		url: url_up,
		type: 'POST',
		data: {id:id},
		dataType: 'json',
		async: true,
		success: function (dataReturn) {
			window.location = url+"product";
		}
	});
	return false;
}

function reduzir_estoque(id, url)
{
	url_up = url+'product/down';

	$.ajax({
		url: url_up,
		type: 'POST',
		data: {id:id},
		dataType: 'json',
		async: true,
		success: function (dataReturn) {
			window.location = url+"product";
		}
	});
	return false;
}