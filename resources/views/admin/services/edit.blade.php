@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Services page 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Form</a></li>
        <li class="active">Service</li>
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
              <h3 class="box-title">Edit form</h3>
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
            <form role="form" action="{{route('services.update' ,['service' => $service->id])}}" method="post" enctype="multipart/form-data">
               @csrf
               @method('put')
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Service name</label>
                  <input type="text" class="form-control" name="name" value="{{$service->name}}" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" name="image">
                </div>
                 <div class="form-group">
                  <label for="inputState">Categories</label>
                    <select name="category_id" class="form-control">
                    <option value="{{$service->category_id}}">Select category</option>
                    @foreach( $categories as $category )
                     <option value="{{$category->id}}" >{{$category->name}}</option>
                    @endforeach
                    </select>
                 </div>
                 <div class="form-group">
                  <label for="inputState">Status</label>
                    <select name="active" class="form-control">
                     <option value="1" >Active</option>
                     <option value="2" >UnActive</option>
                    </select>
                 </div>
                </div>  
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
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
