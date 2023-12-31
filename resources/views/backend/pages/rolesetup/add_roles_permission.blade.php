@extends('admin.admin_dashboard')

@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>
    .form-check-label{
        text-transform: capitalize;
    }
</style>
<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Roles in Permission</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ Route('role.permission.store') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                    <select name="role_id" class="form-select">
                                        <option selected="" disabled>Select Group</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="" class="form-check-input" id="checkDefaultmain">
                                    <label class="form-check-label" for="checkDefaultmain">All Permission</label>
                                </div>
                                <hr>
                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" name="" class="form-check-input" id="checkDefault">
                                                <label class="form-check-label" for="checkDefault">{{ $group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            @php
                                                $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" name="permission[]" class="form-check-input" id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}">
                                                    <label class="form-check-label" for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            @endforeach
                                            <br>
                                        </div> <!-- .row -->
                                @endforeach
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary me-2">Add</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#checkDefaultmain').click(function(){
        if( $(this).is(':checked') ){
            $('input[type=checkbox]').prop('checked', true);
        }else{
            $('input[type=checkbox]').prop('checked', false);
        }
    });
</script>
@endsection