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
$("#form_reset").on('keydown', 'input', function (event) {
    if (event.which == 9 || event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-reset'));
        var val = $($this).val();
        if(index == 1){
            if(val.length > 0){
                var validateMail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(!validateMail.test(val)){
                    toastify_message($($this).data('format'));
                    // custom_message('info',$($this).data('format'))
                }else{
                    $('[data-reset="' + (index + 1).toString() + '"]').focus();
                }
            }else{
                toastify_message($($this).data('validation'));
            }
        }else{
            $('#tombol_reset').trigger("click");
        }
    }
});
$("#form_register").on('keydown', 'input', function (event) {
    if (event.which == 9 || event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-register'));
        var val = $($this).val();
        if(index < 6){
            if(index == 3){
                if(val.length > 0){
                    var validateMail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    if(!validateMail.test(val)){
                        toastify_message($($this).data('format'));
                    }else{
                        $('[data-register="' + (index + 1).toString() + '"]').focus();
                    }
                }else{
                    toastify_message($($this).data('validation'));
                }
            }else if(index == 4){
                if(val.length > 0){
                    var validatePhone = /^([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})$/;
                    if(!validatePhone.test(val)){
                        toastify_message($($this).data('format'));
                    }else{
                        $('[data-register="' + (index + 1).toString() + '"]').focus();
                    }
                }else{
                    toastify_message($($this).data('validation'));
                }
            }else if(index == 1 || index == 2 || index == 5 || index == 6){
                if(val.length < 1){
                    toastify_message($($this).data('validation'));
                }else if(val.length < 8){
                    toastify_message($($this).data('format'));
                }else{
                    $('[data-register="' + (index + 1).toString() + '"]').focus();
                }
            }else{
                $('[data-register="' + (index + 1).toString() + '"]').focus();
            }
        }else{
            $('#tombol_register').trigger("click");
        }
    }
});
function handle_post(tombol, form, url, method)
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
                        if($(form).data('redirect-url') == "dashboard"){
                            location.href = $(form).data('redirect-url');
                            // load_url(response.route);
                        }else if($(form).data('redirect-url') == "forgot" || $(form).data('redirect-url') =="register"){
                            $(form)[0].reset();
                            auth_content('login_page');
                        }else if(response.callback == "auth"){
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