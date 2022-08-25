<div id="content_list">
    <div id="kt_app_content" class="app-content flex-column-fluid py-3 py-lg-6">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-7">
                <div class="col-lg-6 col-xl-3">
                    <div class="card card-flush">
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <div class="card-title">
                                <h2>Groups</h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="d-flex flex-column gap-5">
                                <div id="list_group"></div>
                            </div>
                            <div class="separator my-7"></div>
                            <form id="form_input_group">
                                <label class="fs-6 fw-semibold form-label">Add new group</label>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control form-control-solid" placeholder="Group name" />
                                    <button id="tombol_simpan_group" onclick="handleStore('#tombol_simpan_group','#form_input_group','{{route('office.crm.contact-group.store')}}','POST');" class="btn btn-icon btn-light">
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </form>
                            <div class="separator my-7 d-none"></div>
                            <a href="javasscript:;" class="btn btn-primary w-100 d-none">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                                    <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                                </svg>
                            </span>Add new contact</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="card card-flush" id="kt_contacts_list">
                        <div class="card-header pt-7" id="kt_contacts_list_header">
                            <form class="d-flex align-items-center position-relative w-100 m-0" autocomplete="off">
                                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control form-control-solid ps-13" name="keyword" onkeyup="load_list('{{route('office.crm.lead.list')}}','1','list_result');" placeholder="Search contacts" />
                            </form>
                        </div>
                        <div class="card-body pt-5" id="kt_contacts_list_body">
                            <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header" data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body" data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px">
                                <div id="list_result"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-flush h-lg-100" id="kt_contacts_main">
                        <div class="card-body p-0">
                            <div class="card-px text-center py-20 my-10">
                                <h2 class="fs-2x fw-bold mb-10">Welcome to the Contacts App</h2>
                                <p class="text-gray-400 fs-4 fw-semibold mb-10">It's time to expand our contacts.
                                <br />Kickstart your contacts growth by adding a your next contact.</p>
                                <a href="javascript:;" onclick="load_input('{{route('office.crm.lead.create')}}');" class="btn btn-primary">Add New Contact</a>
                            </div>
                            <div class="text-center px-4">
                                <img class="mw-100 mh-300px" alt="" src="{{asset('keenthemes/media/illustrations/sketchy-1/5.png')}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content_input"></div>
<script>
    function handleStore(tombol, form, url, method){
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
                    $(tombol).prop("disabled", false);
                    if (response.alert == "success") {
                        $(form)[0].reset();
                        loadList("{{route('office.crm.contact-group.index')}}");
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
    function handle_delete(title, confirm_title, deny_title, method, route){
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
                        loadList("{{route('office.crm.contact-group.index')}}");
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
    loadList("{{route('office.crm.contact-group.index')}}");
    function loadList(url){
        $.get(url, {}, function(result) {
            $('#list_group').html(result);
        }, "html");
    }
    load_list("{{route('office.crm.lead.list')}}",1);
</script>