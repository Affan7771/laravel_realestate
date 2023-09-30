@extends('admin.admin_dashboard')

@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Permission</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ Route('update.permission') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $permission->id }}">
                                <div class="form-group mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Group Name</label>
                                    <select name="group_name" class="form-select">
                                        <option selected="" disabled>Select Group</option>
                                        <option value="type" {{ $permission->group_name == 'type' ? 'selected' : '' }}>Property Type</option>
                                        <option value="amenities" {{ $permission->group_name == 'amenities' ? 'selected' : '' }}>Amenities</option>
                                        <option value="role_permission" {{ $permission->group_name == 'role_permission' ? 'selected' : '' }}>Role & Permission</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection