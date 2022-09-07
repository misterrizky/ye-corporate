<!--begin::Header-->
<div class="d-flex flex-stack py-2" style="margin-bottom:34%;">
    <!--begin::Back link-->
    <div class="me-2">
        <a href="javascript:void(0);" onclick="load_url('{{route('office.auth.index')}}');" class="btn btn-icon bg-light rounded-circle">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr002.svg-->
            <span class="svg-icon svg-icon-2 svg-icon-gray-800">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor" />
                    <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
    </div>
    <!--end::Back link-->
    <!--begin::Sign Up link-->
    <div class="m-0">
        <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-in-head-desc">Already remember your account?</span>
        <a href="javascript:void(0);" onclick="load_url('{{route('office.auth.index')}}');" class="link-primary fw-bold fs-5" data-kt-translate="sign-in-head-link">Sign In</a>
    </div>
    <!--end::Sign Up link=-->
</div>
<!--end::Header-->
<!--begin::Body-->
<div class="py-20">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="form_reset" data-kt-redirect-url="dashboard">
        <!--begin::Heading-->
        <div class="text-start mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3 fs-3x" data-kt-translate="password-reset-title">Forgot Password ?</h1>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="password-reset-desc">Enter your email to reset your password.</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <input class="form-control form-control-solid" type="email" placeholder="Email" id="email" name="email" autocomplete="off" data-kt-translate="password-reset-input-email" data-reset="1" data-validation="We need to know your email" data-kt-validation="validation-email" data-format="Please input email correctly" />
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="d-flex flex-stack">
            <!--begin::Link-->
            <div class="m-0">
                <button id="tombol_reset" onclick="handle_post('#tombol_reset','#form_reset','{{route('office.auth.doforgot')}}','POST');" class="btn btn-primary me-2" data-kt-translate="password-reset-submit" data-reset="2">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Submit</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
                <a href="javascript:void(0);" onclick="load_url('{{route('office.auth.index')}}');" class="btn btn-lg btn-light-primary fw-bold" data-kt-translate="password-reset-cancel">Cancel</a>
            </div>
            <!--end::Link-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Body-->
<script>
    $("#email").focus();
</script>