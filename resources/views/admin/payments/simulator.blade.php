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
    <link rel="stylesheet" href="{{asset('pos/css/pos.css')}}">
</head>

<body>
    <div class="open">
        <i class="fas fa-ellipsis-h" id="open"></i>
    </div>
    <section class="pos-holder">
        <div class="container  content-container">
            <div class="layer-1">
                <i class="fas fa-times" id="close"></i>

                <div class="pos-logo">
                </div>
                <div class="layer-2">
                    <div class="main-contetnt pt-5 pb-2">
                        <div class="main-screen">
                            <div class="logo text-center">
                                <div class="amw-logo">
                                    <img src="{{asset('pos/images/enter.png')}}" class="img-fluid" id="screenInter">
                                </div>
                            </div>
                            <!-----------------LOGO SCREEN ENDS----------------->
                            <div class="container contetnt-holder py-4">
                                <div class="amwal-logo py-5 text-center">
                                    <img src="{{asset('pos/images/logo.png')}}" class="img-fluid">
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-6">
                                        <div class="option py-3">
                                            <a href="{{route('adsl')}}">
                                                <img src="{{asset('pos/images/2.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!----->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="cridetcharge.html">
                                                <img src="{{asset('pos/images/1.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="mobilebill.html">
                                                <img src="{{asset('pos/images/4.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="{{route('electricity_service' , $device->id)}}">
                                                <img src="{{asset('pos/images/3.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="gazbill.html">
                                                <img src="{{asset('pos/images/6.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="waterbill.html">
                                                <img src="{{asset('pos/images/5.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!----->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="ticketsbooking.html">
                                                <img src="{{asset('pos/images/8.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="traficfines.html">
                                                <img src="{{asset('pos/images/7.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!----->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="moneypull.html">
                                                <img src="{{asset('pos/images/10.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="donation.html">
                                                <img src="{{asset('pos/images/9.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!----->
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