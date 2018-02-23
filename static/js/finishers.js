function get_question(value) {
    // alert(value);
    $.ajax({
        type: "GET",
        url: "get_sec_question.php",
        data: "choice="+value,
        success: function(data){
            $('#s_question').val(data);
        }
    })
}
