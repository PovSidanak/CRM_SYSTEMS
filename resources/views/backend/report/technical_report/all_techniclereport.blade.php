
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
  .dataTables_length select {
    color: black;}
    .page-link{
    background-color: white;
  }
  .page-link:hover{
    background-color: aliceblue;
  }
  input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px aliceblue inset;
    -webkit-text-fill-color: black;
  }
  label > span {
    color: red;
    margin-left: 3px;
  }
  .select2-hidden-accessible{
    background-color: aliceblue !important;
  }
  .js-example-basic-single{
    color: black !important;
  }
  .card {
    /* box-shadow: 3px 0 10px 0 #060b15; */
    /* -webkit-box-shadow: 3px 0 5px 0 #969798;
    -moz-box-shadow: 3px 0 5px 0 #e3e8f1;
    -ms-box-shadow: 3px 0 5px 0 #a5afc3; */
    box-shadow: 3px 0 10px 0 #060b15;
    -webkit-box-shadow: 3px 0 10px 0 #060b15;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content"style="background-color: aliceblue;">
<div>
    <div class="btn-group">
        @if (Auth::user()->can('add.technical.report'))
        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">
            Add Report
         </button>
        <button  type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" >
            <a class="dropdown-item" href="{{route('all.btireport')}}">BTI Request</a>
            <a class="dropdown-item" href="{{route('all.pmreport')}}">PM Request</a>
        </div>
        @endif
    </div>
</div>
    <br>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card" style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: black;">Technical Report All</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th style="color: gray;">ID</th>
            <th style="color: gray;">Name Company</th>
            <th style="color: gray;">Case Date</th>
            <th style="color: gray;">Report Type</th>
            <th style="color: gray;">Report</th>
            <th style="color: gray;">created Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $combine_array as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->name_customer}}</td>
                <td style="color: black;">{{ $item->case_date}}</td>
                <td style="color: black;">{{ $item->report_name}}</td>
                <td style="color: black;">PDF</td>
                <td style="color: black;">{{ $item->created_at}}</td>
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
      <div class="modal-content"  style="background-color: aliceblue;">
        <div class="modal-header">
          <h5 class="modal-title" id="varyingModalLabel"  style="color: black;">Add Report</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            <form id="myForm" method="POST" action="{{ route('store.techniclereports')}}" class="forms-sample" >
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" style="color: gray;" class="form-label">Customer Name <span>*</span></label>
                        <select name="customers_id" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                        <option selected="" disabled="">Select Name</option>
                       @foreach ($customers as $customer)
                       <option value="{{ $customer->id }}">{{ $customer->name }} </option>
                       @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Case Date <span>*</span></label>
                        <input type="date" name="case_date" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                </div>
                <div class="mb-3 form-group" >
                    <label for="exampleInputEmail1" style="color: gray;" class="form-label">Report Type <span>*</span></label>
                    <select name="report_name" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                    <option selected="" disabled="">Select Report</option>
                   <option value="BTI-Request">BTI-Request</option>
                   <option value="PM-Request">PM-Request</option>
                    </select>
                </div>
                <div class="mb-3 form-group" >
                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Upload File <span>*</span></label>
                    <input type="file" name="pdf" class="form-control" style="color: rgb(227, 217, 217);background-color:aliceblue" >
                </div>
                <button type="submit" class="btn btn-primary me-2">Save</button>
              </form>

        </div>

      </div>
    </div>
  </div>
@endsection
