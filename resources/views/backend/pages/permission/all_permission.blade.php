@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ Route('add.permission') }}" class="btn btn-inverse-info">Add Permission</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Permission</h6>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sr. No. </th>
                                    <th>Permission Name </th>
                                    <th>Group Name </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cnt = 1;
                                @endphp
                                @foreach ($permissions as $data)
                                <tr>
                                    <td>{{ $cnt }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->group_name }}</td>
                                    <td>
                                        <a href="{{ Route('edit.permission', $data->id) }}" class="btn btn-inverse-warning">Edit</a>
                                        <a href="{{ Route('delete.permission', $data->id) }}" id="delete" class="btn btn-inverse-danger">Delete</a>
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