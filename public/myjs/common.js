$(document).on('change', '._img_thumb_input', function() {
    $('#imgExtError').remove();
    var file = $(this).get(0).files[0];
    var name = file.name;
    var re = /(?:\.([^.]+))?$/;
    var ext = re.exec(name)[1];
    if (ext == 'jpg' || ext == 'JPG' || ext == 'jpeg' || ext == 'JPEG' || ext == 'png' || ext == 'PNG') {
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $("._img_thumb_preview").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    } else {
        $('._img_thumb_input').val('');
        $('.customInput').append('<span id="imgExtError" style="color:red;">Invalid File Type( Image )</span>');
    }
});