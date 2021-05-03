// filemanager show image selected
$('#filemanager').on('hidden.bs.modal', function () {
    var image = $('#image').val();
    $('#img-show').attr('src', image);
});

$('#filemanager-list').on('hidden.bs.modal', function () {
    var images = $('#image-list').val();
    var _html = '';
    var check = images.indexOf(",");
    if (check !== -1) {
        var imgList = $.parseJSON(images);
        for (let i = 0; i < imgList.length; i++) {
            _html += `<div class="col-md-3 img-thumbnail">
                        <img class="img-fluid" src="${imgList[i]}">
                     </div>`;
        }
    } else {
        _html += `<div class="col-md-3 img-thumbnail">
                    <img class="img-fluid" src="${images}">
                 </div>`;
    }

    $('#img-show-list').html(_html);

});
