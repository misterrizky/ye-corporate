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
    <form class="form w-100" novalidate="novalidate" id="form_connection" data-redirect-url="dashboard">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                <!--begin::Underline-->
                <span class="d-inline-block position-relative ms-2">
                    <!--begin::Label-->
                    <span class="d-inline-block mb-2 fs-2tx fw-bold" data-kt-translate="requirement-title">
                        App Setup
                    </span>
                    <!--end::Label-->
                    <!--begin::Line-->
                    <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                    <!--end::Line-->
                </span>
                <div class="text-gray-400 fw-semibold ms-2 mt-2 fs-6" data-kt-translate="requirement-desc">Fill this form with valid database credentials</div>
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="Database Host" id="DB_HOST" name="DB_HOST" autocomplete="off" data-kt-translate="input-db_host" class="form-control form-control-solid" />
                <!--end::Email-->
            </div>
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="Database Name" id="DB_DATABASE" name="DB_DATABASE" autocomplete="off" data-kt-translate="input-db_host" class="form-control form-control-solid" />
                <!--end::Email-->
            </div>
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="Database Username" id="DB_USERNAME" name="DB_USERNAME" autocomplete="off" data-kt-translate="input-db_host" class="form-control form-control-solid" />
                <!--end::Email-->
            </div>
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="password" placeholder="Database Password" id="DB_PASSWORD" name="DB_PASSWORD" autocomplete="off" data-kt-translate="input-db_host" class="form-control form-control-solid" />
                <!--end::Email-->
            </div>
            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Submit-->
                <a href="javascript:void(0);" onclick="load_url('{{route('install.index_app_requirements')}}');" class="btn btn-lg btn-light-primary fw-bold" data-kt-translate="password-reset-cancel">Back</a>
                <button id="tombol_connection" onclick="handle_install('#tombol_connection','#form_connection','{{route('install.check_connection')}}','POST');" class="btn btn-primary me-2 flex-shrink-0" data-login="3">
                    <!--begin::Indicator label-->
                    <span class="indicator-label" data-kt-translate="sign-in-submit">Check Connection</span>
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
    $("#DB_HOST").focus();
</script>