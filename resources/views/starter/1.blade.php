<!--begin::Header-->
<div class="d-flex flex-stack py-2" style="margin-bottom:10%;">
    <!--begin::Back link-->
    <div class="me-2"></div>
    <!--end::Back link-->
</div>
<!--end::Header-->
<!--begin::Body-->
<div class="py-20">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="form_start" data-redirect-url="dashboard">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                    <!--begin::Underline-->
                    <span class="d-inline-block position-relative ms-2">
                        <!--begin::Label-->
                        <span class="d-inline-block mb-2 fs-2tx fw-bold" data-kt-translate="installation-title">
                            YE Corporate Installation
                        </span>
                        <!--end::Label-->
                        <!--begin::Line-->
                        <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                        <!--end::Line-->
                    </span>
                    <div class="text-gray-400 fw-semibold ms-2 mt-2 fs-6" data-kt-translate="installation-desc">You will need to know the following items before proceeding.</div>
                    <!--end::Underline-->
                <!--end::Title-->
                <!--begin::Text-->
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="card borcard-borderedder">
                <div class="card-header ribbon ribbon-top ribbon-vertical">
                    <div class="ribbon-label bg-success">
                        <i class="bi bi-check fs-2 text-white"></i>
                    </div>
                    <div class="card-title">App Requirements</div>
                </div>
            </div>
            <div class="card borcard-borderedder">
                <div class="card-header ribbon ribbon-top ribbon-vertical">
                    <div class="ribbon-label bg-success">
                        <i class="bi bi-check fs-2 text-white"></i>
                    </div>
                    <div class="card-title">Yada Ekidanta Slogan</div>
                </div>
            </div>
            <div class="card borcard-borderedder">
                <div class="card-header ribbon ribbon-top ribbon-vertical">
                    <div class="ribbon-label bg-success">
                        <i class="bi bi-check fs-2 text-white"></i>
                    </div>
                    <div class="card-title">Connection</div>
                </div>
            </div>
            <div class="text-start mt-5 mb-10">
                <div class="text-gray-400 fw-semibold ms-2 mt-2 fs-6" data-kt-translate="installation-desc">During the installation process, we will check if the files that are needed to be written <b>(.env file)</b> have <b>write permission</b>. We will also check if <b>curl</b> are enabled on your server or not.</div>
            </div>
            <div class="text-start mb-10">
                <div class="text-gray-400 fw-semibold ms-2 mt-2 fs-6" data-kt-translate="installation-desc">Gather the information mentioned above before hitting the start installation button. If you are ready....</div>
            </div>
            <!--begin::Actions-->
            <div class="d-flex flex-stack mt-10">
                <!--begin::Submit-->
                <button id="tombol_install" onclick="handle_install('#tombol_install','#form_start','{{route('install.let_start')}}','POST');" class="btn btn-primary ms-5 flex-shrink-0">
                    <!--begin::Indicator label-->
                    <span class="indicator-label" data-kt-translate="start-install-submit">Start Installation Proccess</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">
                        <span data-kt-translate="general-progress">Please wait...</span>
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    <!--end::Indicator progress-->
                </button>
                <!--end::Submit-->
            </div>
            <!--end::Actions-->
        </div>
        <!--begin::Body-->
    </form>
    <!--end::Form-->
</div>
<!--end::Body-->
<script>
    $("#email").focus();
    $("#form_login").on('keydown', 'input', function (event) {
        if (event.which == 9 || event.which == 13) {
            event.preventDefault();
            var $this = $(event.target);
            var index = parseFloat($this.attr('data-login'));
            var val = $($this).val();
            if(index < 3){
                if(index == 1){
                    if(val.length > 0){
                        var validateMail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        if(!validateMail.test(val)){
                            toastify_message($($this).data('format'));
                            // custom_message('info',$($this).data('format'))
                        }else{
                            $('[data-login="' + (index + 1).toString() + '"]').focus();
                        }
                    }else{
                        toastify_message($($this).data('validation'));
                    }
                }else if(index == 2){
                    if(val.length < 1){
                        toastify_message($($this).data('validation'));
                    }else if(val.length < 8){
                        toastify_message($($this).data('format'));
                    }else{
                        $('#tombol_login').trigger("click");
                    }
                }
            }else{
                $('#tombol_login').trigger("click");
            }
        }
    });
</script>