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

                            <h6 class="card-title">Edit Role</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ Route('update.role') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $role->id }}">
                                <div class="form-group mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $role->name }}">
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