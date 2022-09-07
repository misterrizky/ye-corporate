<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
    @foreach($collection as $key => $item)
    <div class="col-md-4">
        <div class="card card-flush h-md-100">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{$item->question}}</h2>
                </div>
            </div>
            <div class="card-body pt-1">
                <div class="d-flex flex-column text-gray-600">
                    {!!$item->answer!!}
                </div>
            </div>
            <div class="card-footer flex-wrap pt-0">
                <a href="javascript:;" onclick="load_input('{{route('office.support.faq.show_edit',[$item->faq_category_id, $item->id])}}');" class="btn btn-light btn-active-warning my-1 me-2">Edit</a>
                <a href="javascript:;" onclick="handle_confirm('Are you sure want to delete this faq ?', 'Yes, i`m sure', 'No, i`m not','DELETE','{{route('office.support.faqs.destroy',$item->id)}}');" class="btn btn-light btn-active-danger my-1 my-1">Delete</a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-md-4">
        <div class="card h-md-100">
            <div class="card-body d-flex flex-center">
                <button type="button" onclick="load_input('{{route('office.support.faq.show_create',$faq->id)}}');" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                    <img src="{{asset('keenthemes/media/illustrations/sketchy-1/4.png')}}" alt="" class="mw-100 mh-150px mb-7" />
                    <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Add New FAQ</div>
                </button>
            </div>
        </div>
    </div>
</div>