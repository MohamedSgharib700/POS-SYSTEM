
@extends('admin.layouts.app')
 @section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Devices
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">devices</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- ./row -->
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <!-- Application buttons -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Current devices enabled</h3>
            </div>
            <div class="box-body" >
            @foreach( $devices as $device)
              <a class="btn btn-app" style="width: 125px; height: 60px;" href="{{route('simulator',$device->id)}}">
                <span class="badge bg-yellow">{{$device->machine_code}}</span>
                <i class="fa fa fa-fax"></i> {{$device->user->name}}
              </a>
            @endforeach
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /. row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 @stop