@permission('update-{{$permission}}')
<button class="btn btn-tool update" id="{{$model->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
@endpermission
@permission('delete-{{$permission}}')
<button class="btn btn-tool delete" id="{{$model->id}}"><i class="fa-solid fa-trash"></i></button>
@endpermission
