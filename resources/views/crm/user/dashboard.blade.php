@extends('adminlte::page')
@section('content')
    <div class="content-wrapper kanban" style="margin-left: 0 !important; overflow-y: hidden">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item active">Доска задач</li>
                </ol>
            </nav>
        </div>
        <section class="content pb-3" style="height: 87.7vh">
            <div class="container-fluid h-100">
                @foreach($task_statuses as $task_status)
                    <div class="card card-row card-{{$task_status->color}}">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{$task_status->title}}
                            </h3>
                        </div>
                        <div class="card-body list" id="{{$task_status->id}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <div class="hidden" hidden="hidden">
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function(){
            getTasks();
        });

        function dragAndDrop(){
            $( ".list" ).sortable({
                revert: true,
            });
            $('.element').css('cursor', 'pointer');
            $('.element').draggable({
                appendTo: '.list',
                connectToSortable: '.list',
                containment: '.content',
                cursorAt: { right: 2 },
                stack: '.list',
                addClasses: true,
                //revert: "invalid",
                drag : function () {
                    console.log("драг происходит");
                },
                stop: function () {

                    toastr.success('Статус задачи изменен на ' + $(this).parent('.list').parent('.card').children('.card-header').text());
                }
            });
        }

        function getTasks(){
            $.ajax({
                type: 'POST',
                url: 'dashboard/get_tasks',
                data : { '_token': '{{ csrf_token() }}'},
                success: function(data) {
                    console.log(data);
                    $('.hidden').append(data);
                    for(i = $('.list').first().attr('id');  i <= $('.list').last().attr('id'); i++){
                        $('#'+i).append($('.status-'+i));
                    }
                    $('.hidden').remove();
                    dragAndDrop();
                },
                error: function(xhr, status, error, response) {
                    toastr.error(response.message);
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@stop
