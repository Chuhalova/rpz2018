<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('assets2/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets2/css/shop.css')}}" type="text/css" media="screen" property="" />
    <link href="{{asset('assets2/css/style7.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/jquery-ui1.css')}}">
    <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets2/css/contact.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets2/css/font-awesome.css')}}" rel="stylesheet">
</head>
<body>
<div class="banner_top innerpage" id="home">
    <div class="wrapper_top_w3layouts">
        <div class="header_agileits">
            <div class="logo inner_page_log">
                <h1><a class="navbar-brand" href="/home"><span>Добрий</span><i></i>помічник<i></i></a></h1>
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
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- /banner_inner -->
    <div class="services-breadcrumb_w3ls_agileinfo">
        <div class="inner_breadcrumb_agileits_w3">

            <ul class="short">
                @guest
                <li><a href='{{ route('login') }}'><span>Увійти</span></a></li>
                <li class='last'><a href='{{ route('register') }}'><span>Зареєструватись</span></a></li>
                @else
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Вийти') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</div>
@yield('content')
<div class="footer_agileinfo_w3">
    <p class="copy-right-w3ls-agileits">© 2018 Помічник. Автори - Чухалова + Масленнікова</p>
</div>
    </div>
@yield('scriptsShow')
<script type="text/javascript" src="{{asset('assets2/js/jquery-2.1.4.min.js')}}"></script>
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
<script src="{{asset('assets2/js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{asset('assets2/js/classie.js')}}"></script>
<script src="{{asset('assets2/js/demo1.js')}}"></script>
<script src="{{asset('assets2/js/search.js')}}"></script>
<script src="{{asset('assets2/js/jquery-ui.js')}}"></script>
<script>
    $(window).load(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 9000,
            values: [50, 6000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
    });
</script>
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
<script>
    $(document).ready(function() {
        $.get("/categories", function(data, status){
            data.forEach(function(item) {
                $('#par').append(`<option value="`+item.id+`">` + item.category +`</option>`);
                console.log(item);
            });
        });
        $('#par').change(function() {
            var value = $(this).val();
            if (!value) {
                $('#for_child').css('display', 'none');
                $('#child').html('<option value="">Оберіть резусність</option>');
            } else {
                $.get("/categories/" + value, function (data, status) {
                    if (data.length == 0) {
                        $('#for_child').css('display', 'none');
                        $('#child').html('<option value="">Оберіть резусність</option>');
                    } else {
                        $('#for_child').css('display', 'block');
                        $('#child').html('<option value="">Оберіть резусність</option>');
                        data.forEach(function (item) {
                            $('#child').append(`<option value="` + item.id + `">` + item.category + `</option>`);
                            console.log(item);
                        });
                    }
                });
            }
        });
    })
</script>
<!-- //end-smoth-scrolling -->
<script type="text/javascript" src="{{asset('assets2/js/bootstrap-3.1.1.min.js')}}"></script>
</body>



