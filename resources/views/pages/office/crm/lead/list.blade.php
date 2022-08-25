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
{{$collection->links('themes.office.pagination')}}