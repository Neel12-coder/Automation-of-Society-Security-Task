@extends('layout.master')

@section('content')

<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <h2 class="text-center mb-4">Add Irregular Visitor Details</h2>
      <div class="auto-form-wrapper">

      <form method="post" action="{{ action('IrregularVisitorLogController@store') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="file-field">
                <div class="mb-4">
                <center><img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" width="100" height="100"  class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar"></div></center>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="btn btn-mdb-color btn-rounded float-left">
                        <span>Add photo</span>
                        <input type="file" name="image">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter your full name">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Enter your email adress">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputnumber" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="inputnumber" placeholder="Enter your phone number">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputreason" class="col-sm-2 col-form-label">Visit Purpose</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="reason_for_visit" id="inputreason" placeholder="Enter purpose of visit">
                </div>
            </div>
        
            <div class="form-group row">
                <div class="col-sm-10">
                    <input class="btn btn-primary btn-lg" type="submit" value="Add details">
                </div>
            </div>
            

        </form>
    </div>
    </div>
  </div>
</div>
@endsection