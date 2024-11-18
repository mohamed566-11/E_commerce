
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#edit_{{$type}}_{{$data->id}}">
    {{trans('reviews_trans.edit_status')}}
</button>

<!-- Modal -->
<div class="modal fade" id="edit_{{$type}}_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('contact.edit_status')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route($routes,$data->id)}}" method="post">
                @method('PATCH')
                @csrf
                <label for="status">{{__('contact.status')}}</label>
                <select name="status" id="" class="form-control">
                    <option value='done'>done</option>
                    <option value='notdone'>Not_done</option>
                </select>
                {{-- <input type="text" name="id" value="pending"> --}}
                {{-- <input type="hidden" name="name_en" value="{{$data->getTranslation('name','en')}}"> --}}
                <div class="modal-body">
                    {{-- <h3>{{trans('messages_trans.delete_sure')}}</h3> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('buttons_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('buttons_trans.edit')}}</button>
                </div>

            </form>


        </div>
    </div>
</div>
