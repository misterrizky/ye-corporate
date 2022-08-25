<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
    @foreach($collection as $key => $item)
    <div class="col-md-4">
        <div class="card card-flush h-md-100">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{$item->name}}</h2>
                </div>
            </div>
            <div class="card-body pt-1">
                <div class="fw-bold text-gray-600 mb-5">Total permission with this position: {{$item->permission->count() > 0 ? $item->permission->count() : 0}}</div>
                @if($item->permission->count() > 0 ? $item->permission->count() : '')
                <div class="d-flex flex-column text-gray-600">
                    @php
                    $total = 5;
                    @endphp
                    @foreach($item->permission as $keys => $permission)
                    @if(++$keys < 6)
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-{{$permission->module->module_id == 0 ? 'primary' : 'warning'}} me-3"></span>
                        {{$permission->module->name}}
                    </div>
                    @endif
                    @endforeach
                    @if($item->permission->count() > 5)
                    <div class='d-flex align-items-center py-2'>
                        <span class='bullet bg-primary me-3'></span>
                        <em>and {{$item->permission->count() - $total}} more...</em>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            <div class="card-footer flex-wrap pt-0">
                <a href="javascript:;" onclick="load_input('{{route('office.hrm.position.show_create',$item->id)}}');" class="btn btn-light btn-active-primary my-1 me-2">Edit Permission</a>
                <a href="javascript:;" onclick="load_input('{{route('office.hrm.department.show_edit',[$item->department_id, $item->id])}}');" class="btn btn-light btn-active-warning my-1 me-2">Edit</a>
                <a href="javascript:;" onclick="handle_confirm('Are you sure want to delete this position ?', 'Yes, i`m sure', 'No, i`m not','DELETE','{{route('office.hrm.position.destroy',$item->id)}}');" class="btn btn-light btn-active-danger my-1 my-1">Delete</a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-md-4">
        <div class="card h-md-100">
            <div class="card-body d-flex flex-center">
                <button type="button" onclick="load_input('{{route('office.hrm.department.show_create',$item->department_id)}}');" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                    <img src="{{asset('keenthemes/media/illustrations/sketchy-1/4.png')}}" alt="" class="mw-100 mh-150px mb-7" />
                    <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Add New Position</div>
                </button>
            </div>
        </div>
    </div>
</div>