  <!-- Add Role Modal -->
  <div class="modal fade" id="editPermissioneModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
                <div class="text-center mb-4">
                    <h1 class="role-title" id="edit_per_heading">Edit a Permission</h1>
                    <p>ReCheck a Permission and its Users</p>
                </div>
                <!-- Add role form -->
                <form id="edit_permission_form" method="post" class="row" action="{{route('EditPerUser')}}">
                    <div class="col-12">
                        <label class="form-label" for="modalRoleName">Permission Name</label>
                        <input type="text" id="editPerName" name="modalperName" class="form-control"  placeholder="Enter Permission name" tabindex="-1" data-msg="Please enter Permission name" />
                        <input type="hidden" id="old_id" name="old_id"  />
                  
                    </div>
                    <div class="col-12">
                        <h4 class="mt-2 pt-50">User Permissions</h4>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing" >
                                <tbody id="edit_per_user_table">
                               
                                
                               
                              
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary me-1" id="edit_per_submit">Submit</button>
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