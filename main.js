$(document).ready(function () {
    var check = 0;
    $('#no').click(function (e) {
        check = check + 1;
        if (check == 10) {
            $(this).css('top', "50%");
            $(this).css('left', "50%");
        } else {
            var random = Math.floor(Math.random() * 80) + 10;
            $(this).css('top', random + "%");
            $(this).css('left', random + "%");
        }
    });

    $('#yes').click(function (e) {
        Swal.fire({
            input: 'textarea',
            inputLabel: 'Lý do m là lợn',
            inputPlaceholder: 'Nhập vào đây nè...'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Đúng rồi đó.',
                    showConfirmButton: false,
                    backdrop: `
                      rgba(0,0,123,0.4)
                      url("kiss-love.gif")
                      left top
                      no-repeat
                    `
                })
            }
        });
    });
});