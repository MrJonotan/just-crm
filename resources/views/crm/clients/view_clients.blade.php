@extends('adminlte::page')
@section('title', __('adminlte::menu.clients'))
@section('content')
    <div class="row" style="overflow-y: hidden">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                @permission('create-client')
                <ol class="breadcrumb float-right">
                    <li><button type="button" class="btn btn-tool" id="addClient"><i class="fa-solid fa-user-plus" title="Добавить клиента"></i></button></li>
                </ol>
                @endpermission
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item active">{{__('adminlte::menu.clients')}}</li>
                </ol>
            </nav>
        </div>


        <div class="col-12">
            <div class="card collapsed-card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title"><i class="fa-solid fa-filter"></i> Фильтры</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" id="filters" style="padding-top: 1vh; display: none;">
                    <div class="col-12 row">
                        <div class="col-2">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.first_name')}}</span>
                            <input class="form-control" name="first_name" id="first_name">
                        </div>
                        <div class="col-2">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.name')}}</span>
                            <input class="form-control" name="name" id="name">
                        </div>
                        <div class="col-2">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.last_name')}}</span>
                            <input class="form-control" name="last_name" id="last_name">
                        </div>
                        <div class="col-2">
                            <span class="direct-chat-timestamp">{{__('adminlte::adminlte.phone')}}</span>
                            <input class="form-control" name="phone" id="phone">
                        </div>
                        <div class="col-2">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.organization')}}</span>
                            <input class="form-control" name="organization" id="organization">
                        </div>
                        <div class="col-2">
                            <span class="direct-chat-timestamp">{{__('adminlte::adminlte.email')}}</span>
                            <input class="form-control" name="email" id="email">
                        </div>
                        @csrf
                    </div>
                </div>
            </div>

            <div class="card" style="max-height: 720px; min-height: 680px; bottom: 0;">
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-list-alt"></i> Список клиентов</b>
                </div>
                <div class="card-body" style="overflow-y: scroll">
                    <div class="row" id="clients_list" >
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('document').ready(function () {
            clientsFilter();
        });

        $('#filters').find('select').change(function (){
            clientsFilter();
        });

        $('#title').keyup(function (e){
            if(e.which == 13){
                clientsFilter();
            }
        });

        function getDivData() {
            data = {};
            $(this).find('input, select').each(function(){
                data[$(this).attr('name')] = $(this).val();
            })
            return data;
        };
        jQuery.prototype.getDivData = getDivData;

        function clientsFilter(){
            $('#clients_list').empty();
            $.ajax({
                url: '/clients_search',
                type: 'POST',
                data:  $('#filters').getDivData(),
                success: function (data) {
                    $('#clients_list').append(data);
                },
            });
        }
        $
    </script>
@stop
