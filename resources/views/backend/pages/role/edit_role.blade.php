@extends('admin.admin_dashboard')
@section('admin')
<style>
input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
  -webkit-box-shadow: 0 0 0 30px aliceblue inset;
  -webkit-text-fill-color: black;}
label > span {
    color: red;
    margin-left: 3px;
}
</style>

<div class="page-content" style="background-color: aliceblue;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="row profile-body">
      <!-- left wrapper start -->

      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue;border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Edit Role</h6>

                        <form id="myForm" method="POST" action="{{ route('update.role')}}" class="forms-sample" >
                          @csrf
                          <input type="hidden" name="id" value="{{ $role->id}}">
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: black;">Role Name <span>*</span></label>
                                <input type="text" name="name" style="background-color: aliceblue; color:black" class="form-control" value="{{ $role->name}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
