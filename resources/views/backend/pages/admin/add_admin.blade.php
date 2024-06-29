@extends('admin.admin_dashboard')
@section('admin')
<style>
    input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
        background-color: aliceblue;
    }

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
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue;border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;" >Add Admin</h6>

                        <form id="myForm" method="POST" action="{{ route('store.admin')}}" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Admin User Name <span>*</span></label>
                                <input type="text" style="background-color: aliceblue; color:black" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Admin Name <span>*</span></label>
                                <input type="text" style="background-color: aliceblue; color:black" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Admin Email <span>*</span></label>
                                <input type="email" style="background-color: aliceblue; color:black" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Admin Phone <span>*</span></label>
                                <input type="text" style="background-color: aliceblue; color:black" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Admin Address <span>*</span></label>
                                <input type="text" style="background-color: aliceblue; color:black" name="address" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Admin Password <span>*</span></label>
                                <input type="password" style="background-color:aliceblue; color:black;" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Role Name <span>*</span></label>
                                <select name="roles" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                                    <option selected="" disabled="">Select Role</option>
                                   @foreach ($roles as $role)
                                   <option value="{{ $role->id }}">{{ $role->name }} </option>
                                   @endforeach
                                </select>
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
