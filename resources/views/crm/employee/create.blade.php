<div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-action_title" id="action_title"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="col-12 row justify-content-center" id="employee_form">
            <div class="col-3">
                <span class="direct-chat-timestamp">Фото</span>
                <img id="form_photo" style="width: 110%">
                <span class="direct-chat-timestamp">Выбор нового фото</span>
                <input class="p-1" name="photo" id="form_photo" type="file" style="border: 15px ">
            </div>
            <div class="col-9 row justify-content-center" style="margin-left: 5px; margin-bottom: 10px">
                <input class="form-control" name="id" id="form_id" hidden="hidden">
                <div class="col-7">
                    <span class="direct-chat-timestamp">{{__('adminlte::menu.first_name')}}</span>
                    <input class="form-control" name="first_name" id="form_first_name">
                </div>
                <div class="col-5">
                    <span class="direct-chat-timestamp">{{__('adminlte::menu.name')}}</span>
                    <input class="form-control" name="name" id="form_name">
                </div>
                <div class="col-6">
                    <span class="direct-chat-timestamp">{{__('adminlte::menu.last_name')}}</span>
                    <input class="form-control" name="last_name" id="form_last_name">
                </div>
                <div class="col-4">
                    <span class="direct-chat-timestamp">Дата трудоустройства</span>
                    <input class="form-control" name="date_of_employment" id="form_date_of_employment" type="date">
                </div>
                <div class="col-2">
                    <span class="direct-chat-timestamp">Ставка</span>
                    <input class="form-control" name="stake" id="form_stake">
                </div>
                <div class="col-4">
                    <span class="direct-chat-timestamp">{{__('adminlte::menu.birthday')}}</span>
                    <input class="form-control" name="birthday" id="form_birthday" type="date">
                </div>

                <div class="col-8">
                    <span class="direct-chat-timestamp">Отдел</span>
                    <select class="form-control" name="department_id" id="form_department_id">
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-7">
                    <span class="direct-chat-timestamp">Должность</span>
                    <select class="form-control" name="position_id" id="form_position_id">

                        @foreach($positions as $position)
                            <option value="{{$position->id}}" @isset($position->department_id)class="{{$position->department_id}}" @endisset>{{$position->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-5">
                    <span class="direct-chat-timestamp">Статус</span>
                    <select class="form-control" name="job_status_id" id="form_job_status_id">
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <span class="direct-chat-timestamp">{{__('adminlte::adminlte.phone')}}</span>
                    <input class="form-control phone" name="phone" id="form_phone" type="text">
                </div>
                <div class="col-8">
                    <span class="direct-chat-timestamp">{{__('adminlte::adminlte.email')}}</span>
                    <input class="form-control" name="email" id="form_email" type="text">
                </div>
                <div class="col-6">
                    <span class="direct-chat-timestamp">{{__('adminlte::adminlte.password')}}</span>
                    <input class="form-control"  name="password" id="form_password" type="password">
                </div>
                <div class="col-6">
                    <span class="direct-chat-timestamp">{{__('adminlte::adminlte.retype_password')}}</span>
                    <input class="form-control" name="password_confirmation" id="form_password_confirmation" type="password">
                </div>
            </div>
            @csrf
        </div>
    </div>
    <div class="modal-footer" id="action_footer">
        <button type="button" class="btn btn-sm btn-success" id="add">{{__('adminlte::menu.add')}}</button>
        <button type="button" class="btn btn-sm btn-warning" id="update">{{__('adminlte::menu.update')}}</button>
    </div>
</div>
