<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                No
            </th>
            <th class="min-w-250px">Employee</th>
            <th class="min-w-250px">Expected Salary</th>
            <th class="min-w-150px">Messages</th>
            <th class="min-w-150px">Status</th>
            <th class="text-end min-w-100px">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @forelse ($collection as $key => $item)
        @php
        if($item->st == "a"){
            $text = "Accepted";
            $color = "success";
        }elseif($item->st=="p"){
            $text = "Pending";
            $color = "warning";
        }else{
            $text = "Rejected";
            $color = "danger";
        }
        @endphp
        <tr>
            <td>
                {{$key+ $collection->firstItem()}}
            </td>
            <td class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-50px me-3">
                    <a href="javascript:;">
                        {!!$item->employee->image!!}
                    </a>
                </div>
                <div class="d-flex flex-column">
                    <a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">{{$item->employee->name}}</a>
                    <span>{{$item->employee->email}}</span>
                </div>
            </td>
            <td>{{number_format($item->expected_salary)}}</td>
            <td>{!!$item->messages!!}</td>
            <td>
                <div class="badge badge-light-{{$color}} fw-bold">{{$text}}</div>
            </td>
            {{-- <td>{{$item->created_at->format('d F Y, g:i a')}}</td> --}}
            <td class="text-end">
                @if($item->employee->cv)
                <a download target="_blank" href="{{asset('storage/'.$item->employee->cv)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="currentColor"/>
                            <path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="currentColor"/>
                            <path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="currentColor"/>
                        </svg>
                    </span>
                </a>
                @endif
                @if($item->st == "p")
                <a href="javascript:;" onclick="handle_confirm('Are you sure want to accept this applicant ?','Yes','No','PATCH','{{route('office.hrm.applicant.accept',$item->id)}}');" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"/>
                            <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"/>
                        </svg>
                    </span>
                </a>
                <a href="javascript:;" onclick="handle_confirm('Are you sure want to reject this applicant ?','Yes','No','PATCH','{{route('office.hrm.applicant.reject',$item->id)}}');" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                        </svg>
                    </span>
                </a>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td align="center" colspan="6">No Data</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$collection->links('themes.office.pagination')}}