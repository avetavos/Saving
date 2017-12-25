var url = new URL(document.URL);
var strData = '{"sid":"' + url.searchParams.get("sid") + '", "uid":"' + url.searchParams.get("uid") + '"}';
var data = JSON.parse(strData);
$.ajax({
    url: './php/comfirm_register.php',
    data: data,
    type: 'post'
});