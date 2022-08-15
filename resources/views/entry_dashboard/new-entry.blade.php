@extends('layout.master')

@section('content')
<link rel="stylesheet" href="{{asset('entry-assets/style.css')}}">
<script>
  function getMessage() {
    $.ajax({
        type:'POST',
        url:'/entry-dashboard/entry',
        data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
        success: function (data) {
          console.log(data);
          $('.gauge').each(function (index, item) {
            let gauge = $(item).dxCircularGauge('instance');
            let temp = data.temperature;
            let gaugeElement = $(gauge._$element[0]);
    
            gaugeElement.find('.dxg-title text').last().html(`${temp} ºC`);
            gauge.value(temp);
          });
          $("#avatar").attr("src",data.visitor_image);
          if(data.temp <= 34 && data.face_identified == 1){
            $('#circleloader1').hide();
            $('#success1').show();
            $('#error1').hide();

            $('#circleloader2').hide();
            $('#success2').show();
            $('#error2').hide();
            
          }else if(data.temp > 34 && data.face_identified == 1){
            $('#circleloader1').hide();
            $('#success1').hide();
            $('#error1').show();

            $('#circleloader2').hide();
            $('#success2').show();
            $('#error2').hide();
            
          }else if(data.temp <= 34 && data.face_identified == 0){
            $('#circleloader1').hide();
            $('#success1').show();
            $('#error1').hide();

            $('#circleloader2').hide();
            $('#success2').hide();
            $('#error2').show();
            
          }else if(data.temp > 34 && data.face_identified == 1){
            $('#circleloader1').hide();
            $('#success1').hide();
            $('#error1').show();

            $('#circleloader2').hide();
            $('#success2').hide();
            $('#error2').show();
          }else{
            $('#circleloader1').show();
            $('#success1').hide();
            $('#error1').hide();

            $('#circleloader2').show();
            $('#success2').hide();
            $('#error2').hide();
          }
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
        },
        complete:function(data){
        setTimeout(getMessage,1000);
        }
    });

  }
  $(document).ready(function(){
  setTimeout(getMessage,1000);
  
  });
</script>
<main class="main">
  <button id="random" class="button">Update value</button>
  <!-- <h1 class="main__title">AutoSecure</h1> -->
  <h2 class="main__title">Building Entry</h2>

  <div class="container">
    <div class="row">
      <div class="feature-col col-lg-6 col-xs-12">
        <div class="gauge-container">
          <div class="gauge"></div>
        </div>
      </div>
      <div class="feature-col col-lg-6 col-xs-12">
        <div class="circle-loader d-flex justify-content-center" id="circleloader1">
          <div class="checkmark draw" id="checkmark1"></div>
        </div>
        <div id="success1">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
            <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
            <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
          </svg>
          <p class="success">Oh Yeah!</p>
        </div> 

        <div id="error1">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
            <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
            <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
            <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
          </svg>
          <p class="error">Bummer!</p>
        </div>
      </div>
    </div>
    <div class="row">
      
      <div class="feature-col col-lg-6 col-xs-12">
        <div>
          <img src="{{asset('assets/images/avatar.png')}}" class="avatar" id="avatar" alt="">
        </div>
      </div>

      <div class="feature-col col-lg-6 col-xs-12">
        <div class="circle-loader d-flex justify-content-center" id="circleloader2">
          <div class="checkmark draw" id="checkmark2"></div>
        </div> 
        <div id="success2">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
            <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
            <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
          </svg>
          <p class="success">Oh Yeah!</p>
        </div> 

        <div id="error2">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
            <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
            <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
            <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
          </svg>
          <p class="error">Bummer!</p>
        </div> 
      </div>
 
    </div>
    <!-- <div class="row">
      <div class="feature-col col-lg-12 col-xs-12">
        <p><button id="toggle" type="button" class="btn btn-success btn-primary btn-lg col-md-3">Entry Allowed</button></p>
      </div>
    </div> -->
  </div>
  
  <div class="container">
      <p><a href="{{ url('/entry-dashboard/register') }}">Add details for irregular visitor</a></p>
  </div>
</main>

<!-- <footer class="footer">
  <p>A pen by <a href="http://brunocarvalho.me">Bruno Carvalho</a></p>
</footer> -->


@endsection
