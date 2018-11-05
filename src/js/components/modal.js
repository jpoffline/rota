
function showModal(id)
{
    var modalid = id.split('-')[0];
    var modal = document.getElementById(modalid);

    // Get the <span> element that closes the modal
    var span = document.getElementById("modal-close-" + modalid);

    // When the user clicks the button, open the modal 
    console.log(modalid);
    modal.style.display = "block";
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    
}

