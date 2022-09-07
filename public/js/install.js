$("body").on("contextmenu", "img", function(e) {
    return false;
});
$('img').attr('draggable', false);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function load_url(url){
    window.history.pushState(null, null, url);
    load_main(url);
}
function load_main(url){
    loading();
    $.get(url,{}, function(result) {
        loaded();
        $('#main-content').html(result);
    }, "html");
}
var target = document.querySelector("#kt_app_body");
var block_content = new KTBlockUI(target, {
    message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
});
function toastify_message(text)
{
    Toastify({
        text: text,
        duration: 3000,
        destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        position: "left", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){} // Callback after click
    }).showToast();
}

function loading() {
    block_content.block();
}

function loaded() {
    block_content.release();
}
function handle_install(tombol, form, url, method)
{
    $(document).one('submit', form, function(e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).prop("disabled", true);
        $(tombol).attr("data-kt-indicator","on");
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(response) {
                toastify_message(response.message);
                if (response.alert=="success") {
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).removeAttr("data-kt-indicator");
                        if($(form).data('redirect-url') == "auth"){
                            location.href = $(form).data('redirect-url');
                            // load_url(response.route);
                        }else if(response.callback == "check"){
                            load_url(response.route);
                        }
                    }, 1000);
                } else {
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).removeAttr("data-kt-indicator");
                    }, 1000);
                }
            },
        });
        return false;
    });
}