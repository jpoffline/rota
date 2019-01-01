
/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: onSubmit.js
CREATED:  2019/01/01
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


function onSubmitListen(type, id) {
    alert(type + id);
}

function onSubmitSaveRotaOptions(id)
{
    var items = id.split('-');
    var rota = items[0];
    var periodid = items[1];
    var table = document.getElementById('compiled-'+id);
    
    var tds = table.getElementsByTagName("td");

    var activeCells = [];
    for(var node in tds){
        nn = tds[node];

        if(nn.innerHTML)
        {
            if(nn.innerHTML != '-')
            {
                btns = nn.getElementsByTagName('button');
                if(btns.length > 0)
                {
                    for(var i = 0; i < btns.length; i++)
                    {
                        if(btns[i].classList.contains("active"))
                        {
                            activeCells.push({'id':btns[i].id});
                        }
                    }
                }
            }
        }
        
    }
    console.log("TODO: pass these active cells onto backend to process");
    console.log(activeCells);
    
}

function addRotaName(id) {
    var newName      = document.getElementById('newRotaName').value;
    var newGroupName = document.getElementById('newRotaGroupName').value;

    sendToBackend(
        'newRota',
        {
            'newName': newName,
            'newGroupName': newGroupName
        }
    );
}

function addPeriodToRota(id) {
    var newName = document.getElementById('newPeriodName').value;
    var rotaid  = getDropdownValue('addperiod_rotaid');
    
    sendToBackend(
        'newPeriodForRota',
        {
            'newPeriodName': newName,
            'rotaId': rotaid
        }
    );
}



function showRotaCompiled()
{
    var rotaid   = getDropdownValue('selection_rotas');
    var periodid = getDropdownValue('selection_periods');
    sendToBackend(
        'showCompiledRota',
        {
            'rotaid':rotaid,
            'periodid':periodid
        },
        'area_compiledRotaView'
    );
}

function showUserAvailabilityOptions()
{
    var rotaid   = getDropdownValue('selection_rotas');
    var periodid = getDropdownValue('selection_periods');
    
    sendToBackend(
        'showUserAvailabilityOptions',
        {
            'userid': 1,
            'rotaid':rotaid,
            'periodid':periodid
        },
        [
            'username' ,
            'rotatype',
            'periodname',
            'numavailabledays',
            'useravailabilityopts',
            'btnuserskills',
            'mdluserskills'
        ],
        'multi'
    );
}