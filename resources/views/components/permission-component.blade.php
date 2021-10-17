<!--/ Role cards -->

<h3 class="mt-50">Permission</h3>
<p class="mb-2">Find all Permissions In Your System</p>
<!-- table -->
<!-- Basic table -->
<section id="basic-datatable">
<div class="row">
    <div class="col-12">
        <div class="card">
            <button href="javascript:void(0)" data-bs-target="#addPermissionModal" data-bs-toggle="modal"  class="btn btn-primary ">
             Add Permission
            </button>
                           
            <table class="datatables-basic1 table" style="padding:2%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Guard</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
           
                    @foreach ($permission as $permission_each)
                        <tr>
                            <td></td>
                            <td>{{ $permission_each->name }}</td>
                            <td>{{ $permission_each->guard_name }}</td>
                            <td>
                                <button type="button" class="btn btn-relief-danger"  onclick="DelPermission('{{ $permission_each->id }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                 
                </tbody>
            </table>
        </div>
    </div>
</div>

</section>
<!--/ Basic table -->

<!-- table -->