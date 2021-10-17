  <!-- Add Role Modal -->
  <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
                <div class="text-center mb-4">
                    <h1 class="role-title">Add New Permission</h1>
                    <p>Add New Permission to Your System </p>
                </div>
                <!-- Add role form -->
                <form id="addPermissionForm" method="post" class="row" action="{{route('PermissionAdd')}}">
                    <div class="col-12">
                        <label class="form-label" for="modalRoleName">Permission Name</label>
                        <input type="text" id="permission_name" name="permission_name" class="form-control" placeholder="Enter Permission name" tabindex="-1" data-msg="Please enter Permission name" />
                    </div>
                 
                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>
                <!--/ Add role form -->
            </div>
        </div>
    </div>
</div>
<!--/ Add Role Modal -->