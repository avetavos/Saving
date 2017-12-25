$(document).ready(function () {
    $.ajax({
        url: './php/index.php',
        success: getuser
    });
});

function getuser(result) {
    if (result == 'empty') {
        $('#signin').removeClass('d-none');
    } else {
        $('#user').removeClass('d-none');
        $('#signout').removeClass('d-none');
        $('#username').html(result);
    }
}