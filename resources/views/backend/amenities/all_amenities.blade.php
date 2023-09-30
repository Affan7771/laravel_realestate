@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ Route('add.amenities') }}" class="btn btn-inverse-info">Add Amenities</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Amenities Types</h6>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sr. No. </th>
                                    <th>Amenities Name </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cnt = 1;
                                @endphp
                                @foreach ($amenities as $amenity)
                                <tr>
                                    <td>{{ $cnt }}</td>
                                    <td>{{ $amenity->amenities_name }}</td>
                                    <td>
                                        <a href="{{ Route('edit.amenity', $amenity->id) }}" class="btn btn-inverse-warning">Edit</a>
                                        <a href="{{ Route('delete.amenity', $amenity->id) }}" id="delete" class="btn btn-inverse-danger">Delete</a>
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