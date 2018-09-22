function onSubmitListen(id) {
	alert(id);
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('count-' + id).innerHTML =
                this.responseText;
        }
    };
    //xhttp.open("GET", "update_ndownloads.php?type=" + type + "&id=" + id + "&name=" + name, true);
    xhttp.send();
    
}