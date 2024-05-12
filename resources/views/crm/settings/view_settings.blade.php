@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item active">Настройки</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="padding: 0vh">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($tabs as $tab)
                            @if($tab->id == 1)
                            <li class="nav-item">
                                <a class="nav-link active" id="{{$tab->table_name}}-tab" data-toggle="tab" href="#{{$tab->table_name}}" role="tab" aria-controls="{{$tab->table_name}}" aria-selected="true">{{$tab->visible_name}}</a>
                            </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" id="{{$tab->table_name}}-tab" data-toggle="tab" href="#{{$tab->table_name}}" role="tab" aria-controls="{{$tab->table_name}}" aria-selected="true">{{$tab->visible_name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="card-body" style="max-height: 75vh; min-height: 77.5vh; padding: 1vh">
                    <div class="tab-content" id="myTabContent">
                        @foreach($tabs as $tab)
                            @if($tab->id == 1)
                                <div class="tab-pane fade show active view_tables" id="{{$tab->table_name}}" role="tabpanel" aria-labelledby="{{$tab->table_name}}-tab"></div>
                            @else
                                <div class="tab-pane fade view_tables" id="{{$tab->table_name}}" role="tabpanel" aria-labelledby="{{$tab->table_name}}-tab"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('document').ready(function () {
            $('#addElementModal').click(function (){
                $('#addElement').modal('show');
            });
            $('#addDirectioriesModal').click(function (){
                $('#addElement').modal('show');
            });
            var show_table_name = $('#myTab').children().children('.active').attr('aria-controls');
            showItems(show_table_name);
            actions();
            $('#myTab').click(function(e){
                let table_name = e.target.getAttribute('aria-controls');
                showItems(table_name);
            });

            function getDivData() {
                data = {};
                $(this).find('input, select, checkbox').each(function(){
                    data[$(this).attr('id')] = $(this).val();
                })
                return data;
            };
            function formatDate(){
                value = $(this).text();
                return value.split('.').reverse().join('-');
            }
            jQuery.prototype.getDivData = getDivData;
            jQuery.prototype.formatDate = formatDate;

            function showItems(table_name){
                $.ajax({
                    type: 'GET',
                    url: 'settings/' + table_name,
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        $('.view_tables').empty();
                        $('.view_tables').html(data);
                        $('.view_tables').attr('id', table_name);
                        $('.view_tables').attr('aria-labelledby', table_name + '-tab');
                        $('.table').attr('id', table_name);
                        actions();
                        show_table_name = $('#myTab').children().children('.active').attr('aria-controls');
                    },
                });
            }

            function actions(){
                $('.delete').click(function (){
                    if(confirm("Вы уверены, что хотите удалить эту запись?")) {
                        deleteItem(show_table_name, $(this).attr('id'));
                    }
                });
                $('.edit').click(function(){
                    $("#row_" + $(this).attr('id')).find('td').each(function (){
                        let cell_id = $(this).attr('id');
                        let input_id = cell_id.substring(5, 15);
                        if(cell_id == 'cell_date'){
                            $(this).text($(this).formatDate());
                        }
                        $('.' + input_id).val($(this).text());
                    });
                    $('.update').attr('id', $(this).attr('id'));
                    if($('#add').attr('hidden') !== 'hidden'){
                        buttonsSwitch();
                    }
                });
                $('.update').click(function(){
                    udpateItem(show_table_name, $(this).attr('id'))
                    buttonsSwitch();
                    showItems(show_table_name);
                });
                $('.cancel').click(function(){
                    $('.add_element').find('input, select').each(function(){
                        $(this).val("");
                    })
                    buttonsSwitch();
                });
                $('#add').click(function (){
                        createItem(show_table_name);
                });
            }

            function buttonsSwitch(){
                if($('.add').attr('hidden')){
                    $('.add').attr('hidden', false);
                    $('.update').attr('hidden', true);
                    $('.cancel').attr('hidden', true)
                }else{
                    $('.add').attr('hidden', true);
                    $('.update').attr('hidden', false);
                    $('.cancel').attr('hidden', false);
                }
            }

            function deleteItem(table_name, id) {
                $.ajax({
                    type: 'DELETE',
                    url: 'settings/' + id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'table': table_name
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        showItems(show_table_name);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Произошла ошибка при удалении записи');
                        console.error(xhr.responseText);
                    }
                });
            }

            function createItem(table_name) {
                $.ajax({
                    type: 'GET',
                    url: 'settings/create',
                    data: {
                        'table': table_name,
                        'values' : $('#add_elements').getDivData(),
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

            function udpateItem(table_name, id) {
                $.ajax({
                    type: 'PUT',
                    url: 'settings/'  + id,
                    data: {
                        'table': table_name,
                        'values' : $('#add_elements').getDivData(),
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        showItems(show_table_name);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Произошла ошибка при обновлении записи');
                        console.error(xhr.responseText);
                    }
                });
            }

        });

    </script>
@stop
