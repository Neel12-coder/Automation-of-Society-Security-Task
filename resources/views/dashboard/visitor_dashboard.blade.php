@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<h2>Visitor Dashboard</h2>
<div class="row">

  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Visitors' list</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Member name </th>
                <th> Flat No. </th>
                <th> Phone number </th>
                <th> No. of visits </th>
                <!--<th> Deadline </th>-->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-medium"> 1 </td>
                <td> Herman Beck </td>
                <td> 101 </td>
                <td> <a href="tel:1234554321">1234554321</a>
                </td>
                <td> 3 </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 2 </td>
                <td> Messy Adam </td>
                
                <td> 203 </td>
                <td> <a href="tel:12121212">12121212</a>
                </td>
                <td> 4
                </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 3 </td>
                <td> John Richards </td>
              
                <td> 305 </td>
                <td> <a href="tel:1234554321">1234554321</a>
                </td>
                <td>1</td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 4 </td>
                <td> Peter Meggik </td>
                
                <td> 307 </td>
                <td> <a href="tel:1234554321">1234554321</a>
                </td>
                <td> 2
                </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 5 </td>
                <td> Edward </td>
              
                <td> 505 </td>
                <td> <a href="tel:1234554321">1234554321</a>
                </td>
                <td> 3
                </td>
              </tr>
              <!--<tr>
              <td>
              <a href="#">View more...</a></td>
              </tr>-->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush