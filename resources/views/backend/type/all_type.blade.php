@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ Route('add.type') }}" class="btn btn-inverse-info">Add Property Type</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Propert Types</h6>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sr. No. </th>
                                    <th>Type Name </th>
                                    <th>Type Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cnt = 1;
                                @endphp
                                @foreach ($types as $type)
                                <tr>
                                    <td>{{ $cnt }}</td>
                                    <td>{{ $type->type_name }}</td>
                                    <td>{{ $type->type_icon }}</td>
                                    <td>
                                        <a href="{{ Route('edit.type', $type->id) }}" class="btn btn-inverse-warning">Edit</a>
                                        <a href="{{ Route('delete.type', $type->id) }}" id="delete" class="btn btn-inverse-danger">Delete</a>
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