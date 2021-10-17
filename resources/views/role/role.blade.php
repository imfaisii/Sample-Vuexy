@extends('layouts.master')
@include('vendors.datatable')
@include('theme_include.sweet_alert')
@include('theme_include.select')
@include('role.role_variables')

@push('custom_css')

@endpush

@section('content')
  
        <h3>Roles </h3>
        <p class="mb-2">
            Manage Roles assigned to Users
        </p>

        <!-- Role cards -->
        <div id="cards">
        <div class="row " > 
            <!-- Here All roles with Users are displayed here -->
            <x-role-cards-component />
            <x-role-add-component />
        </div>
    </div>
    <div class="row " >
            <x-role-add-modal-component />
            <x-edit_role_modal />
     </div>

     <div class="row">
         <div class="col-md-12" id="Rtable">
             <x-role-user-component />
             <x-role-user-modal-component />
         </div>
     </div>
        
        


    
@endsection

@push('custom_script')
<script>let val=true;</script>
<script src="{{asset('js/dynamic_ajax.js')}}"></script>
<script src="{{asset('js/role/add_role.js')}}"></script>
<script src="{{asset('js/role/delete_role.js')}}"></script>
<script src="{{asset('js/role/edit_role.js')}}"></script>
<script src="{{asset('js/role/table.js')}}"></script>
<script src="{{asset('js/role/add_role_user.js')}}"></script>
<script src="{{asset('js/role/reload_add_component.js')}}"></script>
<script>
    makeAdvDT("datatables-basic1", [1, 2, 3])
</script>

@endpush
