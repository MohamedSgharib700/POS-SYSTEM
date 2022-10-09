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
                                <h3 class="box-title">بيانات الكارت</h3>
                             </div>
                             </br>
                             <!-- </br>
                             </br> -->
            <!-- /.box-header -->
            <div class="box-body">
            @if(session()->has('success'))
                      <div align ="center" >
                       <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                       <div class="alert-body">
                       <div class="alert-title"></div>
                       <h3>
                        {{ session('success') }}
                       </h3>
                       </div>
                      </div>
                    @endif
                    </br>
              <form role="form" action="{{route('card_payment' , $card->id)}}" method="post" > 
                @csrf
                @method('put')
                <div class="box-body no-padding">
                 <div class="mailbox-read-info  text-right">
                     <h3>{{$card->name}} :   اسم العميل </h3>
                     <h5>رقم الكارت  :  {{$card->user_service_number}}</h5>
                     @if($card->status == 1)
                     <h5>القيمة المستحقة : {{$card->value}}</h5>
                     @else
                     <h5>القيمة المستحقة : لا توجد فواتير مستحقه علي هذا العميل</h5>
                     @endifcard
                     <div class="text-lift">
                     
                    @if($card->status == 1)
                    
                       <input type="text" class="form-control text-right"  name="value" value="60" placeholder="ادخل قيمة الشحن">
                       <input type="hidden" class="form-control text-right"  name="category_id" value="3">

                        <button type="submit" class="btn btn-primary">دفع</button>
                     </form>
                    @endif
                </div>
                 </div>
                  
                </div>

              </div>
              
            

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