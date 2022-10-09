<!doctype html>
<html lang="en">

<head>
    <title>Amwal Simulator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('pos/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('pos/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('pos/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('pos/css/posAdsl.css')}}">
</head>

<body>
    <section class="pos-holder">
        <div class="container  content-container">
            <div class="layer-1">
                <i class="fas fa-times" id="close"></i>

                <div class="pos-logo">
                </div>
                <div class="layer-2">
                    <div class="main-contetnt pt-5 pb-2">
                        <div class="main-screen">
                            <!-----------------LOGO SCREEN ENDS----------------->
                            <div class="container contetnt-holder py-4">
                                <div class="amwal-logo py-5 text-center">
                                    <img src="{{asset('pos/images/logo.png')}}" class="img-fluid">
                                </div>
                                <div class="box box-warning">
                              <div class="text-center">
                                <h3 class="box-title">أبحث برقم العداد</h3>
                             </div>
                             </br>
                             <!-- </br>
                             </br> -->
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" type="get"  action="{{route('electricity_bill' , $device->id)}}">
                
                <!-- text input -->
                <div class="form-group">
                  <!-- <label>Text</label> -->
                  <input type="text" class="form-control text-right" value="{{ request('name') }}" name="number"  placeholder=" * * * * * أدخل رقم العداد ">
                </div>

                <div class="text-lift">
                  <button type="submit" class="btn btn-primary">بحث</button>
                </div>
               
             @if( count([$counter]) > 0 && isset($_GET['number']))

                <div class="box-body no-padding">
                 <div class="mailbox-read-info  text-right">
                   
                     <h3>{{$counter->name}} :   اسم العميل </h3>
                     <a href="{{route('show_bill',['counter' => $counter->id , 'device' => $device->id])}}"><h3> انتقل لدفع الفتورة</h3></a>
                     
                </div>
                 </div>
                  
                </div>


              </div>
              @endif

              </form>

             

              
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    <!-- /.content -->
                                </div>
                                <div class="row Browse pt-5">
                                    <div class="col-md-6 pt-3">
                                        <a href="#">
                                            <img src="{{asset('pos/images/cancellation.png')}}" class="img-fluid ">
                                        </a>
                                    </div>
                                    <div class="col-md-6 pt-3">
                                        <a href="javascript:history.back();" class="text-right">
                                            <img src="{{asset('pos/images/back.png')}}" class="img-fluid ">
                                        </a>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('pos/js/jquery-3.4.1.min.js')}}"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{asset('pos/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('pos/js/pos.js')}}"></script>
</body>

</html>