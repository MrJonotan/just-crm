@extends('adminlte::page')
@section('content')
    <div class="content row" style="overflow-y: hidden; overflow-x: hidden">
        <div class="col-lg-12">
            <div class="card-header col-12">
                <div class="card-tools" style="padding-top: 20px">
                </div>
                <h3>Доска задач</h3>
            </div>
            <div style="min-width: 86.6vw; max-width: 250vw; max-height: 87vh; overflow-y: hidden;  display: flex; flex-wrap: nowrap; margin-top: 2vh;">

            @foreach($task_statuses as $task_status)
                <div class="card" style="max-width: 25vw; min-width: 19vw; margin-left: 0.3%; margin-right: 0.3%">
                    <div class="card-header bg-{{$task_status->color}}" style=" position: sticky; top: 0; z-index: 3">
                        <h3 style="color: #ffffff">{{$task_status->title}}</h3>
                    </div>
                    <div class="card-body list" id="{{$task_status->id}}" style="min-height: 74.3vh; overflow-x: hidden; overflow-y: scroll;">
                    </div>
                </div>
            @endforeach

{{--                <div class="card" style="max-width: 25vw; min-width: 19vw; margin-left: 0.3%; margin-right: 0.3%">--}}
{{--                    <div class="card-header bg-warning" style="position: sticky; top: 0; z-index: 3">--}}
{{--                        <h3 style="color: #ffffff">Пользовательский статус</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body list" id="in_working" style="min-height: 74.3vh; overflow-x: hidden; overflow-y: scroll;">--}}
{{--                        @include('vendor.crm.task_card_min')--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card" style="max-width: 25vw; min-width: 19vw; margin-left: 0.3%; margin-right: 0.3%">--}}
{{--                    <div class="card-header bg-info" style="position: sticky; top: 0; z-index: 3">--}}
{{--                        <h3 style="color: #ffffff">На приемке</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body list" id="on_review" style="min-height: 74.3vh; overflow-x: hidden; overflow-y: scroll;">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card" style="max-width: 25vw; min-width: 19vw; margin-left: 0.3%; margin-right: 0.3%">--}}
{{--                    <div class="card-header bg-secondary" style="background-color: #28a745; position: sticky; top: 0; z-index: 3" >--}}
{{--                        <h3 style="color: #ffffff">Отложена</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body list" id="completed" style="min-height: 74.3vh; overflow-x: hidden; overflow-y: scroll;">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card" style="max-width: 25vw; min-width: 19vw; margin-left: 0.3%; margin-right: 0.3%">--}}
{{--                    <div class="card-header bg-success" style="background-color: #28a745; position: sticky; top: 0; z-index: 3" >--}}
{{--                        <h3 style="color: #ffffff">Готово</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body list" id="completed" style="min-height: 74.3vh; overflow-x: hidden; overflow-y: scroll;">--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function(){
            $( ".list" ).sortable({
                revert: true
            });
            $('.element').css('cursor', 'pointer');
            $('.element').draggable({
                appendTo: '.list',
                connectToSortable: '.list',
                containment: '.content',
                cursorAt: { right: 2 },
                stack: '.list',
                //revert: "invalid",
                // drag : function () {
                //     console.log("драг происходит");
                // },
                stop: function () {

                    toastr.success('Статус задачи изменен на ' + $(this).parent('.list').parent('.card').children('.card-header').text());
                }
            });

        })
    </script>
@stop
