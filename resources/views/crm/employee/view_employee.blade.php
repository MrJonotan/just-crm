@extends('adminlte::page')
@section('title', __('adminlte::menu.employees'))
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                @permission('create-employee')
                    <ol class="breadcrumb float-right">
                        <li><button type="button" class="btn btn-tool" id="addEmployee"><i class="fa-solid fa-user-plus" title="Добавить сотрудика"></i></button></li>
                    </ol>
                @endpermission
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item active">Сотрудники</li>
                </ol>
            </nav>
        </div>
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-id-card"></i> Список сотрудников</b>
                </div>
                <div class="card-body" style="overflow-y: scroll;">
                    <div id="employess_list" class="row" style="height: 75vh">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-2">
            <div class="card">
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-filter"></i> {{__('adminlte::menu.filters')}}</b>
                </div>
                <div class="card-body" style="padding-top: 1vh" id="filters">
                    <div style="height: 69.5vh">
                        <div class="col-12">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.first_name')}}</span>
                            <input class="form-control filter" name="first_name" id="first_name">
                        </div>
                        <div class="col-12">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.name')}}</span>
                            <input class="form-control filter" name="name" id="name">
                        </div>
                        <div class="col-12">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.last_name')}}</span>
                            <input class="form-control filter" name="last_name" id="last_name">
                        </div>
                        <div class="col-12">
                            <span class="direct-chat-timestamp">Отдел</span>
                            <select class="form-control filter" name="department_id" id="department_id">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <span class="direct-chat-timestamp">Должность</span>
                            <select class="form-control filter" name="position_id" id="position_id">
                                @foreach($positions as $position)
                                    <option value="{{$position->id}}">{{$position->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger float-right" id="reset">{{__('adminlte::menu.reset')}} {{mb_strtolower(__('adminlte::menu.filters'))}}</button>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="newEmployee" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                @include('crm.employee.create', ['departments' => $departments, 'positions' => $positions, 'statuses' => $statuses])
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        $('document').ready(function () {
            $('#addEmployee').click( function (){
                $('#action_title').html("{{__('adminlte::menu.add')}} {{__('adminlte::menu.employee')}}a");
                $('#newEmployee').modal('show');
                $('#add').attr('hidden', false);
                $('#update').attr('hidden', true);
                $('#form_position_id').children().each(function (){
                    if($(this).attr('class')){
                        $(this).attr('hidden', 'true');
                    }
                });
                $('#employee_form').find('input, select').val('');
                $('#form_photo').attr('src', '/vendor/employees_photo/photos/no_photo.png');
            });

            $('#add').click(function (){
                employeeCreate();
            });
            employeesFilter();
        });

        jQuery.prototype.getDivData = function () {
            data = {};
            $(this).find('input, select').each(function(){
                data[$(this).attr('name')] = $(this).val();
            })
            return data;
        };

        $('#filters').find('select').change(function (){
            employeesFilter();
        });

        $('#filters').find('input').keyup(function (e){
            console.log(e.which);
            if(e.which == 13){
                employeesFilter();
            }
        });

        $('#reset').click(function() {
            $('#filters').find('input, select').each(function() {
                if($(this).attr('name') !== '_token')
                $(this).val("");
            });
            employeesFilter();
        });

        function formatDate(value){
            return value.split('.').reverse().join('-');
        }

        function employeesFilter(){
            $('#employess_list').empty();
            $.ajax({
                url: '/employee_search',
                type: 'POST',
                data:  $('#filters').getDivData(),
                success: function (data) {
                    $('#employess_list').append(data);
                    $('.update').click(function (){
                        console.log('update');
                        $('#action_title').html("{{__('adminlte::menu.edit')}} {{__('adminlte::menu.employee')}}a");
                        $('#add').attr('hidden', true);
                        $('#update').attr('hidden', false);
                        employeeEdit($(this).attr('id'));
                        $('#newEmployee').modal('show');
                    });
                },
            });
        }

        function employeeCreate(){
            // console.log($('#employee_form').getDivData());
            $.ajax({
                type: 'GET',
                url: 'employees/create',
                data:  $('#employee_form').getDivData(),
                success: function(response) {
                    $('#newEmployee').modal('hide');
                    toastr.success(response.message);
                    showItems(show_table_name);
                },
                error: function(xhr, status, error) {
                    let errors = ($.parseJSON(xhr.responseText));
                    $.each(errors.errors, function (){
                        toastr.error($(this)[0]);
                    })
                },
            });
        }

        function employeeEdit(id){
            $.ajax({
                url: '/employees/'+ id + '/edit',
                type: 'GET',
                success: function (data) {
                    $.each(data, function (index, value){
                        if(index === 'birthday' || index === 'date_of_employment'){
                            value = formatDate(value);
                        }
                        if(index === 'photo')
                            $('#form_' + index).attr('src', value);
                        $('#form_' + index).val(value);
                    })
                },
            });
        }

        function employeeUpdate(id){
            $.ajax({
                type: 'PATCH',
                url: '/employees/'+ id,
                data: $('#employee_form').getDivData(),
                success: function(response) {
                    $('#newEmployee').modal('hide');
                    toastr.success(response.message);
                    employeesFilter();
                    $('#employee_form').find('input, select').val("");
                },
                error: function(xhr, status, error) {
                    let errors = ($.parseJSON(xhr.responseText));
                    $.each(errors.errors, function (){
                        toastr.error($(this)[0]);
                    })
                },
            });
        }

        $('#form_department_id').change(function (){
            $('#form_position_id').children().each(function (){
                if($(this).val() !== '' && $(this).attr('class') === $('#form_department_id').val()){
                    $(this).removeAttr('hidden');
                }else if($(this).val() !== ''){
                    $(this).attr('hidden', 'true');
                }
            });
            $('#form_position_id').val("");
        });

        $('#update').click(function (){
            employeeUpdate($('#form_id').val());
        })
    </script>
@stop
