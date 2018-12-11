<html lang="zxx" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head>
    <title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="http://localhost:8000/css/style.css">
    <link href="{{asset('assets2/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('assets2/css/shop.css')}}" type="text/css" media="screen" property="">
    <link href="{{asset('assets2/css/style7.css')}}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/jquery-ui1.css')}}">
    <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('assets2/css/contact.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('assets2/css/about.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/css/font-awesome.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('assets2/js/jquery-2.1.4.min.js')}}"></script>
</head>

<body>
<!-- banner -->
<div class="banner_top" id="home">
    <div class="wrapper_top_w3layouts">

        <div class="header_agileits">
            <div class="logo inner_page_log">
                <h1><a class="navbar-brand" href="/home"><span>Твоя</span><i></i>дошка<i></i></a></h1>
            </div>
            @auth
            <div class="overlay overlay-contentpush">
                <button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>
                <nav>
                    <ul>
                        <li><a href="/home" class="active">Головна</a></li>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('User'))
                            <li><a href="/advertisements/create">Створити подію</a></li>
                            <li><a href="/advertisements/activeUserAdv">Мої активні події</a></li>
                            <li><a href="/advertisements/inactiveUserAdv">Мої неактивні події</a></li>
                        @else
                            <li>
                                <a href="/admin_advertisement/active">Активні події</a>
                            </li>
                            <li>
                                <a href="/admin_advertisement/inactive">Неактивні події</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="mobile-nav-button">
                <button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
        @endauth
        <!-- cart details -->
            <div class="clearfix"></div>
        </div>
        <!-- /slider -->
        <div class="slider">
            <div class="callbacks_container">
                @if(count($images)!=0 && count($images)<4)
                    <ul class="rslides callbacks callbacks1" id="slider4">
                        <li id="callbacks1_s0" class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out;">
                            <div class="banner-top2" style="background: url({{URL::to(Storage::url($images[0]->image))}}) no-repeat 0px 0px;background-size:cover;">
                                <div class="banner-info-wthree">
                                </div>
                            </div>
                        </li>
                        @if(count($images)>1)
                            <li id="callbacks1_s1" class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out;">
                                <div style="background: url({{URL::to(Storage::url($images[1]->image))}}) no-repeat 0px 0px;background-size:cover;" class="banner-top3">
                                    <div class="banner-info-wthree">
                                    </div>

                                </div>
                            </li>
                        @endif
                        @if(count($images)>2)
                            <li id="callbacks1_s2" class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out;">
                                <div style="background: url({{URL::to(Storage::url($images[2]->image))}}) no-repeat 0px 0px;background-size:cover;" class="banner-top">
                                    <div class="banner-info-wthree">
                                    </div>

                                </div>
                            </li>
                        @endif
                    </ul>
                @endif
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="mid_services">
    <div class="col-md-6 according_inner_grids">
        <h3 class="heading two">{{$adv->title}}</h3>
        <div class="according_info">
            <div class="panel-group about_panel" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title asd">
                              Опис події
                        </h4>
                    </div>
                    <div>
                            {{$adv->description}}
                    </div>
                    <div>
                    @if($adv->category)
                    @if(($adv->category->parent_id)!=0)
                    <span class="category ">{{$adv->category->parent->category}}</span>
                    @endif
                    @if(($adv->category->id)!=0)
                    <span class="category ">{{$adv->category->category}}</span>
                    @endif
                    @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
<!-- footer -->
<div class="footer_agileinfo_w3">
    <p class="copy-right-w3ls-agileits">© 2018 Помічник. Автори - Чухалова + Масленнікова</p>
</div>

<!-- //footer -->
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script src="{{asset('assets2/js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{asset('assets2/js/classie.js')}}"></script>
<script src="{{asset('assets2/js/demo1.js')}}"></script>
<!-- //nav -->
<!-- cart-js -->
<script src="{{asset('assets2/js/minicart.js')}}"></script>
<script>
    shoe.render();

    shoe.cart.on('shoe_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script>
<!-- //cart-js -->
<!--search-bar-->
<script src="{{asset('assets2/js/search.js')}}"></script>
<!--//search-bar-->
<script src="{{asset('assets2/js/responsiveslides.min.js')}}"></script>
<script>
    $(function () {
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 1000,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>
<!-- js for portfolio lightbox -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('assets2/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets2/js/easing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smoth-scrolling -->

<script type="text/javascript" src="{{asset('assets2/js/bootstrap-3.1.1.min.js')}}"></script>




</body></html>
