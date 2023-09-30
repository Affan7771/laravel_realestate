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

                            <h6 class="card-title">Edit Amenities</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ Route('update.amenities') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $amenities->id }}">
                                <div class="form-group mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Amenity Name</label>
                                    <input type="text" name="amenity_name" class="form-control" value="{{ $amenities->amenities_name }}">
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
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                amenity_name: {
                    required : true,
                }, 
                
            },
            messages :{
                amenity_name: {
                    required : 'Please Enter amenity name',
                }, 
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
@endsection