function sendToBackend(route, data, resp = '', mode = 'single') {

    data = {
        "route": route,
        "data": data
    };

    var xhr = new XMLHttpRequest();
    var url = "api-recievers-json.php?data=" + JSON.stringify(data);
    if(resp != '' & mode == 'single')
    {
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.getElementById(resp).innerHTML =
                    this.responseText;
            }
        };
    }
    else if(mode == 'multi')
    {
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                php_response = JSON.parse(this.responseText);
                console.log(php_response);
                resp.forEach(key => {
                    document.getElementById("ui_" + key).innerHTML =
                    php_response[key];
                });

                
            }
        };
    }
    console.log(data);
    xhr.open("GET", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();

}