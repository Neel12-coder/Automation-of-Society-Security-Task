@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/dragula/dragula.min.css') !!}
@endpush

@section('content')

<div class="row">

  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Members' list</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Member name </th>
                <th> Flat No. </th>
                <th> Phone number </th>
                <th> No. of visitors </th>
                <!--<th> Deadline </th>-->
              </tr>
            </thead>
            <tbody>
            @foreach ($members as $member)
              <tr>
                <td class="font-weight-medium"> 1 </td>
                <td> {{$member->name}} </td>
                <td> {{$member->flat_number}} </td>
                <td> <a href="{{$member->phone_number}}">{{$member->phone_number}}</a>
                </td>
                <td> 3 </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/dragula/dragula.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dragula.js') !!}
@endpush