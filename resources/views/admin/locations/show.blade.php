@extends('admin.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Google Maps
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">map</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
         
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <!-- <h3></h3> -->
    <!--The div element for the map -->
    <div class="my-modal pack1">
        <div class="closer"></div>
        <div class="my-modal-body">
        <iframe src="{{$location->lon}}" width="1600" height="800" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <br>
            </div>
        </div>
    </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://www.google.com/maps/place/%D8%AD%D9%84%D9%88%D8%A7%D9%86%D8%8C+%D8%AD%D9%84%D9%88%D8%A7%D9%86+%D8%A7%D9%84%D8%B4%D8%B1%D9%82%D9%8A%D8%A9%D8%8C+%D9%82%D8%B3%D9%85+%D8%AD%D9%84%D9%88%D8%A7%D9%86%D8%8C+%D9%85%D8%AD%D8%A7%D9%81%D8%B8%D8%A9+%D8%A7%D9%84%D9%82%D8%A7%D9%87%D8%B1%D8%A9%E2%80%AC%E2%80%AD/@29.837999,31.30119,14z/data=!4m5!3m4!1s0x1458342722109f49:0x8164db4d10cac6c!8m2!3d29.8402707!4d31.2982121?hl=ar">
    </script>

@stop