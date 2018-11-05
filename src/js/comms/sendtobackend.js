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