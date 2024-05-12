@extends('adminlte::page')
@section('title', 'Документы')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                @permission('create-document')
                    <ol class="breadcrumb float-right">
                        <li><button type="button" id="addDocument" class="btn btn-tool"><i class="fa-solid fa-file-circle-plus" title="Добавить документ"></i></button></li>
                    </ol>
                @endpermission
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item active">Документы</li>
                </ol>
            </nav>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-id-card"></i> {{__('adminlte::menu.list')}} {{(__('adminlte::menu.document'))}}</b>
                </div>
                <div class="card-body" id="document_list" style="overflow-y: scroll; height: 79vh;">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" id="filters">
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-filter"></i> {{__('adminlte::menu.filters')}}</b>
                </div>
                <div class="card-body row" style="padding-top: 1vh">
                    <div class="col-12">
                        <div class="col-12">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.title')}} {{__('adminlte::menu.document')}}a</span>
                            <input class="form-control" id="title">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="col-12">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.title')}} {{__('adminlte::menu.project')}}a</span>
                            <select class="form-control" id="project_id">
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="col-12">
                            <span class="direct-chat-timestamp">{{__('adminlte::menu.date')}} {{__('adminlte::menu.created')}}</span>
                            <input class="form-control" id="document_date" type="date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="newDocument" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                @include('crm.documents.create')
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('document').ready(function () {
            documentsFilter();
            $('#addDocument').click( function (){
                $('#newDocument').modal('show');
            });
            $('#add').click( function (){
                upload();
            });
        });

        function getDivData() {
            data = {};
            $(this).find('input, select, checkbox').each(function(){
                data[$(this).attr('id')] = $(this).val();
            })
            return data;
        };
        jQuery.prototype.getDivData = getDivData;

        function documentsFilter(){
            $('#document_list').empty();
            $.ajax({
                url: '/document_search',
                type: 'POST',
                data: {
                    'values': $('#filters').getDivData(),
                    '_token': '{{ csrf_token() }}',
                },
                success: function (data) {
                    console.log(data);
                    $('#document_list').append(data);
                },
            });
        }

        function upload(){
            $.ajax({
                type: 'GET',
                url: 'documents/create',
                data: {
                    'values' : $('#add_document').getDivData(),
                    '_token': '{{ csrf_token() }}',
                },
                success: function(response) {
                    toastr.success(response.message);
                    showItems(show_table_name);
                },
                error: function(xhr, status, error, response) {
                    toastr.error(response.message);
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@stop
