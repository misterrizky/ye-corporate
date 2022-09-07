@php
    $phpVersion = number_format((float)phpversion(), 0, '.', '');
@endphp
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
    <form class="form w-100" novalidate="novalidate" id="form_requirement">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                    <!--begin::Underline-->
                    <span class="d-inline-block position-relative ms-2">
                        <!--begin::Label-->
                        <span class="d-inline-block mb-2 fs-2tx fw-bold" data-kt-translate="requirement-title">
                            Checking App Requirements
                        </span>
                        <!--end::Label-->
                        <!--begin::Line-->
                        <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                        <!--end::Line-->
                    </span>
                    <div class="text-gray-400 fw-semibold ms-2 mt-2 fs-6" data-kt-translate="requirement-desc">We ran diagnosis on your server. Review the items that have a red mark on it.
                        If everything is green, you are good to go to the next step.</div>
                    <!--end::Underline-->
                <!--end::Title-->
                <!--begin::Text-->
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="card borcard-borderedder">
                <div class="card-header ribbon ribbon-top ribbon-vertical">
                    <div class="ribbon-label bg-{{$phpVersion >= 8 ? 'success' : 'danger'}}">
                        <i class="bi bi-{{$phpVersion >= 8 ? 'check' : 'x-lg'}} fs-2 text-white"></i>
                    </div>
                    <div class="card-title">PHP Version {{$phpVersion}} +</div>
                </div>
            </div>
            <div class="card borcard-borderedder">
                <div class="card-header ribbon ribbon-top ribbon-vertical">
                    <div class="ribbon-label bg-{{$permission['curl_enabled'] ? 'success' : 'danger'}}">
                        <i class="bi bi-{{$permission['curl_enabled'] ? 'check' : 'x-lg'}} fs-2 text-white"></i>
                    </div>
                    <div class="card-title">Curl Enabled</div>
                </div>
            </div>
            <div class="card borcard-borderedder">
                <div class="card-header ribbon ribbon-top ribbon-vertical">
                    <div class="ribbon-label bg-{{$permission['env_write_perm'] ? 'success' : 'danger'}}">
                        <i class="bi bi-{{$permission['env_write_perm'] ? 'check' : 'x-lg'}} fs-2 text-white"></i>
                    </div>
                    <div class="card-title">.env File Permission <code>777</code></div>
                </div>
            </div>
            <div class="card borcard-borderedder">
                <div class="card-header ribbon ribbon-top ribbon-vertical">
                    <div class="ribbon-label bg-{{$permission['routes_file_write_perm'] ? 'success' : 'danger'}}">
                        <i class="bi bi-{{$permission['routes_file_write_perm'] ? 'check' : 'x-lg'}} fs-2 text-white"></i>
                    </div>
                    <div class="card-title">RouteServiceProvider.php Permission <code>777</code></div>
                </div>
            </div>
            <!--begin::Actions-->
            <div class="d-flex flex-stack mt-10">
                <a href="javascript:void(0);" onclick="load_url('{{route('install.index')}}');" class="btn btn-lg btn-light-primary fw-bold" data-kt-translate="password-reset-cancel">Back</a>
                <!--begin::Submit-->
                @if($phpVersion >= 8 && $permission['curl_enabled'] && $permission['env_write_perm'] && $permission['routes_file_write_perm'])
                <button id="tombol_requirement" onclick="handle_install('#tombol_requirement','#form_requirement','{{route('install.do_app_requirements')}}','POST');" class="btn btn-primary me-2 flex-shrink-0">
                    <!--begin::Indicator label-->
                    <span class="indicator-label" data-kt-translate="sign-in-submit">Next</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">
                        <span data-kt-translate="general-progress">Please wait...</span>
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    <!--end::Indicator progress-->
                </button>
                @else
                <a href="javascript:void(0);" onclick="load_url('{{route('install.index_app_requirements')}}');" class="btn btn-primary me-2 flex-shrink-0">Reload</a>
                @endif
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