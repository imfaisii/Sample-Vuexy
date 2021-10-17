<!--/ Role cards -->

        <h3 class="mt-50">Total users with their roles</h3>
        <p class="mb-2">Find all of your company’s administrator accounts and their associate roles.</p>
        <!-- table -->
     <!-- Basic table -->
     <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <button href="javascript:void(0)" data-bs-target="#addRoleUserModal" data-bs-toggle="modal"  class="btn btn-primary ">
                      Assign Role To User
                    </button>
                                   
                    <table class="datatables-basic1 table" style="padding:2%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Role</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roleuser as $access_role_each)
                            @foreach ($access_role_each->users as $rol)
                                <tr>
                                    <td></td>
                                    <td>{{ $access_role_each->name }}</td>
                                    <td>{{ $rol->name }} : {{$rol->email}}</td>
                                    <td>
                                        <button type="button" class="btn btn-relief-danger"  onclick="DelUserhasRol('{{ $rol->id }}','{{ $access_role_each->name }}')">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </section>
    <!--/ Basic table -->
      
        <!-- table -->