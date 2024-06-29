@extends('admin.admin_dashboard')
@section('admin')
<style>

</style>
<div class="page-content">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="row profile-body" style="background-color: aliceblue;">
      <!-- left wrapper start -->

      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper" >
        <div class="row">
            <div class="card" style="background-color: aliceblue;">
                <div class="card-body" >
                    <h6 class="card-title" style="color: black;">Add Permission</h6>

                        <form id="myForm" method="POST" action="{{ route('store.permission')}}" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;"  class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="Service">Service</option>
                                    <option value="Lead">Lead</option>
                                    <option value="Customer">Customer</option>
                                    <option value="ATM">ATM</option>
                                    <option value="Ticket">Ticket</option>
                                    <option value="Service Request">Service Request</option>
                                    <option value="Sale Report">Sale Report</option>
                                    <option value="Technical Report">Technical Report</option>
                                    <option value="Calendar">Calendar</option>
                                    <option value="User">User</option>
                                    <option value="role">Role & Permission</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
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
                amenities_name: {
                    required : true,
                },

            },
            messages :{
                amenities_name: {
                    required : 'Please Enter Amenities Name',
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
