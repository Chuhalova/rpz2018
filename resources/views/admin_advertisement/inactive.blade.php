@extends('layouts2.header')
@section('content')
    <div class="ads-grid_shop">
        <div class="shop_inner_inf ">
            <div class="left-ads-display col-md-12">
                <div class="wrapper_top_shop">
                    <div class="col-md-6 shop_left">
                        <img src="images/banner3.jpg" alt="">
                        <h6>40% off</h6>
                    </div>
                    <div class="col-md-6 shop_right">
                        <img src="images/banner2.jpg" alt="">
                        <h6>50% off</h6>
                    </div>
                    <div class="clearfix"></div>
                    <!-- product-sec1 -->
                    <div class="product-sec1">
                        <!--/mens-->
                        @foreach($inactiveAdv as $adv)
                            <div  class="col-md-4 product-men">
                                <div class="product-shoe-info shoe">
                                    <div class="men-pro-item">
                                        <div class="men-thumb-item">
                                            @if(count($adv->advimages)!=0)
                                                <img src="{{URL::to(Storage::url($adv->advimages->first()->image))}}" alt="">
                                            @endif
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ URL::to('/show/' . $adv->id) }}" class="link-product-add-cart">Детальніше</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info-product">
                                            <h4>
                                                <a href="{{ URL::to('/show/' . $adv->id) }}">{{$adv->title}}</a>
                                            </h4>
                                            <div class="info-product-price">
                                                <div class="grid_meta">
                                                    <div class="product_price">
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
                                            <div class="info-product-price">
                                                <form id="activate" method="POST" action="{{ url('/admin_advertisement/inactive/'. $adv->id )  }}">
                                                    {{method_field('PATCH')}}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-success">Активувати</button>
                                                </form>
                                                <form id="deatroyAdvAdm" action="{{ url('/admin_advertisement/inactive/'.$adv->id) }}" method="POST" style="display: inline">
                                                    {{method_field('DELETE')}}
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" >Видалити</button>
                                                </form>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;margin: auto;">
                            {!! $inactiveAdv->links()!!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 shop_left shp">
                    <img src="images/banner4.jpg" alt="">
                    <h6>21% off</h6>
                </div>
                <div class="col-md-6 shop_right shp">
                    <img src="images/banner1.jpg" alt="">
                    <h6>31% off</h6>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>

    <div class="clearfix"> </div>
    </div>
    </div>
    <!-- //footer -->
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
@endsection