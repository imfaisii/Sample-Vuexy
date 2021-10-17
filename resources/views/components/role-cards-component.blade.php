
@foreach ($Role_with_user as $role_each)
<div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <span>{{$role_each->users->count()}} Users</span>
                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    @foreach ($role_each->users->take(5) as $each_user)
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{$each_user->name}}" class="avatar avatar-sm pull-up">
                        <img class="rounded-circle" src="{{asset('assets/images/Profile')}}/{{$each_user->UserAttributes->image}}" alt="user" />
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                <div class="role-heading">
                    <h4 class="fw-bolder">{{$role_each->name}}</h4>
                    
                    <a href="javascript:;" class="role-edit-modal" onclick="edit_role({{$role_each->id}})">
                        <small class="fw-bolder">Edit Role</small>
                    </a>
                </div>  
                <button type="button" class="btn btn-relief-danger"  onclick="delete_role({{$role_each->id}})">delete</button>
                {{-- <a href="javascript:void(0);"  onclick="delete_role({{$role_each->id}})" class="text-body"><i data-feather="x" class="font-medium-5"></i></a> --}}
            </div>
        </div>
    </div>
</div>
 @endforeach
 