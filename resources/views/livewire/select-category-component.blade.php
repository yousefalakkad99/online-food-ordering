<style>


    :root{
        --green:#27ae60;
        --black:#192a56;
        --light-color:#666;
        --box-shadow:0 .5rem 1.5rem rgba(0,0,0,.1);
    }

    *{
        font-family: 'Nunito', sans-serif;
        margin:0; padding:0;
        box-sizing: border-box;
        text-decoration: none;
        outline: none; border:none;
        text-transform: capitalize;
        transition: all .2s linear;
    }

    html{
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-padding-top: 5.5rem;
        scroll-behavior: smooth;
    }

    section{
        padding:2rem 9%;
    }

    section:nth-child(even){
        background:#eee;
    }

    .sub-heading{
        text-align: center;
        color:var(--green);
        font-size: 3rem;
        padding-top: 1rem;
    }

    .heading{
        text-align: center;
        color:var(--black);
        font-size: 3rem;
        padding-bottom: 2rem;
        text-transform: uppercase;
    }

    .btn{
        margin-top: 0.4rem;
        display: inline-block;
        font-size: 1.7rem;
        color:#fff;
        background: #d65106;
        border-radius: .5rem;
        cursor: pointer;
        padding:.8rem 3rem;
    }

    .btn:hover{
        background: var(--green);
        letter-spacing: .1rem;
    }

    .menu .box-container{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
        gap:1.5rem;
    }

    .menu .box-container .box{
        background: #fff;
        border:.1rem solid rgba(0,0,0,.2);
        border-radius: .5rem;
        box-shadow: var(--box-shadow);
    }

    .menu .box-container .box .image{
        height: 20rem;
        width: 100%;
        padding:1.5rem;
        overflow: hidden;
        position: relative;
    }

    .menu .box-container .box .image img{
        height: 100%;
        width: 100%;
        border-radius: .5rem;
        object-fit: cover;
    }

    .menu .box-container .box .image .fa-heart{
        position: absolute;
        top:2.5rem; right: 2.5rem;
        height: 5rem;
        width: 5rem;
        line-height: 5rem;
        text-align: center;
        font-size: 2rem;
        background: #fff;
        border-radius: 50%;
        color:var(--black);
    }

    .menu .box-container .box .image .fa-heart:hover{
        background-color: var(--green);
        color:#fff;
    }

    .menu .box-container .box .content{
        padding:2rem;
        padding-top: 0;
    }

    .menu .box-container .box .content .stars{
        padding-bottom: 0.1rem;
    }

    .menu .box-container .box .content .stars i{
       font-size: 1.7rem;
       color:var(--green);
    }

    .menu .box-container .box .content h3{
        color:var(--black);
        font-size: 2.5rem;
    }

    .menu .box-container .box .content p{
        color:var(--light-color);
        font-size: 1.6rem;
        padding:.5rem 0;
        line-height: 1.5;
    }

    .menu .box-container .box .content .price{
        color:var(--green);
        margin-left: 1rem;
        font-size: 2rem;
    }

        </style>
    <!-- Start slides -->
    @if ($dailymeals->count() > 0)
    <div id="slides" class="cover-slides">
        <ul class="slides-container">
            @foreach ($dailymeals as $dailymeal)
            <li class="text-left">
                <img src="{{ asset('/assets/imgs/food') }}/{{ $dailymeal->image }}" alt="{{ $dailymeal->name }}" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="text-align: right">
                            <h1 class="m-b-50" ><strong>{{ $dailymeal->day }} / {{ $dailymeal->name }}</strong></h1>
                            <h2 style="color: white; font-size:50px" >{{ $dailymeal->description }}</h2>
                            <p>  السعرات الحرارية {{ $dailymeal->calories }}</p>
                            <p><a class="btn btn-lg btn-circle btn-outline-new-white" target="_blank" href="https://play.google.com/store/apps/details?id=com.nextwo.the_chefz&hl=en&gl=US"> {{ $dailymeal->price }} ر.س</a></p>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    @endif
    <!-- End slides -->

    <!-- Start About -->
    <div class="about-section-box" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-6 col-sm-12">
                    <div class="inner-column" style="margin-right: 150px">
                        <h1 style="text-align: center" >مرحبًا بكم في مطعم <span>VIP Order</span></h1>
                        @if ($contact)
                        <p>{{ $contact->about_us }}</p>
                        @endif


                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">

                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start QT -->
    <div class="qt-box qt-background">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <p class="lead ">
                        إذا لم تكن أنت من تطبخ ، ابق بعيدًا وأثني على المطعم
                    </p>
                    <span class="lead" style="font-size: 55px">VIP ORDER</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End QT -->
     <section class="menu" id="menu">

            <h1 class="sub-heading"> قائمة الطعام </h1>
            <h1 class="heading"> جميع الأسعار تشمل الضريبة </h1>
            <div class="box-container">
                <div class="row inner-menu-box">
                    <div class="col-9">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                            <a class="nav-link active"   href="{{ route('index') }}" role="tab" style="text-align: right"  aria-selected="true">كل الأصناف</a>
                            @foreach ($categories as $category )
                            <a class="nav-link"   href="{{ route('select.category',$category->id) }}" role="tab" style="text-align: right;"  aria-selected="false">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach ($foods as $food )
                <div class="box">

                    <div class="image">
                        <img src="{{ asset('assets/imgs/food') }}/{{ $food->image }}" alt="{{ $food->name }}">
                    </div>
                    <div class="content">
                        <div class="stars">
                            <small style="color: var(--green);font-size:15px">سعرات حرارية / {{ $food->calories }}</small>
                        </div>
                        <h3 style="text-align: right">{{ $food->name }}</h3>
                        <p style="text-align: right" >{{ $food->description }}</p>
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.nextwo.the_chefz&hl=en&gl=US" class="btn" style="margin-left: 2rem">أطلب الأن</a>
                        @if ($food->sale)
                        <span class="price"> {{ $food->sale }} ر.س</span>
                        <br>
                        <span style=" text-decoration: line-through;"> {{ $food->price }} ر.س</span>
                        @else
                        <span class="price">{{ $food->price }}ر.س</span>
                        @endif

                    </div>
                </div>
                @endforeach
            </div>
        </section>
    <!-- Start Gallery -->
    <div class="gallery-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h1 class="sub-heading" style="color: black"> معرض الصور </h1>
                    </div>
                </div>
            </div>
            <div class="tz-gallery">
                <div class="row">
                    @foreach ($gallaries as $gallary )
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <a class="lightbox" href="{{ asset('/assets/imgs/gallary') }}/{{ $gallary->image }}">
                            <img class="img-fluid" style="height: 300px; width:400px" src="{{ asset('assets/imgs/gallary') }}/{{ $gallary->image }}" alt="Gallery Images">
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->

    <!-- Start Customer Reviews -->

    <!-- End Customer Reviews -->

    <!-- Start Contact info -->
    <div class="contact-imfo-box" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 arrow-right">
                    <i class="fa fa-volume-control-phone"></i>
                    <div class="overflow-hidden">
                        <h4>Phone</h4>
                        <p class="lead" dir="ltr">
                            @if ($contact)
                            {{ $contact->phone }}
                            @endif

                        </p>
                    </div>
                </div>
                <div class="col-md-4 arrow-right">
                    <i class="fa fa-envelope"></i>
                    <div class="overflow-hidden">
                        <h4>Email</h4>
                        <p class="lead">
                            @if ($contact)
                            {{ $contact->email }}
                            @endif


                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-map-marker"></i>
                    <div class="overflow-hidden">
                        <h4>Location</h4>
                        <p class="lead">
                            @if ($contact)
                            {{ $contact->location }}
                            @endif

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact info -->
