@extends('admin.layouts.app')
 @section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Services Table
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Table</a></li>
        <li class="active">Services</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header" align ="right">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
             
          <a href="{{route('services.create')}}">
            <i class="fa fa-plus-square" title = "Add Service" style="font-size:30px;"></i>
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
                  <th>Name</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Iamge</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              @foreach( $services as $service )  
                <tr>
                  <td>{{$service->name}}</td>
                  <td>{{$service->category->name}}</td>
                  @if($service->active == 1)
                  <td>Active</td>
                  @else
                  <td>UnActive</td>
                  @endif
                  <td><img style="width: 60px; height: 60px;" src="{{asset($service->image)}}"></td>
                  <td>
                    <a href="{{route('services.edit' , $service->id)}}">
                     <i class="fa fa-edit" title = "Edit" style="font-size:30px;"></i>
                      <span class="pull-right-container">
                       <small class="label pull-right bg-green"></small>
                      </span>
                    </a>
                    |
                    <a href="{{route('services.destroy', $service->id)}}">
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
                   <th>Name</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Iamge</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              {{$services->links()}}
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