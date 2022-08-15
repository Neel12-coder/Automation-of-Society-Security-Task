@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/dragula/dragula.min.css') !!}
@endpush

@section('content')

<div class="card" >
  <div class="card-body">
    <h5 class="card-title" style="color:red;"><b>Visitor's Registration</b></h5>
    <form method="post" action="{{ action('VisitorRegularController@store') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="vname">Visitor`s Name</label>
      <input type="text" name="visitorName" class="form-control" id="vname" placeholder="Enter Visitor`s Full Name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="email">Visitor's Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="purpose">Purpose Of Visit</label>
      <input type="text" name="purposeOfVisit" class="form-control" id="purpose" placeholder="Enter Visitor`s Purpose Of Visit">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="pno">Contact Number Of Visitor</label>
      <input type="text" name="phone_number" class="form-control" id="pno" placeholder="Enter Visitor`s Contact Number">
    </div>
  </div>
  <div class="form-group">
    <label for="photo">Please Upload Visitor's Recent Photograph</label>
    <input type="file" name="profile_image" class="form-control-file" id="photo">
  </div>
   <!--<button type="submit" class="btn btn-primary">Back</button>!-->
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
</div>

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/dragula/dragula.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dragula.js') !!}
@endpush
