function popupOpen(){
    document.getElementById("form-tambah").style.display = "block";
    document.getElementById("form-block").style.display = "block";
}
function popupClose(){
        window.location.href = ".php";
}
$(document).ready(function(){
    $('#table-datatable').DataTable();
});
