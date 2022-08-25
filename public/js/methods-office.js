$("body").on("contextmenu", "img", (e) => {
    return false
});
function load_url(url){
    window.history.pushState(null, null, url);
    load_main(url);
}
var audio = document.getElementById("audio");
$('img').attr('draggable', false);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let page;
$(document).ready(function() {
    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            // load_main(window.location.href);
        }
    });
    $(document).on('click', '.paginasi', function(event) {
        event.preventDefault();
        $('.paginasi').removeClass('active');
        $(this).parent('.paginasi').addClass('active');
        // var myurl = $(this).attr('href');
        page = $(this).attr('halaman').split('page=')[1];
        var uri = window.location.href;
        load_list(uri+'/list',page);
    });
    $(document).on('click', 'a.sidebar-link', function(event) {
        $('a.sidebar-link').removeClass('active');
        $(this).addClass('active');
    });
});
$(window).on('hashchange', function() {
    if (window.location.hash) {
        page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            load_list(page);
        }
    }
});
function main_content(obj){
    $("#content_list").hide();
    $("#content_input").hide();
    $("#" + obj).show();
}
function load_main(url){
    loading();
    $.get(url,{}, function(result) {
        loaded();
        $('#main-content').html(result);
    }, "html");
}
function load_list(url,page){
    $.get(url + '?page=' + page, $('#content_filter').serialize(), function(result) {
        $('#list_result').html(result);
        main_content('content_list');
    }, "html");
}
function load_input(url){
    $.get(url, {}, function(result) {
        $('#content_input').html(result);
        main_content('content_input');
    }, "html");
}
function handle_open_modal(url,modal,content,method){
    $.ajax({
        type: method,
        url: url,
        success: function (html) {
            $(modal).modal('show');
            $(content).html(html);
        },
        error: function () {
            $(content).html('<h3>Ajax Bermasalah !!!</h3>')
        },
    });
}
function save_memo(tombol, form, url, method){
    $(document).one('submit', form, function(e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).attr("data-kt-indicator","on");
        $(tombol).prop("disabled", true);
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
                $(tombol).removeAttr("data-kt-indicator");
                if (response.alert == "success") {
                    $(form)[0].reset();
                    load_memo(localStorage.getItem("route_memo"))
                } else {
                    setTimeout(function() {
                        $(tombol).prop("disabled", false);
                    }, 2000);
                }
            },
        });
        return false;
    });
}
function delete_memo(title, confirm_title, deny_title, method, route){
    Swal.fire({
        showClass: {
            popup: 'animate__animated animate__fadeInDownBig'
        },
        hideClass: {
            popup: 'animate__animated animate__hinge'
        },
        position: 'top-end',
        title: title,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: confirm_title,
        denyButtonText: deny_title,
    }).then((result) => {
        if (result.isConfirmed) {
            loading();
            $.ajax({
                type: method,
                url: route,
                dataType: 'json',
                success: function(response) {
                    loaded();
                    toastify_message(response.message);
                    load_memo(localStorage.getItem("route_memo"))
                }
            });
        } else if (result.isDenied) {
            toastify_message("You cancel this confirmation");
            // custom_message(response.alert,response.message);
        }
    });
}
function load_memo(url){
    $.get(url,{}, function(result) {
        $("#input_memo").hide();
        $("#list_memos").show();
        $("#list_memos").html(result);
    });
}
function form_memo(url){
    $.get(url,{}, function(result) {
        $("#list_memos").hide();
        $("#input_memo").show();
        $("#input_memo").html(result);
    });
}
function handle_open_drawer(url,content,method){
    $.ajax({
        type: method,
        url: url,
        success: function (html) {
            $(content).html(html);
        },
        error: function () {
            $(content).html('<h3>Ajax Bermasalah !!!</h3>')
        },
    });
}
function handle_save(tombol, form, url, method){
    $(tombol).submit(function() {
        return false;
    });
    $(tombol).attr("data-kt-indicator","on");
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            toastify_message(response.message);
            if (response.alert == "success") {
                $(form)[0].reset();
                $(tombol).prop("disabled", false);
                if(response.redirect == "input"){
                    load_input(response.route);
                }else if(response.redirect == "reload"){
                    location.reload();
                }else{
                    setTimeout(function() {
                        load_main(window.location.href,1);
                    }, 2000);
                }
            } else {
                setTimeout(function() {
                    $(tombol).prop("disabled", false);
                }, 2000);
            }
        },
    });
}
function handle_confirm(title, confirm_title, deny_title, method, route){
    Swal.fire({
        showClass: {
            popup: 'animate__animated animate__fadeInDownBig'
        },
        hideClass: {
            popup: 'animate__animated animate__hinge'
        },
        position: 'top-end',
        title: title,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: confirm_title,
        denyButtonText: deny_title,
    }).then((result) => {
        if (result.isConfirmed) {
            loading();
            $.ajax({
                type: method,
                url: route,
                dataType: 'json',
                success: function(response) {
                    loaded();
                    if(response.redirect == "cart"){
                        load_cart(localStorage.getItem("route_cart"));
                    }else if(response.redirect == "reload"){
                        location.reload();
                    }else if(response.redirect == "main"){
                        load_url(response.route);
                    }else{
                        load_main(window.location.href);
                    }
                    toastify_message(response.message);
                    // custom_message(response.alert,response.message);
                }
            });
        } else if (result.isDenied) {
            toastify_message("You cancel this confirmation");
            // custom_message(response.alert,response.message);
        }
    });
}
function handle_confirm_checked(title, confirm_title, deny_title, method, route){
    Swal.fire({
        title: title,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: confirm_title,
        denyButtonText: deny_title,
    }).then((result) => {
        if (result.isConfirmed) {
            var id = [];
            $('input[name="list_id"]:checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });
            if(id.length === 0){
                Swal.fire('Please Select atleast one checkbox', '', 'info')
            }else{
                $.ajax({
                    type: method,
                    url: route,
                    data: {id: id},
                    dataType: 'json',
                    success: function(response) {
                        if(response.redirect == "cart"){
                            load_cart(localStorage.getItem("route_cart"));
                        }else if(response.redirect == "reload"){
                            location.reload();
                        }else{
                            load_main(window.location.href);
                        }
                        Swal.fire(response.message, '', response.alert)
                    }
                });
            }
        } else if (result.isDenied) {
            Swal.fire('Konfirmasi dibatalkan', '', 'info')
        }
    });
}
function handle_upload(tombol, form, url, method){
    $(document).one('submit', form, function(e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).attr("data-kt-indicator","on");
        $(tombol).prop("disabled", true);
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
                $(tombol).removeAttr("data-kt-indicator");
                if (response.alert == "success") {
                    $(form)[0].reset();
                    if(response.redirect == "input"){
                        load_input(response.route);
                    }else if(response.redirect == "reload"){
                        location.reload();
                    }else{
                        setTimeout(function() {
                            load_main(window.location.href);
                        }, 2000);
                    }
                    $("#customModal").modal('hide');
                } else {
                    setTimeout(function() {
                        $(tombol).prop("disabled", false);
                    }, 2000);
                }
            },
        });
        return false;
    });
}
function handle_upload_inform(tombol, form, url, method,route){
    $(document).one('submit', form, function(e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).attr("data-kt-indicator","on");
        $(tombol).prop("disabled", true);
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
                $(tombol).removeAttr("data-kt-indicator");
                if (response.alert == "success") {
                    $(form)[0].reset();
                    load_input(route);
                } else {
                    setTimeout(function() {
                        $(tombol).prop("disabled", false);
                    }, 2000);
                }
            },
        });
        return false;
    });
}
function send_chat(tombol, form, url, method){
    $(document).one('submit', form, function(e) {
        let data = new FormData(this);
        data.append('_method', method);
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
                if (response.alert == "success") {
                    $(form)[0].reset();
                    load_main(window.location.href);
                } else {
                    error_toastr(response.message);
                    setTimeout(function() {
                        $(tombol).prop("disabled", false);
                    }, 2000);
                }
            },
        });
        return false;
    });
}
function handle_download(tombol,url){
    $(tombol).prop("disabled", true);
    $(tombol).attr("data-kt-indicator", "on");
    $.get(url, function(result) {
        if (result.alert == "success") {
            // $(download).attr({target: '_blank', href  : result.url, 'download' : result.url});
            // var href = $('.cssbuttongo').attr('href');
            window.open(result.url, '_blank');
            window.open(result.url1, '_blank');
            window.open(result.url2, '_blank');
            Swal.fire({ text: result.message, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } }).then(function() {
                load_main(window.location.href);
            });
        }else{
            Swal.fire({ text: result.message, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } });
        }
        $(tombol).prop("disabled", false);
        $(tombol).removeAttr("data-kt-indicator");
    }, "json");
}