@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content" style="background-color: aliceblue;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style type="text/css">
    .form-check-label{
        text-transform: capitalize;
    }
    .form-check-label{
        text-transform: capitalize;
    }
    .form-check-input:checked {
    background-color: blue !important;
    border-color: black !important;
}
</style>

    <div class="row profile-body">
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue;border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Edit Role in Permission</h6>

                        <form id="myForm" method="POST" action="{{ route('admin.role.update',$role->id)}}" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color:black">Role Name</label>
                                <h3 style="color: black;">{{ $role->name}}</h3>

                            </div>
                            <div class="form-check mb-2">
                                <input type="checkbox" style="background-color: aliceblue;" class="form-check-input" id="checkDefaultmain">
                                <label class="form-check-label" for="checkDefaultmain" style="color: black;">Permission All</label>
                            </div>
                            <hr>
                            @foreach ($permission_group as $group)
                            <div class="row">
                                <div class="col-3">
                                    @php
                                        $permissions = App\Models\User::getpermissionByGroupName($group->group_name)
                                    @endphp
                                    <div class="form-check mb-2">
                                        <input type="checkbox" style="background-color:aliceblue" class="form-check-input" id="checkDefault" {{App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : ''}}>
                                        <label class="form-check-label" style="color: black;" for="ceheckDefault">{{ $group->group_name}}</label>
                                    </div>
                                </div>
                                <div class="col-9">
                                @foreach ($permissions as $permission)
                                <div class="form-check mb-2">
                                    <input type="checkbox" style="background-color:aliceblue" class="form-check-input" name="permission[]" id="checkDefault{{$permission->id}}" value="{{$permission->id}}" {{$role->hasPermissionTo($permission->name) ? 'checked' : ''}}>
                                    <label class="form-check-label" style="color: black;" for="ceheckDefault{{$permission->id}}">{{$permission->name}}</label>
                                </div>
                                @endforeach
                                <br>
                                </div>
                            </div> <!--// End Row -->
                            @endforeach
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">

    $('#checkDefaultmain').click(function(){
        if($(this).is(':checked')){
            $('input[type= checkbox]').prop('checked',true);
        }else{
            $('input[type= checkbox]').prop('checked',false);
        }
    });
</script>
@endsection
