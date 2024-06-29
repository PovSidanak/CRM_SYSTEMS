@extends('admin.admin_dashboard')
@section('admin')
<style>
  .pagination {
    --bs-pagination-disabled-bg: aliceblue;
  }
  .page-breadcrumb .breadcrumb {
    background: aliceblue;
  }
  .form-select {
    background-color: aliceblue;
  }
  .form-control{
    background-color: aliceblue !important;
    color: black !important;
  }
  .dataTables_length{
    color: black;
  }
  .dataTables_info{
    color: black;
  }
  .dataTables_length select {
    color: black;}
    .page-link{
    background-color: white;
  }
  .page-link:hover{
    background-color: aliceblue;
  }
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

        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">
           <i class="btn-icon-prepend" data-feather="plus"></i>Add Permission
        </button>

    </div>
    <br>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card" style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: black;">Permission All</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th style="color: gray;">S1</th>
            <th style="color: gray;">Permission Name</th>
            <th style="color: gray;">Group Name</th>
            {{-- <th style="color: gray;">Action</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ( $permissions as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->name}}</td>
                <td style="color: black;">{{ $item->group_name}}</td>
                {{-- <td>
                    @if (Auth::user()->can('edit.permission'))
                    <a href="{{ route('edit.permission',$item->id)}}" class="btn btn-inverse-warning" >Edit</a>
                    @endif
                    @if (Auth::user()->can('delete.permission'))
                    <a href="{{ route('delete.permission',$item->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a>
                    @endif
                </td> --}}

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
            <h6 class="card-title" style="color: black;">Add Permission</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            <form id="myForm" method="POST" action="{{ route('store.permission')}}" class="forms-sample" >
                @csrf
                  <div class="mb-3 form-group" >
                      <label for="exampleInputEmail1" class="form-label" style="color: black;">Permission Name <span>*</span></label>
                      <input type="text" name="name" class="form-control" required>
                  </div>
                  <div class="mb-3 form-group" >
                      <label for="exampleInputEmail1" class="form-label" style="color: black;">Group Name <span>*</span></label>
                      <select name="group_name" class="form-select" id="exampleFormControlSelect1" style="color:black;" required>
                          <option selected="" disabled="" style="color:black;">Select Group</option>
                          <option style="color:black;" value="Service">Service</option>
                          <option value="Lead" style="color:black;">Lead</option>
                          <option value="Customer" style="color:black;">Customer</option>
                          <option value="ATM" style="color:black;">ATM</option>
                          <option value="Ticket" style="color:black;">Ticket</option>
                          <option value="Service Request" style="color:black;">Service Request</option>
                          <option value="Sale Report" style="color:black;">Sale Report</option>
                          <option value="Technical Report" style="color:black;">Technical Report</option>
                          <option value="Calendar" style="color:black;">Calendar</option>
                          <option value="User" style="color:black;">User</option>
                          <option value="role" style="color:black;">Role & Permission</option>
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Save Changes</button>
              </form>
        </div>

      </div>
    </div>
  </div>
@endsection
