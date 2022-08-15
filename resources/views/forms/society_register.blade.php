@extends('layout.master-mini')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <h2 class="text-center mb-4">Society Registeration</h2>
      <div class="auto-form-wrapper">
        <form method="post" action="{{ action('SocietyController@store') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="name" class="form-control" placeholder="Society Name">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="address" class="form-control" placeholder="Society Address">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <input type="text" name="registeration_number" class="form-control" placeholder="Registeration Number">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <input class="form-control" name="registeration_date" type="date" value="2011-08-19" id="example-date-input" placeholder="Registeration Date">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <!-- <label class="form-control" for="bldg_no">Quantity (between 1 and 5):</label> -->
              <input class="form-control" type="number" id="bldg_no" name="bldg_no" min="1" max="50" placeholder="Number of Buildings">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <!-- <label class="form-control" for="flat_nos">Quantity (between 1 and 5):</label> -->
              <input class="form-control" type="number" id="flat_nos" name="flat_nos" min="1" max="500" placeholder="Number of Flats">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          

          
          
          
          <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> I agree to the terms </label>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection