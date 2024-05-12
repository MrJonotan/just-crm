@extends('adminlte::page')
@section('title', $client->first_name . ' '. $client->name . ' '. $client->last_name)
@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            @permission('update-client')
            <ol class="breadcrumb float-right">
                <li><button type="button" class="btn btn-tool" id="editClient"><i class="fa-solid fa-pencil" title="Редактировать клиента"></i></button></li>
                <li><button type="button" class="btn btn-tool" hidden="hidden" id="updateClient"><i class="fa-solid fa-floppy-disk" title="Сохранить изменения"></i></button></li>
            </ol>
            @endpermission
            <ol class="breadcrumb m-1">
                <li class="breadcrumb-item"><a href="/clients">Клиенты</a></li>
                <li class="breadcrumb-item active">{{$client->first_name . ' '. $client->name . ' '. $client->last_name}}</li>
            </ol>
        </nav>
    </div>
    <div class="col-3">
        <div class="card" id="client_form">
            @csrf
            <input name="id" id="id" value="{{$client->id}}" hidden="hidden">
            <div class="card-body box-profile" style="height: 84.8vh">
                <div class="text-center" >
                    <img class="profile-user-img img-responsive details" id="photo" src="/{{$client->photo}}" alt="User profile picture" style="width: 17vw; display: block; border-radius: 15px">
                </div>
                <div class="col-12">
                    <h3 class="profile-username text-center details" id="full_name" >{{$client->first_name . ' '. $client->name . ' '. $client->last_name}}</h3>
                </div>
                <div class="col-12">
                    @if($client->projects->last() && $client->projects->last()->status_id !== 1)
                        <p class="text-muted text-center ">{{$client->projects->last()->title}}</p>
                    @else
                        <p class="text-muted text-center ">Нет активных проектов</p>
                    @endif
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Организация</b> <i class="float-right details" id="organization">{{$client->organization}}</i>
                    </li>
                    <li class="list-group-item">
                        <b>{{__('adminlte::adminlte.phone')}}</b> <i class="float-right details" id="phone">{{$client->phone}}</i>
                    </li>
                    <li class="list-group-item">
                        <b>{{__('adminlte::adminlte.email')}}</b> <a href="mailto:{{$client->email}}" class="float-right details" id="email">{{$client->email}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-header" style="padding: 0;">
                <ul class="nav nav-tabs border-bottom-0" >
                    <li class="nav-item"><a class="nav-link active" href="#order" data-toggle="tab">Заказ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">История взаимодействия</a></li>
                    @if($client->projects->last() && $client->projects->last()->status_id !== 1)
                        <li class="nav-item"><a class="nav-link" href="#projects" data-toggle="tab">Сведения о проектах</a></li>
                    @endif
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" style="height: 76vh">
                    <div class="active tab-pane" id="order" >
                        <div class="col-12">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p>{{$client->order}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                @include('vendor.crm.document_table', ['documents' => $client->documents])
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="timeline">
                        <div class="card-body" style="overflow-y: scroll; height: 71.5vh">
                            <div class="col-12 row justify-content-center">
                                <h1>Нет истории взаимодействия с клиентом</h1>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="" class="form-control">
                                    <span class="input-group-append">
                                <button type="button" class="btn btn-success"><i
                                        class="fa-solid fa-paper-plane"></i></button>
                            </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="projects">
                        <ul class="nav nav-tabs border-bottom-0" >
                            @foreach($client->projects as $project)
                                <li class="nav-item">
                                    <a class="nav-link @if($client->projects->last()->id == $project->id) active @endif d-inline-block text-truncate" href="#project-{{$project->id}}" data-toggle="tab" style="max-width: 250px;">
                                        {{$project->title}} <span class="badge badge-{{$project->status->color}}" title="Приоритет">{{$project->status->title}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" style="height: 76vh">
                            @foreach($client->projects as $project)
                                <div class="tab-pane @if($client->projects->last()->id == $project->id) active @endif" id="project-{{$project->id}}">
                                    <div class="card-body" style="overflow-y: scroll; ">
                                        <span>Начало проекта: {{$project->start_date_plan}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
    <script>
        $('document').ready(function () {
            $('#editClient').click(function (){
                swithButtons();
                addForm();
            });
            $('#updateClient').click(function (){
                swithButtons();
                update($('#id').val());
            });
        });
        function swithButtons(){
            if($('#updateClient').attr('hidden')){
                $('#editClient').attr('hidden', true);
                $('#updateClient').attr('hidden', false);
            }else{
                $('#editClient').attr('hidden', false);
                $('#updateClient').attr('hidden', true);
            }
        }
        function addForm(){
            text = [];
            $('.box-profile').find('.details').each(function (){
                text[$(this).attr('id')] = $(this);
                $(this).parent().append('<input class="'+ $(this).prop('classList')[0] +'    form-control col-8 form" id="'+ $(this).prop('tagName') +'"  name="'+ $(this).attr('id') +'" value="'+ $(this).text() +'">')
                $(this).remove();
            });
        }
        function update(id){
            console.log($('#client_form').getDivData());
            $.ajax({
                type: 'PATCH',
                url: '/clients/'+ id,
                data: $('#client_form').getDivData(),
                success: function(response) {
                    toastr.success(response.message);
                    console.log(response);
                    $('.client_form').find('.form').each(function (){
                        $(this).parent().append(text[$(this).attr('name')].text());
                        $(this).remove();
                    });
                },
                error: function(xhr, status, error) {
                    let errors = ($.parseJSON(xhr.responseText));
                    $.each(errors.errors, function (){
                        toastr.error($(this)[0]);
                    })
                },
            });
        }

        jQuery.prototype.getDivData = function () {
            data = {};
            $(this).find('input, select').each(function(){
                data[$(this).attr('name')] = $(this).val();
            })
            return data;
        };
    </script>
@stop
