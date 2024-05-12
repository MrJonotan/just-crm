<nav aria-label="breadcrumb" id="navbar">
    <ol class="breadcrumb float-right" id="statuses_buttons">
        @if(Auth::user()->id === $project->manager_id)
            <li>
                @if($project->status->title == 'Отложен' || $project->status->title == 'В архиве' )
                    <button type="button" class="btn btn-tool editStatus" id="2" title="Начать/Возобновить">
                        <i class="fa-solid fa-play"></i>
                    </button>
                @endif
                @if($project->status->title == 'В работе')
                    <button type="button" class="btn btn-tool editStatus" id="3" title="Остановить">
                        <i class="fa-solid fa-pause"></i>
                    </button>
                    <button type="button" class="btn btn-tool editStatus" id="1" title="Завершить">
                        <i class="fa-solid fa-stop"></i>
                    </button>
        @endif
        <li>
        <li>
            <a href="/projects/{{$project->id}}/edit" type="button" class="btn btn-tool" id="edit">
                <i class="fa-solid fa-pen" title="Редактировать"></i>
            </a>
        </li>
        <li>
            <button type="button" class="btn btn-tool" id="destroy">
                <i class="fa-solid fa-trash" title="Удалить"></i>
            </button>
        <li>
        @endif
        <li>
            <button type="button" class="btn btn-tool" id="calendarGraph">
                <i class="fa-solid fa-calendar-week" title="Календарный график"></i>
            </button>
        </li>
        <li><span class="badge badge-{{$project->priority->color}} mr-1" title="Приоритет">{{$project->priority->title}}</span></li>
        <li><span class="badge badge-{{$project->status->color}} ml-1" title="Статус">{{$project->status->title}}</span></li>
    </ol>
    <ol class="breadcrumb m-1">
        <li class="breadcrumb-item"><a href="/projects">Проекты</a></li>
        <li class="breadcrumb-item active">{{$project->title}}</a></li>
    </ol>
</nav>
