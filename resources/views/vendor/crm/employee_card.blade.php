@foreach($employees as $employee)
    <div class="col-4">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
                @if(strlen(trim($employee->position->title)) > 40)
                    <h2 class="card-title">{{mb_substr($employee->position->title, 0, 35)}}...</h2>
                @else
                    <h2 class="card-title">{{$employee->position->title}}</h2>
                @endif
                <div class="card-tools">
                    @if(Auth::user()->id == $employee->id)
                        <a href="/password/reset" class="btn btn-tool"><i class="fa-solid fa-key"></i></a>
                    @endif
                    @permission('update-employee')
                        <button class="btn btn-tool update" id="{{$employee->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                    @endpermission
                    @permission('delete-employee')
                        <button class="btn btn-tool delete" id="{{$employee->id}}"><i class="fa-solid fa-trash"></i></button>
                    @endpermission
                </div>
            </div>
            <div class="card-body row" style="height: 220px">
                <div class="col-4 photo">
                    <img class="img-fluid" src="{{$employee->photo}}" alt="{{$employee->first_name . ' ' . $employee->name . ' ' . $employee->last_name}}" style="width: 120px; border-radius: 15px;">
                </div>
                <div class="col-8">
                    <h1 class="lead"><b>{{$employee->first_name . ' ' . $employee->name . ' ' . $employee->last_name}}</b></h1>
                    <h5 class="text-muted text-lg"><b>{{$employee->job_status->title}}</b></h5>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{$employee->department->title}}</li>
                        <li class="small"><span class="fa-li"><i class="fa-solid fa-at"></i></span> {{$employee->email}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> {{$employee->phone}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
