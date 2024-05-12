@foreach($employees as $employee)
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                @if(strlen($employee->position->title) > 35)
                    <h2 class="card-title">{{mb_substr($employee->position->title, 0, 35)}}...</h2>
                @else
                    <h2 class="card-title">{{$employee->position->title}}</h2>
                @endif
                <div class="card-tools">
                    @include('vendor.crm.update_delete_buttons', ['permission' => 'employee', 'model' => $employee])
{{--                    @permission('update-client')--}}
{{--                    <button class="badge btn-warning update" id="{{$employee->id}}"><i class="fa-solid fa-pen-to-square"></i></button>--}}
{{--                    @endpermission--}}
{{--                    @permission('delete-client')--}}
{{--                    <button class=" badge btn-danger delete" id="{{$employee->id}}"><i class="fa-solid fa-trash"></i></button>--}}
{{--                    @endpermission--}}

                </div>
            </div>
            <div class="card-body row" style="height: 220px">
                <div class="col-4 photo">
                    <img src="{{$employee->photo}}" alt="{{$employee->first_name . ' ' . $employee->name . ' ' . $employee->last_name}}" style="width: 120px; border-radius: 15px;">
                </div>
                <div class="col-8">
                    <h4>{{$employee->first_name . ' ' . $employee->name . ' ' . $employee->last_name}}</h4>
                    <b>Отдел: </b><span>{{$employee->department->title}}</span></br>
                    <b>Почта: </b><span>{{$employee->email}}</span></br>
                    <b>Телефон: </b><span>{{$employee->phone}}</span></br>

                </div>
            </div>
            <div class="card-footer">
                <h5 class="float-right">{{$employee->job_status->title}}</h5>
            </div>
        </div>
    </div>
@endforeach
