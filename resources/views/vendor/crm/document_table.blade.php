<table class="table">
    <thead>
{{--    <tr>--}}
{{--        <th>{{__('adminlte::menu.title')}} {{__('adminlte::menu.documents)}}</th><th>{{__('adminlte::menu.title')}} {{__('adminlte::menu.project')}}</th>--}}
{{--    </tr>--}}
    </thead>
    <body>
        @foreach($documents as $document)
            <tr>
                <td hidden="hidden">{{$document->id}}</td>
                <td>{{$document->title}}</td>
                <td>
                    @if($document->project_id !== null)
                        <a href="projects/{{$document->project->id}}">{{$document->project->title}}</a></td>
                    @elseif($document->task_id !== null)
                        <a href="tasks/{{$document->task->id}}">{{$document->task->title}}</a></td>
                    @else
                        <a href="clients/{{$document->client->id}}">{{$document->client->first_name ." ". $document->client->name}}</a></td>
                    @endif
                <td>
                    <button class="badge btn-danger float-right p-1 m-1 delete" title="Удалить"><i class="fa-solid fa-trash"></i></button>
                    <button class="badge btn-success float-right p-1 m-1 download" title="Скачать"><i class="fa-solid fa-file-arrow-down"></i></button>
                </td>
            </tr>
        @endforeach
    </body>
</table>
