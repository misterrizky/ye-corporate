<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="w-10px pe-2" rowspan="2">
                No
            </th>
            <th class="min-w-125px" rowspan="2">Functions</th>
            <th class="min-w-125px" rowspan="2">Objectives</th>
            <th class="min-w-125px" rowspan="2">Key Result</th>
            <th class="min-w-125px" rowspan="2">Description</th>
            <th class="min-w-125px" rowspan="2">Measure Unit</th>
            <th class="min-w-125px" rowspan="2">Owner</th>
            <th class="min-w-125px" rowspan="2">Weight</th>
            <th class="min-w-125px" rowspan="2">EOY {{date('Y')}}</th>
            <th class="min-w-125px" rowspan="2">EOY {{date('Y') - 1}}</th>
            <th class="min-w-125px text-center" colspan="5">Ruler</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
        </tr>
    </thead>
    <tbody>
        @foreach($collection as $key => $item)
        <tr>
            <td rowspan="{{$item->objectives->count()}}">
                {{$key+ $collection->firstItem()}}
            </td>
            <td rowspan="{{$item->objectives->count()}}">
                <a href="javascript:;" onclick="load_url('{{route('office.corporate.kpi.show',$item->id)}}');" class="text-gray-800 text-hover-primary mb-1">{{$item->function}}</a>
            </td>
            @foreach($item->objectives as $keys => $objective)
            <td rowspan="{{$objective->keyresults->count()}}">
                <a href="javascript:;" onclick="load_url('{{route('office.corporate.kpi.show',$objective->id)}}');" class="text-gray-800 text-hover-primary mb-1">{{$objective->objective}}</a>
            </td>
                @foreach($objective->keyresults as $keyss => $kr)
                    <td>
                        <a href="javascript:;" onclick="load_url('{{route('office.corporate.kpi.show',$objective->id)}}');" class="text-gray-800 text-hover-primary mb-1">{{$kr->key_result}}</a>
                    </td>
                    <td>
                        <a href="javascript:;" onclick="load_url('{{route('office.corporate.kpi.show',$objective->id)}}');" class="text-gray-800 text-hover-primary mb-1">{{$kr->description}}</a>
                    </td>
                    <td>% Voice in digital</td>
                    <td>Marketing</td>
                    <td>5%</td>
                    <td>2.9%</td>
                    <td>10%</td>
                    <td> < 7 % </td>
                    <td> 7 - 9.9% </td>
                    <td>10%</td>
                    <td>12%</td>
                    <td>12%</td>
                @endforeach
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.office.pagination')}}