function popupOpen(){
    document.getElementById("form-tambah").style.display = "block";
    document.getElementById("form-block").style.display = "block";
}
function popupClose(head) {
    if (head) {
        window.location.href = head + ".php";
    } else {
        document.getElementById("form-tambah").style.display = "none";
        document.getElementById("form-block").style.display = "none";
    }
}
$(document).ready(function(){
    $('#table-datatable').DataTable();
});
