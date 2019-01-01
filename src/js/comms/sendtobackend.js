
/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: sendtobackend.js
CREATED:  2019/01/01
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */

function api_filename(){
    return 'api-recievers-json.php';
}

function sendToBackend(
    route, 
    data, 
    resp = '', 
    mode = 'single'
){

    data = {
        "route": route,
        "data": data
    };
    
    var url = api_filename() + "?data=" + JSON.stringify(data);

    var xhr = new XMLHttpRequest();
    
    if(resp != '' & mode == 'single')
    {
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
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
                resp.forEach(key => {
                    document.getElementById("ui_" + key).innerHTML =
                    php_response[key];
                });

                
            }
        };
    }
    xhr.open("GET", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();

}