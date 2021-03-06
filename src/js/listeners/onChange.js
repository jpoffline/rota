
/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: onChange.js
CREATED:  2019/01/01
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


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
		//element.classList.toggle("active");
		element.classList.toggle("activeusr");
		console.log(id);
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

getSelectedOption = function(sel)
{
	var opt;
	for ( var i = 0, len = sel.options.length; i < len; i++ ) {
		opt = sel.options[i];
		if ( opt.selected === true ) {
			return opt;
		}
	}
	return opt;
}