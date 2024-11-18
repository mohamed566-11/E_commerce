
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#edit_{{$type}}_{{$data->id}}">
    {{trans('order_trans.edit_status')}}

</button>

<!-- Modal -->
<div class="modal fade" id="edit_{{$type}}_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route($routes,$data->id)}}" method="post">
                @method('PATCH')
                @csrf
                <label for="status">status</label>
                <select name="status" id="" class="form-control">
                    <option value="pending">{{trans('order_trans.pending')}}</option>
                        <option value="delivered">{{trans('order_trans.delivered')}}</option>
                        <option value="cancelled">{{trans('order_trans.cancelled')}}</option>
                </select>
                {{-- <input type="text" name="id" value="pending"> --}}
                {{-- <input type="hidden" name="name_en" value="{{$data->getTranslation('name','en')}}"> --}}
                <div class="modal-body">
                    {{-- <h3>{{trans('messages_trans.delete_sure')}}</h3> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('order_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('buttons_trans.edit')}}</button>
                </div>

            </form>


        </div>
    </div>
</div>
