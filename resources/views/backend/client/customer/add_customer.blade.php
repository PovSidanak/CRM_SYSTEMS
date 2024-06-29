@extends('admin.admin_dashboard')
@section('admin')
<style>
    .form-select {
    background-color: aliceblue;
  }
  .form-control{
    background-color: aliceblue !important;
    color: black !important;
  }
  .pagination {
    --bs-pagination-disabled-bg: aliceblue;
  }
  .dataTables_length{
    color: black;
  }
  .dataTables_info{
    color: black;
  }
  input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px aliceblue inset;
    -webkit-text-fill-color: black;
  }
  label > span {
  color: red;
  margin-left: 3px;
}
</style>
<div class="page-content" style="background-color: aliceblue;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="row profile-body" >
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue; border:none" >
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Add Customer</h6>

                        <form id="myForm" method="POST" action="{{ route('store.customers')}}" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Company Name <span>*</span></label>
                                <input type="text" style="background-color: aliceblue;color:black" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Email <span>*</span></label>
                                <input type="text" style="background-color: aliceblue;color:black" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Phone Number <span>*</span></label>
                                <input type="text" style="background-color: aliceblue;color:black" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Address <span>*</span></label>
                                <input type="text" style="background-color: aliceblue;color:black" name="address" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">City <span>*</span></label>
                                <input type="text" style="background-color: aliceblue;color:black" name="city" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Description <span>*</span></label>
                                <input type="text" style="background-color: aliceblue;color:black" name="description" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
