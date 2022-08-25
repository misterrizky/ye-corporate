<form id="form_memo">
    <input id="title_memo" name="title_memo" type="text" class="form-control form-control-flush" placeholder="Your title here" value="{{$data->title}}"/>
    <div id="body_memo" class="mb-5">{!!$data->body!!}</div>
    <textarea class="form-control d-none" name="body_memo">{!!$data->body!!}</textarea>
    <button id="tombol_simpan_memo" onclick="save_memo('#tombol_simpan_memo','#form_memo','{{$data->id ? route('office.employee-memo.update',$data->id) : route('office.employee-memo.store')}}','{{$data->id ? 'PATCH' : 'POST'}}');" class="btn btn-sm btn-{{$data->id ? 'warning' : 'success'}}">
        {{$data->id ? 'Update' : 'Create'}}
    </button>
</form>
<script>
    obj_quill('body_memo');
</script>