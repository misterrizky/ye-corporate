<div id="content_list">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 d-none">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{$data->name}} Preview</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="javascript:;" onclick="load_url('{{route('office.dashboard')}}');" class="sidebar-link text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">CRM</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Lead</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">View</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <button type="button" onclick="load_url('{{route('office.crm.lead.index')}}');" class="btn btn-sm btn-hover-rotate-start btn-secondary me-3">
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                        </svg>
                    </span>
                    Back
                </button>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-7">
                <div class="col-xl-12">
                    <div class="card card-flush h-lg-100" id="kt_contacts_main">
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <div class="card-title">
                                <span class="svg-icon svg-icon-1 me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <h2>Vacancy Details</h2>
                            </div>
                            <div class="card-toolbar gap-3">
                                <button type="button" onclick="load_url('{{route('office.hrm.vacancy.index')}}');" class="btn btn-sm btn-hover-rotate-start btn-secondary me-3">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    Back
                                </button>
                                @if(Auth::guard('employees')->user()->department_id != 0 && Auth::guard('employees')->user()->position_id != 0)
                                <a href="javascript:;" onclick="load_input('{{route('office.hrm.vacancy.edit',$data->id)}}');" class="btn btn-sm btn-light btn-active-light-warning">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
                                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
                                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    Edit
                                </a>
                                <a href="javascript:;" onclick="handle_confirm('Are you sure want to delete this vacancy ?', 'Yes, i`m sure', 'No, i`m not','DELETE','{{route('office.hrm.vacancy.destroy',$data->id)}}');" class="btn btn-sm btn-light btn-active-light-danger">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    Delete
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="d-flex gap-7 align-items-center">
                                <div class="symbol symbol-circle symbol-100px">
                                    {!!$data->image!!}
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <h3 class="mb-0">{{$data->title}}</h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="#" class="text-muted text-hover-primary">{!!$data->description!!}</a>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8">
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_contact_view_general">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    General</a>
                                </li>
                                @if(Auth::guard('employees')->user()->department_id != 0 && Auth::guard('employees')->user()->position_id != 0)
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_activity">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        Applicant
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#tab_application">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        Application
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <div class="tab-content" id="">
                                <div class="tab-pane fade show active" id="kt_contact_view_general" role="tabpanel">
                                    <div class="d-flex flex-column gap-5 mt-7">
                                        <div class="d-flex flex-column gap-1">
                                            <div class="fw-bold text-muted">Requirements</div>
                                            <div class="fw-bold fs-5">{!!$data->requirement!!}</div>
                                        </div>
                                        <div class="d-flex flex-column gap-1">
                                            <div class="fw-bold text-muted">Facilities</div>
                                            <div class="fw-bold fs-5">{!!$data->facilities!!}</div>
                                        </div>
                                        <div class="d-flex flex-column gap-1">
                                            <div class="fw-bold text-muted">Rates</div>
                                            <p>{{number_format($data->rates)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_contact_view_activity" role="tabpanel">
                                    <div class="table-responsive">
                                        <div id="list_result"></div>
                                    </div>
                                </div>
                                @if(Auth::guard('employees')->user()->department_id == 0 && Auth::guard('employees')->user()->position_id == 0)
                                <div class="tab-pane fade" id="tab_application" role="tabpanel">
                                    <form id="form_input">
                                        <input name="vacancy" value="{{$data->id}}" type="hidden">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-12 mb-3">
                                                    <div class="form-floating">
                                                        <input type="tel" class="form-control" id="salary" name="expected_salary" placeholder="What your expected salary ?"/>
                                                        <label for="salary">Expected Salary</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="messages">Messages</label>
                                                    <div id="messages" class="min-h-200px mb-2"></div>
                                                    <textarea class="form-control d-none" name="messages"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('office.hrm.applicant.store')}}','POST');" class="btn btn-sm btn-success">
                                                Apply This Job
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                @endif
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
    @if(Auth::guard('employees')->user()->department_id == 0 && Auth::guard('employees')->user()->position_id == 0)
    number_only('salary');
    ribuan('salary');
    obj_quill('messages');
    @endif
    load_list("{{route('office.hrm.vacancy.show_list',$data->id)}}",1);
</script>