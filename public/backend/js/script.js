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

alertify.defaults = {
    // dialogs defaults
    autoReset: true,
    basic: false,
    closable: true,
    closableByDimmer: true,
    invokeOnCloseOff: false,
    frameless: false,
    defaultFocusOff: false,
    maintainFocus: true, // <== global default not per instance, applies to all dialogs
    maximizable: true,
    modal: true,
    movable: true,
    moveBounded: false,
    overflow: true,
    padding: true,
    pinnable: true,
    pinned: true,
    preventBodyShift: false, // <== global default not per instance, applies to all dialogs
    resizable: true,
    startMaximized: false,
    transition: 'pulse',
    transitionOff: false,
    tabbable: 'button:not(:disabled):not(.ajs-reset),[href]:not(:disabled):not(.ajs-reset),input:not(:disabled):not(.ajs-reset),select:not(:disabled):not(.ajs-reset),textarea:not(:disabled):not(.ajs-reset),[tabindex]:not([tabindex^="-"]):not(:disabled):not(.ajs-reset)',  // <== global default not per instance, applies to all dialogs

    // notifier defaults
    notifier: {
        // auto-dismiss wait time (in seconds)
        delay: 5,
        // default position
        position: 'top-right',
        // adds a close button to notifier messages
        closeButton: false,
        // provides the ability to rename notifier classes
        classes: {
            base: 'alertify-notifier',
            prefix: 'ajs-',
            message: 'ajs-message',
            top: 'ajs-top',
            right: 'ajs-right',
            bottom: 'ajs-bottom',
            left: 'ajs-left',
            center: 'ajs-center',
            visible: 'ajs-visible',
            hidden: 'ajs-hidden',
            close: 'ajs-close'
        }
    },

    // language resources
    glossary: {
        // dialogs default title
        title: 'Application said:',
        // ok button text
        ok: 'OK',
        // cancel button text
        cancel: 'Cancel'
    },

    // theme settings
    theme: {
        // class name attached to prompt dialog input textbox.
        input: 'ajs-input',
        // class name attached to ok button
        ok: 'btn btn-default',
        // class name attached to cancel button
        cancel: 'ajs-cancel'
    },
    // global hooks
    hooks: {
        // invoked before initializing any dialog
        preinit: function (instance) {
        },
        // invoked after initializing any dialog
        postinit: function (instance) {
        },
    },
};
(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})()
$(document).ready(function () {
    $('.form-action').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);

        //Update content ckedittor
        // for ( instance in CKEDITOR.instances ) {
        //     CKEDITOR.instances[instance].updateElement();
        // }

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    alertify.success(response.message);
                    window.location.href = response.redirect;
                } else alertify.error(response.message);
            },
            error: function (xhr) {
                let err = JSON.parse(xhr.responseText);
                $.each(err.errors, function (field_name, error) {
                    if (field_name) {
                        form.find('[error-for=' + field_name + ']').text(error);
                        form.find('input[name=' + field_name + ']').addClass('is-invalid');
                    }
                })
            }
        });
    })

    $('.form-login').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    alertify.success(response.message);
                    window.location.href = response.redirect;
                } else alertify.error(response.message);
            },
            error: function (xhr) {
                let err = JSON.parse(xhr.responseText);
                $.each(err.errors, function (field_name, error) {
                    form.find('[error-for=' + field_name + ']').text(error);
                });
            }
        });
    });

    $('.js-search-form').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    $(form.data('container')).html(response.data);
                } else alertify.error('Error!');
            },
            error: function (xhr) {
                alertify.error('Error!');
            }
        });
    });

    $('.btn_delete').on('click', function (e) {
        let btn = $(this);

        alertify.confirm('Bạn có muốn xóa không?', function () {
            $.ajax({
                url: btn.attr('action'),
                type: 'delete',
                success: function (response) {
                    if (response.status) {
                        alertify.success(response.message);
                        setTimeout(location.reload.bind(location), 1500);
                    } else alertify.error(response.message);
                }
            });
        });
    })

    $('.js-status-switch').on('change', function (e) {
        let btn = $(this);
        let status = this.checked ? 1 : 0;
        let action = btn.attr('action');

        $.ajax({
            action: action,
            url: btn.attr('action'),
            type: 'patch',
            dataType: 'json',
            data: {status: status},
            success: function (response) {
                if (response.status) {
                    alertify.success(response.message);
                    btn.parent().siblings().children('.reply-comment').toggleClass('d-none');
                } else {
                    alertify.error(response.message);
                }
            }
        });
    });

    // Reply Comment
    $('.btn-reply-comment').on('click', function () {
        var btn = $(this);
        let url = btn.attr('action');
        let comment_id = btn.data('comment_id');
        let product_id = btn.data('product_id');
        let comment = btn.siblings('textarea').val();

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {comment_id: comment_id, product_id: product_id, reply_comment: comment,},
            success: function (response) {
                if (response.status) {
                    alertify.success(response.message);
                    btn.siblings('textarea').val('');
                } else {
                    alertify.error(response.message);
                }
            },
            error: function (xhr) {
                let err = JSON.parse(xhr.responseText);
                $.each(err.errors, function (field_name, error) {
                    btn.siblings('[error-for=' + field_name + ']').text(error);
                })
            }
        });
    });

});



