@extends('admin.admin_dashboard')
@section('admin')
<style>
  .text-muted{
    color: black !important;
  }
  m{
    color: black;
    
  }
  .btn.btn-icon.btn-xs svg{
    color: black !important;
  }
  input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px aliceblue inset;
    -webkit-text-fill-color: black;
  }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content" style="background-color: aliceblue;">

    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded" style="border: none;">
          <div class="card-body" style="background-color: aliceblue; border:none">
            <div class="d-flex align-items-center justify-content-between mb-2">

              <div>
                <img class="wd-100 rounded-circle" src="{{(!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) :url('upload/no_image.jpg')}}" alt="profile">
                <span class="h4 ms-3" style="color: black;">{{$profileData->username}}</span>
              </div>
            </div>

            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase" style="color: gray;">Name:</label>
              <p class="text-muted">{{$profileData->name}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase" style="color: gray;">Email:</label>
              <p class="text-muted">{{$profileData->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase" style="color: gray;">Phone:</label>
              <p class="text-muted">{{$profileData->phone}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase" style="color: gray;">Address:</label>
              <p class="text-muted">{{$profileData->address}}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue; border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Update Admin Profile</h6>

                        <form method="POST" action="{{ route('admin.profile.store')}}" class="forms-sample" enctype="multipart/form-data">
                          @csrf

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label" style="color: gray;">Username</label>
                                <input type="text" style="background-color: aliceblue;color:black; " name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->username}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Name</label>
                                <input type="text" style="background-color: aliceblue;color:black;" name="name" class="form-control" id="exampleInputEmail1" value="{{$profileData->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Email</label>
                                <input type="email" style="background-color: aliceblue;color:black;" name="email" class="form-control" id="exampleInputEmail1" value="{{$profileData->email}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray";>Phone</label>
                                <input type="text" style="background-color: aliceblue;color:black;" name="phone" class="form-control" id="exampleInputEmail1" value="{{$profileData->phone}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray";>Address</label>
                                <input type="text" style="background-color: aliceblue;color:black" name="address" class="form-control" id="exampleInputEmail1" value="{{$profileData->address}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray";>Photo</label>
                                <input class="form-control" style="background-color: aliceblue;" name="photo" type="file" id="image">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;"></label>
                                <img id="showImage" class="wd-80 rounded-circle" src="{{(!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) :url('upload/no_image.jpg')}}" alt="profile">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                </div>
            </div>
        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->

      <!-- right wrapper end -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
