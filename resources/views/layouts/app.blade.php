<!DOCTYPE html>
<html lang="en" dir="rtl"><!-- Basic -->
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Site Metas -->
    <title>Vip Order</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('assets/index/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets/index/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/index/css/bootstrap.min.css')}}">
	<!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('assets/index/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/index/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/index/css/custom.css')}}">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

    @livewireStyles
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="{{ route('index') }}" dir="rtl">الرئيسية</a></li>
						<li class="nav-item"><a class="nav-link" href="#menu" style="text-align: right">قائمة&nbsp;الطعام</a></li>
						<li class="nav-item"><a class="nav-link" href="#about" style="text-align: right;">من&nbsp;نحن</a></li>
						<li class="nav-item"><a class="nav-link" href="#contact">أتصل&nbsp;بنا</a></li>
                        @auth
                        <li class="nav-item dropdown ">
                            @if(Auth::user()->user_type == "ADM")
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                    <a class="dropdown-item" href="{{ route('admin.food') }}" style="text-align:right;font-size:2rem;">الوجبات</a>
                                    <a class="dropdown-item" href="{{ route('admin.category') }}" style="text-align:right;font-size:2rem;">الاصناف</a>
                                    <a class="dropdown-item" href="{{ route('admin.dailymeal') }}" style="text-align:right;font-size:2rem;">الوجبات اليومية</a>
                                    <a class="dropdown-item" href="{{ route('admin.Gallary') }}" style="text-align:right;font-size:2rem;">معرض الصور</a>
                                    <a class="dropdown-item" href="{{ route('admin.contact') }}" style="text-align:right;font-size:2rem;">معلومات الأتصال</a>
                                </div>
                                @else
                                <a class="nav-link " href="#" >{{ Auth::user()->name }}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="#">
                                @csrf
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventdefault(); this.closest('form').submit();">تسجيل&nbsp;خروج</a>
                            </form>
                        </li>
                        <a class="navbar-brand col-md-10" href="{{ route('index') }}">
                            <img src="{{ asset('assets/imgs/logo/vvv(1).png') }}" alt="" style="height: 2cm; width:7cm" />
                        </a>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">تسجيل&nbsp;الدخول</a></li>

                        <a class="navbar-brand col-md-12" href="{{ route('index') }}">
                            <img src="{{ asset('assets/imgs/logo/vvv(1).png') }}" alt="" style="height: 2cm; width:7cm" />
                        </a>
                        @endauth
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
    {{ $slot }}
<!-- Start Footer -->
@php
$contact=DB::table('contacts')->first();
@endphp
<footer class="footer-area bg-f">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3>من نحن</h3>
                @if ($contact)
                <p>{{ $contact->about_us}} </p>
                @endif

            </div>
            <div class="col-lg-3 col-md-6">
                <h3>مواقع التواصل الأجتماعي</h3>

                <ul class="list-inline f-social">
                    @if ($contact)
                    <li class="list-inline-item"><a target="_blank" href="{{ $contact->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a target="_blank" href="{{ $contact->snapchat }}"><i class="fa fa-snapchat" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a target="_blank" href="{{ $contact->whatsapp }}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a target="_blank" href="{{ $contact->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            @endif

                </ul>
            </div>
            <div class="col-lg-3 col-md-6" dir="ltr" >
                <h3>معلومات الأتصال</h3>
                @if ($contact)
                <p class="lead">{{ $contact->location }}</p>
                <p class="lead"><a href="#">{{ $contact->phone }}</a></p>
                <p><a href="#">{{ $contact->email }}</a></p>
                        @endif
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>ساعات العمل</h3>
                <p><span class="text-color">الاثنين: </span>مغلق</p>
                <p><span class="text-color">الثلاثاء-الأربعاء :</span> 9:Am - 10PM</p>
                <p><span class="text-color">الخميس-الجمعة  :</span> 9:Am - 10PM</p>
                <p><span class="text-color">السبت-الأحد  :</span> 5:PM - 10PM</p>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="company-name">All Rights Reserved. &copy; 2022 <a href="#">Vip Order Restaurant</a> Powerd by :
                <a href="https://wsend.co/201104583172">Youssef Alakkad</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
<!-- ALL JS FILES -->
<script src="{{ asset('assets/index/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('assets/index/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/index/js/bootstrap.min.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{ asset('assets/index/js/jquery.superslides.min.js')}}"></script>
<script src="{{ asset('assets/index/js/images-loded.min.js')}}"></script>
<script src="{{ asset('assets/index/js/isotope.min.js')}}"></script>
<script src="{{ asset('assets/index/js/baguetteBox.min.js')}}"></script>
<script src="{{ asset('assets/index/js/form-validator.min.js')}}"></script>
<script src="{{ asset('assets/index/js/contact-form-script.js')}}"></script>
<script src="{{ asset('assets/index/js/custom.js')}}"></script>
@livewireScripts
</body>
</html>
