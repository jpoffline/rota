

onChangeListen = function(WhichModel, WhichId)
{
	if(WhichModel == 'rota')
	{
		var items = WhichId.split('-');
		//alert('ROTA CHANGE: ' + items[0] + items[1] + items[2] + items[3]);
	}
	//alert(WhichModel);
}

onClickRotaResource = function(id)
{
	//alert(id);
	element = document.getElementById(id);
	element.classList.toggle("active");
	if(element.classList.contains("active"))
	{
		element.innerHTML = '<i class="fa fa-check"></i> ' + element.innerHTML;
	}
	else
	{
		element.innerHTML = element.innerHTML.replace('<i class="fa fa-check"></i> ','');
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