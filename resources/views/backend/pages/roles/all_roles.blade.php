@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ Route('add.role') }}" class="btn btn-inverse-info">Add Role</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Roles</h6>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sr. No. </th>
                                    <th>Role Name </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cnt = 1;
                                @endphp
                                @foreach ($roles as $data)
                                <tr>
                                    <td>{{ $cnt }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <a href="{{ Route('edit.role', $data->id) }}" class="btn btn-inverse-warning">Edit</a>
                                        <a href="{{ Route('delete.role', $data->id) }}" id="delete" class="btn btn-inverse-danger">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $cnt++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection