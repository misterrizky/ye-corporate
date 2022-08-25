@forelse($attendance as $key => $item)
<!--begin::Item-->
<div class="d-flex flex-stack py-4">
    <!--begin::Section-->
    <div class="d-flex align-items-center me-2">
        <!--begin::Code-->
        <span class="w-70px badge badge-light-{{$item->finish_at == NULL ? 'success' : 'danger'}} me-4">200 OK</span>
        <!--end::Code-->
        <!--begin::Title-->
        <a href="javascript:;" class="text-gray-800 text-hover-primary fw-semibold">You logged {{$item->finish_at == NULL ? 'in' : 'out'}} {{config('app.name')}}</a>
        <!--end::Title-->
    </div>
    <!--end::Section-->
    <!--begin::Label-->
    <span class="badge badge-light fs-8">{{$item->finish_at == NULL ? $item->presence_at->diffForHumans() : $item->finish_at->diffForHumans()}}</span>
    <!--end::Label-->
</div>
<!--end::Item-->
@empty
<!--begin::Item-->
<div class="d-flex flex-stack py-4">
    <!--begin::Section-->
    <div class="d-flex align-items-center me-2">
        <!--begin::Title-->
        <a href="javascript:;" class="text-gray-800 text-hover-primary fw-semibold">You have no logs</a>
        <!--end::Title-->
    </div>
    <!--end::Section-->
</div>
<!--end::Item-->
@endforelse