@extends('admin.admin_dashboard')
@section('admin')
<style>
  .page-breadcrumb .breadcrumb {
    background: aliceblue;
}
.form-select {
    background-color: aliceblue;
  }
  .form-control{
    background-color: aliceblue;
  }
  .pagination {
    --bs-pagination-disabled-bg: aliceblue;
  }
</style>
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

    <div>
        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#varyingModal"
            data-bs-whatever="@mdo">
            <i class="btn-icon-prepend" data-feather="plus"></i>Add Role
        </button>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card" style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: gray;">All Role Permission</h6>
    <div class="table-responsive">
      <table  class="table">
        <thead>
          <tr>
            <th style="color: gray;">S1</th>
            <th style="color: gray;">Role Name</th>
            <th style="color: gray;">Permission Name</th>
            <th style="color: gray;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $roles as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->name}}</td>
                <td>
                @foreach ($item->permissions as $perm)
                <span class="badge bg-danger">{{ $perm->name }}</span>
                @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.edit.role',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('admin.delete.role',$item->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a>
                </td>

              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>
 {{-- Create form --}}
 <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: aliceblue;">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingModalLabel" style="color: black;">Add Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm" method="POST" action="{{ route('store.role')}}" class="forms-sample" >
                    @csrf
                      <div class="mb-3 form-group" >
                          <label for="exampleInputEmail1" class="form-label" style="color:black">Role Name <span>*</span></label>
                          <input type="text" name="name" style="background-color: aliceblue; color:black" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                  </form>
            </div>

        </div>
    </div>
</div>
@endsection
