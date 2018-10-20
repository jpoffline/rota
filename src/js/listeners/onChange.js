

onChangeListen = function(WhichModel, WhichId)
{
	if(WhichModel == 'rota')
	{
		if(document.getElementById(WhichId).checked)
		{
			newState = '1';
		}
		else
		{
			newState = '0';
		}
		sendToBackend(
			'updateRotaAvail',
			{
				'updateDate': WhichId,
				'newState' : newState
			}
		)

	}
	else if(WhichModel == 'rota-memberskill')
	{
		if(document.getElementById(WhichId).checked)
		{
			newState = '1';
		}
		else
		{
			newState = '0';
		}
		sendToBackend(
			'updateMemberSkill',
			{
				'updateSkill': WhichId,
				'newState' : newState
			}
		)
	}
}

onClickRotaResource = function(id)
{
	element = document.getElementById(id);
	
	if(element.parentElement.parentElement.classList.contains('editable-row'))
	{
		element.classList.toggle("active");
		/*
		icon = to_icon('check');
		if(element.classList.contains("active"))
		{
			element.innerHTML = icon + ' ' + element.innerHTML;
		}
		else
		{
			element.innerHTML = element.innerHTML.replace(icon + ' ','');
		}*/
		//element.classList.toggle("fa fa-check");
		console.log(element);
		//console.log(element.getElementById(id+'-icon'));
		
		
		
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

getDropdownValue = function(id)
{
	return getSelectedOption(document.getElementById(id)).value;
}

dropDownChange = function(id)
{
	var selection = getSelectedOption(document.getElementById(id));
	/*alert(
		selection.value
	);*/
}

onChange_rotaid = function(id)
{
	var selection = getSelectedOption(document.getElementById(id));
	var rotaid = selection.value;
	sendToBackend(
        'getPeriodsForRotaid',
        {
			'rotaid':rotaid,
			'dropdown_id':'selection_periods'
        },
        'dd_periods_for_rota'
    );
}

getSelectedOption = function(sel){
	var opt;
	for ( var i = 0, len = sel.options.length; i < len; i++ ) {
		opt = sel.options[i];
		if ( opt.selected === true ) {
			return opt;
		}
	}
	return opt;
}