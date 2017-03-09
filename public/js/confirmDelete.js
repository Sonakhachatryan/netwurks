$('.actions>span').on('click', function () {
    var span = $(this);
    swal({
        title: "Attention!",
        text: "You can't restor record after deleting.!",
        type: "error",
        confirmButtonText: "Delete",
        allowOutsideClick: true,
        showCancelButton: true,
        confirmButtonColor: '#ec4758'
    }, function (isConfirm) {
        if (isConfirm) {
            var href = span.find('a').attr('href');
            window.location.href = href;
        }

    });
})

