<div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title">Добавить документ</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row col-12 justify-content-center" id="add_document">
            <div class="col-6">
                <span class="direct-chat-timestamp">Документ</span>
                <input class="form-control" id="title" type="file" style="border: 15px ">
            </div>
            <div class="col-6">
                <span class="direct-chat-timestamp">{{__('adminlte::menu.title')}} {{__('adminlte::menu.project')}}a</span>
                <select class="form-control" id="project_id">
                    @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-success" id="add">{{__('adminlte::menu.add')}}</button>
    </div>
</div>
