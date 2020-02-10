<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lets Learn - @yield('web-title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="/asset/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="/asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="/asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/asset/css/magnific-popup.css">
    <link rel="stylesheet" href="/asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="/asset/css/themify-icons.css">
    <link rel="stylesheet" href="/asset/css/nice-select.css">
    <link rel="stylesheet" href="/asset/css/flaticon.css">
    <link rel="stylesheet" href="/asset/css/gijgo.css">
    <link rel="stylesheet" href="/asset/css/animate.css">
    <link rel="stylesheet" href="/asset/css/slicknav.css">
    <link rel="stylesheet" href="/asset/css/style.css">
    <link rel="stylesheet" href="/asset_sweet_alert/sweetalert.css">
    <!-- <link rel="stylesheet" href="/asset/css/responsive.css"> -->
</head>
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="/asset/img/Capture.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a  href="/">Home</a></li>
                                        <li><a href="/kursus">Kursus</a></li>

                                        <li><a href="/tentang_kami">Tentang Kami</a></li>

                                        <li><a href="/kontak">Kontak</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <a href="#test-form" class="login popup-with-form">
                                    <i class="flaticon-user"></i>
                                    <span>log in</span>
                                </a>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
    @yield('content')

 <!-- footer -->
    <footer class="footer footer_bg_1">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="/asset/img/logo.png" alt="">
                                </a>
                            </div>
                            <p>
                                Firmament morning sixth subdue darkness creeping gathered divide our let god moving.
                                Moving in fourth air night bring upon it beast let you dominion likeness open place day
                                great.
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Courses
                            </h3>
                            <ul>
                                <li><a href="#">Wordpress</a></li>
                                <li><a href="#"> Photoshop</a></li>
                                <li><a href="#">Illustrator</a></li>
                                <li><a href="#">Adobe XD</a></li>
                                <li><a href="#">UI/UX</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Resourches
                            </h3>
                            <ul>
                                <li><a href="#">Free Adobe XD</a></li>
                                <li><a href="#">Tutorials</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> About</a></li>
                                <li><a href="#"> Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Address
                            </h3>
                            <p>
                                200, D-block, Green lane USA <br>
                                +10 367 467 8934 <br>
                                edumark@contact.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Alaska DE-VO
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->

    <!-- form itself end-->
    <form id="test-form" class="white-popup-block mfp-hide" action="/proses_login" method="post">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img src="/asset/img/form-logo.png" alt="">
                    </a>
                </div>
                <h3>Sign in</h3>
                {{ csrf_field()}}

                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="text" autocomplete="off" placeholder="Enter E-mail or Username" name="auth" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed_btn_orange">Sign in</button>
                        </div>
                    </div>
                <p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form2">Sign Up</a>
                </p>
            </div>
        </div>
    </form>
    <!-- form itself end -->

    <!-- form itself end-->
    <form id="test-form2" class="white-popup-block mfp-hide" action="/proses_registrasi" method="post">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img src="/asset/img/form-logo.png" alt="">
                    </a>
                </div>
                <h3>Registration</h3>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="text" placeholder="Enter fullname" autocomplete="off" required name="fullname">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="email" placeholder="Enter email" autocomplete="off" required name="email">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="text" placeholder="Enter username" autocomplete="off" required name="username">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" placeholder="Password" required name="password">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="Password" placeholder="Confirm password" required name="confirm_password">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <select name="province_id" style="margin-bottom: 20px;" required
                                    class="form-control form-control-alternative dynamic"
                                    id="province" data-dependent="regency">
                                <option value="">--Pilih Provinsi--</option>
                                @foreach($provinceList as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <select name="regency_id" style="margin-bottom: 20px;" required
                                    class="form-control form-control-alternative dynamic"
                                    id="regency" data-dependent="district">
                                <option value="">--Pilih Kabupaten/Kota--</option>

                            </select>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <select name="district_id" style="margin-bottom: 20px;" required
                                    class="form-control form-control-alternative"
                                    id="district">
                                <option value="">--Pilih Kecamatan--</option>

                            </select>
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed_btn_orange">Sign Up</button>
                        </div>
                    </div>
            </div>
        </div>
    </form>

    <!-- JS here -->
    <script src="/asset/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/asset/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/asset/js/popper.min.js"></script>
    <script src="/asset/js/bootstrap.min.js"></script>
    <script src="/asset/js/owl.carousel.min.js"></script>
    <script src="/asset/js/isotope.pkgd.min.js"></script>
    <script src="/asset/js/ajax-form.js"></script>
    <script src="/asset/js/waypoints.min.js"></script>
    <script src="/asset/js/jquery.counterup.min.js"></script>
    <script src="/asset/js/imagesloaded.pkgd.min.js"></script>
    <script src="/asset/js/scrollIt.js"></script>
    <script src="/asset/js/jquery.scrollUp.min.js"></script>
    <script src="/asset/js/wow.min.js"></script>
    <script src="/asset/js/nice-select.min.js"></script>
    <script src="/asset/js/jquery.slicknav.min.js"></script>
    <script src="/asset/js/jquery.magnific-popup.min.js"></script>
    <script src="/asset/js/plugins.js"></script>
    <script src="/asset/js/gijgo.min.js"></script>
{{--    <script src="/asset/js/vendor/jquery-1.12.4.min.js"></script>--}}
    <script src="/asset_sweet_alert/sweetalert.min.js"></script>

    @include('sweet::alert')
    <!--contact js-->
    <script src="/asset/js/contact.js"></script>
    <script src="/asset/js/jquery.ajaxchimp.min.js"></script>
    <script src="/asset/js/jquery.form.js"></script>
    <script src="/asset/js/jquery.validate.min.js"></script>
    <script src="/asset/js/mail-script.js"></script>
    <script src="/asset/js/main.js"></script>

    <script>
        $(document).ready(function () {
            $('.dynamic').change(function () {
                if($(this).val() != ''){
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                            url:"/dynamicDependent",
                            method:"POST",
                            data:{select:select, value:value, _token : _token, dependent:dependent},
                            success:function (result) {
                                console.log(result);
                                $('#'+dependent).html(result);
                            }
                    });
                }
            });
        });
    </script>
</body>

</html>
