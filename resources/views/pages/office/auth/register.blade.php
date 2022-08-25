<!--begin::Header-->
<div class="d-flex flex-stack py-2">
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
        <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-in-head-desc">Already a member ?</span>
        <a href="javascript:void(0);" onclick="load_url('{{route('office.auth.index')}}');" class="link-primary fw-bold fs-5" data-kt-translate="sign-in-head-link">Sign In</a>
    </div>
    <!--end::Sign Up link=-->
</div>
<!--end::Header-->
<!--begin::Body-->
<div class="py-20">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="form_register" data-kt-redirect-url="dashboard">
        <!--begin::Heading-->
        <div class="text-start mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-up-title">Sign Up</h1>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Simplify Your Future</div>
            <!--end::Link-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="row fv-row mb-7">
            <!--begin::Col-->
            <div class="col-xl-6">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="First Name" id="first_name" name="first" autocomplete="off" data-kt-translate="sign-up-input-first-name" data-register="1" />
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-6">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Last Name" id="last_name" name="last" autocomplete="off" data-kt-translate="sign-up-input-last-name" data-register="2" />
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row fv-row mb-7">
            <!--begin::Col-->
            <div class="col-xl-5">
                <input class="form-control form-control-lg form-control-solid" type="tel" maxlength="13" placeholder="Phone Number" id="phone" name="phone" autocomplete="off" data-kt-translate="sign-up-input-phone" data-register="3" />
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-7">
                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" id="email" name="email" autocomplete="off" data-kt-translate="sign-up-input-email" data-validation="We need to know your email" data-kt-validation="validation-email" data-format="Please input email correctly" data-kt-format="format-email" data-register="4" />
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" autocomplete="off" data-kt-translate="sign-up-input-password" data-validation="We need to know your password" data-kt-validation="validation-password" data-format="Password min 8 characters" data-kt-format="format-password" data-register="5" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted" data-kt-translate="sign-up-hint">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="off" data-kt-translate="sign-up-input-confirm-password" data-validation="We need to know your password" data-kt-validation="validation-repassword" data-format="Password min 8 characters" data-kt-format="format-repassword" data-register="6" />
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="d-flex flex-stack">
            <!--begin::Submit-->
            <button id="tombol_register" onclick="handle_post('#tombol_register','#form_register','{{route('office.auth.doregister')}}','POST');" class="btn btn-primary" data-kt-translate="sign-up-submit" data-register="7">
                <!--begin::Indicator label-->
                <span class="indicator-label">Submit</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
            <!--end::Submit-->
            <!--begin::Social-->
            <div class="d-flex align-items-center">
                <div class="text-gray-400 fw-semibold fs-6 me-3 me-md-6" data-kt-translate="general-or">Or</div>
                <!--begin::Symbol-->
                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Coming Soon" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                    <img alt="Logo" src="{{asset('keenthemes/media/svg/brand-logos/google-icon.svg')}}" class="p-4" />
                </a>
                <!--end::Symbol-->
                <!--begin::Symbol-->
                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Coming Soon" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                    <img alt="Logo" src="{{asset('keenthemes/media/svg/brand-logos/facebook-3.svg')}}" class="p-4" />
                </a>
                <!--end::Symbol-->
                <!--begin::Symbol-->
                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Coming Soon" class="symbol symbol-circle symbol-45px w-45px bg-light">
                    <img alt="Logo" src="{{asset('keenthemes/media/svg/brand-logos/apple-black.svg')}}" class="theme-light-show p-4" />
                    <img alt="Logo" src="{{asset('keenthemes/media/svg/brand-logos/apple-black-dark.svg')}}" class="theme-dark-show p-4" />
                </a>
                <!--end::Symbol-->
            </div>
            <!--end::Social-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Body-->
<script>
    $("#first_name").focus();
    number_only('phone');
    format_email('email');
</script>