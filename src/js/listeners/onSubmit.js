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
    console.log(activeCells);
    
}

function addRotaName(id) {
    var newName = document.getElementById('newRotaName').value;
    var newGroupName = document.getElementById('newRotaGroupName').value;

    sendToBackend(
        'newRota',
        {
            'newName': newName,
            'newGroupName': newGroupName
        }
    );
}

function sendToBackend(route, data, resp = '') {

    data = {
        "route": route,
        "data": data
    };

    var xhr = new XMLHttpRequest();
    var url = "api-recievers-json.php?data=" + JSON.stringify(data);
    if(resp != '')
    {
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(resp).innerHTML =
                    this.responseText;
            }
        };
    }
    console.log(data);
    xhr.open("GET", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();

}

function showRotaCompiled()
{
    var rotaid = getDropdownValue('selection_rotas');
    var periodid = getDropdownValue('selection_periods');
    //document.getElementById('area_compiledRotaView').innerHTML = "<b>HI</b>";
    //alert(rotaid + periodid);
    sendToBackend(
        'showCompiledRota',
        {
            'rotaid':rotaid,
            'periodid':periodid
        },
        'area_compiledRotaView'
    );
}