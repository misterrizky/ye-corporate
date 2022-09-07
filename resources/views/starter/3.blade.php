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
    <form class="form w-100" novalidate="novalidate" id="form_slogan" data-redirect-url="dashboard">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                <!--begin::Underline-->
                <span class="d-inline-block position-relative ms-2">
                    <!--begin::Label-->
                    <span class="d-inline-block mb-2 fs-2tx fw-bold" data-kt-translate="requirement-title">
                        Checking Slogan
                    </span>
                    <!--end::Label-->
                    <!--begin::Line-->
                    <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                    <!--end::Line-->
                </span>
                <div class="text-gray-400 fw-semibold ms-2 mt-2 fs-6" data-kt-translate="requirement-desc">Provide Yada Ekidanta Slogan</div>
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="Slogan Yada Ekidanta" id="slogan" name="slogan" autocomplete="off" data-kt-translate="input-email" class="form-control form-control-solid" />
                <!--end::Email-->
            </div>
            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Submit-->
                <a href="javascript:void(0);" onclick="load_url('{{route('install.index_app_requirements')}}');" class="btn btn-lg btn-light-primary fw-bold" data-kt-translate="password-reset-cancel">Back</a>
                <button id="tombol_slogan" onclick="handle_install('#tombol_slogan','#form_slogan','{{route('install.check_slogan')}}','POST');" class="btn btn-primary me-2 flex-shrink-0" data-login="3">
                    <!--begin::Indicator label-->
                    <span class="indicator-label" data-kt-translate="sign-in-submit">Verify</span>
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
    $("#slogan").focus();
</script>