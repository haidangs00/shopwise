$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.form-action').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    swal({
                        title: response.message,
                        icon: "success",
                    });
                    $(document).on('click', function () {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        } else location.reload();
                    });
                } else
                    swal({
                        title: response.message,
                        icon: "error",
                    });

            },
            error: function (response) {
                let err = JSON.parse(response.responseText);
                $.each(err.errors, function (field_name, error) {
                    form.find('[error-for=' + field_name + ']').text(error);
                })
            }
        });
    });

    $('.btn-add-cart').on('click', function (e) {
        e.preventDefault();
        let btn = $(this);

        $.ajax({
            url: btn.attr('href'),
            type: 'get',
            success: function (response) {
                swal({
                    title: response.message,
                    icon: "success",
                });
                window.setTimeout(function () {
                    window.location.href = response.redirect;
                }, 2000);
            },
            error: function (response) {
                swal("Đã có lỗi xảy ra, vui lòng thử lại sau!", {
                    icon: "error",
                });
            }
        });
    });

    $('.btn-delete').on('click', function (e) {
        let btn = $(this);

        swal({
            title: "Bạn có muốn xóa sản phẩm không?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: btn.attr('action'),
                        type: 'get',
                        success: function (response) {
                            swal({
                                title: response.message,
                                icon: "success",
                            });
                            $(document).on('click', function () {
                                if (response.redirect) {
                                    window.location.href = response.redirect;
                                } else location.reload();
                            });
                        },
                        error: function (response) {
                            swal("Xóa sản phẩm không thành công!", {
                                icon: "error",
                            });
                        }
                    });
                }
            });
    });

    $('.btn-heart').on('click', function (e) {
        e.preventDefault();
        let btn = $(this);

        $.ajax({
            url: btn.attr('href'),
            type: 'get',
            success: function (response) {
                if (response.status === true) {
                    swal({
                        title: response.message,
                        icon: "success",
                    });
                } else if (response.status === false) {
                    swal({
                        title: response.message,
                        icon: "success",
                    });
                } else window.location.href = response.redirect;
            },
            error: function (response) {
                swal({
                    title: 'Đã có lỗi xảy ra, vui lòng thử lại sau!',
                    icon: "error",
                });
            }
        });
    });

    $('.add_compare').on('click', function (e) {
        e.preventDefault();
        let btn = $(this);

        $.ajax({
            url: btn.attr('href'),
            type: 'get',
            success: function (response) {
                if (response.message) {
                    swal({
                        title: response.message,
                        icon: "warning",
                    });
                } else window.location.href = response.redirect;
            },
            error: function (response) {
                swal("Đã có lỗi xảy ra, vui lòng thử lại sau!", {
                    icon: "error",
                });
            }
        });
    });

    $('.form-review').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                if (response.status === true) {
                    swal({
                        title: response.message,
                        icon: "success",
                    });
                } else if (response.status === false) {
                    swal({
                        title: response.message,
                        icon: "error",
                    });
                } else window.location.href = response.redirect;
            },
        });
    });

    $('.form-checkout').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                } else
                    swal({
                        title: response.message,
                        icon: "error",
                    });

            },
            error: function (response) {
                let err = JSON.parse(response.responseText);
                $.each(err.errors, function (field_name, error) {
                    form.find('[error-for=' + field_name + ']').text(error);
                })
            }
        });
    });


});
