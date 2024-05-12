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
                <img id="form_photo" style="width: 110%">
                <input class="p-1" name="photo" id="form_photo" type="file" style="border: 15px ">
            </div>
            <div class="col-9 row justify-content-center" style="margin-left: 5px; margin-bottom: 10px">
                <input class="form-control" name="id" id="form_id" hidden="hidden">
                <div class="col-4">
                    <input class="form-control" placeholder="{{__('adminlte::menu.first_name')}}" name="first_name" id="form_first_name">
                </div>
                <div class="col-4">
                    <input class="form-control" placeholder="{{__('adminlte::menu.name')}}" name="name" id="form_name">
                </div>
                <div class="col-4">
                    <input class="form-control" placeholder="{{__('adminlte::menu.last_name')}}" name="last_name" id="form_last_name">
                </div>
                <div class="col-4">
                    <input class="form-control" placeholder="{{__('adminlte::menu.birthday')}}" name="birthday" id="form_birthday" type="text" onfocus="(this.type='date')">
                </div>
                <div class="col-4">
                    <input class="form-control" placeholder="Дата трудоустройства" name="date_of_employment" id="form_date_of_employment" type="text" onfocus="(this.type='date')">
                </div>
                <div class="col-4">
                    <input class="form-control phone" placeholder="{{__('adminlte::adminlte.phone')}}" name="phone" id="form_phone" type="text">
                </div>
                <div class="col-8">
                    <input class="form-control" placeholder="{{__('adminlte::adminlte.email')}}" name="email" id="form_email" type="text">
                </div>
{{--                <div class="col-4">--}}
{{--                    <select class="form-control" name="job_status_id" id="form_job_status_id">--}}
{{--                        @foreach($statuses as $status)--}}
{{--                            <option value="{{$status->id}}">{{$status->title}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class="col-2">
                    <input class="form-control" placeholder="Ставка" name="stake" id="form_stake">
                </div>
{{--                <div class="col-5">--}}
{{--                    <select class="form-control" name="department_id" id="form_department_id">--}}
{{--                        @foreach($departments as $department)--}}
{{--                            <option value="{{$department->id}}">{{$department->title}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-5">--}}
{{--                    <select class="form-control" name="position_id" id="form_position_id">--}}
{{--                        @foreach($positions as $position)--}}
{{--                            {{$position}}--}}
{{--                            <option value="{{$position->id}}" @isset($position->department_id)class="{{$position->department_id}}" @endisset>{{$position->title}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
            </div>
            @csrf
        </div>
    </div>
    <div class="modal-footer" id="action_footer">
        <button type="button" class="btn btn-sm btn-success" id="add">{{__('adminlte::menu.add')}}</button>
        <button type="button" class="btn btn-sm btn-warning" id="update">{{__('adminlte::menu.update')}}</button>
    </div>
</div>
