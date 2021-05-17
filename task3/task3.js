
var output_html = "";

function getfilename(file){
    if(file){
        $("#saveuploaded").show();
    }else{
        $("#saveuploaded").hide();
    }
}

function uploadfile(){
    $('#form_upload_user').attr('action', '/task3/upload.php');
    $('#form_upload_user').submit();
}
