
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete_{{$type}}_{{$data->id}}">
    {{trans('buttons_trans.delete')}}
</button>

<!-- Modal -->
<div class="modal fade" id="delete_{{$type}}_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('order_trans.delete')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route($routes,$data->id)}}" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                {{-- <input type="hidden" name="name_en" value="{{$data->getTranslation('name','en')}}"> --}}
                <div class="modal-body">
                    <h3>{{trans('messages_trans.delete_sure')}}</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('order_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('buttons_trans.delete')}}</button>
                </div>

            </form>


        </div>
    </div>
</div>
