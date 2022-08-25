<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                No
            </th>
            <th class="min-w-125px">Name</th>
            <th class="min-w-125px">Status</th>
            <th class="min-w-125px">Privileges</th>
            <th class="text-end min-w-100px">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @foreach ($collection as $key => $item)
        <tr>
            <td>
                {{$key+ $collection->firstItem()}}
            </td>
            <td class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-50px me-3">
                    <a href="javascript:;">
                        {!!$item->icon!!}
                    </a>
                </div>
                <div class="d-flex flex-column">
                    <a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">{{$item->name}}</a>
                    <span>{{$item->url}}</span>
                </div>
            </td>
            <td>
                <div class="badge badge-light-{{$item->is_show == 1 ? 'success' : 'danger'}} fw-bold">{{$item->is_show ? 'Show' : 'Hide'}}</div>
            </td>
            <td>
                @forelse($item->privileges as $p)
                    {{$p->name}}
                @empty
                    Not have Privilege
                @endforelse
            </td>
            <td class="text-end">
                <a href="javascript:;" onclick="load_url('{{route('office.hrm.employee.show',$item->id)}}');" class="btn btn-sm btn-hover-scale btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                    <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="currentColor"/>
                            <path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="currentColor"/>
                        </svg>
                    </span>
                </a>
                <a href="javascript:;" onclick="load_input('{{route('office.hrm.employee.edit',$item->id)}}');" class="btn btn-sm btn-hover-scale btn-icon btn-bg-light btn-active-color-warning w-30px h-30px">
                    <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
                        </svg>
                    </span>
                </a>
                <a href="javascript:;" onclick="handle_confirm('Are you sure want to delete this employee ?', 'Yes, i`m sure', 'No, i`m not','DELETE','{{route('office.hrm.employee.destroy',$item->id)}}');" class="btn btn-sm btn-hover-scale btn-icon btn-bg-light btn-active-color-danger w-30px h-30px">
                    <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
                        </svg>
                    </span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.office.pagination')}}