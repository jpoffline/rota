function onSubmitListen(type, id) {
    alert(type + id);
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

function sendToBackend(route, data) {

    data = {
        "route": route,
        "data": data
    };

    var xhr = new XMLHttpRequest();
    var url = "api-recievers-json.php?data=" + JSON.stringify(data);
    xhr.open("GET", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();

}