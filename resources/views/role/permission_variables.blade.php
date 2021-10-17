@push('custom_script')
<script>
    let route_delete_permission='{{route('DeletePermission')}}'
    let route_add_permission='{{route('PermissionAdd')}}'
    let route_add_user_permission='{{route('create.permission_to_user')}}'
    let route_get_user_of_a_permission='{{route('UserPer')}}'
    let route_get_permission='{{route('GetPermission')}}'
    
    let route_get_data_for_permissions='{{route('GetPermissionData')}}'
    
  
</script>
@endpush
