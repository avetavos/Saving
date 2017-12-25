$('#signout').click(function () {
    swal({
        title: 'คุณต้องการออกจากระบบใช่หรือไม่',
        icon: './img/exit.png',
        buttons: {
            catch: {
                text: "ใช่",
                className: "bg-secondary",
                value: "exit",
            },
            defeat: {
                text: "ไม่",
                className: "bg-pink",
                value: true
            }
          },
        })
        .then((value) => {
          switch (value) {
            case "exit":
                $.ajax({
                    url: './php/signout.php',
                    success: window.location.href='./index.html'
                })
                break;
            default:
                break;
        }
    });
});