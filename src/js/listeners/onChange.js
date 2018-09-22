

onChangeListen = function(WhichModel, WhichId)
{
	if(WhichModel == 'rota')
	{
		var items = WhichId.split('-');
		var rotaid = items[0];
		var periodid = items[1];
		var userid = items[2];
		var dateid = items[3];
		var availid = items[4];
		alert('ROTA CHANGE: ' + WhichId);
	}
	//alert(WhichModel);
}

onClickRotaResource = function(id)
{
	element = document.getElementById(id);
	if(element.parentElement.parentElement.classList.contains('editable-row'))
	{
	element.classList.toggle("active");
	icon = to_icon('check');
	if(element.classList.contains("active"))
	{
		element.innerHTML = icon + ' ' + element.innerHTML;
	}
	else
	{
		element.innerHTML = element.innerHTML.replace(icon + ' ','');
	}

	if(element.classList.contains("btn-info"))
	{
		element.classList.replace("btn-info", "btn-sucess");
	}
	else if(element.classList.contains("btn-sucess"))
	{
		element.classList.replace("btn-sucess", "btn-info");
	}
}

}

onClickActiveRow = function(id)
{
	element = document.getElementById(id);
	element.parentElement.parentElement.classList.toggle('table-warning');
	element.parentElement.parentElement.classList.toggle('editable-row');
}
