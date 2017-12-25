var counter = 5;
var interval = setInterval(function () {
    $('#countdown').html(counter - 1);
    counter--;
    if (counter == 0) {
        window.location.href = "./signin.html";
        clearInterval(interval);
    }
}, 1000);