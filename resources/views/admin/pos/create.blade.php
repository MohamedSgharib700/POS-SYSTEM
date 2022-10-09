@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Device page 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Form</a></li>
        <li class="active">pos</li>
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
            <form role="form" action="{{route('devices.store')}}" method="post" enctype="multipart/form-data">
               @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="inputState">customer</label>
                    <select name="user_id" class="form-control">
                    <option value="">Select customer</option>
                    @foreach( $users as $user )
                     <option value="{{$user->id}}" >{{$user->name}}</option>
                    @endforeach
                    </select>
                 </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Machine code</label>
                  <input type="text" class="form-control" name="machine_code" placeholder="Enter machine code">
                </div>
                <div class="form-group">
                  <label for="inputState">Status</label>
                    <select name="active" class="form-control">
                     <option value="1" selected >Active</option>
                     <option value="2" >UnActive</option>
                    </select>
                 </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" name="image">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add</button>
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
