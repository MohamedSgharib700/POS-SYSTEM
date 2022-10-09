@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Add Balance page 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Form</a></li>
        <li class="active">balance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add form</h3>
            </div>
            <!-- /.box-header -->
            @if ($errors->any())
              <div class="alert alert-danger">
                 <ul>
                   @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                   @endforeach
                 </ul>
              </div>
            @endif
            <!-- form start -->
            <form role="form" action="{{route('balancesStore',$device->id)}}" method="post">
               @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Charge value</label>
                  <input type="text" class="form-control" name="charge_value" placeholder="Enter value">
                </div>
                <input type="hidden" class="form-control" value="{{$device->id}}" name="pos_id">
                <input type="hidden" class="form-control" value="{{auth()->user()->name}}" name="supervisor">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add to device</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>    
@stop
