@extends('admin.layouts.app')
 @section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Devices Table
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Table</a></li>
        <li class="active">pos</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header" align ="right">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
             
          <a href="{{route('devices.create')}}">
            <i class="fa fa-plus-square" title = "Add Pos" style="font-size:30px;"></i>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if(session()->has('success'))
                <div class="callout callout-info" >
                  <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                     <div class="alert-body">
                     <div class="alert-title">{{trans('success')}}</div>
                      {{ session('success') }}
                  </div>
                 </div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Machine code</th>
                  <th>status</th>
                  <th>current balance</th>
                  <th>Iamge</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              @foreach( $devices as $device )  
                <tr>
                  <td>{{$device->user->name}}</td>
                  <td>{{$device->machine_code}}</td>
                  @if($device->active == 1)
                  <td>Active</td>
                  @else
                  <td>UnActive</td>
                  @endif
                  <td>{{$device->balances->sum('charge_value')}}</td>
                  <td><img style="width: 60px; height: 60px;" src="{{asset($device->image)}}"></td>
                  <td>
                    <a href="{{route('devices.edit' , $device->id)}}">
                     <i class="fa fa-edit" title = "Edit" style="font-size:30px;"></i>
                      <span class="pull-right-container">
                       <small class="label pull-right bg-green"></small>
                      </span>
                    </a>
                    |
                    <a href="{{route('devices.destroy', $device->id)}}">
                     <i class="fa fa-trash" title = "Delete" style="font-size:30px;"></i>
                      <span class="pull-right-container">
                       <small class="label pull-right bg-green"></small>
                      </span>
                    </a>
                  </td>
                </tr>
               @endforeach  
                </tbody>
                <tfoot>
                <tr>
                  <th>Username</th>
                  <th>Machine code</th>
                  <th>status</th>
                  <th>current balance</th>
                  <th>Iamge</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->    

 @stop