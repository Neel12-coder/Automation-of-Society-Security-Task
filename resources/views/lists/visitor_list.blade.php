@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/dragula/dragula.min.css') !!}
@endpush

@section('content')
<h2>Visitors' list</h2>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="content">
    <div class="container">
      <!--<div class="row">
      
      <div class="col-lg-4">
        <div class="input-group">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">search</button>
        </div>
      </div>
      <div class="col-lg-4">
        <button type="button" class="btn btn-primary">Add new visitor</button>
      </div>-->
        <div class="row">
            @foreach ($visitors_regular as $visitor)
            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img src="{{str_replace('public/images/visitor_regulars','storage/images/visitor_regulars',asset($visitor->identification_photo))}}"  class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <div class="">
                            <h4></h4>
                            <p class="text-muted">{{$visitor->reason_for_visit}} <span>| </span><span><a href="#" class="text-pink">{{$visitor->registered_by}}</a></span></p>
                        </div>
                        <ul class="social-links list-inline">
                            
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Call visitor"><i class="fa fa-phone"></i></a></li>
                            
                        </ul>
                        <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">{{ $visitor->name }}</button>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mt-3">
                                        <h4>{{$visitor->phone_number}}</h4>
                                        <p class="mb-0 text-muted">Phone Number</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-3">
                                        <h4>5</h4>
                                        <p class="mb-0 text-muted">No. of houses to visit</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <ul class="pagination pagination-split mt-0 float-right">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span> <span class="sr-only">Previous</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span> <span class="sr-only">Next</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/dragula/dragula.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dragula.js') !!}
@endpush