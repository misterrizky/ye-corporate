<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{$data->id ? 'Update' : 'Create'}} Vacancy</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="javascript:;" onclick="load_url('{{route('office.dashboard')}}');" class="sidebar-link text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">HRM</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Vacancy</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">{{$data->id ? 'Update' : 'Create'}}</li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <button type="button" onclick="main_content('content_list');" class="btn btn-sm btn-hover-rotate-start btn-secondary me-3">
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
        <form id="form_input" class="form d-flex flex-column flex-lg-row">
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Department & Position</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <select class="form-select mb-2" id="department" name="department">
                            <option value="">Choose Department</option>
                            @foreach ($department as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="text-muted fs-7 mb-2">Set the vacancy department.</div>
                        <select class="form-select mb-2" id="position" name="position">
                            <option value="">Choose Department First</option>
                        </select>
                        <div class="text-muted fs-7">Set the vacancy position.</div>
                    </div>
                </div>
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Status</h2>
                        </div>
                        <div class="card-toolbar">
                            <div class="rounded-circle w-15px h-15px" id="vacancy_status"></div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <select class="form-select mb-2" id="status" name="st">
                            <option value="">Pilih Status</option>
                            <option value="Open" {{$data->st == "Open" ? 'selected' : ''}}>Open</option>
                            <option value="Closed" {{$data->st == "Closed" ? 'selected' : ''}}>Closed</option>
                        </select>
                        <div class="text-muted fs-7">Set the vacancy status.</div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#tab_general">General</a>
                    </li>
                    @if($data->id)
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_reviews">Applicant</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Title</label>
                                        <input type="text" name="title" class="form-control mb-2" placeholder="Eg : UI/UX Designer" value="{{ $data->title }}" />
                                        <div class="text-muted fs-7">A Vacancy title is required.</div>
                                    </div>
                                    <div>
                                        <label class="form-label required">Job Description</label>
                                        <div id="description" class="min-h-200px mb-2">{!!$data->description!!}</div>
                                        <textarea class="form-control d-none" name="description">{{$data->description}}</textarea>
                                        <div class="text-muted fs-7">Set a description to the vacancy for better visibility.</div>
                                    </div>
                                    <div>
                                        <label class="form-label required">Requirement</label>
                                        <div id="requirement" class="min-h-200px mb-2">{!!$data->requirement!!}</div>
                                        <textarea class="form-control d-none" name="requirement">{{$data->requirement}}</textarea>
                                        <div class="text-muted fs-7">Set a requirement to the vacancy for better visibility.</div>
                                    </div>
                                    <div>
                                        <label class="form-label required">Facilities</label>
                                        <div id="facilities" class="min-h-200px mb-2">{!!$data->facilities!!}</div>
                                        <textarea class="form-control d-none" name="facilities">{{$data->facilities}}</textarea>
                                        <div class="text-muted fs-7">Set a facilities to the vacancy for better visibility.</div>
                                    </div>
                                    <div>
                                        <label class="form-label required">Rates</label>
                                        <input type="tel" name="rates" id="rates" class="form-control mb-2" placeholder="Eg : 1,000,000" value="{{ number_format($data->rates) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="javascript:;" onclick="main_content('content_list');" class="btn btn-light me-5">Cancel</a>
                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{$data->id ? route('office.hrm.vacancy.update',$data->id) : route('office.hrm.vacancy.store')}}','{{$data->id ? 'PATCH' : 'POST'}}');" class="btn btn-primary">
                        <span class="indicator-label">Save Changes</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    obj_select('department','Choose Department');
    obj_select('position','Choose Position');
    obj_quill('description');
    obj_quill('requirement');
    obj_quill('facilities');
    ribuan('rates');
    $("#status").on('change', function() {
        if(this.value == "Open"){
            $("#hrm.vacancy_status").removeClass('bg-danger');
            $("#hrm.vacancy_status").addClass('bg-success');
        }else{
            $("#vacancy_status").removeClass('bg-success');
            $("#vacancy_status").addClass('bg-danger');
        }
    });
    @if($data->department_id)
    $('#department').val('{{$data->department_id}}');
    setTimeout(function(){ 
        $('#department').trigger('change');
        setTimeout(function(){ 
            $('#position').val('{{$data->position_id}}');
            $('#position').trigger('change');
        }, 1200);
    }, 500);
    @endif
    $("#department").change(function(){
        $.ajax({
            type: "POST",
            url: "{{route('office.hrm.department.get_list')}}",
            data: {department : $("#department").val()},
            success: function(response){
                $("#position").html(response);
            }
        });
    });
</script>