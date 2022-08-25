<div class="d-flex flex-stack mb-5">
    <a href="javascript:;" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">All Contacts</a>
    <div class="badge badge-light-primary">{{$lead->count()}}</div>
</div>
@forelse ($collection as $item)
<div class="d-flex mb-4">
    <a href="javascript:;" onclick="" class="fs-6 fw-bold text-gray-800 text-hover-primary flex-grow-1">{{$item->name}}</a>
    <div class="badge badge-light-primary me-3">{{$item->leads->count()}}</div>
    <a href="javascript:;" onclick="handle_delete('Are you sure want to delete this group ?', 'Yes, i`m sure', 'No, i`m not','DELETE','{{route('office.crm.contact-group.destroy',$item->id)}}');" class="btn btn-sm btn-hover-scale btn-icon btn-bg-light btn-active-color-danger w-30px h-30px">
        <span class="svg-icon svg-icon-5 svg-icon-gray-700">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
            </svg>
        </span>
    </a>
</div>
@empty
@endforelse