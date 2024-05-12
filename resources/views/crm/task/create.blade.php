<div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-action_title" id="action_title"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="col-12 row justify-content-center" id="task_form">
            <div class="col-6">
                <input class="form-control" placeholder="{{__('adminlte::menu.title')}}" name="title">
            </div>
            <div class="col-4" hidden="hidden">
                <input class="form-control" name="project_id" value="{{$project->id}}">
            </div>
            <div class="col-4">
                <select class="form-control" name="status_id">
                    @foreach($task_statuses as $status)
                        <option value="{{$status->id}}">{{$status->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <input class="form-control" placeholder="Этап" name="stage" type="number">
            </div>
            <div class="col-4">
                <select class="form-control" name="priority_id">
                    @foreach($priorities as $priority)
                        <option value="{{$priority->id}}">{{$priority->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <input class="form-control phone" placeholder="{{__('adminlte::adminlte.phone')}}" name="phone" id="form_phone" type="text">
            </div>
            <div class="col-8">
                <input class="form-control" placeholder="{{__('adminlte::adminlte.email')}}" name="email" id="form_email" type="text">
            </div>
            <div class="col-4">
                <select class="form-control" name="job_status_id" id="form_job_status_id">
{{--                        @foreach($statuses as $status)--}}
{{--                            <option value="{{$status->id}}">{{$status->title}}</option>--}}
{{--                        @endforeach--}}
                </select>
            </div>
            <div class="col-2">
                <input class="form-control" placeholder="Ставка" name="stake" id="form_stake">
            </div>
            <div class="col-5">
                <select class="form-control" name="department_id" id="form_department_id">
{{--                        @foreach($departments as $department)--}}
{{--                            <option value="{{$department->id}}">{{$department->title}}</option>--}}
{{--                        @endforeach--}}
                </select>
            </div>
            <div class="col-5">
                <select class="form-control" name="position_id" id="form_position_id">
{{--                        @foreach($positions as $position)--}}
{{--                            {{$position}}--}}
{{--                            <option value="{{$position->id}}" @isset($position->department_id)class="{{$position->department_id}}" @endisset>{{$position->title}}</option>--}}
{{--                        @endforeach--}}
                </select>
            </div>
            <div class="col-6 password" hidden="hidden">
                <input class="form-control password" placeholder="{{__('adminlte::adminlte.password')}}" name="password" id="form_password">
            </div>
            <div class="col-6 password" hidden="hidden">
                <input class="form-control password" placeholder="{{__('adminlte::adminlte.retype_password')}}" name="password_confirmation" id="form_password_confirmation">
            </div>
        </div>
    </div>
    <div class="modal-footer" id="action_footer">
        <button type="button" class="btn btn-sm btn-success" id="add">{{__('adminlte::menu.add')}}</button>
        <button type="button" class="btn btn-sm btn-warning" id="update">{{__('adminlte::menu.update')}}</button>
    </div>
</div>
