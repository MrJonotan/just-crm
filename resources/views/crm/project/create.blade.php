@extends('adminlte::page')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item"><a href="/projects">Проекты</a></li>
                    @isset($project)<li class="breadcrumb-item"><a href="/projects/{{$project->id}}">{{$project->title}}</a></li>@endisset
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </nav>
        </div>
        <div class="row p-3" id="project_form">
            @isset($project)<input id="project_id" value="{{$project->id}}" hidden="hidden">@endisset
            @csrf
            <div class="col-5" style="height: 80vh;">
                @if(!isset($project))
                    @include('vendor.crm.project_detalis')
                @elseif($project->start_date_plan != '-')
                    @include('vendor.crm.project_detalis')
                @else
                    @include('vendor.crm.infinity_project_detalis')
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Цели</h3>
                    </div>
                    <div class="card-body" style="height: 44vh; overflow-y: scroll">
                        <span class="direct-chat-timestamp">Specific, конкретная</span>
                        <textarea class="form-control" name="specific">@isset($project) {{$project->specific}} @endisset</textarea>
                        <span class="direct-chat-timestamp">Measurable, измеримая</span>
                        <textarea class="form-control" name="measurable">@isset($project) {{$project->measurable}} @endisset</textarea>
                        <span class="direct-chat-timestamp">Achievable или attainable, достижимая</span>
                        <textarea class="form-control" name="achievable">@isset($project) {{$project->achievable}} @endisset</textarea>
                        <span class="direct-chat-timestamp">Relevant, актуальная</span>
                        <textarea class="form-control" name="relevant">@isset($project) {{$project->relevant}} @endisset</textarea>
                        <span class="direct-chat-timestamp">Time bound, ограниченная во времени</span>
                        <textarea class="form-control" name="time_bound">@isset($project) {{$project->time_bound}} @endisset</textarea>
                    </div>
                </div>
            </div>

            <div class="col-7" style="padding-right: 0; margin-right: 0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Команда</h3>
                    </div>
                    <div class="card-body" style=" overflow-y: scroll;">
                        <div class="row" id="employees" style="height: 60vh;">
                            @foreach($employees as $employee)
                                @if($employee->id !== Auth::user()->id)
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="info-box " style="margin-bottom: 0">
                                            <div class="info-box-content">
                                                <span class="info-box-number">{{$employee->first_name." ".$employee->name}}</span>
                                                <span class="info-box-text">{{$employee->position->title}}</span>
                                            </div>
                                            <span class="info-box-icon">
                                                <label class="checkbox">
                                                    <input type="checkbox" class="check-employee"
                                                       @isset($project)
                                                           @if($project->employees->firstWhere('employee_id', $employee->id))
                                                                checked
                                                           @endif
                                                       @endisset
                                                   value="{{$employee->id}}" style="opacity: 0">
                                                    <i class="fa-solid fa-circle-check" id="employee-{{$employee->id}}"></i>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($title == 'Добавить проект')
                        <button class="btn btn-secondary float-right" id="create_project">Создать</button>
                    @else
                        <button class="btn btn-secondary float-right" id="update_project" >Сохранить изменения</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fa-circle-check {
        color: #ced4da;
    }
    .checkbox{
        cursor: pointer;
    }
</style>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.check-employee').each(function () {
                    if ($(this).prop('checked')){
                        $('#employee-' + $(this).attr('value')).css('color', '#28a745');
                    }
                })
            }, 100);
            $('.check-employee').change(function (){
                if($(this).prop('checked')) {
                    $('#employee-' + $(this).attr('value')).css('color', '#28a745');
                }else{
                    $('#employee-' + $(this).attr('value')).css('color', '#ced4da');
                }
            });
            $('#create_project').click(function (){
                projectCreate();
            });
            $('#update_project').click(function (){
                projectUpdate($('#project_id').val());
            });
            $('#hours').focusout(function (){
                getEndDate();
            });
            $('#end_date_plan').focusout(function (){
                getEndDate();
            });
        });

        jQuery.prototype.getDivData = function () {
            data = {};
            $(this).find('input, select, textarea').each(function(){
                if(void 0 !== $(this).attr('name')){
                    data[$(this).attr('name')] = $(this).val();
                }
            });
            data['employees'] = [];
            $('#employees').find('input').each(function(){
                if($(this).prop('checked'))
                data['employees'].push($(this).val());
            });
            return data;
        };

        function getEndDate(){
            if($('#start_date_plan').val() !== ''){
                console.log('')
                $.ajax({
                    type: 'POST',
                    url: '/get_end_date',
                    data: {
                        'start': $('#start_date_plan').val(),
                        'hours': $('#hours').val(),
                        'end': $('#end_date_plan').val(),
                        '_token': '{{ @csrf_token() }}',
                    },
                    success: function(response) {
                        $('#end_date_plan').val(response);
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errors = ($.parseJSON(xhr.responseText));
                        $.each(errors.errors, function (){
                            toastr.error($(this)[0]);
                        })
                    },
                });
            }
        }


        function projectCreate(){
            $.ajax({
                type: 'POST',
                url: '/projects',
                data:  $('#project_form').getDivData(),
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function(xhr, status, error) {
                    let errors = ($.parseJSON(xhr.responseText));
                    $.each(errors.errors, function (){
                        toastr.error($(this)[0]);
                    })
                },
            });
        }

        function projectUpdate(id){

            $.ajax({
                type: 'PATCH',
                url: '/projects/' + id,
                data:  $('#project_form').getDivData(),
                success: function(response) {
                    toastr.success(response.message);
                    window.location.replace('/projects/'+ response.project_id);
                },
                error: function(xhr, status, error) {
                    let errors = ($.parseJSON(xhr.responseText));
                    $.each(errors.errors, function (){
                        toastr.error($(this)[0]);
                    })
                },
            });
        }

    </script>
@stop
