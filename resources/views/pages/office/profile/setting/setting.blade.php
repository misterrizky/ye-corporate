<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profile Details</h3>
        </div>
        <a href="javascript:;" onclick="load_url('{{route('office.profile.index')}}');" class="btn btn-primary align-self-center">Back</a>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="form_profile" class="form">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" id="image_input" style="background-image: url('{{Auth::guard('employees')->user()->avatar ? 'storage/'.Auth::guard('employees')->user()->avatar : asset('keenthemes/media/svg/avatars/blank.svg')}}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{Auth::guard('employees')->user()->avatar ? 'storage/'.Auth::guard('employees')->user()->avatar : asset('keenthemes/media/svg/avatars/blank.svg')}})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            @if(Auth::guard('employees')->user()->avatar)
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            @endif
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Full Name" value="{{Auth::guard('employees')->user()->name}}" />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Contact Phone</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="tel" name="phone" max="13" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{Auth::guard('employees')->user()->phone}}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Birth Date</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" id="birth_date" name="birth_date" class="form-control form-control-lg form-control-solid" placeholder="Birth Date" value="{{Auth::guard('employees')->user()->date_birth}}" />
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-15">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Bio</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <div id="bio" class="min-h-200px mb-2">{!!Auth::guard('employees')->user()->bio!!}</div>
                        <textarea class="form-control d-none" name="bio">{{Auth::guard('employees')->user()->bio}}</textarea>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-15">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Impression</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <div id="impression" class="min-h-200px mb-2">{!!Auth::guard('employees')->user()->impression!!}</div>
                        <textarea class="form-control d-none" name="impression">{{Auth::guard('employees')->user()->impression}}</textarea>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <textarea class="form-control" id="address" name="address">{{Auth::guard('employees')->user()->address}}</textarea>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Province</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <select id="province" name="province" class="form-select">
                            <option value="">Choose Province</option>
                            @foreach ($province as $item)
                                <option value="{{$item->id}}" {{Auth::guard('employees')->user()->province_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Regency</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <select id="regency" name="regency" class="form-select">
                            <option value="">Choose Province First</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">District</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <select id="district" name="district" class="form-select">
                            <option value="">Choose Regency First</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Village</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <select id="village" name="village" class="form-select">
                            <option value="">Choose District First</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Postcode</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="postcode" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Postcode" value="{{Auth::guard('employees')->user()->postcode}}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button class="btn btn-primary" id="tombol_edit_profile" onclick="handle_upload('#tombol_edit_profile','#form_profile','{{route('office.profile.store')}}','POST');">Save Changes</button>
            </div>
            <!--end::Actions-->
        </form>
        <div class="card-body border-top p-9">
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-semibold fs-6">CV</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <form method="post" action="{{route('office.profile.cv.upload')}}" enctype="multipart/form-data" class="dropzone" id="input_cv">
                        @csrf
                        <!--begin::Message-->
                        <div class="dz-message needsclick">
                            <!--begin::Icon-->
                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                            <!--end::Icon-->
                            <!--begin::Info-->
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop your CV here or click to upload.</h3>
                                <span class="fs-7 fw-semibold text-gray-400">Upload only 1 files</span>
                            </div>
                            <!--end::Info-->
                        </div>
                    </form>
                </div>
                <!--end::Col-->
            </div>
        </div>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->
<!--begin::Sign-in Method-->
<div class="card mb-5 mb-xl-10 d-none">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Sign-in Method</h3>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_signin_method" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Email Address-->
            <div class="d-flex flex-wrap align-items-center">
                <!--begin::Label-->
                <div id="kt_signin_email">
                    <div class="fs-6 fw-bold mb-1">Email Address</div>
                    <div class="fw-semibold text-gray-600">support@keenthemes.com</div>
                </div>
                <!--end::Label-->
                <!--begin::Edit-->
                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form id="kt_signin_change_email" class="form" novalidate="novalidate">
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0">
                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="emailaddress" value="support@keenthemes.com" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0">
                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update Email</button>
                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->
                <!--begin::Action-->
                <div id="kt_signin_email_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Change Email</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Email Address-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Password-->
            <div class="d-flex flex-wrap align-items-center mb-10">
                <!--begin::Label-->
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bold mb-1">Password</div>
                    <div class="fw-semibold text-gray-600">************</div>
                </div>
                <!--end::Label-->
                <!--begin::Edit-->
                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
                                </div>
                            </div>
                        </div>
                        <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                        <div class="d-flex">
                            <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->
                <!--begin::Action-->
                <div id="kt_signin_password_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Password-->
            <!--begin::Notice-->
            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6 d-none">
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <!--begin::Content-->
                    <div class="mb-3 mb-md-0 fw-semibold">
                        <h4 class="text-gray-900 fw-bold">Secure Your Account</h4>
                        <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                    </div>
                    <!--end::Content-->
                    <!--begin::Action-->
                    <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>
                    <!--end::Action-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Content-->
</div>
<!--end::Sign-in Method-->
<!--begin::Connected Accounts-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Social Media</h3>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Content-->
    <form id="form_sosmed">
        <div id="kt_account_settings_connected_accounts" class="collapse show">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6 d-none">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z" fill="currentColor" />
                            <path d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-semibold">
                            <div class="fs-6 text-gray-700">Two-factor authentication adds an extra layer of security to your account. To log in, in you'll need to provide a 4 digit amazing code.
                            <a href="#" class="fw-bold">Learn More</a></div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--begin::Items-->
                <div class="py-2 mb-6 d-none">
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <div class="d-flex">
                            <img src="{{asset('keenthemes/media/svg/brand-logos/google-icon.svg')}}" class="w-30px me-6" alt="" />
                            <div class="d-flex flex-column">
                                <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Google</a>
                                <div class="fs-6 fw-semibold text-gray-400">Plan properly your workflow</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="form-check form-check-solid form-switch">
                                <input class="form-check-input w-45px h-30px" type="checkbox" id="googleswitch" checked="checked" />
                                <label class="form-check-label" for="googleswitch"></label>
                            </div>
                        </div>
                    </div>
                    <!--end::Item-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Instagram</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="url" name="instagram" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Your Instagram" value="{{Auth::guard('employees')->user()->instagram_url}}" />
                    </div>
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">LinkedIn</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="url" name="linkedin" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Your LinkedIn" value="{{Auth::guard('employees')->user()->linkedin_url}}" />
                    </div>
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Facebook</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="url" name="facebook" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Your Facebook" value="{{Auth::guard('employees')->user()->facebook_url}}" />
                    </div>
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Twitter</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="url" name="twitter" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Your Twitter" value="{{Auth::guard('employees')->user()->twitter_url}}" />
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Card body-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button class="btn btn-primary" id="tombol_edit_sosmed" onclick="handle_upload('#tombol_edit_sosmed','#form_sosmed','{{route('office.profile.update_sosmed')}}','POST');">Save Changes</button>
            </div>
        </div>
    </form>
    <!--end::Content-->
</div>
<!--end::Connected Accounts-->
<!--begin::Notifications-->
@if(Auth::guard('employees')->user()->department_id != 0 && Auth::guard('employees')->user()->position_id != 0)
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_email_preferences" aria-expanded="true" aria-controls="kt_account_email_preferences">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Email Preferences</h3>
        </div>
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_email_preferences" class="collapse show">
        <!--begin::Form-->
        <form class="form">
            <!--begin::Card body-->
            <div class="card-body border-top px-9 py-9">
                <!--begin::Option-->
                <label class="form-check form-check-custom form-check-solid align-items-start">
                    <!--begin::Input-->
                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                    <!--end::Input-->
                    <!--begin::Label-->
                    <span class="form-check-label d-flex flex-column align-items-start">
                        <span class="fw-bold fs-5 mb-0">Successful Payments</span>
                        <span class="text-muted fs-6">Receive a notification for every successful payment.</span>
                    </span>
                    <!--end::Label-->
                </label>
                <!--end::Option-->
                <!--begin::Option-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Option-->
                <!--begin::Option-->
                <label class="form-check form-check-custom form-check-solid align-items-start">
                    <!--begin::Input-->
                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                    <!--end::Input-->
                    <!--begin::Label-->
                    <span class="form-check-label d-flex flex-column align-items-start">
                        <span class="fw-bold fs-5 mb-0">Payouts</span>
                        <span class="text-muted fs-6">Receive a notification for every initiated payout.</span>
                    </span>
                    <!--end::Label-->
                </label>
                <!--end::Option-->
                <!--begin::Option-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Option-->
                <!--begin::Option-->
                <label class="form-check form-check-custom form-check-solid align-items-start">
                    <!--begin::Input-->
                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                    <!--end::Input-->
                    <!--begin::Label-->
                    <span class="form-check-label d-flex flex-column align-items-start">
                        <span class="fw-bold fs-5 mb-0">Fee Collection</span>
                        <span class="text-muted fs-6">Receive a notification each time you collect a fee from sales</span>
                    </span>
                    <!--end::Label-->
                </label>
                <!--end::Option-->
                <!--begin::Option-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Option-->
                <!--begin::Option-->
                <label class="form-check form-check-custom form-check-solid align-items-start">
                    <!--begin::Input-->
                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                    <!--end::Input-->
                    <!--begin::Label-->
                    <span class="form-check-label d-flex flex-column align-items-start">
                        <span class="fw-bold fs-5 mb-0">Customer Payment Dispute</span>
                        <span class="text-muted fs-6">Receive a notification if a payment is disputed by a customer and for dispute purposes.</span>
                    </span>
                    <!--end::Label-->
                </label>
                <!--end::Option-->
                <!--begin::Option-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Option-->
                <!--begin::Option-->
                <label class="form-check form-check-custom form-check-solid align-items-start">
                    <!--begin::Input-->
                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                    <!--end::Input-->
                    <!--begin::Label-->
                    <span class="form-check-label d-flex flex-column align-items-start">
                        <span class="fw-bold fs-5 mb-0">Refund Alerts</span>
                        <span class="text-muted fs-6">Receive a notification if a payment is stated as risk by the Finance Department.</span>
                    </span>
                    <!--end::Label-->
                </label>
                <!--end::Option-->
                <!--begin::Option-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Option-->
                <!--begin::Option-->
                <label class="form-check form-check-custom form-check-solid align-items-start">
                    <!--begin::Input-->
                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                    <!--end::Input-->
                    <!--begin::Label-->
                    <span class="form-check-label d-flex flex-column align-items-start">
                        <span class="fw-bold fs-5 mb-0">Invoice Payments</span>
                        <span class="text-muted fs-6">Receive a notification if a customer sends an incorrect amount to pay their invoice.</span>
                    </span>
                    <!--end::Label-->
                </label>
                <!--end::Option-->
                <!--begin::Option-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Option-->
                <!--begin::Option-->
                <label class="form-check form-check-custom form-check-solid align-items-start">
                    <!--begin::Input-->
                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                    <!--end::Input-->
                    <!--begin::Label-->
                    <span class="form-check-label d-flex flex-column align-items-start">
                        <span class="fw-bold fs-5 mb-0">Webhook API Endpoints</span>
                        <span class="text-muted fs-6">Receive notifications for consistently failing webhook API endpoints.</span>
                    </span>
                    <!--end::Label-->
                </label>
                <!--end::Option-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button class="btn btn-primary px-6">Save Changes</button>
            </div>
            <!--end::Card footer-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Notifications-->
<!--begin::Notifications-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Notifications</h3>
        </div>
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_notifications" class="collapse show">
        <!--begin::Form-->
        <form class="form">
            <!--begin::Card body-->
            <div class="card-body border-top px-9 pt-3 pb-4">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                        <tbody class="fs-6 fw-semibold">
                            <!--begin::Table row-->
                            <tr>
                                <td class="min-w-250px fs-4 fw-bold">Notifications</td>
                                <td class="w-125px">
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_email" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=email]" />
                                        <label class="form-check-label ps-2" for="kt_settings_notification_email">Email</label>
                                    </div>
                                </td>
                                <td class="w-125px">
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_phone" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=phone]" />
                                        <label class="form-check-label ps-2" for="kt_settings_notification_phone">Phone</label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->
                            <!--begin::Table row-->
                            <tr>
                                <td>Billing Updates</td>
                                <td>
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" id="billing1" checked="checked" data-kt-settings-notification="email" />
                                        <label class="form-check-label ps-2" for="billing1"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="billing2" checked="checked" data-kt-settings-notification="phone" />
                                        <label class="form-check-label ps-2" for="billing2"></label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->
                            <!--begin::Table row-->
                            <tr>
                                <td>New Team Members</td>
                                <td>
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="team1" checked="checked" data-kt-settings-notification="email" />
                                        <label class="form-check-label ps-2" for="team1"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="team2" data-kt-settings-notification="phone" />
                                        <label class="form-check-label ps-2" for="team2"></label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->
                            <!--begin::Table row-->
                            <tr>
                                <td>Completed Projects</td>
                                <td>
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="project1" data-kt-settings-notification="email" />
                                        <label class="form-check-label ps-2" for="project1"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="project2" checked="checked" data-kt-settings-notification="phone" />
                                        <label class="form-check-label ps-2" for="project2"></label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->
                            <!--begin::Table row-->
                            <tr>
                                <td class="border-bottom-0">Newsletters</td>
                                <td class="border-bottom-0">
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="newsletter1" data-kt-settings-notification="email" />
                                        <label class="form-check-label ps-2" for="newsletter1"></label>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="form-check form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" id="newsletter2" data-kt-settings-notification="phone" />
                                        <label class="form-check-label ps-2" for="newsletter2"></label>
                                    </div>
                                </td>
                            </tr>
                            <!--begin::Table row-->
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button class="btn btn-primary px-6">Save Changes</button>
            </div>
            <!--end::Card footer-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Notifications-->
@endif
<!--begin::Deactivate Account-->
<div class="card d-none">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Deactivate Account</h3>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_deactivate" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_deactivate_form" class="form">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-semibold">
                            <h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>
                            <div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email or phone number when you reset yousignr password.
                            <br />
                            <a class="fw-bold" href="#">Learn more</a></div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--begin::Form input row-->
                <div class="form-check form-check-solid fv-row">
                    <input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />
                    <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
                </div>
                <!--end::Form input row-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-semibold">Deactivate Account</button>
            </div>
            <!--end::Card footer-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<script>
    KTImageInput.createInstances();
    var imageInputElement = document.querySelector("#image_input");
    var imageInput = new KTImageInput(imageInputElement);
    // imageInput = imageInput.getInputElement();
    imageInput.on("kt.imageinput.change", function() {
        $(document).one('change', '#form_profile', function(e) {
            let data = new FormData(this);
            data.append('_method', 'POST');
            $.ajax({
                type: 'POST',
                url: '{{route('office.profile.avatar.change')}}',
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
                    // if(response.alert == "success"){
                    //     handle_success(response);
                    // }else{
                    //     toastify_message(response.message);
                    // }
                },
                error: function(xhr) {
                    handle_error(xhr);
                },
            });
            return false;
        });
    });
    imageInput.on("kt.imageinput.changed", function() {
        toastify_message('Avatar uploaded !');
    });
    imageInput.on("kt.imageinput.cancel", function() {
        $(document).one('click', '#form_profile', function(e) {
            let data = new FormData(this);
            data.append('_method', 'POST');
            $.ajax({
                type: 'POST',
                url: '{{route('office.profile.avatar.remove')}}',
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
                    // if(response.alert == "success"){
                    //     handle_success(response);
                    // }else{
                    //     toastify_message(response.message);
                    // }
                },
                error: function(xhr) {
                    handle_error(xhr);
                },
            });
            return false;
        });
    });
    imageInput.on("kt.imageinput.canceled", function() {
        toastify_message('Avatar removed !');
    });
    imageInput.on("kt.imageinput.remove", function() {
        $(document).one('click', '#form_profile', function(e) {
            let data = new FormData(this);
            data.append('_method', 'POST');
            $.ajax({
                type: 'POST',
                url: '{{route('office.profile.avatar.remove')}}',
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
                    // if(response.alert == "success"){
                    //     handle_success(response);
                    // }else{
                    //     toastify_message(response.message);
                    // }
                },
                error: function(xhr) {
                    handle_error(xhr);
                },
            });
            return false;
        });
    });
    imageInput.on("kt.imageinput.removed", function() {
        toastify_message('Avatar removed !');
    });
    obj_birthdate('birth_date');
    obj_quill('bio');
    obj_quill('impression');
    obj_autosize('address');
    obj_select('province','Choose Province');
    obj_select('regency','Choose Regency');
    obj_select('district','Choose District');
    obj_select('village','Choose Village');
    @if(Auth::guard('employees')->user()->province_id)
    $('#province').val('{{Auth::guard('employees')->user()->province_id}}');
    setTimeout(function(){ 
        $('#province').trigger('change');
        setTimeout(function(){ 
            $('#regency').val('{{Auth::guard('employees')->user()->regency_id}}');
            $('#regency').trigger('change');
            setTimeout(function(){ 
                $('#district').val('{{Auth::guard('employees')->user()->district_id}}');
                $('#district').trigger('change');
                setTimeout(function(){ 
                    $('#village').val('{{Auth::guard('employees')->user()->village_id}}');
                    $('#village').trigger('change');
                }, 1200);
            }, 1200);
            setTimeout(function(){ 
                $('#postcode').val('{{Auth::guard('employees')->user()->postcode}}');
            }, 1200);
        }, 1200);
    }, 500);
    @endif
    $("#province").change(function(){
        $.ajax({
            type: "POST",
            url: "{{route('office.regional.province.get_list')}}",
            data: {province : $("#province").val()},
            success: function(response){
                $("#regency").html(response);
            }
        });
    });
    $("#regency").change(function(){
        $.ajax({
            type: "POST",
            url: "{{route('office.regional.regency.get_list')}}",
            data: {regency : $("#regency").val()},
            success: function(response){
                $("#district").html(response);
            }
        });
    });
    $("#district").change(function(){
        $.ajax({
            type: "POST",
            url: "{{route('office.regional.district.get_list')}}",
            data: {district : $("#district").val()},
            success: function(response){
                $("#village").html(response);
            }
        });
    });
    var myDropzone = new Dropzone("#input_cv", {
        url :'{{route('office.profile.cv.upload')}}',
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        acceptedFiles: ".pdf",
        timeout: 50000,
        maxFilesize: 10, // MB
        // addRemoveLinks: true,
        init:function() {

            // Get images
            var myDropzone = this;
                $.ajax({
                    url: '{{route('office.profile.cv.get')}}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data[0].name);
                        var file = {name: data[0].name, size: data[0].size};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, 'img/icon/pdf.ico');
                        myDropzone.emit("complete", file);
                        // var ext = data[0].name.split('.').pop();
                        // if (ext == "pdf") {
                        //     $(file.previewElement).find(".dz-image img").attr("src", "/img/icon/pdf.png");
                        // } else if (ext.indexOf("doc") != -1) {
                        //     $(file.previewElement).find(".dz-image img").attr("src", "/Content/Images/word.png");
                        // } else if (ext.indexOf("xls") != -1) {
                        //     $(file.previewElement).find(".dz-image img").attr("src", "/Content/Images/excel.png");
                        // }
                    }
                });
            },
            removedfile: function(file) 
            {
                if (this.options.dictRemoveFile) {
                    return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
                        if(file.previewElement.id != ""){
                            var name = file.previewElement.id;
                        }else{
                            var name = file.name;
                        }
                        //console.log(name);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                            type: 'POST',
                            url: '{{route('office.profile.cv.remove')}}',
                            data: {filename: name},
                            success: function (data){
                                alert(data.success +" CV has been successfully removed!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                            var fileRef;
                            return (fileRef = file.previewElement) != null ? 
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    });
                }
            },
            success: function(file, response) 
            {
                // console.log(file);
                // console.log(response);
                file.previewElement.id = response.success;
                //console.log(file); 
                // set new images names in dropzone’s preview box.
                var olddatadzname = file.previewElement.querySelector("[dz-image]");   
                console.log(file.previewElement);
                file.previewElement.querySelector("img").alt = response.success;
                olddatadzname.innerHTML = response.success;
            },
            error: function(file, response)
            {
                if($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[dz-error-message]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            }
    });
</script>