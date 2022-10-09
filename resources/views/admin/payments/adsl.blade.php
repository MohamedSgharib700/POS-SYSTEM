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
                                <div class="row text-center">
                                    <div class="col-md-6">
                                        <div class="option py-3">
                                            <a href="#">
                                                <img src="{{asset('pos/images/orange.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!----->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="#">
                                                <img src="{{asset('pos/images/vodafone.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="#">
                                                <img src="{{asset('pos/images/we.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="col-md-6 ">
                                        <div class="option py-3">
                                            <a href="#">
                                                <img src="{{asset('pos/images/etsalat.png')}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <!---->
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