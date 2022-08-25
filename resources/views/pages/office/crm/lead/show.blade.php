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
                                <input type="text" class="form-control form-control-solid ps-13" name="search" value="" placeholder="Search contacts" />
                            </form>
                        </div>
                        <div class="card-body pt-5" id="kt_contacts_list_body">
                            <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header" data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body" data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px">
                                @forelse($collection as $key => $item)
                                <div class="d-flex flex-stack py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40px symbol-circle">
                                            {!!$item->image!!}
                                        </div>
                                        <div class="ms-4">
                                            <a href="javascript:;" onclick="load_url('{{route('office.crm.lead.show',$item->id)}}');" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">{{$item->name}}</a>
                                            <div class="fw-semibold fs-7 text-muted">{{$item->email}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed d-none"></div>
                                @empty
                                <div class="d-flex flex-stack py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-4">
                                            <a href="javascript:;" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">No contact found</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed d-none"></div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-flush h-lg-100" id="kt_contacts_main">
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <div class="card-title">
                                <span class="svg-icon svg-icon-1 me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <h2>Contact Details</h2>
                            </div>
                            <div class="card-toolbar gap-3">
                                <button type="button" onclick="load_url('{{route('office.crm.lead.index')}}');" class="btn btn-sm btn-hover-rotate-start btn-secondary me-3">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    Back
                                </button>
                                <a href="https://wa.me/{{$data->phone}}" target="_blank" class="btn btn-sm btn-light btn-active-light-primary">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor" />
                                            <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor" />
                                            <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Whatsapp
                                </a>
                                <a href="javascript:;" onclick="load_input('{{route('office.crm.lead.edit',$data->id)}}');" class="btn btn-sm btn-light btn-active-light-warning">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
                                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
                                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    Edit
                                </a>
                                <a href="javascript:;" onclick="handle_confirm('Are you sure want to delete this department ?', 'Yes, i`m sure', 'No, i`m not','DELETE','{{route('office.crm.lead.destroy',$data->id)}}');" class="btn btn-sm btn-light btn-active-light-danger">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    Delete
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="d-flex gap-7 align-items-center">
                                <div class="symbol symbol-circle symbol-100px">
                                    {!!$data->image!!}
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <h3 class="mb-0">{{$data->name}}</h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <a href="#" class="text-muted text-hover-primary">{{$data->email}}</a>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z" fill="currentColor" />
                                                <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <a href="#" class="text-muted text-hover-primary">{{$data->phone}}</a>
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
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_meetings">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        Meetings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_activity">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        Activity
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="">
                                <div class="tab-pane fade show active" id="kt_contact_view_general" role="tabpanel">
                                    <div class="d-flex flex-column gap-5 mt-7">
                                        <div class="d-flex flex-column gap-1">
                                            <div class="fw-bold text-muted">Company Name</div>
                                            <div class="fw-bold fs-5">{{$data->company_name}}</div>
                                        </div>
                                        <div class="d-flex flex-column gap-1">
                                            <div class="fw-bold text-muted">Group</div>
                                            <div class="fw-bold fs-5">{{$data->contact_group_id != 0 ? $data->groups->name : ''}}</div>
                                        </div>
                                        <div class="d-flex flex-column gap-1">
                                            <div class="fw-bold text-muted">Notes</div>
                                            <p>{{$data->notes}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_contact_view_meetings" role="tabpanel">
                                    <ul class="nav nav-pills d-flex flex-stack flex-nowrap hover-scroll-x">
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_0">
                                                <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                                <span class="fs-6 fw-bold">22</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary active" data-bs-toggle="tab" href="#kt_schedule_day_1">
                                                <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                                <span class="fs-6 fw-bold">23</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_2">
                                                <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                                <span class="fs-6 fw-bold">24</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_3">
                                                <span class="opacity-50 fs-7 fw-semibold">We</span>
                                                <span class="fs-6 fw-bold">25</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_4">
                                                <span class="opacity-50 fs-7 fw-semibold">Th</span>
                                                <span class="fs-6 fw-bold">26</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_5">
                                                <span class="opacity-50 fs-7 fw-semibold">Fr</span>
                                                <span class="fs-6 fw-bold">27</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_6">
                                                <span class="opacity-50 fs-7 fw-semibold">Sa</span>
                                                <span class="fs-6 fw-bold">28</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_7">
                                                <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                                <span class="fs-6 fw-bold">29</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_8">
                                                <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                                <span class="fs-6 fw-bold">30</span>
                                            </a>
                                        </li>
                                        <li class="nav-item me-1">
                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-dark text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_9">
                                                <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                                <span class="fs-6 fw-bold">31</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="kt_schedule_day_0" class="tab-pane fade show">
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0"></div>
                                                <div class="fw-semibold ms-5 text-gray-600">
                                                    <div class="fs-5">9:00 - 10:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project Review &amp; Testing</a>
                                                    <div class="text-gray-400">Lead by
                                                    <a href="#">Yannis Gloverson</a></div>
                                                </div>
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            </div>
                                        </div>
                                        <div id="kt_schedule_day_1" class="tab-pane fade show active">
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                                <div class="fw-semibold ms-5 text-gray-600">
                                                    <div class="fs-5">12:00 - 13:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Dashboard UI/UX Design Review</a>
                                                    <div class="text-gray-400">Lead by
                                                    <a href="#">Mark Randall</a></div>
                                                </div>
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            </div>
                                        </div>
                                        <div id="kt_schedule_day_2" class="tab-pane fade show">
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                                <div class="fw-semibold ms-5 text-gray-600">
                                                    <div class="fs-5">11:00 - 11:45
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Dashboard UI/UX Design Review</a>
                                                    <div class="text-gray-400">Lead by
                                                    <a href="#">Kendell Trevor</a></div>
                                                </div>
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            </div>
                                        </div>
                                        <div id="kt_schedule_day_3" class="tab-pane fade show">
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0"></div>
                                                <div class="fw-semibold ms-5 text-gray-600">
                                                    <div class="fs-5">14:30 - 15:30
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Dashboard UI/UX Design Review</a>
                                                    <div class="text-gray-400">Lead by
                                                    <a href="#">Bob Harris</a></div>
                                                </div>
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            </div>
                                        </div>
                                        <div id="kt_schedule_day_4" class="tab-pane fade show">
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
                                                <div class="fw-semibold ms-5 text-gray-600">
                                                    <div class="fs-5">13:00 - 14:00
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Lunch &amp; Learn Catch Up</a>
                                                    <div class="text-gray-400">Lead by
                                                    <a href="#">Kendell Trevor</a></div>
                                                </div>
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            </div>
                                        </div>
                                        <div id="kt_schedule_day_5" class="tab-pane fade show">
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                                <div class="fw-semibold ms-5 text-gray-600">
                                                    <div class="fs-5">16:30 - 17:30
                                                    <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project Review &amp; Testing</a>
                                                    <div class="text-gray-400">Lead by
                                                    <a href="#">Michael Walters</a></div>
                                                </div>
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            </div>
                                        </div>
                                        <div id="kt_schedule_day_6" class="tab-pane fade show">
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
                                                <div class="fw-semibold ms-5 text-gray-600">
                                                    <div class="fs-5">11:00 - 11:45
                                                    <span class="fs-7 text-gray-400 text-uppercase">am</span></div>
                                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
                                                    <div class="text-gray-400">Lead by
                                                    <a href="#">Walter White</a></div>
                                                </div>
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_contact_view_activity" role="tabpanel">
                                    <div class="timeline-label">
                                        <div class="timeline-item">
                                            <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-warning fs-1"></i>
                                            </div>
                                            <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you honest. And keep structure</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-label fw-bold text-gray-800 fs-6">10:00</div>
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-success fs-1"></i>
                                            </div>
                                            <div class="timeline-content d-flex">
                                                <span class="fw-bold text-gray-800 ps-3">AEOL meeting</span>
                                            </div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-label fw-bold text-gray-800 fs-6">14:37</div>
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-danger fs-1"></i>
                                            </div>
                                            <div class="timeline-content fw-bold text-gray-800 ps-3">Make deposit
                                            <a href="#" class="text-primary">USD 700</a>. to ESL</div>
                                        </div>
                                    </div>
                                </div>
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
</script>